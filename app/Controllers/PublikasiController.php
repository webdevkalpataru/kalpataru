<?php

namespace App\Controllers;

use App\Models\PublikasiModel;
use App\Models\ArtikelModel;
use App\Models\BeritaModel;
use App\Models\VideoModel;

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

    public function detailberita($slug)
    {
        $model = new BeritaModel();
        $berita = $model->getDetailBeritaBySlug($slug);


        if (!$berita) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Berita tidak ditemukan');
        }

        if ($berita['status'] !== 'Terbit') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Berita tidak ditemukan');
        }

        $data = [
            'title' => $berita['judul'],
            'berita' => $berita,
        ];
        return view('detailberita', $data);
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
        $model = new VideoModel();
        $video = $model->where('status', 'terbit')->findAll();

        $data['video'] = $video;
        $data['countTerbit'] = count($data['video']);
        $data['title'] = "Video Admin";

        return view('video', $data);
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
