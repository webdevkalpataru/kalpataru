<?php

namespace App\Controllers;

use App\Models\PublikasiModel;
use App\Models\ArtikelModel;


helper('text');

class PublikasiController extends BaseController
{
    public function berita()
    {
        $PublikasiModel = new PublikasiModel();
        $BeritaData = $PublikasiModel->TampilBerita();

        $data['berita'] = $BeritaData['data_berita'];
        $data['total_berita'] = $BeritaData['total_berita'];

        $data['title'] = "Berita";
        return view('berita', $data, ['title' => 'Berita']);
    }

    public function artikel()
    {
        $model = new ArtikelModel();
        $keyword = $this->request->getGet('search');

        if ($keyword) {
            $data['artikels'] = $model->searchArtikelTerbit($keyword);
            $data['countTerbit'] = count($data['artikels']);
        } else {
            $data['artikels'] = $model->getArtikelTerbit();
            $data['countTerbit'] = $model->countArtikelTerbit();
        }

        $data['title'] = "Daftar Artikel Terbit";


        return view('artikel', $data);
    }

    public function video()
    {
        $PublikasiModel = new PublikasiModel();
        $VideoData = $PublikasiModel->TampilVideo();

        $data['video'] = $VideoData['data_video'];
        $data['total_video'] = $VideoData['total_video'];

        $data['title'] = "Video";
        return view('video', $data, ['title' => 'Video']);
    }

    public function buku()
    {
        $PublikasiModel = new PublikasiModel();
        $BukuData = $PublikasiModel->TampilBuku();

        $data['buku'] = $BukuData['data_buku'];
        $data['total_buku'] = $BukuData['total_buku'];

        $data['title'] = "Buku";
        return view('buku', $data, ['title' => 'Buku']);
    }
}
