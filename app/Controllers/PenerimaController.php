<?php

namespace App\Controllers;

use App\Models\PenerimaModel;
use CodeIgniter\Controller;

class PenerimaController extends BaseController
{
    public function profilpenerima()
    {
        return view('penerima/profilpenerima', ['title' => 'Profil Penerima']);
    }
    public function tambahartikelpenerima()
    {
        return view('penerima/tambahartikelpenerima', ['title' => 'Tambah Artikel Penerima']);
    }


}