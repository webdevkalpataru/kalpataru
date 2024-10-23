<?php

namespace App\Controllers;

use App\Models\PendaftaranModel;

class TimteknisController extends BaseController
{
    public function datacalonusulan()
    {
        $pendaftaranModel = new PendaftaranModel();

        // Ambil data dengan pagination, limit 5 per halaman
        $perPage = 5;

        // Ambil kategori dari filter
        $kategori = $this->request->getVar('kategori');

        // Ambil kata kunci dari request untuk pencarian
        $keyword = $this->request->getGet('search');

        $role = session()->get('role');

        // Jika role adalah pengusul, filter data berdasarkan id_pengusul
        if ($role === 'pengusul') {
            $id_pengusul = session()->get('id_pengusul');
            $pendaftaranModel->where('id_pengusul', $id_pengusul);
        }

        // Tambahkan filter untuk status pendaftaran
        $validStatuses = ['Verifikasi Administrasi', 'Lolos Administrasi', 'Tidak Lolos Administrasi'];
        $pendaftaranModel->whereIn('status_pendaftaran', $validStatuses);

        // Jika kategori dipilih, tambahkan filter kategori
        if ($kategori) {
            $pendaftaranModel->where('kategori', $kategori);
        }

        // Jika ada kata kunci, tambahkan kondisi pencarian berdasarkan nama
        if ($keyword) {
            $pendaftaranModel->like('nama', $keyword);
        }

        // Dapatkan data dengan pagination
        $usulan = $pendaftaranModel->paginate($perPage, 'usulan');

        // Siapkan data untuk view
        $data = [
            'usulan' => $usulan,
            'pager' => $pendaftaranModel->pager,
            'kategori' => $kategori,
            'keyword' => $keyword,
            'title' => "Data Calon Usulan"
        ];

        return view('timteknis/datacalonusulan', $data);
    }

    public function detaildatacalonusulan($id)
    {
        $model = new PendaftaranModel();
        $pendaftaran = $model->getDetailById($id);

        // Validasi jika data ditemukan atau tidak
        if (!$pendaftaran) {
            return redirect()->to('timteknis/datacalonusulan')->with('error', 'Data tidak ditemukan.');
        }

        // Cek status pendaftaran, jika "Draft" redirect dengan pesan error
        if ($pendaftaran['status_pendaftaran'] === 'Draft') {
            return redirect()->to('timteknis/datacalonusulan')->with('error', 'Data ini masih berstatus Draft dan tidak dapat diakses.');
        }

        // Ambil data dari semua tabel terkait menggunakan join
        $data = [
            'title' => 'Detail Usulan',
            'pendaftaran' => $pendaftaran,
        ];

        return view('timteknis/detaildatacalonusulan', $data);
    }

    public function verifadminkategoria()
    {
        $pendaftaranModel = new PendaftaranModel();

        // Ambil data dengan pagination, limit 5 per halaman
        $perPage = 5;

        // Ambil status dari filter
        $status_pendaftaran = $this->request->getVar('status_pendaftaran');

        // Jika status dipilih, tambahkan filter status
        if ($status_pendaftaran) {
            $pendaftaranModel->where('status_pendaftaran', $status_pendaftaran);
        }

        // Tentukan kategori secara otomatis ke 'Perintis Lingkungan'
        $kategori = 'Perintis Lingkungan';

        // Ambil kata kunci dari request untuk pencarian
        $keyword = $this->request->getGet('search');

        // Filter data berdasarkan kategori 'Perintis Lingkungan'
        $pendaftaranModel->where('kategori', $kategori);

        // Tambahkan filter untuk status pendaftaran
        $validStatuses = ['Verifikasi Administrasi', 'Lolos Administrasi', 'Tidak Lolos Administrasi'];
        $pendaftaranModel->whereIn('status_pendaftaran', $validStatuses);

        // Jika ada kata kunci, tambahkan kondisi pencarian berdasarkan nama
        if ($keyword) {
            $pendaftaranModel->like('nama', $keyword);
        }

        // Dapatkan data dengan pagination
        $data['usulan'] = $pendaftaranModel->paginate($perPage, 'usulan');
        $data['pager'] = $pendaftaranModel->pager;
        $data['kategori'] = $kategori;
        $data['status_pendaftaran'] = $status_pendaftaran;
        $data['keyword'] = $keyword;
        $data['title'] = "Verifikasi Administrasi Kategori Perintis Lingkungan";

        return view('timteknis/verifadminkategoria', $data);
    }

