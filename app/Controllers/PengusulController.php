<?php

namespace App\Controllers;

use App\Models\PengusulModel;
use CodeIgniter\Controller;

class PengusulController extends BaseController
{
    public function index(): string
    {
        $pengusulModel = new PengusulModel();
        $data['pengusul'] = $pengusulModel->where('id_pengusul', session()->get('id_pengusul'))->first();

        return view('pengusul/profil', $data);
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
}
