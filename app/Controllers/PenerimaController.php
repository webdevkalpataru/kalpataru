<?php

namespace App\Controllers;

use App\Models\PenerimaModel;
use CodeIgniter\Controller;

class PenerimaController extends BaseController
{
    public function profil()
    {
        $data['title'] = 'Profil Penerima';
        return view('penerima/profil', ['title' => 'Profil']);
    }
    public function tambahartikel()
    {
        $data['title'] = 'Tambah Artikel';
        return view('penerima/tambahartikel', ['title' => 'Tambah Artikel']);
    }
    public function artikelsaya()
    {
        $data['title'] = 'Artikel Saya';
        return view('penerima/artikelsaya', ['title' => 'Artikel Saya']);
    }
    public function detailartikelsaya()
    {
        $data['title'] = 'Detail Artikel Saya';
        return view('penerima/detailartikelsaya', ['title' => 'Detail Artikel Saya']);
    }
}