    public function verifadminkategorib()
    {
        $pendaftaranModel = new PendaftaranModel();

        // Ambil data dengan pagination, limit 5 per halaman
        $perPage = 5;

        // Ambil status dari filter
        $status_pendaftaran = $this->request->getVar('status_pendaftaran');

        // Jika status dipilih, tambahkan filter status
        if ($status_pendaftaran) {
            $pendaftaranModel->where('status_pendaftaran', $status_pendaftaran);
        }

        // Tentukan kategori secara otomatis ke 'Pengabdi Lingkungan'
        $kategori = 'Pengabdi Lingkungan';

        // Ambil kata kunci dari request untuk pencarian
        $keyword = $this->request->getGet('search');

        // Filter data berdasarkan kategori 'Pengabdi Lingkungan'
        $pendaftaranModel->where('kategori', $kategori);

        // Tambahkan filter untuk status pendaftaran
        $validStatuses = ['Verifikasi Administrasi', 'Lolos Administrasi', 'Tidak Lolos Administrasi'];
        $pendaftaranModel->whereIn('status_pendaftaran', $validStatuses);

        // Jika ada kata kunci, tambahkan kondisi pencarian berdasarkan nama
        if ($keyword) {
            $pendaftaranModel->like('nama', $keyword);
        }

        // Dapatkan data dengan pagination
        $data['usulan'] = $pendaftaranModel->paginate($perPage, 'usulan');
        $data['pager'] = $pendaftaranModel->pager;
        $data['kategori'] = $kategori;
        $data['status_pendaftaran'] = $status_pendaftaran;
        $data['keyword'] = $keyword;
        $data['title'] = "Verifikasi Administrasi Pengabdi Lingkungan";

        return view('timteknis/verifadminkategorib', $data);
    }

    public function verifadminkategoric()
    {
        $pendaftaranModel = new PendaftaranModel();

        // Ambil data dengan pagination, limit 5 per halaman
        $perPage = 5;

        // Ambil status dari filter
        $status_pendaftaran = $this->request->getVar('status_pendaftaran');

        // Jika status dipilih, tambahkan filter status
        if ($status_pendaftaran) {
            $pendaftaranModel->where('status_pendaftaran', $status_pendaftaran);
        }

        // Tentukan kategori secara otomatis ke 'Penyelamat Lingkungan'
        $kategori = 'Penyelamat Lingkungan';

        // Ambil kata kunci dari request untuk pencarian
        $keyword = $this->request->getGet('search');

        // Filter data berdasarkan kategori 'Penyelamat Lingkungan'
        $pendaftaranModel->where('kategori', $kategori);

        // Tambahkan filter untuk status pendaftaran
        $validStatuses = ['Verifikasi Administrasi', 'Lolos Administrasi', 'Tidak Lolos Administrasi'];
        $pendaftaranModel->whereIn('status_pendaftaran', $validStatuses);

        // Jika ada kata kunci, tambahkan kondisi pencarian berdasarkan nama
        if ($keyword) {
            $pendaftaranModel->like('nama', $keyword);
        }

        // Dapatkan data dengan pagination
        $data['usulan'] = $pendaftaranModel->paginate($perPage, 'usulan');
        $data['pager'] = $pendaftaranModel->pager;
        $data['kategori'] = $kategori;
        $data['status_pendaftaran'] = $status_pendaftaran;
        $data['keyword'] = $keyword;
        $data['title'] = "Verifikasi Administrasi Kategori Penyelamat Lingkungan";

        return view('timteknis/verifadminkategoric', $data);
    }

    public function verifadminkategorid()
    {
        $pendaftaranModel = new PendaftaranModel();

        // Ambil data dengan pagination, limit 5 per halaman
        $perPage = 5;

        // Ambil status dari filter
        $status_pendaftaran = $this->request->getVar('status_pendaftaran');

        // Jika status dipilih, tambahkan filter status
        if ($status_pendaftaran) {
            $pendaftaranModel->where('status_pendaftaran', $status_pendaftaran);
        }

        // Tentukan kategori secara otomatis ke 'Pembina Lingkungan'
        $kategori = 'Pembina Lingkungan';

        // Ambil kata kunci dari request untuk pencarian
        $keyword = $this->request->getGet('search');

        // Filter data berdasarkan kategori 'Pembina Lingkungan'
        $pendaftaranModel->where('kategori', $kategori);

        // Tambahkan filter untuk status pendaftaran
        $validStatuses = ['Verifikasi Administrasi', 'Lolos Administrasi', 'Tidak Lolos Administrasi'];
        $pendaftaranModel->whereIn('status_pendaftaran', $validStatuses);

        // Jika ada kata kunci, tambahkan kondisi pencarian berdasarkan nama
        if ($keyword) {
            $pendaftaranModel->like('nama', $keyword);
        }

        // Dapatkan data dengan pagination
        $data['usulan'] = $pendaftaranModel->paginate($perPage, 'usulan');
        $data['pager'] = $pendaftaranModel->pager;
        $data['kategori'] = $kategori;
        $data['status_pendaftaran'] = $status_pendaftaran;
        $data['keyword'] = $keyword;
        $data['title'] = "Verifikasi Administrasi Kategori Pembina Lingkungan";

        return view('timteknis/verifadminkategorid', $data);
    }

