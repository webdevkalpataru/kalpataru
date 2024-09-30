<?php

namespace App\Controllers;

class InformasiController extends BaseController
{
    public function pengumuman()
    {
        return view('pengumuman', ['title' => 'Pengumuman']);
    }

    public function peraturankebijakan()
    {
        return view('peraturankebijakan', ['title' => 'Peraturan dan Kebijakan']);
    }

    public function datastatistik()
    {
        return view('datastatistik', ['title' => 'Data dan Statistik']);
    }
}
