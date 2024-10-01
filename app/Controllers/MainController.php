<?php

namespace App\Controllers;

class MainController extends BaseController
{
    public function index()
    {
        return view('landingpage', ['title' => 'Beranda']);
    }

    public function profil()
    {
        return view('profil', ['title' => 'Profil']);
    }

    public function kontak()
    {
        return view('kontak', ['title' => 'Kontak']);
    }

}
