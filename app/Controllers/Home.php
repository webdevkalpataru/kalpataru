<?php

namespace App\Controllers;

use App\Models\PublikasiModel;

helper('text');

class Home extends BaseController
{
    public function index(): string
    {
        $publikasiModel = new PublikasiModel();

        // Ambil data video
        $data['videos'] = $publikasiModel->findAll();

        // Ambil data berita
        $data['berita'] = $publikasiModel->getBerita();

        return view('landingpage', $data);
    }
}
