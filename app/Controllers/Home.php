<?php

namespace App\Controllers;

use App\Models\PublikasiModel;

helper('text');

class Home extends BaseController
{
    public function index(): string
    {
        $publikasiModel = new PublikasiModel();


        $data['videos'] = $publikasiModel->TampilVideo();
        $data['berita'] = $publikasiModel->TampilBerita();
        $data['title'] = "Penghargaan Kalpataru";

        return view('landingpage', $data);
    }
}
