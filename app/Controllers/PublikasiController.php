<?php

namespace App\Controllers;

use App\Models\PublikasiModel;
use App\Models\ArtikelModel;
use App\Models\BeritaModel;

helper('text');

class PublikasiController extends BaseController
{
    public function berita()
    {
        $model = new BeritaModel();
        $keyword = $this->request->getGet('search');

        if ($keyword) {
            $data['berita'] = $model->searchBeritaTerbit($keyword);
            $data['countTerbit'] = count($data['berita']);
        } else {
            $data['berita'] = $model->getBeritaTerbit();
            $data['countTerbit'] = $model->countBeritaTerbit();
        }

        $data['title'] = "Berita";
        return view('berita', $data);
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

    public function detailartikel($slug)
    {
        $model = new ArtikelModel();
        $artikel = $model->getDetailArtikelBySlug($slug);


        if (!$artikel) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Artikel tidak ditemukan');
        }

        // Jika artikel masih ditangguhkan
        if ($artikel['status'] !== 'Terbit') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Artikel tidak ditemukan');
        }

        $data = [
            'title' => $artikel['judul'],
            'artikel' => $artikel,
        ];
        return view('detailartikel', $data);
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
