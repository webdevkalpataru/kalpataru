<?php

namespace App\Controllers;

use App\Models\PenerimaModel;
use CodeIgniter\Controller;

class PenerimaController extends BaseController
{
    public function dashboard()
    {
        $data['title'] = 'Dashboard Penerima';
        return view('penerima/dashboard', ['title' => 'Dashboard']);
    }
    public function tambahartikel()
    {
        $data['title'] = 'Tambah Artikel';
        return view('penerima/tambahartikel', ['title' => 'Tambah Artikel']);
    }
    public function detailartikelsaya()
    {
        $data['title'] = 'Detail Artikel Saya';
        return view('penerima/detailartikelsaya', ['title' => 'Detail Artikel Saya']);
    }
}