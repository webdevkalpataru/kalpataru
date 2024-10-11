<?php

namespace App\Controllers;

use App\Models\PengusulModel;
use Dompdf\Dompdf;
use Dompdf\Options;
// use CodeIgniter\Controller;

class PengusulController extends BaseController
{
    public function index(): string
    {
        $pengusulModel = new PengusulModel();
        $data['pengusul'] = $pengusulModel->where('id_pengusul', session()->get('id_pengusul'))->first();
        if (!session()->get('logged_in')) {
            // Simpan pesan ke session flash atau redirect dengan query
            return redirect()->to('/auth/login')->with('authMessage', 'Harap login terlebih dahulu');
        }

        $provinsi_list = [
            'Aceh',
            'Bali',
            'Bangka Belitung',
            'Banten',
            'Bengkulu',
            'DI Yogyakarta',
            'DKI Jakarta',
            'Gorontalo',
            'Jambi',
            'Jawa Barat',
            'Jawa Tengah',
            'Jawa Timur',
            'Kalimantan Barat',
            'Kalimantan Selatan',
            'Kalimantan Tengah',
            'Kalimantan Timur',
            'Kalimantan Utara',
            'Kepulauan Bangka Belitung',
            'Kepulauan Riau',
            'Lampung',
            'Maluku',
            'Maluku Utara',
            'Nusa Tenggara Barat',
            'Nusa Tenggara Timur',
            'Papua',
            'Papua Barat',
            'Papua Barat Daya',
            'Papua Pegunungan',
            'Papua Selatan',
            'Papua Tengah',
            'Riau',
            'Sulawesi Barat',
            'Sulawesi Selatan',
            'Sulawesi Tengah',
            'Sulawesi Tenggara',
            'Sulawesi Utara',
            'Sumatera Barat',
            'Sumatera Selatan',
            'Sumatera Utara'
        ];

        $data['title'] = 'Profil Pengusul';
        $data['provinsi_list'] = $provinsi_list;
        return view('pengusul/profil', $data);
    }

