<?php

namespace App\Controllers;

class MainController extends BaseController
{
    public function index()
    {
        $data['title'] = "Penghargaan Kalpataru";
        return view('landingpage', ['title' => 'Beranda']);
    }

    public function profil()
    {
        $data['title'] = "Profil";
        return view('profil', ['title' => 'Profil']);
    }
    public function kategori()
    {
        $data['title'] = "Kategori";
        return view('Kategori', ['title' => 'Kategori']);
    }
    public function kategoria()
    {
        $data['title'] = "Kategori Perintis Lingkungan";
        return view('Kategoria', $data);
    }

    public function kategorib()
    {
        $data['title'] = "Kategori Pengabdi Lingkungan";
        return view('Kategorib', $data);
    }

    public function kategoric()
    {
        $data['title'] = "Kategori Penyelamat Lingkungan";
        return view('Kategoric', $data);
    }

    public function kategorid()
    {
        $data['title'] = "Kategori Pembina Lingkungan";
        return view('Kategorid', $data);
    }

    public function kontak()
    {
        $data['title'] = "Kontak";
        return view('kontak', ['title' => 'Kontak']);
    }
}
