<?php

namespace App\Controllers;

use App\Models\PublikasiModel;
use App\Models\BeritaModel;
use App\Models\VideoModel;

helper('text');

class Home extends BaseController
{
    public function index(): string
    {
        $publikasiModel = new PublikasiModel();
        $BeritaModel = new BeritaModel();
        $VideoModel = new VideoModel();

        // Mendapatkan berita dengan status "terbit"
        $berita = $BeritaModel->where('status', 'Terbit')->findAll();
        $video = $VideoModel->where('status', 'Terbit')->findAll();

        $data['video'] = $video;
        $data['berita'] = $berita;
        $data['peta'] = $publikasiModel->tampilPetaPenerima();
        $data['title'] = "Kalpataru – Penghargaan Lingkungan Hidup Indonesia";

        return view('landingpage', $data);
    }
}
