<?php

namespace App\Controllers;

use App\Models\ArtikelModel;


class AdminController extends BaseController
{
    public function dashboard()
    {
        $data['title'] = "Dashboard Admin";
        return view('admin/dashboard', ['title' => 'Dashboard Admin']);
    }

    public function akunpengusul()
    {
        $data['title'] = "Akun Pengusul";
        return view('admin/akunpengusul', ['title' => 'Akun Pengusul']);
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



    public function artikelpengguna()
    {
        $data['title'] = "Artikel Pengguna";
        return view('admin/artikelpengguna', ['title' => 'Artikel Pengguna']);
    }

    public function akundlhk()
    {
        $data['title'] = "Akun DLHK";
        return view('admin/akundlhk', ['title' => 'Akun DLHK']);
    }

    public function akuntimteknis()
    {
        $data['title'] = "Akun Tim Teknis";
        return view('admin/akuntimteknis', ['title' => 'Akun Tim Teknis']);
    }

    public function tambahartikeladmin()
    {
        $data['title'] = "Tambah Artikel Admin";
        return view('admin/tambahartikeladmin', ['title' => 'Tambah Artikel Admin']);
    }

    public function beritaadmin()
    {
        $data['title'] = "Berita Admin";
        return view('admin/beritaadmin', ['title' => 'Berita Admin']);
    }
}