    public function updateStatus()
    {
        // Inisialisasi model
        $pendaftaranModel = new PendaftaranModel();

        // Ambil data dari POST request
        $id_pendaftaran = $this->request->getPost('id_pendaftaran');
        $status_pendaftaran = $this->request->getPost('status_pendaftaran');
        $catatan_verifikasi = $this->request->getPost('catatan_verifikasi'); // Ambil catatan verifikasi

        // Validasi data
        if ($id_pendaftaran && $status_pendaftaran) {
            // Siapkan data untuk update
            $updateData = [
                'status_pendaftaran' => $status_pendaftaran,
            ];

            // Jika ada catatan, tambahkan ke data yang akan di-update
            if ($status_pendaftaran == 'Tidak Lolos Administrasi' && $catatan_verifikasi) {
                $updateData['catatan_verifikasi'] = $catatan_verifikasi;
            }

            // Update status dan catatan di database
            $pendaftaranModel->update($id_pendaftaran, $updateData);

            // Mengembalikan respons untuk merefresh halaman
            return $this->response->setJSON(['success' => true, 'message' => 'Data berhasil diperbarui']);
        } else {
            // Mengembalikan respons gagal
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal memperbarui data']);
        }
    }

    public function bahansidang1kategoria()
    {
        $pendaftaranModel = new PendaftaranModel();

        // Ambil data dengan pagination, limit 5 per halaman
        $perPage = 5;

        // Tentukan kategori secara otomatis ke 'Perintis Lingkungan'
        $kategori = 'Perintis Lingkungan';

        // Ambil kata kunci dari request untuk pencarian
        $keyword = $this->request->getGet('search');

        // Filter data berdasarkan kategori 'Perintis Lingkungan'
        $pendaftaranModel->where('kategori', $kategori);

        // Ambil status dari filter
        $status_pendaftaran = $this->request->getVar('status_pendaftaran');

        // Jika status dipilih, tambahkan filter status
        if ($status_pendaftaran) {
            $pendaftaranModel->where('status_pendaftaran', $status_pendaftaran);
        }


        // Tambahkan filter untuk status pendaftaran
        $validStatuses = ['Lolos Administrasi'];
        $pendaftaranModel->whereIn('status_pendaftaran', $validStatuses);

        // Jika ada kata kunci, tambahkan kondisi pencarian berdasarkan nama
        if ($keyword) {
            $pendaftaranModel->like('nama', $keyword);
        }

        // Dapatkan data dengan pagination
        $data['kategori'] = $kategori;
        $data['status_pendaftaran'] = $status_pendaftaran;
        $data['keyword'] = $keyword;
        $data['usulan'] = $pendaftaranModel->paginate($perPage, 'usulan');
        $data['pager'] = $pendaftaranModel->pager;
        $data['kategori'] = $kategori;

        // Set the page title
        $data['title'] = "Bahan Sidang 1 Kategori A";

        // Pass the $data array to the view
        return view('timteknis/bahansidang1/kategoria', $data);
    }


    public function bahansidang1kategorib()
    {
        $pendaftaranModel = new PendaftaranModel();

        // Ambil data dengan pagination, limit 5 per halaman
        $perPage = 5;

        // Tentukan kategori secara otomatis ke 'Pengabdi Lingkungan'
        $kategori = 'Pengabdi Lingkungan';

        // Ambil kata kunci dari request untuk pencarian
        $keyword = $this->request->getGet('search');

        // Filter data berdasarkan kategori 'Pengabdi Lingkungan'
        $pendaftaranModel->where('kategori', $kategori);

        // Ambil status dari filter
        $status_pendaftaran = $this->request->getVar('status_pendaftaran');

        // Jika status dipilih, tambahkan filter status
        if ($status_pendaftaran) {
            $pendaftaranModel->where('status_pendaftaran', $status_pendaftaran);
        }


        // Tambahkan filter untuk status pendaftaran
        $validStatuses = ['Lolos Administrasi'];
        $pendaftaranModel->whereIn('status_pendaftaran', $validStatuses);

        // Jika ada kata kunci, tambahkan kondisi pencarian berdasarkan nama
        if ($keyword) {
            $pendaftaranModel->like('nama', $keyword);
        }

        // Dapatkan data dengan pagination
        $data['kategori'] = $kategori;
        $data['status_pendaftaran'] = $status_pendaftaran;
        $data['keyword'] = $keyword;
        $data['usulan'] = $pendaftaranModel->paginate($perPage, 'usulan');
        $data['pager'] = $pendaftaranModel->pager;
        $data['kategori'] = $kategori;

        // Set the page title
        $data['title'] = "Bahan Sidang 1 Kategori B";

        // Pass the $data array to the view
        return view('timteknis/bahansidang1/kategorib', $data);
    }

