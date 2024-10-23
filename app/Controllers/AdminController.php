<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\BeritaModel;
use App\Models\PengusulModel;
use App\Models\VideoModel;
use App\Models\PendaftaranModel;


class AdminController extends BaseController
{
    protected $pendaftaranModel;

    public function __construct()
    {
        $this->pendaftaranModel = new PendaftaranModel();
    }

    public function dashboard()
    {
        $data['title'] = "Dashboard Admin";
        return view('admin/dashboard', ['title' => 'Dashboard Admin']);
    }

    public function artikeladmin()
    {
        $model = new ArtikelModel();
        $keyword = $this->request->getGet('search');

        $data['artikels'] = $model->getAllArtikel($keyword);
        $data['countTerbit'] = count($data['artikels']);
        $data['title'] = "Artikel Admin";

        return view('admin/artikeladmin', $data);
    }

    public function tambahArtikelAction()
    {
        $model = new ArtikelModel();

        // Ambil input dari formulir
        $judulArtikel = $this->request->getPost('judul');
        $konten = $this->request->getPost('konten');

        // Memproses foto yang diupload
        $foto = $this->request->getFile('foto');

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => [
                'label' => 'Judul',
                'rules' => 'required|min_length[5]|max_length[100]|is_unique[artikel.judul]' // Judul harus unik dan panjang antara 5 dan 100 karakter
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
        $slug = url_title($judulArtikel, '-', true);
        $existingArticle = $model->where('slug', $slug)->first(); // Cek apakah slug sudah ada
        if ($existingArticle) {
            return $this->response->setJSON(['success' => false, 'errors' => 'Judul sudah digunakan.']);
        }

        // Simpan data artikel ke dalam database
        $dataArtikel = [
            'id_admin' => session()->get('id_admin'),
            'judul' => htmlspecialchars($judulArtikel, ENT_QUOTES, 'UTF-8'), // Sanitasi untuk menghindari XSS
            'slug' => $slug,
            'konten' => htmlspecialchars($konten, ENT_QUOTES, 'UTF-8'), // Sanitasi untuk menghindari XSS
            'foto' => $fotoPath,
            'tanggal' => date('Y-m-d H:i:s'),
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
            // Update status di database
            $model->update($id_artikel, ['status' => $status]);

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
        $judulArtikel = $this->request->getPost('judul');
        $konten = $this->request->getPost('konten');

        // Memproses foto yang diupload
        $foto = $this->request->getFile('foto');

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => [
                'label' => 'Judul',
                'rules' => 'required|min_length[5]|max_length[100]|is_unique[artikel.judul,id_artikel,' . $id . ']' // Judul harus unik kecuali untuk artikel yang sedang diedit
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

        // Cek apakah slug perlu diupdate
        $slug = url_title($judulArtikel, '-', true);
        $existingArticle = $model->where('slug', $slug)->where('id_artikel !=', $id)->first(); // Cek apakah slug sudah ada
        if ($existingArticle) {
            return $this->response->setJSON(['success' => false, 'errors' => 'Judul sudah digunakan.']);
        }

        // Siapkan data untuk diupdate
        $dataArtikel = [
            'judul' => htmlspecialchars($judulArtikel, ENT_QUOTES, 'UTF-8'), // Sanitasi untuk menghindari XSS
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

    public function akunpengusul()
    {
        $model = new PengusulModel();
        $pengusul = $model->where('role_akun', 'Pengusul')->findAll();

        $data['pengusul'] = $pengusul;
        $data['countAllPengusul'] = count($data['pengusul']); // Menghitung semua akun pengusul
        $data['title'] = "Akun Pengusul";

        return view('admin/akunpengusul', $data);
    }

    public function updatePengusul()
    {
        // Inisialisasi model
        $model = new PengusulModel();

        // Ambil data dari POST request
        $id_pengusul = $this->request->getPost('id_pengusul');
        $status_akun = $this->request->getPost('status_akun');

        // Validasi data (opsional, misalnya cek apakah ID dan status valid)
        if ($id_pengusul && $status_akun) {
            // Update status di database
            $model->update($id_pengusul, ['status_akun' => $status_akun]);
            // Mengembalikan respons untuk merefresh halaman
            return $this->response->setJSON(['success' => true, 'message' => 'Status Pengusul berhasil diperbarui']);
        } else {
            // Mengembalikan respons untuk merefresh halaman
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal memperbarui staus pengusul']);
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


    public function akundlhk()
    {
        $data['title'] = "Akun DLHK";
        return view('admin/akundlhk', ['title' => 'Akun DLHK']);
    }

    public function arsippenerima()
    {
        $data['title'] = "Arsip Penerima";
        return view('admin/arsippenerima', ['title' => 'Arsip Penerima']);
    }

    public function dataCalon()
    {
        $pendaftaranModel = new PendaftaranModel();

        // Ambil data dengan pagination, limit 8 per halaman
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
        $validStatuses = ['Terkirim', 'Perlu Perbaikan', 'Sesuai', 'Verifikasi Administrasi', 'Lolos Administrasi', 'Tidak Lolos Administrasi'];
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

        return view('admin/datacalon', $data);
    }



    public function updateStatusPendaftaran()
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
            if ($status_pendaftaran == 'Perlu Perbaikan' && $catatan_verifikasi) {
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

    public function detailDataCalon($id)
    {
        $model = new PendaftaranModel();
        $userModel = new PengusulModel();  // Asumsikan Anda memiliki model Pengusul untuk mengambil data profil

        // Ambil detail pendaftaran berdasarkan ID
        $pendaftaran = $model->getDetailById($id);

        // Validasi jika data ditemukan atau tidak
        if (!$pendaftaran) {
            return redirect()->to('admin/datacalon')->with('error', 'Data tidak ditemukan.');
        }

        // Cek status pendaftaran, jika "Draft" redirect dengan pesan error
        if ($pendaftaran['status_pendaftaran'] === 'Draft') {
            return redirect()->to('admin/datacalon')->with('error', 'Data ini masih berstatus Draft dan tidak dapat diakses.');
        }

        // Ambil data profil pengusul berdasarkan id_pengusul dari pendaftaran
        $pengusul = $userModel->find($pendaftaran['id_pengusul']);  // Mengambil data pengusul berdasarkan ID

        // Validasi jika data pengusul ditemukan atau tidak
        if (!$pengusul) {
            return redirect()->to('admin/datacalon')->with('error', 'Data pengusul tidak ditemukan.');
        }

        // Ambil data dari semua tabel terkait menggunakan join
        $data = [
            'title' => 'Detail Usulan',
            'pendaftaran' => $pendaftaran,
            'pengusul' => $pengusul,  // Tambahkan data pengusul
        ];

        return view('admin/detaildatacalon', $data);
    }




    public function sidang1()
    {
        $data['title'] = "Sidang 1";
        return view('admin/sidang1', ['title' => 'Sidang 1']);
    }

    public function editpamflet()
    {
        $data['title'] = "Edit Pamflet";
        return view('admin/editpamflet', ['title' => 'Edit Pamflet']);
    }

    public function sidang2()
    {
        $data['title'] = "Sidang 2";
        return view('admin/sidang2', ['title' => 'Sidang 2']);
    }

    public function arsipselengkapnya()
    {
        $data['title'] = "Arsip Selengkapnya";
        return view('admin/arsipselengkapnya', ['title' => 'Arsip Selengkapnya']);
    }

    public function nominasi()
    {
        $data['title'] = "Nominasi";
        return view('admin/nominasi', ['title' => 'Nominasi']);
    }

    public function tambaharsip()
    {
        $data['title'] = "Arsip Penerima";
        return view('admin/tambaharsip', ['title' => 'Tambah Arsip']);
    }


    public function akuntimteknis()
    {
        $data['title'] = "Akun Tim Teknis";
        return view('admin/akuntimteknis', ['title' => 'Akun Tim Teknis']);
    }

    public function tambahartikeladmin()
    {
        $data['title'] = "Tambah Artikel Admin";
        return view('admin/tambahartikeladmin', $data);
    }

    public function beritaAdmin()
    {
        $model = new BeritaModel();
        $keyword = $this->request->getGet('search');

        $data['berita'] = $model->getAllBerita($keyword);
        $data['countTerbit'] = count($data['berita']);
        $data['title'] = "Berita Admin";

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
        $judulBerita = $this->request->getPost('judul');
        $konten = $this->request->getPost('konten');

        // Memproses foto yang diupload
        $foto = $this->request->getFile('foto');

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => [
                'label' => 'Judul',
                'rules' => 'required|min_length[5]|max_length[100]|is_unique[berita.judul]' // Judul harus unik dan panjang antara 5 dan 100 karakter
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

        // Menghasilkan slug yang unik
        $slug = url_title($judulBerita, '-', true);
        $existingBerita = $model->where('slug', $slug)->first(); // Cek apakah slug sudah ada
        if ($existingBerita) {
            return $this->response->setJSON(['success' => false, 'message' => 'Judul sudah digunakan.']);
        }

        // Simpan data artikel ke dalam database
        $data = [
            'id_admin' => session()->get('id_admin'),
            'judul' => htmlspecialchars($judulBerita, ENT_QUOTES, 'UTF-8'), // Sanitasi untuk menghindari XSS
            'slug' => $slug,
            'konten' => htmlspecialchars($konten, ENT_QUOTES, 'UTF-8'), // Sanitasi untuk menghindari XSS
            'foto' => $fotoPath,
            'tanggal' => date('Y-m-d H:i:s'),
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

        // Ambil input dari formulir
        $judul = $this->request->getPost('judul');
        $konten = $this->request->getPost('konten');

        // Memproses foto yang diupload
        $foto = $this->request->getFile('foto');

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => [
                'label' => 'Judul',
                'rules' => 'required|min_length[5]|max_length[100]|is_unique[berita.judul,id_berita,' . $id . ']' // Judul harus unik kecuali untuk artikel yang sedang diedit
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

        // Cek apakah slug perlu diupdate
        $slug = url_title($judul, '-', true);
        $existingArticle = $model->where('slug', $slug)->where('id_berita !=', $id)->first(); // Cek apakah slug sudah ada
        if ($existingArticle) {
            return $this->response->setJSON(['success' => false, 'errors' => 'Judul sudah digunakan.']);
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
            // Update status di database
            $model->update($id_berita, ['status' => $status]);

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

    public function daftartimteknis()
    {
        $data['title'] = "Daftar Tim Teknis";
        return view('admin/daftartimteknis', ['title' => 'Daftar Tim Teknis']);
    }

    public function akundppk()
    {
        $data['title'] = "Akun DPPK";
        return view('admin/akundppk', ['title' => 'Akun DPPK']);
    }

    public function daftardppk()
    {
        $data['title'] = "Daftar DPPK";
        return view('admin/daftardppk', ['title' => 'Daftar DPPK']);
    }

    public function pengumumanadmin()
    {
        $data['title'] = "Pengumuman Admin";
        return view('admin/pengumumanadmin', ['title' => 'Pengumuman Admin']);
    }

    public function tambahpengumumanadmin()
    {
        $data['title'] = "Tambah Pengumuman Admin";
        return view('admin/tambahpengumumanadmin', ['title' => 'Tambah Pengumuman Admin']);
    }

    public function akunpengguna()
    {
        $data['title'] = "Akun Pengguna";
        return view('admin/akunpengguna', ['title' => 'Akun Pengguna']);
    }

    public function daftarakunpengguna()
    {
        $data['title'] = "Daftar Akun Pengguna";
        return view('admin/daftarakunpengguna', ['title' => 'Daftar Akun Pengguna']);
    }

    public function daftarakundlhk()
    {
        $data['title'] = "Daftar Akun DLHK";
        return view('admin/daftarakundlhk', ['title' => 'Daftar Akun DLHK']);
    }

    public function videoAdmin()
    {
        $model = new VideoModel();

        // Mengambil semua data video tanpa filter status
        $video = $model->findAll();

        $data['video'] = $video;
        $data['countAllVideos'] = count($data['video']); // Menghitung semua video
        $data['title'] = "Video Admin";

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
                'rules' => 'required|min_length[5]|max_length[100]|is_unique[video.judul_video]'
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
            'tanggal' => date('Y-m-d H:i:s'),
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
                'rules' => 'required|min_length[5]|max_length[100]|is_unique[video.judul_video,id_video,' . $id . ']'
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
            'tanggal' => date('Y-m-d H:i:s'),
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
            // Update status di database
            $model->update($id_video, ['status' => $status]);

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

    public function buku()
    {
        $data['title'] = "Buku";
        return view('admin/buku', ['title' => 'Buku']);
    }

    public function tambahbuku()
    {
        $data['title'] = "Buku";
        return view('admin/tambahbuku', ['title' => 'Tambah Buku']);
    }

    public function kebijakan()
    {
        $data['title'] = "Kebijakan";
        return view('admin/kebijakan', ['title' => 'Kebijakan']);
    }
}
