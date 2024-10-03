<?php

namespace App\Controllers;

use App\Models\InformasiModel;

helper('text');

class InformasiController extends BaseController
{
    public function pengumuman(): string
    {
        $InformasiModel = new InformasiModel();
        $pengumumanData = $InformasiModel->TampilPengumuman();

        $data['pengumuman'] = $pengumumanData['data_pengumuman'];
        $data['total_pengumuman'] = $pengumumanData['total_pengumuman'];

        return view('pengumuman', $data, ['title' => 'Pengumuman']);
    }

    public function peraturankebijakan()
    {
        $InformasiModel = new InformasiModel();
        $peraturankebijakanData = $InformasiModel->TampilPeraturanKebijakan();

        $data['peraturankebijakan'] = $peraturankebijakanData['data_peraturankebijakan'];
        $data['total_peraturankebijakan'] = $peraturankebijakanData['total_peraturankebijakan'];

        return view('peraturankebijakan', $data, ['title' => 'Peraturan dan Kebijakan']);
    }

    public function datastatistik()
    {
        return view('datastatistik', ['title' => 'Data dan Statistik']);
    }
}
