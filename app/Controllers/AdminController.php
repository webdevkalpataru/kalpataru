<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\BeritaModel;
use App\Models\BukuModel;
use App\Models\DppkModel;
use App\Models\PenerimaModel;
use App\Models\PengumumanModel;
use App\Models\PengusulModel;
use App\Models\PeraturanModel;
use App\Models\TimteknisModel;
use App\Models\VideoModel;


class AdminController extends BaseController
{
    public function dashboard()
    {
        $data['title'] = "Dashboard Admin";
        return view('admin/dashboard', ['title' => 'Dashboard Admin']);
    }

    public function artikeladmin()
    {
        $model = new ArtikelModel();
        $perPage = 5;

        // Ambil parameter search dan status dari query string
        $keyword = $this->request->getGet('search');
        $status = $this->request->getGet('status');

        // Query dasar untuk menampilkan artikel
        $query = $model->select('*');

        // Filter berdasarkan status jika ada
        if ($status) {
            $query->where('status', $status);
        }

        // Pencarian berdasarkan keyword pada judul
        if ($keyword) {
            $query->like('judul', $keyword);
        }

        // Dapatkan data artikel dengan pagination
        $artikels = $query->orderBy('tanggal', 'DESC')
            ->paginate($perPage, 'artikels');

        // Data yang akan dikirimkan ke view
        $data = [
            'artikels' => $artikels,
            'title' => "Artikel Admin",
            'pager' => $model->pager,
            'keyword' => $keyword,
            'status' => $status,
        ];

        return view('admin/artikeladmin', $data);
    }




    public function tambahartikeladmin()
    {
        $data['title'] = "Tambah Artikel Admin";
        return view('admin/tambahartikeladmin', $data);
    }