    public function updateProfil()
    {
        $pengusulModel = new PengusulModel();

        // Ambil ID pengguna yang login dari session
        $id_pengusul = session()->get('id_pengusul');

        // Ambil data surat pengantar yang sudah ada
        $currentSuratPengantar = session()->get('surat_pengantar');

        $file = $this->request->getFile('surat_pengantar');
        $filePath = $currentSuratPengantar; // Default ke nilai lama

        if ($file && $file->isValid() && !$file->hasMoved()) {
            if ($file->getClientMimeType() == 'application/pdf') {
                $filePath = $file->store('suratpengantar', $file->getRandomName());
            } else {
                return $this->response->setJSON(['success' => false, 'errors' => 'Invalid file type. Only PDF files are allowed']);
            }
        }

        // Ambil data yang diinputkan dari form
        $data = [
            'jenis_instansi' => $this->request->getPost('jenis_instansi'),
            'nama_instansi_pribadi' => $this->request->getPost('nama'),
            'provinsi' => $this->request->getPost('provinsi'),
            'telepon' => $this->request->getPost('telepon'),
            'email' => $this->request->getPost('email'),
            'jabatan_pekerjaan' => $this->request->getPost('jabatan_pekerjaan'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'jalan' => $this->request->getPost('jalan'),
            'rt_rw' => $this->request->getPost('rt_rw'),
            'desa' => $this->request->getPost('desa'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'kab_kota' => $this->request->getPost('kab_kota'),
            'kode_pos' => $this->request->getPost('kode_pos'),
            'surat_pengantar' => $filePath
        ];

        // Update data di database
        if ($pengusulModel->update($id_pengusul, $data)) {
            session()->set($data);

            return $this->response->setJSON(['success' => true, 'message' => 'Profil berhasil diperbarui.']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal memperbarui profil.']);
        }
    }



    public function halamanLainnya()
    {
        $pengusulModel = new PengusulModel();
        $pengusul = $pengusulModel->where('id_pengusul', session()->get('id_pengusul'))->first();

        // Cek apakah semua field sudah diisi
        if (empty($pengusul['nama_instansi_pribadi']) || empty($pengusul['telepon']) || empty($pengusul['email'])) {
            return redirect()->to(base_url('pengusul/profil'))->with('error', 'Silakan lengkapi profil Anda terlebih dahulu.');
        }

        // Jika profil sudah lengkap, lanjutkan ke halaman lainnya
        return view('pengusul/halaman_lainnya');
    }

    public function tambahcalon()
    {
        $data['title'] = 'Tambah Calon Usulan';
        return view('pengusul/tambahcalon', $data);
    }

    public function tambahcalonidentitas()
{
    if ($this->request->getMethod() === 'post') {
        $identitas = $this->request->getPost('identitas');
        session()->set('identitas', $identitas);
        return redirect()->to('/pengusul/tambahcalonkegiatan');
    }

    $data['title'] = 'Tambah Calon Usulan';
    return view('pengusul/tambahcalonidentitas', $data);
}

    public function tambahcalonkegiatan()
    {
        $data['title'] = 'Tambah Calon Usulan';
        return view('pengusul/tambahcalonkegiatan', $data);
    }
    
    public function tambahcalonpmik()
    {
        $data['title'] = 'Tambah Calon Usulan';
        return view('pengusul/tambahcalonpmik', $data);
    }
    public function tambahcalondampak()
    {
        $data['title'] = 'Tambah Calon Usulan';
        return view('pengusul/tambahcalondampak', $data);
    }
    public function tambahcalonkeswadayaan()
    {
        $data['title'] = 'Tambah Calon Usulan';
        return view('pengusul/tambahcalonkeswadayaan', $data);
    }
    public function tambahcalonkeistimewaan()
    {
        $data['title'] = 'Tambah Calon Usulan';
        return view('pengusul/tambahcalonkeistimewaan', $data);
    }

    public function usulansaya()
    {
        $data['title'] = 'Usulan Saya';
        return view('pengusul/usulansaya', ['title' => 'Usulan Saya']);
    }
    public function usulandlhk()
    {
        $data['title'] = 'Usulan DLHK';
        return view('pengusul/usulandlhk', ['title' => 'Usulan DLHK']);
    }

    public function detailusulansaya()
    {
        $data['title'] = 'Detail Usulan Saya';
        return view('pengusul/detailusulansaya', ['title' => 'Detail Usulan Saya']);
    }
    public function detailusulandlhk()
    {
        $data['title'] = 'Detail Usulan DLHK';
        return view('pengusul/detailusulandlhk', ['title' => 'Detail Usulan DLHK']);
    }
    public function tambahartikel()
    {
        $data['title'] = 'Tambah Artikel';
        return view('pengusul/tambahartikel', ['title' => 'Tambah Artikel']);
    }
    public function artikelsaya()
    {
        $data['title'] = 'Artikel Saya';
        return view('pengusul/artikelsaya', ['title' => 'Artikel Saya']);
    }
    public function detailartikelsaya()
    {
        $data['title'] = 'Detail Artikel Saya';
        return view('pengusul/detailartikelsaya', ['title' => 'Detail Artikel Saya']);
    }

    public function pemberitahuan()
    {
        $data['title'] = 'Pemberitahuan';
        return view('pengusul/pemberitahuan', ['title' => 'Pemberitahuan']);
    }
    public function alurpendaftaran()
    {
        $data['title'] = 'Alur Pendaftaran';
        return view('pengusul/alurpendaftaran', ['title' => 'Alur Pendaftaran']);
    }
    public function videopanduan()
    {
        $data['title'] = 'Video Panduan';
        return view('pengusul/videopanduan', ['title' => 'Video Panduan']);
    }
    public function panduanpendaftaran()
    {
        $data['title'] = 'Panduan Pendaftaran';
        return view('pengusul/panduanpendaftaran', ['title' => 'Panduan Pendaftaran']);
    }
    public function generatePDF()
    {
        // Ambil data dari session atau database
        $data = [
            'title' => 'Laporan Calon Usulan',
            'identitas' => session()->get('identitas'),
            'kegiatan' => session()->get('kegiatan'),
            'pmik' => session()->get('pmik'),
            'dampak' => session()->get('dampak'),
            'keswadayaan' => session()->get('keswadayaan'),
            'keistimewaan' => session()->get('keistimewaan')
        ];

        // Load view untuk PDF
        $html = view('pengusul/pdf', $data);

        // Konfigurasi DomPDF
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Output PDF
        $dompdf->stream('laporan_calon_usulan.pdf', ['Attachment' => false]);
    }
}
