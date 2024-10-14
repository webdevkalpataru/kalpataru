<?php

namespace App\Controllers;

use App\Models\PendaftaranModel;

class PendaftaranController extends BaseController
{
    protected $pendaftaranModel;
    protected $session;

    public function __construct()
    {
        $this->pendaftaranModel = new PendaftaranModel();
        $this->session = session();
    }

    public function tambahcalon()
    {
        $id_pengusul = session()->get('id_pengusul');

        if (!$id_pengusul) {
            return redirect()->to('/login');
        }

        return view('pengusul/tambahcalon', ['id_pengusul' => $id_pengusul]);
    }

    public function inputKategori()
    {
        $Model = new PendaftaranModel();
        $id_pengusul = $this->request->getPost('id_pengusul');
        $kategori = $this->request->getPost('kategori');

        $totalKategori = $Model->where('kategori', $kategori)->countAllResults();

        switch ($kategori) {
            case 'Perintis Lingkungan':
                $prefix = 'A';
                break;
            case 'Pengabdi Lingkungan':
                $prefix = 'B';
                break;
            case 'Penyelamat Lingkungan':
                $prefix = 'C';
                break;
            case 'Pembina Lingkungan':
                $prefix = 'D';
                break;
            default:
                $prefix = 'X';
        }

        $kode_registrasi = $prefix . str_pad($totalKategori + 1, 2, '0', STR_PAD_LEFT);

        $data = [
            'id_pengusul' => $id_pengusul,
            'kategori' => $kategori,
            'tanggal_pendaftaran' => date('Y-m-d H:i:s'),
            'kode_registrasi' => $kode_registrasi
        ];

        if ($Model->insert($data)) {
            $id_pendaftaran = $Model->insertID();

            session()->set('id_pendaftaran', $id_pendaftaran);
            session()->set('kategori', $kategori);

            return redirect()->to('pengusul/tambahcalonidentitas')->with('success', 'Kategori berhasil disimpan.');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
        }
    }

    public function simpanData()
    {
        // Ambil data dari POST
        $formType = $this->request->getPost('form_type'); // Menentukan form mana yang sedang dikirim

        switch ($formType) {
            case 'identitas':
                $data = $this->request->getPost();
                session()->set('identitas', $data);
                break;

            case 'kegiatan':
                $data = $this->request->getPost();
                session()->set('kegiatan', $data);
                break;

            case 'dampak':
                $data = $this->request->getPost();
                session()->set('dampak', $data);
                break;

            case 'pmik':
                $data = $this->request->getPost();
                session()->set('pmik', $data);
                break;

            case 'keswadayaan':
                $data = $this->request->getPost();
                session()->set('keswadayaan', $data);
                break;

            case 'keistimewaan':
                $data = $this->request->getPost();
                session()->set('keistimewaan', $data);

                // Simpan semua data ke database
                $this->simpanSemuaData();

                // Redirect ke halaman sukses
                return redirect()->to('pendaftaran/success');
                break;

            default:
                return redirect()->back()->with('error', 'Form tidak dikenal.');
        }

        // Redirect ke form berikutnya
        return redirect()->to($this->getNextForm($formType));
    }

    private function getNextForm($currentForm)
    {
        switch ($currentForm) {
            case 'identitas':
                return 'pendaftaran/tambahKegiatan';
            case 'kegiatan':
                return 'pendaftaran/tambahDampak';
            case 'dampak':
                return 'pendaftaran/tambahPMIK';
            case 'pmik':
                return 'pendaftaran/tambahKeswadayaan';
            case 'keswadayaan':
                return 'pendaftaran/tambahKeistimewaan';
            default:
                return 'pendaftaran/tambahKeistimewaan'; // Atau form pertama
        }
    }

    private function simpanSemuaData()
    {
        // Mengambil semua data dari session
        $identitas = session()->get('identitas');
        $kegiatan = session()->get('kegiatan');
        $dampak = session()->get('dampak');
        $pmik = session()->get('pmik');
        $keswadayaan = session()->get('keswadayaan');
        $keistimewaan = session()->get('keistimewaan');

        // Debugging untuk memastikan data tidak null
        log_message('debug', 'Identitas data: ' . print_r($identitas, true));
        log_message('debug', 'Kegiatan data: ' . print_r($kegiatan, true));
        log_message('debug', 'Dampak data: ' . print_r($dampak, true));
        log_message('debug', 'PMIK data: ' . print_r($pmik, true));
        log_message('debug', 'Keswadayaan data: ' . print_r($keswadayaan, true));
        log_message('debug', 'Keistimewaan data: ' . print_r($keistimewaan, true));

        // Simpan data ke database hanya jika tidak null
        if (!empty($identitas)) {
            $this->pendaftaranModel->insertIdentitas($identitas);
        } else {
            return redirect()->back()->with('error', 'Data identitas tidak ada.');
        }

        if (!empty($kegiatan)) {
            $this->pendaftaranModel->insertKegiatan($kegiatan);
        } else {
            return redirect()->back()->with('error', 'Data kegiatan tidak ada.');
        }

        if (!empty($dampak)) {
            $this->pendaftaranModel->insertDampak($dampak);
        } else {
            return redirect()->back()->with('error', 'Data dampak tidak ada.');
        }

        if (!empty($pmik)) {
            $this->pendaftaranModel->insertPMIK($pmik);
        } else {
            return redirect()->back()->with('error', 'Data PMIK tidak ada.');
        }

        if (!empty($keswadayaan)) {
            $this->pendaftaranModel->insertKeswadayaan($keswadayaan);
        } else {
            return redirect()->back()->with('error', 'Data keswadayaan tidak ada.');
        }

        if (!empty($keistimewaan)) {
            $this->pendaftaranModel->insertKeistimewaan($keistimewaan);
        } else {
            return redirect()->back()->with('error', 'Data keistimewaan tidak ada.');
        }

        // Hapus session setelah menyimpan
        session()->remove(['identitas', 'kegiatan', 'dampak', 'pmik', 'keswadayaan', 'keistimewaan']);
    }

    public function success()
    {
        return view('pengusul/usulansaya'); // Buat view success.php untuk menunjukkan pesan sukses
    }
}
