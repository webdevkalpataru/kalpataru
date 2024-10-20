<?php

namespace App\Controllers;

use App\Models\InformasiModel;
use App\Models\PengumumanModel;

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