    public function tambahArtikelAction()
    {
        $model = new ArtikelModel();

        // Ambil input dari formulir
        $judul = $this->request->getPost('judul');
        $slug = url_title($judul, '-', TRUE);
        $konten = $this->request->getPost('konten');

        // Memproses foto yang diupload
        $foto = $this->request->getFile('foto');

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => [
                'label' => 'Judul',
                'rules' => 'required|min_length[5]|max_length[125]|is_unique[artikel.judul]' // Judul harus unik dan panjang antara 5 dan 125 karakter
            ],
            'konten' => [
                'label' => 'Konten',
                'rules' => 'required|min_length[20]' // Konten harus ada dan panjang minimum 20 karakter
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'uploaded[foto]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,1024]'
            ]
        ]);


        if (!$this->validate($validation->getRules())) {
            return $this->response->setJSON([
                'success' => false,
                'messages' => $validation->getErrors(),
            ]);
        }

        // Menghasilkan slug yang unik
        $slugExist = $model->where('slug', $slug)->first(); // Cek apakah slug sudah ada
        if ($slugExist) {
            return $this->response->setJSON([
                'success' => false,
                'messages' => [
                    'judul' => 'Tautan dengan judul ini sudah tersedia. Silakan gunakan judul yang berbeda.'
                ]
            ]);
        }

        // Menangani upload file foto
        $fotoPath = '';
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Memastikan tipe file dan membuat nama file acak
            $fotoName = $foto->getRandomName();

            // Memindahkan file ke folder public/images/artikel
            if ($foto->move('public/images/artikel', $fotoName)) {
                // Jika berhasil, simpan path foto ke database
                $fotoPath = 'images/artikel/' . $fotoName;
            } else {
                return $this->response->setJSON(['success' => false, 'errors' => 'Gagal menyimpan file foto.']);
            }
        } else {
            return $this->response->setJSON(['success' => false, 'errors' => 'File tidak valid atau belum diupload.']);
        }

        // Menghasilkan slug yang unik
        $slugExist = $model->where('slug', $slug)->first(); // Cek apakah slug sudah ada
        if ($slugExist) {
            return $this->response->setJSON([
                'success' => false,
                'messages' => [
                    'judul' => 'Tautan dengan judul ini sudah tersedia. Silakan gunakan judul yang berbeda.'
                ]
            ]);
        }

        // Simpan data artikel ke dalam database
        $dataArtikel = [
            'id_admin' => session()->get('id_admin'),
            'judul' => htmlspecialchars($judul, ENT_QUOTES, 'UTF-8'), // Sanitasi untuk menghindari XSS
            'slug' => $slug,
            'konten' => htmlspecialchars($konten, ENT_QUOTES, 'UTF-8'), // Sanitasi untuk menghindari XSS
            'foto' => $fotoPath,
            'tanggal' => date('Y-m-d'),
        ];

        // Simpan artikel
        if ($model->insert($dataArtikel)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Artikel berhasil ditambahkan.']);
        } else {
            // Tampilkan pesan umum untuk kesalahan penyimpanan
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal menambahkan artikel.']);
        }
    }

    public function updateStatus()
    {
        // Inisialisasi model
        $model = new ArtikelModel();

        // Ambil data dari POST request
        $id_artikel = $this->request->getPost('id_artikel');
        $status = $this->request->getPost('status');

        // Validasi data (opsional, misalnya cek apakah ID dan status valid)
        if ($id_artikel && $status) {
            $tanggal = date('Y-m-d');

            $model->update($id_artikel, [
                'status' => $status,
                'tanggal' => $tanggal // Update tanggal saat status diubah
            ]);
            // Mengembalikan respons untuk merefresh halaman
            return $this->response->setJSON(['success' => true, 'message' => 'Data berhasil diperbarui']);
        } else {
            // Mengembalikan respons untuk merefresh halaman
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal memperbarui data']);
        }
    }

    public function detailartikel($slug)
    {
        $model = new ArtikelModel();
        $artikel = $model->getDetailArtikelBySlug($slug);

        if (!$artikel) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Ambil ID admin yang sedang login
        $id_admin = session()->get('id_admin');

        // Cek apakah yang mengakses adalah admin
        if (!$id_admin) {
            // Jika bukan admin, tampilkan 404
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }


        $data = [
            'title' => $artikel['judul'],
            'artikel' => $artikel,
        ];
        return view('admin/detailartikel', $data);
    }

    public function editArtikel($id_artikel)
    {
        $model = new ArtikelModel();
        $artikel = $model->find($id_artikel); // Mengambil artikel berdasarkan id_artikel

        if (!$artikel) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Ambil ID admin yang sedang login
        $id_admin = session()->get('id_admin');

        // Cek apakah yang mengakses adalah admin
        if (!$id_admin) {
            // Jika bukan admin, tampilkan 404
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => 'Edit Artikel - ' . $artikel['judul'],
            'artikel' => $artikel,
        ];
        return view('admin/editartikel', $data);
    }


    public function updateArtikelAction($id)
    {
        $model = new ArtikelModel();

        // Ambil input dari formulir
        $judul = $this->request->getPost('judul');
        $slug = url_title($judul, '-', TRUE);
        $konten = $this->request->getPost('konten');

        // Memproses foto yang diupload
        $foto = $this->request->getFile('foto');

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => [
                'label' => 'Judul',
                'rules' => 'required|min_length[5]|max_length[125]|is_unique[artikel.judul,id_artikel,' . $id . ']' // Judul harus unik kecuali untuk artikel yang sedang diedit
            ],
            'konten' => [
                'label' => 'Konten',
                'rules' => 'required|min_length[20]' // Konten harus ada dan panjang minimum 20 karakter
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,1024]'
            ]
        ]);

        if (!$this->validate($validation->getRules())) {
            return $this->response->setJSON([
                'success' => false,
                'messages' => $validation->getErrors(),
            ]);
        }

        $slugExists = $model->where('slug', $slug)
            ->where('id_artikel !=', $id) // Abaikan artikel yang sedang diedit
            ->first();

        if ($slugExists) {
            // Jika slug sudah ada pada artikel lain, kirim pesan kesalahan ke view
            return $this->response->setJSON([
                'success' => false,
                'messages' => [
                    'judul' => 'Judul artikel ini sudah digunakan. Silakan gunakan judul yang berbeda.'
                ]
            ]);
        }

        // Menangani upload file foto
        $fotoPath = '';
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Memastikan tipe file dan membuat nama file acak
            $fotoName = $foto->getRandomName();

            // Memindahkan file ke folder public/images/artikel
            if ($foto->move('public/images/artikel', $fotoName)) {
                // Jika berhasil, simpan path foto
                $fotoPath = 'images/artikel/' . $fotoName;
            } else {
                return $this->response->setJSON(['success' => false, 'errors' => 'Gagal menyimpan file foto.']);
            }
        }



        // Siapkan data untuk diupdate
        $dataArtikel = [
            'judul' => htmlspecialchars($judul, ENT_QUOTES, 'UTF-8'), // Sanitasi untuk menghindari XSS
            'slug' => $slug,
            'konten' => htmlspecialchars($konten, ENT_QUOTES, 'UTF-8'), // Sanitasi untuk menghindari XSS
        ];

        // Jika ada foto baru yang diupload, masukkan ke dalam data
        if (!empty($fotoPath)) {
            $dataArtikel['foto'] = $fotoPath;
        }

        // Simpan artikel yang sudah diperbarui
        if ($model->update($id, $dataArtikel)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Artikel berhasil diperbarui.']);
        } else {
            // Tampilkan pesan umum untuk kesalahan penyimpanan
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal memperbarui artikel.']);
        }
    }

    public function hapusArtikel($id_artikel)
    {
        $model = new ArtikelModel();

        // Hapus artikel berdasarkan ID
        if ($model->delete($id_artikel)) {
            // Set flash message atau lakukan redirect setelah menghapus
            session()->setFlashdata('success', 'Artikel berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus artikel.');
        }

        return redirect()->to('/admin/artikel'); // Sesuaikan dengan URL yang diinginkan
    }

    public function akundlhk()
    {
        $model = new PengusulModel();
        $pengusul = $model->where('role_akun', 'DLHK')->findAll();

        $data['pengusul'] = $pengusul;
        $data['countAllPengusul'] = count($data['pengusul']); // Menghitung semua akun pengusul
        $data['title'] = "Akun DLHK";

        return view('admin/akundlhk', $data);
    }

    public function akunpengusul()
    {
        $model = new PengusulModel();

        // Ambil data dengan pagination, limit 5 per halaman
        $perPage = 5;

        // Ambil statusAkun dari filter
        $statusAkun = $this->request->getVar('statusAkun');

        // Ambil kata kunci dari request untuk pencarian
        $keyword = $this->request->getGet('search');

        // Ambil pengusul dengan role_akun 'Pengusul'
        $builder = $model->where('role_akun', 'Pengusul');

        // Jika statusAkun dipilih, tambahkan filter statusAkun
        if ($statusAkun) {
            $builder->where('status_akun', $statusAkun);
        }

        // Jika ada kata kunci, tambahkan kondisi pencarian berdasarkan nama_instansi_pribadi
        if ($keyword) {
            $builder->like('nama_instansi_pribadi', $keyword);
        }

        // Hitung total pengusul yang sesuai dengan filter dan pencarian
        $totalFilteredPengusul = $builder->countAllResults(false); // False untuk tidak reset query builder

        // Dapatkan data dengan pagination setelah semua filter
        $pengusul = $builder->paginate($perPage, 'pengusul');

        // Data untuk view
        $data['pengusul'] = $pengusul;
        $data['countAllPengusul'] = $totalFilteredPengusul; // Total pengusul setelah filter dan pencarian
        $data['title'] = "Akun Pengusul";
        $data['pager'] = $model->pager;
        $data['keyword'] = $keyword;
        $data['statusAkun'] = $statusAkun;

        return view('admin/akunpengusul', $data);
    }

    public function updatePengusul()
    {
        // Inisialisasi model
        $model = new PengusulModel();

        // Ambil data dari POST request
        $id_pengusul = $this->request->getPost('id_pengusul');
        $status_akun = $this->request->getPost('status_akun');
        $id_admin = session()->get('id_admin');

        // Validasi data (opsional, misalnya cek apakah ID dan status valid)
        if ($id_pengusul && $status_akun && $id_admin) {
            // Update status dan id_admin di database
            $model->update($id_pengusul, [
                'status_akun' => $status_akun,
                'id_admin' => $id_admin
            ]);

            // Mengembalikan respons untuk merefresh halaman
            return $this->response->setJSON(['success' => true, 'message' => 'Status Pengusul berhasil diperbarui']);
        } else {
            // Mengembalikan respons untuk merefresh halaman jika ada kesalahan
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal memperbarui status pengusul']);
        }
    }

    public function hapusPengusul($id_pengusul)
    {
        $model = new PengusulModel();

        // Hapus artikel berdasarkan ID
        if ($model->delete($id_pengusul)) {
            // Set flash message atau lakukan redirect setelah menghapus
            session()->setFlashdata('success', 'Pengusul berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus pengusul.');
        }

        return redirect()->to('/admin/pengusul'); // Sesuaikan dengan URL yang diinginkan
    }

    public function detailPengusul($id_pengusul)
    {
        $model = new PengusulModel();
        $pengusul = $model->getDetailById($id_pengusul);

        if (!$pengusul) {
            return redirect()->to('/admin/pengusul')->with('error', 'Data tidak ditemukan.');
        }

        $data = [
            'title' => 'Detail Akun Pengusul',
            'pengusul' => $pengusul,
        ];

        return view('admin/detailpengusul', $data);
    }

    public function downloadSuratPengantar($filename)
    {
        $path = WRITEPATH . 'uploads/suratpengantar/' . $filename;

        if (!file_exists($path)) {
            // File tidak ditemukan, Anda bisa mengarahkan ke halaman error atau menampilkan pesan
            throw new \CodeIgniter\Exceptions\PageNotFoundException('File tidak ditemukan.');
        }

        // Menyajikan file dengan header download
        return $this->response->download($path, null);
    }

    public function akundppk()
    {
        $model = new DppkModel();
        $dppk = $model->findAll(); // Menampilkan semua data dari tabel dppk tanpa filter

        $data['dppk'] = $dppk;
        $data['countAlldppk'] = count($data['dppk']); // Menghitung semua data di tabel dppk
        $data['title'] = "Akun DPPK";

        return view('admin/akundppk', $data);
    }

    public function updateDppk()
    {
        // Inisialisasi model
        $model = new DppkModel();

        // Ambil data dari POST request
        $id_dppk = $this->request->getPost('id_dppk');
        $status_akun = $this->request->getPost('status_akun');

        // Validasi data (opsional, misalnya cek apakah ID dan status valid)
        if ($id_dppk && $status_akun) {
            // Update status di database
            $model->update($id_dppk, ['status_akun' => $status_akun]);
            // Mengembalikan respons untuk merefresh halaman
            return $this->response->setJSON(['success' => true, 'message' => 'Status DPPK berhasil diperbarui']);
        } else {
            // Mengembalikan respons untuk merefresh halaman
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal memperbarui status DPPK']);
        }
    }

    public function hapusDppk($id_dppk)
    {
        $model = new DppkModel();

        if ($model->delete($id_dppk)) {
            // Set flash message atau lakukan redirect setelah menghapus
            session()->setFlashdata('success', 'DPPK berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus DPPK.');
        }

        return redirect()->to('/admin/akundppk'); // Sesuaikan dengan URL yang diinginkan
    }

    public function akuntimteknis()
    {
        $model = new TimteknisModel();
        $timteknis = $model->findAll(); // Menampilkan semua data dari tabel timteknis tanpa filter

        $data['timteknis'] = $timteknis;
        $data['countAlltimteknis'] = count($data['timteknis']); // Menghitung semua data di tabel timteknis
        $data['title'] = "Akun Tim Teknis";

        return view('admin/akuntimteknis', $data);
    }

    public function updateTimTeknis()
    {
        // Inisialisasi model
        $model = new TimteknisModel();

        // Ambil data dari POST request
        $id_tim_teknis = $this->request->getPost('id_tim_teknis');
        $status_akun = $this->request->getPost('status_akun');

        // Validasi data (opsional, misalnya cek apakah ID dan status valid)
        if ($id_tim_teknis && $status_akun) {
            // Update status di database
            $model->update($id_tim_teknis, ['status_akun' => $status_akun]);
            // Mengembalikan respons untuk merefresh halaman
            return $this->response->setJSON(['success' => true, 'message' => 'Status DPPK berhasil diperbarui']);
        } else {
            // Mengembalikan respons untuk merefresh halaman
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal memperbarui status DPPK']);
        }
    }

    public function hapusTimTeknis($id_tim_teknis)
    {
        $model = new TimteknisModel();

        if ($model->delete($id_tim_teknis)) {
            // Set flash message atau lakukan redirect setelah menghapus
            session()->setFlashdata('success', 'Tim Teknis berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus Tim Teknis.');
        }

        return redirect()->to('/admin/akuntimteknis'); // Sesuaikan dengan URL yang diinginkan
    }

    public function akunpenerima()
    {
        $model = new PenerimaModel();
        $penerima = $model->findAll(); // Menampilkan semua data dari tabel penerima tanpa filter

        $data['penerima'] = $penerima;
        $data['countAllpenerima'] = count($data['penerima']); // Menghitung semua data di tabel penerima
        $data['title'] = "Akun Penerima Penghargaan Kalpataru";
        return view('admin/akunpengguna', $data);
    }

    public function updatePenerima()
    {
        // Inisialisasi model
        $model = new PenerimaModel();

        // Ambil data dari POST request
        $id_penerima = $this->request->getPost('id_penerima');
        $status_akun = $this->request->getPost('status_akun');

        // Validasi data (opsional, misalnya cek apakah ID dan status valid)
        if ($id_penerima && $status_akun) {
            // Update status di database
            $model->update($id_penerima, ['status_akun' => $status_akun]);
            // Mengembalikan respons untuk merefresh halaman
            return $this->response->setJSON(['success' => true, 'message' => 'Status berhasil diperbarui']);
        } else {
            // Mengembalikan respons untuk merefresh halaman
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal memperbarui status']);
        }
    }

    public function hapusPenerima($id_penerima)
    {
        $model = new PenerimaModel();

        if ($model->delete($id_penerima)) {
            // Set flash message atau lakukan redirect setelah menghapus
            session()->setFlashdata('success', 'Akun berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus Akun.');
        }

        return redirect()->to('/admin/akunpenerima'); // Sesuaikan dengan URL yang diinginkan
    }

    public function beritaAdmin()
    {
        $model = new BeritaModel();
        $perPage = 5;

        // Ambil parameter search dan status dari query string
        $keyword = $this->request->getGet('search');
        $status = $this->request->getGet('status');

        // Query dasar untuk menampilkan berita
        $query = $model->select('*');

        // Filter berdasarkan status jika ada
        if ($status) {
            $query->where('status', $status);
        }

        // Pencarian berdasarkan keyword pada judul
        if ($keyword) {
            $query->like('judul', $keyword);
        }

        // Dapatkan data berita dengan pagination
        $beritas = $query->orderBy('tanggal', 'DESC')
            ->paginate($perPage, 'beritas');

        // Data yang akan dikirimkan ke view
        $data = [
            'beritas' => $beritas,
            'title' => "Berita Admin",
            'pager' => $model->pager,
            'keyword' => $keyword,
            'status' => $status,
        ];

        return view('admin/berita', $data);
    }

    public function tambahberitaadmin()
    {
        $data['title'] = "Tambah Berita Admin";
        return view('admin/tambahberitaadmin', $data);
    }

    public function tambahBeritaAction()
    {
        $model = new BeritaModel();

        // Ambil input dari formulir
        $judul = $this->request->getPost('judul');
        $slug = url_title($judul, '-', TRUE);
        $konten = $this->request->getPost('konten');

        // Memproses foto yang diupload
        $foto = $this->request->getFile('foto');

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => [
                'label' => 'Judul',
                'rules' => 'required|min_length[5]|max_length[125]|is_unique[berita.judul]' // Judul harus unik dan panjang antara 5 dan 125 karakter
            ],
            'konten' => [
                'label' => 'Konten',
                'rules' => 'required|min_length[20]' // Konten harus ada dan panjang minimum 20 karakter
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'uploaded[foto]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,1024]'
            ]
        ]);


        if (!$this->validate($validation->getRules())) {
            return $this->response->setJSON([
                'success' => false,
                'messages' => $validation->getErrors(),
            ]);
        }

        // Menghasilkan slug yang unik
        $slugExist = $model->where('slug', $slug)->first(); // Cek apakah slug sudah ada
        if ($slugExist) {
            return $this->response->setJSON([
                'success' => false,
                'messages' => [
                    'judul' => 'Tautan dengan judul ini sudah tersedia. Silakan gunakan judul yang berbeda.'
                ]
            ]);
        }

        // Menangani upload file foto
        $fotoPath = '';
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Memastikan tipe file dan membuat nama file acak
            $fotoName = $foto->getRandomName();

            // Memindahkan file ke folder public/images/artikel
            if ($foto->move('public/images/berita', $fotoName)) {
                // Jika berhasil, simpan path foto ke database
                $fotoPath = 'images/berita/' . $fotoName;
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Gagal menyimpan file foto.']);
            }
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'File tidak valid atau belum diupload.']);
        }

        // Simpan data artikel ke dalam database
        $data = [
            'id_admin' => session()->get('id_admin'),
            'judul' => htmlspecialchars($judul, ENT_QUOTES, 'UTF-8'), // Sanitasi untuk menghindari XSS
            'slug' => $slug,
            'konten' => htmlspecialchars($konten, ENT_QUOTES, 'UTF-8'), // Sanitasi untuk menghindari XSS
            'foto' => $fotoPath,
            'tanggal' => date('Y-m-d'),
        ];

        // Simpan artikel
        if ($model->insert($data)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Artikel berhasil ditambahkan.']);
        } else {
            // Tampilkan pesan umum untuk kesalahan penyimpanan
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal menambahkan artikel.']);
        }
    }

    public function detailberita($slug)
    {
        $model = new BeritaModel();
        $berita = $model->getDetailBeritaBySlug($slug);

        if (!$berita) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Ambil ID admin yang sedang login
        $id_admin = session()->get('id_admin');

        // Cek apakah yang mengakses adalah admin
        if (!$id_admin) {
            // Jika bukan admin, tampilkan 404
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }


        $data = [
            'title' => $berita['judul'],
            'berita' => $berita,
        ];
        return view('admin/detailberita', $data);
    }

    public function editBerita($id_berita)
    {
        $model = new BeritaModel();
        $berita = $model->find($id_berita); // Mengambil berita berdasarkan id_berita

        if (!$berita) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Ambil ID admin yang sedang login
        $id_admin = session()->get('id_admin');

        // Cek apakah yang mengakses adalah admin
        if (!$id_admin) {
            // Jika bukan admin, tampilkan 404
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => 'Edit Berita - ' . $berita['judul'],
            'berita' => $berita,
        ];
        return view('admin/editberita', $data);
    }

    public function updateBeritaAction($id)
    {
        $model = new BeritaModel();
        $berita = $model->find($id);

        if (!$berita) {
            return $this->response->setJSON(['success' => false, 'message' => 'berita tidak ditemukan.']);
        }

        // Ambil input dari formulir
        $judul = $this->request->getPost('judul');
        $slug = url_title($judul, '-', TRUE);
        $konten = $this->request->getPost('konten');

        // Memproses foto yang diupload
        $foto = $this->request->getFile('foto');

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => [
                'label' => 'Judul',
                'rules' => 'required|min_length[5]|max_length[125]|is_unique[berita.judul,id_berita,' . $id . ']' // Judul harus unik kecuali untuk berita yang sedang diedit
            ],
            'konten' => [
                'label' => 'Konten',
                'rules' => 'required|min_length[20]' // Konten harus ada dan panjang minimum 20 karakter
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,1024]'
            ]
        ]);

        if (!$this->validate($validation->getRules())) {
            return $this->response->setJSON([
                'success' => false,
                'messages' => $validation->getErrors(),
            ]);
        }

        // Menangani upload file foto
        $fotoPath = '';
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Memastikan tipe file dan membuat nama file acak
            $fotoName = $foto->getRandomName();

            // Memindahkan file ke folder public/images/berita
            if ($foto->move('public/images/berita', $fotoName)) {
                // Jika berhasil, simpan path foto
                $fotoPath = 'images/berita/' . $fotoName;
            } else {
                return $this->response->setJSON(['success' => false, 'errors' => 'Gagal menyimpan file foto.']);
            }
        }

        // Cek apakah slug sudah digunakan oleh berita lain (selain berita ini)
        $slugExists = $model->where('slug', $slug)
            ->where('id_berita !=', $id) // Abaikan berita yang sedang diedit
            ->first();

        if ($slugExists) {
            // Jika slug sudah ada pada berita lain, kirim pesan kesalahan ke view
            return $this->response->setJSON([
                'success' => false,
                'messages' => [
                    'judul' => 'Judul berita ini sudah digunakan. Silakan gunakan judul yang berbeda.'
                ]
            ]);
        }

        // Menangani upload file foto
        $fotoPath = '';
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Memastikan tipe file dan membuat nama file acak
            $fotoName = $foto->getRandomName();

            // Memindahkan file ke folder public/images/artikel
            if ($foto->move('public/images/berita', $fotoName)) {
                // Jika berhasil, simpan path foto
                $fotoPath = 'images/berita/' . $fotoName;
            } else {
                return $this->response->setJSON(['success' => false, 'errors' => 'Gagal menyimpan file foto.']);
            }
        }

        // Siapkan data untuk diupdate
        $data = [
            'judul' => htmlspecialchars($judul, ENT_QUOTES, 'UTF-8'), // Sanitasi untuk menghindari XSS
            'slug' => $slug,
            'konten' => htmlspecialchars($konten, ENT_QUOTES, 'UTF-8'), // Sanitasi untuk menghindari XSS
        ];

        // Jika ada foto baru yang diupload, masukkan ke dalam data
        if (!empty($fotoPath)) {
            $data['foto'] = $fotoPath;
        }

        // Simpan berita yang sudah diperbarui
        if ($model->update($id, $data)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Berita berhasil diperbarui.']);
        } else {
            // Tampilkan pesan umum untuk kesalahan penyimpanan
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal memperbarui berita.']);
        }
    }

    public function updateStatusBerita()
    {
        // Inisialisasi model
        $model = new BeritaModel();

        // Ambil data dari POST request
        $id_berita = $this->request->getPost('id_berita');
        $status = $this->request->getPost('status');

        // Validasi data (opsional, misalnya cek apakah ID dan status valid)
        if ($id_berita && $status) {
            // Dapatkan tanggal dan waktu saat ini
            $tanggal = date('Y-m-d');

            // Update status dan tanggal diubah di database
            $model->update($id_berita, [
                'status' => $status,
                'tanggal' => $tanggal // Update tanggal saat status diubah
            ]);

            // Mengembalikan respons untuk merefresh halaman
            return $this->response->setJSON(['success' => true, 'message' => 'Data berhasil diperbarui']);
        } else {
            // Mengembalikan respons untuk merefresh halaman
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal memperbarui data']);
        }
    }

    public function hapusBerita($id_berita)
    {
        $model = new BeritaModel();

        // Hapus artikel berdasarkan ID
        if ($model->delete($id_berita)) {
            // Set flash message atau lakukan redirect setelah menghapus
            session()->setFlashdata('success', 'Berita berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus berita.');
        }

        return redirect()->to('/admin/berita'); // Sesuaikan dengan URL yang diinginkan
    }

    public function pengumumanadmin()
    {
        $model = new PengumumanModel();
        $perPage = 5;

        // Ambil parameter search dan status dari query string
        $keyword = $this->request->getGet('search');
        $status = $this->request->getGet('status');

        // Query dasar untuk menampilkan pengumuman
        $query = $model->select('*');

        // Filter berdasarkan status jika ada
        if ($status) {
            $query->where('status', $status);
        }

        // Pencarian berdasarkan keyword pada judul
        if ($keyword) {
            $query->like('judul', $keyword);
        }

        // Dapatkan data pengumuman dengan pagination
        $pengumumans = $query->orderBy('tanggal', 'DESC')
            ->paginate($perPage, 'pengumumans');

        // Data yang akan dikirimkan ke view
        $data = [
            'pengumumans' => $pengumumans,
            'title' => "Pengumuman Admin",
            'pager' => $model->pager,
            'keyword' => $keyword,
            'status' => $status,
        ];

        return view('admin/pengumuman', $data);
    }

    public function tambahpengumuman()
    {
        $data['title'] = "Tambah Pengumuman";
        return view('admin/tambahpengumumanadmin', $data);
    }

    public function tambahPengumumanAction()
    {
        $model = new PengumumanModel();

        // Ambil input dari formulir
        $judul = $this->request->getPost('judul');
        $slug = url_title($judul, '-', TRUE);
        $konten = $this->request->getPost('konten');

        // Memproses foto yang diupload
        $foto = $this->request->getFile('foto');

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => [
                'label' => 'Judul',
                'rules' => 'required|min_length[5]|max_length[150]|is_unique[pengumuman.judul]' // Judul harus unik dan panjang antara 5 dan 125 karakter
            ],
            'konten' => [
                'label' => 'Konten',
                'rules' => 'required|min_length[20]' // Konten harus ada dan panjang minimum 20 karakter
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,1024]'
            ]
        ]);


        if (!$this->validate($validation->getRules())) {
            return $this->response->setJSON([
                'success' => false,
                'messages' => $validation->getErrors(),
            ]);
        }

        // Menghasilkan slug yang unik
        $slugExist = $model->where('slug', $slug)->first(); // Cek apakah slug sudah ada
        if ($slugExist) {
            return $this->response->setJSON([
                'success' => false,
                'messages' => [
                    'judul' => 'Tautan dengan judul ini sudah tersedia. Silakan gunakan judul yang berbeda.'
                ]
            ]);
        }

        // Menangani upload file foto
        $fotoPath = '';
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Memastikan tipe file dan membuat nama file acak
            $fotoName = $foto->getRandomName();

            // Memindahkan file ke folder public/images/pengumuman
            if ($foto->move('public/images/pengumuman', $fotoName)) {
                // Jika berhasil, simpan path foto ke database
                $fotoPath = 'images/pengumuman/' . $fotoName;
            } else {
                return $this->response->setJSON(['success' => false, 'messages' => 'Gagal menyimpan file foto.']);
            }
        } else {
            return $this->response->setJSON(['success' => false, 'messages' => 'File tidak valid atau belum diupload.']);
        }

        // Simpan data pengumuman ke dalam database
        $data = [
            'id_admin' => session()->get('id_admin'),
            'judul' => htmlspecialchars($judul, ENT_QUOTES, 'UTF-8'), // Sanitasi untuk menghindari XSS
            'slug' => $slug,
            'konten' => htmlspecialchars($konten, ENT_QUOTES, 'UTF-8'), // Sanitasi untuk menghindari XSS
            'foto' => $fotoPath,
            'tanggal' => date('Y-m-d'),
        ];

        // Simpan pengumuman
        if ($model->insert($data)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Artikel berhasil ditambahkan.']);
        } else {
            // Tampilkan pesan umum untuk kesalahan penyimpanan
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal menambahkan artikel.']);
        }
    }

    public function detailpengumuman($slug)
    {
        $model = new PengumumanModel();
        $pengumuman = $model->getDetailPengumumanBySlug($slug);

        if (!$pengumuman) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Ambil ID admin yang sedang login
        $id_admin = session()->get('id_admin');

        // Cek apakah yang mengakses adalah admin
        if (!$id_admin) {
            // Jika bukan admin, tampilkan 404
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }


        $data = [
            'title' => $pengumuman['judul'],
            'pengumuman' => $pengumuman,
        ];
        return view('admin/detailpengumuman', $data);
    }

    public function editPengumuman($id_pengumuman)
    {
        $model = new PengumumanModel();
        $pengumuman = $model->find($id_pengumuman); // Mengambil pengumuman berdasarkan id_pengumuman

        if (!$pengumuman) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Ambil ID admin yang sedang login
        $id_admin = session()->get('id_admin');

        // Cek apakah yang mengakses adalah admin
        if (!$id_admin) {
            // Jika bukan admin, tampilkan 404
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => 'Edit Pengumuman - ' . $pengumuman['judul'],
            'pengumuman' => $pengumuman,
        ];
        return view('admin/editpengumuman', $data);
    }

    public function updatePengumumanAction($id)
    {
        $model = new PengumumanModel();

        // Ambil input dari formulir
        $judul = $this->request->getPost('judul');
        $slug = url_title($judul, '-', TRUE);
        $konten = $this->request->getPost('konten');

        // Memproses foto yang diupload
        $foto = $this->request->getFile('foto');



        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => [
                'label' => 'Judul',
                'rules' => 'required|min_length[5]|max_length[150]|is_unique[pengumuman.judul,id_pengumuman,' . $id . ']' // Judul harus unik kecuali untuk artikel yang sedang diedit
            ],
            'konten' => [
                'label' => 'Konten',
                'rules' => 'required|min_length[20]' // Konten harus ada dan panjang minimum 20 karakter
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'permit_empty|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,1024]'
            ]
        ]);

        if (!$this->validate($validation->getRules())) {
            return $this->response->setJSON([
                'success' => false,
                'messages' => $validation->getErrors(),
            ]);
        }

        // Cek apakah slug sudah digunakan oleh artikel lain (selain artikel ini)
        $slugExists = $model->where('slug', $slug)
            ->where('id_pengumuman !=', $id) // Abaikan artikel yang sedang diedit
            ->first();

        if ($slugExists) {
            // Jika slug sudah ada pada artikel lain, kirim pesan kesalahan ke view
            return $this->response->setJSON([
                'success' => false,
                'messages' => [
                    'judul' => 'Judul artikel ini sudah digunakan. Silakan gunakan judul yang berbeda.'
                ]
            ]);
        }

        // Menangani upload file foto
        $fotoPath = '';
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Memastikan tipe file dan membuat nama file acak
            $fotoName = $foto->getRandomName();

            // Memindahkan file ke folder public/images/artikel
            if ($foto->move('public/images/pengumuman', $fotoName)) {
                // Jika berhasil, simpan path foto
                $fotoPath = 'images/pengumuman/' . $fotoName;
            } else {
                return $this->response->setJSON(['success' => false, 'errors' => 'Gagal menyimpan file foto.']);
            }
        }

        // Siapkan data untuk diupdate
        $data = [
            'judul' => htmlspecialchars($judul, ENT_QUOTES, 'UTF-8'), // Sanitasi untuk menghindari XSS
            'slug' => $slug,
            'konten' => htmlspecialchars($konten, ENT_QUOTES, 'UTF-8'), // Sanitasi untuk menghindari XSS
        ];

        // Jika ada foto baru yang diupload, masukkan ke dalam data
        if (!empty($fotoPath)) {
            $data['foto'] = $fotoPath;
        }

        // Simpan artikel yang sudah diperbarui
        if ($model->update($id, $data)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Pengumuman berhasil diperbarui.']);
        } else {
            // Tampilkan pesan umum untuk kesalahan penyimpanan
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal memperbarui pengumuman.']);
        }
    }

    public function updateStatusPengumuman()
    {
        // Inisialisasi model
        $model = new PengumumanModel();

        // Ambil data dari POST request
        $id_pengumuman = $this->request->getPost('id_pengumuman');
        $status = $this->request->getPost('status');

        // Validasi data (opsional, misalnya cek apakah ID dan status valid)
        if ($id_pengumuman && $status) {
            // Dapatkan tanggal dan waktu saat ini
            $tanggal = date('Y-m-d');

            // Update status dan tanggal diubah di database
            $model->update($id_pengumuman, [
                'status' => $status,
                'tanggal' => $tanggal // Update tanggal saat status diubah
            ]);

            // Mengembalikan respons untuk merefresh halaman
            return $this->response->setJSON(['success' => true, 'message' => 'Data berhasil diperbarui']);
        } else {
            // Mengembalikan respons untuk merefresh halaman
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal memperbarui data']);
        }
    }

    public function hapusPengumuman($id_pengumuman)
    {
        $model = new PengumumanModel();

        // Hapus artikel berdasarkan ID
        if ($model->delete($id_pengumuman)) {
            // Set flash message atau lakukan redirect setelah menghapus
            session()->setFlashdata('success', 'Pengumuman berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus pengumuman.');
        }

        return redirect()->to('/admin/pengumuman'); // Sesuaikan dengan URL yang diinginkan
    }

    public function peraturanadmin()
    {
        $model = new PeraturanModel();
        $perPage = 5;

        // Ambil parameter search dan status dari query string
        $keyword = $this->request->getGet('search');
        $status = $this->request->getGet('status');

        // Query dasar untuk menampilkan peraturan
        $query = $model->select('*');

        // Filter berdasarkan status jika ada
        if ($status) {
            $query->where('status', $status);
        }

        // Pencarian berdasarkan keyword pada judul
        if ($keyword) {
            $query->like('judul', $keyword);
        }

        // Dapatkan data peraturan dengan pagination
        $peraturans = $query->orderBy('tanggal', 'DESC')
            ->paginate($perPage, 'peraturans');

        // Data yang akan dikirimkan ke view
        $data = [
            'peraturans' => $peraturans,
            'title' => "Peraturan dan Kebijakan",
            'pager' => $model->pager,
            'keyword' => $keyword,
            'status' => $status,
        ];

        return view('admin/peraturan', $data);
    }

    public function tambahperaturan()
    {
        $data['title'] = "Tambah Peraturan / Kebijakan";
        return view('admin/tambahperaturan', $data);
    }

    public function tambahPeraturanAction()
    {
        $model = new PeraturanModel();

        // Ambil input dari formulir
        $judulPeraturan = $this->request->getPost('judul');
        $tentang = $this->request->getPost('tentang');
        $jenis = $this->request->getPost('jenis');

        // Memproses file yang diupload
        $file = $this->request->getFile('file');

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => [
                'label' => 'Judul',
                'rules' => 'required|min_length[5]' // Judul harus minimal 5 karakter
            ],
            'tentang' => [
                'label' => 'Tentang',
                'rules' => 'required|min_length[10]' // Tentang harus minimal 10 karakter
            ],
            'jenis' => [
                'label' => 'Jenis',
                'rules' => 'required' // Jenis harus diisi
            ],
            'file' => [
                'label' => 'File',
                'rules' => 'required|uploaded[file]|mime_in[file,application/pdf]'
            ]
        ]);

        // Validasi
        if (!$this->validate($validation->getRules())) {
            return $this->response->setJSON([
                'success' => false,
                'messages' => $validation->getErrors(),
            ]);
        }

        // Menangani upload file
        $filePath = '';
        if ($file->isValid() && !$file->hasMoved()) {
            // Memastikan tipe file dan membuat nama file acak
            $fileName = $file->getRandomName();

            // Memindahkan file ke folder public/doc/peraturan
            if ($file->move('doc/peraturan', $fileName)) {
                // Jika berhasil, simpan path file ke database
                $filePath = 'doc/peraturan/' . $fileName;
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Gagal menyimpan file.']);
            }
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'File tidak valid atau belum diupload.']);
        }

        // Simpan data peraturan ke dalam database
        $data = [
            'id_admin' => session()->get('id_admin'),
            'judul' => htmlspecialchars($judulPeraturan, ENT_QUOTES, 'UTF-8'), // Sanitasi untuk menghindari XSS
            'tentang' => htmlspecialchars($tentang, ENT_QUOTES, 'UTF-8'), // Sanitasi untuk menghindari XSS
            'jenis' => htmlspecialchars($jenis, ENT_QUOTES, 'UTF-8'), // Sanitasi untuk menghindari XSS
            'file' => $filePath,
            'tanggal' => date('Y-m-d'),
        ];

        // Simpan peraturan
        if ($model->insert($data)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Peraturan berhasil ditambahkan.']);
        } else {
            // Tampilkan pesan umum untuk kesalahan penyimpanan
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal menambahkan peraturan.']);
        }
    }


    public function detailperaturan($id_peraturan)
    {
        $model = new PeraturanModel();
        $peraturan = $model->find($id_peraturan);

        if (!$peraturan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Ambil ID admin yang sedang login
        $id_admin = session()->get('id_admin');

        // Cek apakah yang mengakses adalah admin
        if (!$id_admin) {
            // Jika bukan admin, tampilkan 404
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => $peraturan['judul'],
            'peraturan' => $peraturan,
        ];
        return view('admin/detailperaturan', $data);
    }

    public function editPeraturan($id_peraturan)
    {
        $model = new PeraturanModel();
        $peraturan = $model->find($id_peraturan); // Mengambil artikel berdasarkan id_artikel

        if (!$peraturan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Peraturan tidak ditemukan");
        }

        // Ambil ID admin yang sedang login
        $id_admin = session()->get('id_admin');

        // Cek apakah yang mengakses adalah admin
        if (!$id_admin) {
            // Jika bukan admin, tampilkan 404
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => 'Edit peraturan - ' . $peraturan['judul'],
            'peraturan' => $peraturan,
        ];
        return view('admin/editperaturan', $data);
    }

    public function updatePeraturanAction($id)
    {
        $model = new PeraturanModel();

        // Ambil input dari formulir
        $judulPeraturan = $this->request->getPost('judul');
        $tentang = $this->request->getPost('tentang');
        $jenis = $this->request->getPost('jenis');

        // Memproses foto yang diupload
        $file = $this->request->getFile('file');

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => [
                'label' => 'Judul',
                'rules' => 'required|min_length[5]' // Judul harus unik dan panjang antara 5 dan 125 karakter
            ],
            'tentang' => [
                'label' => 'Tentang',
                'rules' => 'required|min_length[10]' // Konten harus ada dan panjang minimum 20 karakter
            ],
            'jenis' => [
                'label' => 'Jenis',
                'rules' => 'required'
            ],
            'file' => [
                'label' => 'File',
                'rules' => 'permit_empty|uploaded[file]|mime_in[file,application/pdf]|max_size[file,1024]'
            ]
        ]);

        if (!$this->validate($validation->getRules())) {
            return $this->response->setJSON([
                'success' => false,
                'messages' => $validation->getErrors(),
            ]);
        }

        // Menangani upload file file
        $filePath = '';
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Memastikan tipe file dan membuat nama file acak
            $fileName = $file->getRandomName();

            // Memindahkan file ke folder public/images/artikel
            if ($file->move('doc/peraturan', $fileName)) {
                // Jika berhasil, simpan path file
                $filePath = 'doc/peraturan/' . $fileName;
            } else {
                return $this->response->setJSON(['success' => false, 'errors' => 'Gagal menyimpan file file.']);
            }
        }

        // Siapkan data untuk diupdate
        $data = [
            'judul' => htmlspecialchars($judulPeraturan, ENT_QUOTES, 'UTF-8'), // Sanitasi untuk menghindari XSS
            'tentang' => htmlspecialchars($tentang, ENT_QUOTES, 'UTF-8'), // Sanitasi untuk menghindari XSS
            'jenis' => htmlspecialchars($jenis, ENT_QUOTES, 'UTF-8'), // Sanitasi untuk menghindari XSS
        ];

        // Jika ada file baru yang diupload, masukkan ke dalam data
        if (!empty($filePath)) {
            $data['file'] = $filePath;
        }

        // Simpan artikel yang sudah diperbarui
        if ($model->update($id, $data)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Peraturan / Kebijakan berhasil diperbarui.']);
        } else {
            // Tampilkan pesan umum untuk kesalahan penyimpanan
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal memperbarui peraturan / kebijakan.']);
        }
    }

    public function updatestatusperaturan()
    {
        // Inisialisasi model
        $model = new PeraturanModel();

        // Ambil data dari POST request
        $id_peraturan = $this->request->getPost('id_peraturan');
        $status = $this->request->getPost('status');

        // Validasi data (opsional, misalnya cek apakah ID dan status valid)
        if ($id_peraturan && $status) {

            $model->update($id_peraturan, [
                'status' => $status,
            ]);

            // Mengembalikan respons untuk merefresh halaman
            return $this->response->setJSON(['success' => true, 'message' => 'Data berhasil diperbarui']);
        } else {
            // Mengembalikan respons untuk merefresh halaman
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal memperbarui data']);
        }
    }

    public function hapusPeraturan($id_peraturan)
    {
        $model = new PeraturanModel();

        // Hapus artikel berdasarkan ID
        if ($model->delete($id_peraturan)) {
            // Set flash message atau lakukan redirect setelah menghapus
            session()->setFlashdata('success', 'Pengumuman berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus pengumuman.');
        }

        return redirect()->to('/admin/pengumuman'); // Sesuaikan dengan URL yang diinginkan
    }

    public function videoAdmin()
    {
        $model = new VideoModel();

        $perPage = 5;

        // Ambil parameter search dan status dari query string
        $keyword = $this->request->getGet('search');
        $status = $this->request->getGet('status');

        // Query dasar untuk menampilkan video
        $query = $model->select('*');

        // Filter berdasarkan status jika ada
        if ($status) {
            $query->where('status', $status);
        }

        // Pencarian berdasarkan keyword pada judul
        if ($keyword) {
            $query->like('judul_video', $keyword);
        }

        // Dapatkan data video dengan pagination
        $videos = $query->orderBy('tanggal', 'DESC')
            ->paginate($perPage, 'videos');

        // Data yang akan dikirimkan ke view
        $data = [
            'videos' => $videos,
            'title' => "Video Kalpataru",
            'pager' => $model->pager,
            'keyword' => $keyword,
            'status' => $status,
        ];

        return view('admin/video', $data);
    }

    public function tambahvideo()
    {
        $data['title'] = "Tambah Video";
        return view('admin/tambahvideo', $data);
    }

    public function tambahVideoAction()
    {
        $model = new VideoModel();

        // Ambil input dari formulir
        $judulVideo = $this->request->getPost('judul');
        $link = $this->request->getPost('link');

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => [
                'label' => 'Judul',
                'rules' => 'required|min_length[5]|max_length[125]|is_unique[video.judul_video]'
            ],
            'link' => [
                'label' => 'Link',
                'rules' => 'required'
            ],
        ]);

        if (!$this->validate($validation->getRules())) {
            return $this->response->setJSON([
                'success' => false,
                'messages' => $validation->getErrors(),
            ]);
        }

        // Simpan data artikel ke dalam database
        $data = [
            'judul_video' => htmlspecialchars($judulVideo, ENT_QUOTES, 'UTF-8'), // Sanitasi untuk menghindari XSS
            'link_video' => htmlspecialchars($link, ENT_QUOTES, 'UTF-8'), // Sanitasi untuk menghindari XSS
            'tanggal' => date('Y-m-d'),
        ];

        // Simpan artikel
        if ($model->insert($data)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Artikel berhasil ditambahkan.']);
        } else {
            // Tampilkan pesan umum untuk kesalahan penyimpanan
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal menambahkan artikel.']);
        }
    }

    public function detailvideo($id_video)
    {
        $model = new VideoModel();
        $video = $model->find($id_video);

        if (!$video) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Ambil ID admin yang sedang login
        $id_admin = session()->get('id_admin');

        // Cek apakah yang mengakses adalah admin
        if (!$id_admin) {
            // Jika bukan admin, tampilkan 404
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => $video['judul_video'],
            'video' => $video,
        ];
        return view('admin/detailvideo', $data);
    }

    public function editVideo($id_video)
    {
        $model = new VideoModel();
        $video = $model->find($id_video); // Mengambil artikel berdasarkan id_artikel

        if (!$video) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Ambil ID admin yang sedang login
        $id_admin = session()->get('id_admin');

        // Cek apakah yang mengakses adalah admin
        if (!$id_admin) {
            // Jika bukan admin, tampilkan 404
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => 'Edit Video - ' . $video['judul_video'],
            'video' => $video,
        ];
        return view('admin/editvideo', $data);
    }

    public function updateVideoAction($id)
    {
        $model = new VideoModel();

        // Ambil input dari formulir
        $judulVideo = $this->request->getPost('judul');
        $link = $this->request->getPost('link');

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => [
                'label' => 'Judul',
                'rules' => 'required|min_length[5]|max_length[125]|is_unique[video.judul_video,id_video,' . $id . ']'
            ],
            'link' => [
                'label' => 'Link',
                'rules' => 'required'
            ],
        ]);

        if (!$this->validate($validation->getRules())) {
            return $this->response->setJSON([
                'success' => false,
                'messages' => $validation->getErrors(),
            ]);
        }

        // Simpan data artikel ke dalam database
        $data = [
            'judul_video' => htmlspecialchars($judulVideo, ENT_QUOTES, 'UTF-8'), // Sanitasi untuk menghindari XSS
            'link_video' => htmlspecialchars($link, ENT_QUOTES, 'UTF-8'), // Sanitasi untuk menghindari XSS
        ];

        // Simpan artikel yang sudah diperbarui
        if ($model->update($id, $data)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Video berhasil diperbarui']);
        } else {
            // Tampilkan pesan umum untuk kesalahan penyimpanan
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal memperbarui video']);
        }
    }

    public function updateStatusVideo()
    {
        // Inisialisasi model
        $model = new VideoModel();

        // Ambil data dari POST request
        $id_video = $this->request->getPost('id_video');
        $status = $this->request->getPost('status');

        // Validasi data (opsional, misalnya cek apakah ID dan status valid)
        if ($id_video && $status) {
            // Dapatkan tanggal dan waktu saat ini
            $tanggal = date('Y-m-d');

            $model->update($id_video, [
                'status' => $status,
                'tanggal' => $tanggal // Update tanggal saat status diubah
            ]);

            // Mengembalikan respons untuk merefresh halaman
            return $this->response->setJSON(['success' => true, 'message' => 'Data berhasil diperbarui']);
        } else {
            // Mengembalikan respons untuk merefresh halaman
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal memperbarui data']);
        }
    }

    public function hapusVideo($id_video)
    {
        $model = new VideoModel();

        // Hapus artikel berdasarkan ID
        if ($model->delete($id_video)) {
            // Set flash message atau lakukan redirect setelah menghapus
            session()->setFlashdata('success', 'Video berhasil dihapus');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus video');
        }

        return redirect()->to('/admin/video'); // Sesuaikan dengan URL yang diinginkan
    }

    public function bukuAdmin()
    {
        $model = new BukuModel();
        $perPage = 5;

        // Ambil parameter search dan status dari query string
        $keyword = $this->request->getGet('search');
        $status = $this->request->getGet('status');

        // Query dasar untuk menampilkan buku
        $query = $model->select('*');

        // Filter berdasarkan status jika ada
        if ($status) {
            $query->where('status', $status);
        }

        // Pencarian berdasarkan keyword pada judul
        if ($keyword) {
            $query->like('judul', $keyword);
        }

        // Dapatkan data buku dengan pagination
        $bukus = $query->orderBy('tanggal', 'DESC')
            ->paginate($perPage, 'bukus');

        // Data yang akan dikirimkan ke view
        $data = [
            'bukus' => $bukus,
            'title' => "Buku Penghargaan Kalpataru",
            'pager' => $model->pager,
            'keyword' => $keyword,
            'status' => $status,
        ];

        return view('admin/buku', $data);
    }

    public function tambahbuku()
    {
        $data['title'] = "Tambah Buku";
        return view('admin/tambahbuku', $data);
    }

    public function tambahBukuAction()
    {
        $model = new BukuModel();

        // Ambil input dari formulir
        $judul = $this->request->getPost('judul');
        $file = $this->request->getFile('file');
        $cover = $this->request->getFile('cover');

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => [
                'label' => 'Judul',
                'rules' => 'required|min_length[5]|max_length[125]|is_unique[artikel.judul]' // Judul harus unik dan panjang antara 5 dan 125 karakter
            ],
            'file' => [
                'label' => 'File',
                'rules' => 'uploaded[file]|mime_in[file,application/pdf]'
            ],
            'cover' => [
                'label' => 'Cover',
                'rules' => 'uploaded[cover]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/gif,image/png]'
            ]
        ]);


        if (!$this->validate($validation->getRules())) {
            return $this->response->setJSON([
                'success' => false,
                'messages' => $validation->getErrors(),
            ]);
        }

        // Menangani upload file foto
        $coverPath = '';
        if ($cover && $cover->isValid() && !$cover->hasMoved()) {
            // Memastikan tipe file dan membuat nama file acak
            $coverName = $cover->getRandomName();

            // Memindahkan file ke folder public/images/artikel
            if ($cover->move('public/images/buku', $coverName)) {
                // Jika berhasil, simpan path cover ke database
                $coverPath = 'images/buku/' . $coverName;
            } else {
                return $this->response->setJSON(['success' => false, 'errors' => 'Gagal menyimpan file cover.']);
            }
        } else {
            return $this->response->setJSON(['success' => false, 'errors' => 'File tidak valid atau belum diupload.']);
        }

        // Menangani upload file
        $filePath = '';
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Memastikan tipe file dan membuat nama file acak
            $fileName = $file->getRandomName();

            // Memindahkan file ke folder public/doc/peraturan
            if ($file->move('doc/buku', $fileName)) {
                // Jika berhasil, simpan path file ke database
                $filePath = 'doc/buku/' . $fileName;
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Gagal menyimpan file.']);
            }
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'File tidak valid atau belum diupload.']);
        }

        // Simpan data artikel ke dalam database
        $data = [
            'id_admin' => session()->get('id_admin'),
            'judul' => htmlspecialchars($judul, ENT_QUOTES, 'UTF-8'), // Sanitasi untuk menghindari XSS
            'cover' => $coverPath,
            'file' => $filePath,
            'tanggal' => date('Y-m-d'),
        ];

        // Simpan artikel
        if ($model->insert($data)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Artikel berhasil ditambahkan.']);
        } else {
            // Tampilkan pesan umum untuk kesalahan penyimpanan
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal menambahkan artikel.']);
        }
    }

    public function detailBuku($id_buku)
    {
        $model = new BukuModel();
        $buku = $model->find($id_buku);

        if (!$buku) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Ambil ID admin yang sedang login
        $id_admin = session()->get('id_admin');

        // Cek apakah yang mengakses adalah admin
        if (!$id_admin) {
            // Jika bukan admin, tampilkan 404
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => $buku['judul'],
            'buku' => $buku,
        ];
        return view('admin/detailbuku', $data);
    }

    public function editBuku($id_buku)
    {
        $model = new BukuModel();
        $buku = $model->find($id_buku); // Mengambil buku berdasarkan id_buku

        if (!$buku) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Ambil ID admin yang sedang login
        $id_admin = session()->get('id_admin');

        // Cek apakah yang mengakses adalah admin
        if (!$id_admin) {
            // Jika bukan admin, tampilkan 404
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => 'Edit Buku - ' . $buku['judul'],
            'buku' => $buku,
        ];
        return view('admin/editbuku', $data);
    }

    public function updateBukuAction($id)
    {
        $model = new BukuModel();

        // Ambil input dari formulir
        $judul = $this->request->getPost('judul');
        $file = $this->request->getFile('file');
        $cover = $this->request->getFile('cover');

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => [
                'label' => 'Judul',
                'rules' => 'required|min_length[5]|max_length[125]|is_unique[buku_kalpataru.judul,id_buku,' . $id . ']' // Judul harus unik dan panjang antara 5 dan 125 karakter
            ],
            'file' => [
                'label' => 'File',
                'rules' => 'permit_empty|uploaded[file]|mime_in[file,application/pdf]'
            ],
            'cover' => [
                'label' => 'Cover',
                'rules' => 'permit_empty|uploaded[cover]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/gif,image/png]|max_size[cover,1024]'
            ]
        ]);


        if (!$this->validate($validation->getRules())) {
            return $this->response->setJSON([
                'success' => false,
                'messages' => $validation->getErrors(),
            ]);
        }

        // Menangani upload file foto
        $coverPath = '';
        if ($cover && $cover->isValid() && !$cover->hasMoved()) {
            // Memastikan tipe file dan membuat nama file acak
            $coverName = $cover->getRandomName();

            // Memindahkan file ke folder public/images/artikel
            if ($cover->move('public/images/buku', $coverName)) {
                // Jika berhasil, simpan path cover
                $coverPath = 'images/buku/' . $coverName;
            } else {
                return $this->response->setJSON(['success' => false, 'errors' => 'Gagal menyimpan cover.']);
            }
        }

        // Menangani upload file
        $filePath = '';
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Memastikan tipe file dan membuat nama file acak
            $fileName = $file->getRandomName();

            // Memindahkan file ke folder public/images/artikel
            if ($file->move('doc/buku', $fileName)) {
                // Jika berhasil, simpan path file
                $filePath = 'doc/buku/' . $fileName;
            } else {
                return $this->response->setJSON(['success' => false, 'errors' => 'Gagal menyimpan file.']);
            }
        }

        // Simpan data artikel ke dalam database
        $data = [
            'judul' => htmlspecialchars($judul, ENT_QUOTES, 'UTF-8'), // Sanitasi untuk menghindari XSS
        ];

        if (!empty($coverPath)) {
            $data['cover'] = $coverPath;
        }

        if (!empty($filePath)) {
            $data['file'] = $filePath;
        }

        // Simpan artikel yang sudah diperbarui
        if ($model->update($id, $data)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Buku berhasil diperbarui.']);
        } else {
            // Tampilkan pesan umum untuk kesalahan penyimpanan
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal memperbarui buku.']);
        }
    }

    public function updateStatusBuku()
    {
        // Inisialisasi model
        $model = new BukuModel();

        // Ambil data dari POST request
        $id_buku = $this->request->getPost('id_buku');
        $status = $this->request->getPost('status');

        // Validasi data (opsional, misalnya cek apakah ID dan status valid)
        if ($id_buku && $status) {

            $model->update($id_buku, [
                'status' => $status,
            ]);

            // Mengembalikan respons untuk merefresh halaman
            return $this->response->setJSON(['success' => true, 'message' => 'Data berhasil diperbarui']);
        } else {
            // Mengembalikan respons untuk merefresh halaman
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal memperbarui data']);
        }
    }

    public function hapusBuku($id_buku)
    {
        $model = new BukuModel();

        // Hapus buku berdasarkan ID
        if ($model->delete($id_buku)) {
            // Set flash message atau lakukan redirect setelah menghapus
            session()->setFlashdata('success', 'Buku berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus buku.');
        }

        return redirect()->to('/admin/buku-kalpataru'); // Sesuaikan dengan URL yang diinginkan
    }
}
