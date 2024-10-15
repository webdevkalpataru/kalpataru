<?php

namespace App\Controllers;

use App\Models\PendaftaranModel;

class TimteknisController extends BaseController
{
    public function datacalonusulan()
    {
        $pendaftaranModel = new PendaftaranModel();

        // Ambil data dengan pagination, limit 5 per halaman
        $perPage = 5;
        // Ambil halaman saat ini dari request, default ke halaman 1 jika tidak ada
        $currentPage = $this->request->getVar('page_usulan') ? $this->request->getVar('page_usulan') : 1;

        // Ambil kategori dari filter
        $kategori = $this->request->getVar('kategori');

        if ($kategori) {
            // Filter data berdasarkan kategori
            $pendaftaranModel->where('kategori', $kategori);
        }

        // Dapatkan data dengan pagination
        $data['usulan'] = $pendaftaranModel->paginate($perPage, 'usulan');
        $data['pager'] = $pendaftaranModel->pager;
        $data['kategori'] = $kategori;
        $data['title'] = "Data Calon Usulan";

        return view('timteknis/datacalonusulan', $data);
    }

    public function detaildatacalonusulan()
    {

        $data['title'] = "Detail Data Calon Usulan";
        return view('timteknis/detaildatacalonusulan', ['title' => 'Detail Data Calon Usulan']);
    }

    public function verifadminkategoria()
    {
        $pendaftaranModel = new PendaftaranModel();

        // Ambil data dengan pagination, limit 5 per halaman
        $perPage = 5;
        // Ambil halaman saat ini dari request, default ke halaman 1 jika tidak ada
        $currentPage = $this->request->getVar('page_usulan') ? $this->request->getVar('page_usulan') : 1;

        // Tentukan kategori secara otomatis ke 'Perintis Lingkungan'
        $kategori = 'Perintis Lingkungan';

        // Filter data berdasarkan kategori 'Perintis Lingkungan'
        $pendaftaranModel->where('kategori', $kategori);

        // Dapatkan data dengan pagination
        $data['usulan'] = $pendaftaranModel->paginate($perPage, 'usulan');
        $data['pager'] = $pendaftaranModel->pager;
        $data['kategori'] = $kategori;
        $data['title'] = "Verifikasi Administrasi Kategori Perintis Lingkungan";

        return view('timteknis/verifadminkategoria', $data);
    }

    public function verifadminkategorib()
    {
        $pendaftaranModel = new PendaftaranModel();

        // Ambil data dengan pagination, limit 5 per halaman
        $perPage = 5;
        // Ambil halaman saat ini dari request, default ke halaman 1 jika tidak ada
        $currentPage = $this->request->getVar('page_usulan') ? $this->request->getVar('page_usulan') : 1;

        // Tentukan kategori secara otomatis ke 'Pengabdi Lingkungan'
        $kategori = 'Pengabdi Lingkungan';

        // Filter data berdasarkan kategori 'Pengabdi Lingkungan'
        $pendaftaranModel->where('kategori', $kategori);

        // Dapatkan data dengan pagination
        $data['usulan'] = $pendaftaranModel->paginate($perPage, 'usulan');
        $data['pager'] = $pendaftaranModel->pager;
        $data['kategori'] = $kategori;
        $data['title'] = "Verifikasi Administrasi Pengabdi Lingkungan";
        return view('timteknis/verifadminkategorib', $data);
    }

    public function verifadminkategoric()
    {
        $pendaftaranModel = new PendaftaranModel();

        // Ambil data dengan pagination, limit 5 per halaman
        $perPage = 5;
        // Ambil halaman saat ini dari request, default ke halaman 1 jika tidak ada
        $currentPage = $this->request->getVar('page_usulan') ? $this->request->getVar('page_usulan') : 1;

        // Tentukan kategori secara otomatis ke 'Penyelamat Lingkungan'
        $kategori = 'Penyelamat Lingkungan';

        // Filter data berdasarkan kategori 'Penyelamat Lingkungan'
        $pendaftaranModel->where('kategori', $kategori);

        // Dapatkan data dengan pagination
        $data['usulan'] = $pendaftaranModel->paginate($perPage, 'usulan');
        $data['pager'] = $pendaftaranModel->pager;
        $data['kategori'] = $kategori;
        $data['title'] = "Verifikasi Administrasi Kategori Penyelamat Lingkungan";
        return view('timteknis/verifadminkategoric', $data);
    }

    public function verifadminkategorid()
    {
        $pendaftaranModel = new PendaftaranModel();

        // Ambil data dengan pagination, limit 5 per halaman
        $perPage = 5;
        // Ambil halaman saat ini dari request, default ke halaman 1 jika tidak ada
        $currentPage = $this->request->getVar('page_usulan') ? $this->request->getVar('page_usulan') : 1;

        // Tentukan kategori secara otomatis ke 'Pembina Lingkungan'
        $kategori = 'Pembina Lingkungan';

        // Filter data berdasarkan kategori 'Pembina Lingkungan'
        $pendaftaranModel->where('kategori', $kategori);

        // Dapatkan data dengan pagination
        $data['usulan'] = $pendaftaranModel->paginate($perPage, 'usulan');
        $data['pager'] = $pendaftaranModel->pager;
        $data['kategori'] = $kategori;
        $data['title'] = "Verifikasi Administrasi Kategori Pembina Lingkungan";
        return view('timteknis/verifadminkategorid', $data);
    }

    public function updateStatus()
    {
        // Inisialisasi model
        $pendaftaranModel = new PendaftaranModel();

        // Ambil data dari POST request
        $id_pendaftaran = $this->request->getPost('id_pendaftaran');
        $status_pendaftaran = $this->request->getPost('status_pendaftaran');

        // Validasi data (opsional, misalnya cek apakah ID dan status valid)
        if ($id_pendaftaran && $status_pendaftaran) {
            // Update status di database
            $pendaftaranModel->update($id_pendaftaran, ['status_pendaftaran' => $status_pendaftaran]);

            // Mengembalikan respons untuk merefresh halaman
            return $this->response->setJSON(['success' => true, 'message' => 'Data berhasil diperbarui']);
        } else {
            // Mengembalikan respons untuk merefresh halaman
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal memperbarui data']);
        }
    }

    public function bahansidang1()
    {
        $data['title'] = "Bahan Sidang 1";
        return view('timteknis/bahansidang1', ['title' => 'Bahan Sidang 1']);
    }

    public function bahansidang2()
    {
        $data['title'] = "Bahan Sidang 2";
        return view('timteknis/bahansidang2', ['title' => 'Bahan Sidang 2']);
    }
}
