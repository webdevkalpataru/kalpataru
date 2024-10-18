<?php

namespace App\Controllers;

use App\Models\PublikasiModel;
use App\Models\BeritaModel;


helper('text');

class Home extends BaseController
{
    public function index(): string
    {
        $publikasiModel = new PublikasiModel();
        $BeritaModel = new BeritaModel();

        // Mendapatkan berita dengan status "terbit"
        $berita = $BeritaModel->where('status', 'Terbit')->findAll();

        $data['videos'] = $publikasiModel->TampilVideo();
        $data['berita'] = $berita;
        $data['peta'] = $publikasiModel->tampilPetaPenerima();
        $data['title'] = "Penghargaan Kalpataru";

        return view('landingpage', $data);
    }
}
