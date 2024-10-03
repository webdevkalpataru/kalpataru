<?php

namespace App\Controllers;

use App\Models\PublikasiModel;

helper('text');

class PublikasiController extends BaseController
{
    public function berita()
    {
        $PublikasiModel = new PublikasiModel();
        $BeritaData = $PublikasiModel->TampilBerita();

        $data['berita'] = $BeritaData['data_berita'];
        $data['total_berita'] = $BeritaData['total_berita'];

        return view('berita', $data, ['title' => 'Berita']);
    }

    public function artikel()
    {
        $PublikasiModel = new PublikasiModel();
        $ArtikelData = $PublikasiModel->TampilArtikel();

        $data['artikel'] = $ArtikelData['data_artikel'];
        $data['total_artikel'] = $ArtikelData['total_artikel'];

        return view('Artikel', $data, ['title' => 'Artikel']);
    }

    public function video()
    {
        $PublikasiModel = new PublikasiModel();
        $VideoData = $PublikasiModel->TampilVideo();

        $data['video'] = $VideoData['data_video'];
        $data['total_video'] = $VideoData['total_video'];

        return view('video', $data, ['title' => 'Video']);
    }

    public function buku()
    {
        $PublikasiModel = new PublikasiModel();
        $BukuData = $PublikasiModel->TampilBuku();

        $data['buku'] = $BukuData['data_buku'];
        $data['total_buku'] = $BukuData['total_buku'];

        return view('buku', $data, ['title' => 'Buku']);
    }
}
