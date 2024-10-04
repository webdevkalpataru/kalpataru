<?php

namespace App\Controllers;

use App\Models\PublikasiModel;

helper('text');

class Home extends BaseController
{
    public function index(): string
    {
        $publikasiModel = new PublikasiModel();

        $data = [
            'videos' => $publikasiModel->findAll(),
            'berita' => $publikasiModel->getBerita(),
        ];

        return view('landingpage', $data);
    }
}
