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

    public function kontak()
    {
        $data['title'] = "Kontak";
        return view('kontak', ['title' => 'Kontak']);
    }
}
