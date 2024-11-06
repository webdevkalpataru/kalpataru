<?php

namespace App\Controllers;

use App\Models\ArsipModel;
use App\Models\InformasiModel;
use App\Models\PengumumanModel;
use App\Models\PeraturanModel;

helper('text');

class InformasiController extends BaseController
{
    // public function pengumuman(): string
    // {
    //     $InformasiModel = new InformasiModel();
    //     $pengumumanData = $InformasiModel->TampilPengumuman();

    //     $data['pengumuman'] = $pengumumanData['data_pengumuman'];
    //     $data['total_pengumuman'] = $pengumumanData['total_pengumuman'];

    //     $data['title'] = 'Pengumuman';
    //     return view('pengumuman', $data, ['title' => 'Pengumuman']);
    // }

    public function pengumuman()
    {
        $model = new PengumumanModel();

        // Set jumlah item per halaman
        $perPage = 5;

        // Ambil keyword dari query string (input search)
        $keyword = $this->request->getGet('search');

        // Jika ada pencarian, filter berdasarkan judul dan status "Terbit"
        if ($keyword) {
            $pengumumansQuery = $model->where('status', 'Terbit')
                ->like('judul', $keyword);

            // Dapatkan hasil pencarian dengan pagination
            $data['pengumumans'] = $pengumumansQuery
                ->orderBy('tanggal', 'DESC')
                ->paginate($perPage, 'pengumumans');

            // Reset query sebelum menghitung total hasil pencarian
            $countTerbit = $pengumumansQuery
                ->resetQuery()
                ->where('status', 'Terbit')
                ->like('judul', $keyword)
                ->countAllResults();

            $data['pager'] = $model->pager;
        } else {
            // Jika tidak ada pencarian, ambil semua pengumuman yang statusnya "Terbit" dengan pagination
            $data['pengumumans'] = $model->where('status', 'Terbit')
                ->orderBy('tanggal', 'DESC')
                ->paginate($perPage, 'pengumumans');

            // Hitung total pengumuman yang statusnya "Terbit"
            $countTerbit = $model->where('status', 'Terbit')
                ->countAllResults();

            $data['pager'] = $model->pager;
        }

        // Siapkan data untuk dikirim ke view
        $data['keyword'] = $keyword;
        $data['countTerbit'] = $countTerbit;
        $data['title'] = 'Pengumuman';

        // Render view pengumuman
        return view('pengumuman', $data);
    }

    public function detailpengumuman($slug)
    {
        $model = new PengumumanModel();
        $pengumuman = $model->getDetailPengumumanBySlug($slug);


        if (!$pengumuman) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Pengumuman tidak ditemukan');
        }

        // Jika artikel masih ditangguhkan
        if ($pengumuman['status'] !== 'Terbit') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Pengumuman tidak ditemukan');
        }

        $data = [
            'title' => $pengumuman['judul'],
            'pengumuman' => $pengumuman,
        ];
        return view('detailpengumuman', $data);
    }

    public function peraturan()
    {
        $model = new PeraturanModel();

        // Ambil data dengan pagination, limit 5 per halaman
        $perPage = 5;

        // Ambil keyword dari input search
        $keyword = $this->request->getGet('search');

        if ($keyword) {
            // Jika ada pencarian, ambil peraturan yang sesuai dengan judul, tentang, atau jenis dan statusnya "Terbit" dengan pagination
            $data['peraturans'] = $model->where('status', 'Terbit')
                ->groupStart() // Mulai grup kondisi pencarian
                ->like('judul', $keyword) // Cari berdasarkan judul
                ->orLike('tentang', $keyword) // Cari berdasarkan tentang
                ->orLike('jenis', $keyword) // Cari berdasarkan jenis
                ->groupEnd() // Akhiri grup kondisi pencarian
                ->paginate($perPage, 'peraturans'); // Paginate hasil pencarian

            $countTerbit = $model->where('status', 'Terbit')
                ->groupStart() // Grup pencarian yang sama untuk menghitung jumlah hasil
                ->like('judul', $keyword)
                ->orLike('tentang', $keyword)
                ->orLike('jenis', $keyword)
                ->groupEnd()
                ->countAllResults(); // Hitung jumlah peraturan hasil pencarian

            $data['pager'] = $model->pager; // Tidak ada pagination jika ada pencarian
        } else {
            // Jika tidak ada pencarian, ambil peraturan yang statusnya "Terbit" dengan pagination
            $data['peraturans'] = $model->where('status', 'Terbit')
                ->paginate($perPage, 'peraturans');
            $countTerbit = $model->where('status', 'Terbit')->countAllResults(); // Hanya hitung peraturan yang berstatus "Terbit"
            $data['pager'] = $model->pager; // Hanya tetapkan pager jika menggunakan paginate
        }

        // Siapkan data untuk dikirim ke view
        $data['keyword'] = $keyword;
        $data['countTerbit'] = $countTerbit;

        $data['title'] = "Peraturan dan Kebijakan";
        return view('peraturankebijakan', $data);
    }

    public function peraturankebijakan()
    {
        $InformasiModel = new InformasiModel();
        $peraturankebijakanData = $InformasiModel->TampilPeraturanKebijakan();

        $data['peraturankebijakan'] = $peraturankebijakanData['data_peraturankebijakan'];
        $data['total_peraturankebijakan'] = $peraturankebijakanData['total_peraturankebijakan'];

        $data['title'] = 'Peraturan dan Kebijakan';
        return view('peraturankebijakan', $data, ['title' => 'Peraturan dan Kebijakan']);
    }

    public function dataStatistik()
    {
        $model = new ArsipModel();
        $totalPerempuan = $model->genderPerempuan();
        $totalLakiLaki = $model->genderLakiLaki();
        $total = $totalPerempuan + $totalLakiLaki;

        // Hitung persentase
        $persentaseLakiLaki = ($total > 0) ? ($totalLakiLaki / $total) * 100 : 0;

        $data['provinsiData'] = $model->dataProvinsi();
        $data['kategoriData'] = $model->dataKategori();
        $data['total'] = $total;
        $data['totalPerempuan'] = $totalPerempuan;
        $data['totalLakiLaki'] = $totalLakiLaki;
        $data['persentaseLakiLaki'] = $persentaseLakiLaki;
        $data['title'] = 'Data dan Statistik';

        return view('datastatistik', $data);
    }


    public function dataUsulanProvinsi()
    {
        $data['title'] = 'Data Usulan Provinsi';

        return view('datausulanprovinsi', $data);
    }
    public function profilpenerima()
    {
        $data['title'] = 'Profil Penerima';
        return view('profilpenerima');
    }
}