    public function bahansidang1kategoric()
    {
        $pendaftaranModel = new PendaftaranModel();

        // Ambil data dengan pagination, limit 5 per halaman
        $perPage = 5;

        // Tentukan kategori secara otomatis ke 'Penyelamat Lingkungan'
        $kategori = 'Penyelamat Lingkungan';

        // Ambil kata kunci dari request untuk pencarian
        $keyword = $this->request->getGet('search');

        // Filter data berdasarkan kategori 'Penyelamat Lingkungan'
        $pendaftaranModel->where('kategori', $kategori);

        // Ambil status dari filter
        $status_pendaftaran = $this->request->getVar('status_pendaftaran');

        // Jika status dipilih, tambahkan filter status
        if ($status_pendaftaran) {
            $pendaftaranModel->where('status_pendaftaran', $status_pendaftaran);
        }


        // Tambahkan filter untuk status pendaftaran
        $validStatuses = ['Lolos Administrasi'];
        $pendaftaranModel->whereIn('status_pendaftaran', $validStatuses);

        // Jika ada kata kunci, tambahkan kondisi pencarian berdasarkan nama
        if ($keyword) {
            $pendaftaranModel->like('nama', $keyword);
        }

        // Dapatkan data dengan pagination
        $data['kategori'] = $kategori;
        $data['status_pendaftaran'] = $status_pendaftaran;
        $data['keyword'] = $keyword;
        $data['usulan'] = $pendaftaranModel->paginate($perPage, 'usulan');
        $data['pager'] = $pendaftaranModel->pager;
        $data['kategori'] = $kategori;

        // Set the page title
        $data['title'] = "Bahan Sidang 1 Kategori C";

        // Pass the $data array to the view
        return view('timteknis/bahansidang1/kategoric', $data);
    }

    public function bahansidang1kategorid()
    {
        $pendaftaranModel = new PendaftaranModel();

        // Ambil data dengan pagination, limit 5 per halaman
        $perPage = 5;

        // Tentukan kategori secara otomatis ke 'Pembina Lingkungan'
        $kategori = 'Pembina Lingkungan';

        // Ambil kata kunci dari request untuk pencarian
        $keyword = $this->request->getGet('search');

        // Filter data berdasarkan kategori 'Pembina Lingkungan'
        $pendaftaranModel->where('kategori', $kategori);

        // Ambil status dari filter
        $status_pendaftaran = $this->request->getVar('status_pendaftaran');

        // Jika status dipilih, tambahkan filter status
        if ($status_pendaftaran) {
            $pendaftaranModel->where('status_pendaftaran', $status_pendaftaran);
        }


        // Tambahkan filter untuk status pendaftaran
        $validStatuses = ['Lolos Administrasi'];
        $pendaftaranModel->whereIn('status_pendaftaran', $validStatuses);

        // Jika ada kata kunci, tambahkan kondisi pencarian berdasarkan nama
        if ($keyword) {
            $pendaftaranModel->like('nama', $keyword);
        }

        // Dapatkan data dengan pagination
        $data['kategori'] = $kategori;
        $data['status_pendaftaran'] = $status_pendaftaran;
        $data['keyword'] = $keyword;
        $data['usulan'] = $pendaftaranModel->paginate($perPage, 'usulan');
        $data['pager'] = $pendaftaranModel->pager;
        $data['kategori'] = $kategori;

        // Set the page title
        $data['title'] = "Bahan Sidang 1 Kategori D";

        // Pass the $data array to the view
        return view('timteknis/bahansidang1/kategorid', $data);
    }

    public function bahansidang2kategoria()
    {
        $data['title'] = 'Bahan Sidang 2 Kategori A';
        return view('timteknis/bahansidang2/kategoria', $data);
    }

    public function bahansidang2kategorib()
    {
        $data['title'] = 'Bahan Sidang 2 Kategori B';
        return view('timteknis/bahansidang2/kategorib', $data);
    }

    public function bahansidang2kategoric()
    {
        $data['title'] = 'Bahan Sidang 2 Kategori C';
        return view('timteknis/bahansidang2/kategoric', $data);
    }

    public function bahansidang2kategorid()
    {
        $data['title'] = 'Bahan Sidang 2 Kategori D';
        return view('timteknis/bahansidang2/kategorid', $data);
    }
}
