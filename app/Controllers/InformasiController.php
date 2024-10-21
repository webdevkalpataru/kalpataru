<?php

namespace App\Controllers;

use App\Models\InformasiModel;
use App\Models\PengumumanModel;
use App\Models\PeraturanModel;

helper('text');

class InformasiController extends BaseController
{
    // public function pengumuman(): string
    // {
    //     $InformasiModel = new InformasiModel();
    //     $pengumumanData = $InformasiModel->TampilPengumuman();

    //     $data['pengumuman'] = $pengumumanData['data_pengumuman'];
    //     $data['total_pengumuman'] = $pengumumanData['total_pengumuman'];

    //     $data['title'] = 'Pengumuman';
    //     return view('pengumuman', $data, ['title' => 'Pengumuman']);
    // }

    public function pengumuman()
    {
        $model = new PengumumanModel();
        $keyword = $this->request->getGet('search');

        if ($keyword) {
            $data['pengumuman'] = $model->searchPengumumanTerbit($keyword);
            $data['countTerbit'] = count($data['pengumuman']);
        } else {
            $data['pengumuman'] = $model->getPengumumanTerbit();
            $data['countTerbit'] = $model->countPengumumanTerbit();
        }

        $data['title'] = "Pengumuman";
        return view('pengumuman', $data);
    }

    public function detailpengumuman($slug)
    {
        $model = new PengumumanModel();
        $pengumuman = $model->getDetailPengumumanBySlug($slug);


        if (!$pengumuman) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Pengumuman tidak ditemukan');
        }

        // Jika artikel masih ditangguhkan
        if ($pengumuman['status'] !== 'Terbit') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Pengumuman tidak ditemukan');
        }

        $data = [
            'title' => $pengumuman['judul'],
            'pengumuman' => $pengumuman,
        ];
        return view('detailpengumuman', $data);
    }

    public function peraturan()
    {
        $model = new PeraturanModel();
        
        // Ambil data dengan pagination, limit 5 per halaman
        $perPage = 5;

        // Ambil keyword dari input search
        $keyword = $this->request->getGet('search');

        if ($keyword) {
            // Jika ada pencarian, ambil peraturan yang sesuai dengan judul, tentang, atau jenis dan statusnya "Terbit" dengan pagination
            $data['peraturans'] = $model->where('status', 'Terbit')
                ->groupStart() // Mulai grup kondisi pencarian
                    ->like('judul', $keyword) // Cari berdasarkan judul
                    ->orLike('tentang', $keyword) // Cari berdasarkan tentang
                    ->orLike('jenis', $keyword) // Cari berdasarkan jenis
                ->groupEnd() // Akhiri grup kondisi pencarian
                ->paginate($perPage, 'peraturans'); // Paginate hasil pencarian
        
            $countTerbit = $model->where('status', 'Terbit')
                ->groupStart() // Grup pencarian yang sama untuk menghitung jumlah hasil
                    ->like('judul', $keyword) 
                    ->orLike('tentang', $keyword)
                    ->orLike('jenis', $keyword)
                ->groupEnd()
                ->countAllResults(); // Hitung jumlah peraturan hasil pencarian
        
            $data['pager'] = $model->pager; // Tidak ada pagination jika ada pencarian
        } else {
            // Jika tidak ada pencarian, ambil peraturan yang statusnya "Terbit" dengan pagination
            $data['peraturans'] = $model->where('status', 'Terbit')
                ->paginate($perPage, 'peraturans');
            $countTerbit = $model->where('status', 'Terbit')->countAllResults(); // Hanya hitung peraturan yang berstatus "Terbit"
            $data['pager'] = $model->pager; // Hanya tetapkan pager jika menggunakan paginate
        }        

        // Siapkan data untuk dikirim ke view
        $data['keyword'] = $keyword;
        $data['countTerbit'] = $countTerbit;

        $data['title'] = "Peraturan dan Kebijakan";
        return view('peraturankebijakan', $data);
    }

    public function peraturankebijakan()
    {
        $InformasiModel = new InformasiModel();
        $peraturankebijakanData = $InformasiModel->TampilPeraturanKebijakan();

        $data['peraturankebijakan'] = $peraturankebijakanData['data_peraturankebijakan'];
        $data['total_peraturankebijakan'] = $peraturankebijakanData['total_peraturankebijakan'];

        $data['title'] = 'Peraturan dan Kebijakan';
        return view('peraturankebijakan', $data, ['title' => 'Peraturan dan Kebijakan']);
    }

    public function datastatistik()
    {
        $data['title'] = 'Data dan Statistik';
        return view('datastatistik', ['title' => 'Data dan Statistik']);
    }
}
