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

    public function verifikasiadministrasi()
    {
        $data['title'] = "Verifikasi Administrasi";
        return view('timteknis/verifikasiadministrasi', ['title' => 'Verifikasi Administrasi']);
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
