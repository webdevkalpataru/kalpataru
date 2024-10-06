<?php

namespace App\Controllers;

use App\Models\PengusulModel;
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

        $data['title'] = 'Profil Pengusul';
        return view('pengusul/profil', $data);
    }

    public function updateProfile()
    {
        $pengusulModel = new PengusulModel();

        // Ambil ID pengguna yang login dari session
        $id_pengusul = session()->get('id_pengusul');

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
            'kode_pos' => $this->request->getPost('kode_pos')
        ];

        // Update data di database
        if ($pengusulModel->update($id_pengusul, $data)) {
            // Jika berhasil, perbarui session dengan data terbaru
            session()->set($data);

            return $this->response->setJSON(['success' => true, 'message' => 'Profil berhasil diperbarui.']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal memperbarui profil.']);
        }
    }


    public function updateProfil()
    {
        $pengusulModel = new PengusulModel();

        // Mengambil input dari form
        $data = [
            'jenis_instansi' => $this->request->getPost('jenis_instansi'),
            'nama_instansi_pribadi' => $this->request->getPost('nama_instansi_pribadi'),
            'telepon' => $this->request->getPost('telepon'),
            'email' => $this->request->getPost('email'),
            'jabatan_pekerjaan' => $this->request->getPost('jabatan_pekerjaan'),
            // Lanjutkan untuk field lainnya...
        ];

        // Update data profil pengusul
        $pengusulModel->update(session()->get('id_pengusul'), $data);

        // Setelah update, arahkan ke halaman lain atau tampilkan pesan sukses
        return redirect()->to(base_url('pengusul/profil'))->with('success', 'Profil berhasil diperbarui');
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
        return view('pengusul/usulansaya', ['title' => 'Usulan Saya']);
    }

    public function detailusulansaya()
    {
        return view('pengusul/detailusulansaya', ['title' => 'Detail Usulan Saya']);
    }
}
