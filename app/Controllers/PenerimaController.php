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
    public function artikelpenerima()
    {
        return view('penerima/artikelpenerima', ['title' => 'Artikel Saya']);
    }
    public function lihatrincian()
    {
        return view('penerima/lihatrincian', ['title' => 'Lihat Rincian']);
    }
}