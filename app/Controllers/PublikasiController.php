<?php

namespace App\Controllers;

class PublikasiController extends BaseController
{
    public function berita()
    {
        return view('berita', ['title' => 'Berita']);
    }

    public function artikel()
    {
        return view('artikel', ['title' => 'Artikel']);
    }

    public function video()
    {
        return view('video', ['title' => 'Video']);
    }

    public function buku()
    {
        return view('buku', ['title' => 'Buku']);
    }
}
