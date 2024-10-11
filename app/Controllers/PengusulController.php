<?php

namespace App\Controllers;

use App\Models\PengusulModel;
use App\Models\PendaftaranModel;
use App\Models\ArtikelModel;
// use CodeIgniter\Controller;

class PengusulController extends BaseController
{
    public function index(): string
    {
        $pengusulModel = new PengusulModel();
        $data['pengusul'] = $pengusulModel->where('id_pengusul', session()->get('id_pengusul'))->first();
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth/login')->with('authMessage', 'Harap login terlebih dahulu');
        }

        $data['title'] = 'Profil Pengusul';
        return view('pengusul/profil', $data);
    }

    public function updateProfil()
    {
        $pengusulModel = new PengusulModel();

        $id_pengusul = session()->get('id_pengusul');

        $currentSuratPengantar = session()->get('surat_pengantar');

        $file = $this->request->getFile('surat_pengantar');
        $filePath = $currentSuratPengantar;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            if ($file->getClientMimeType() == 'application/pdf') {
                $filePath = $file->store('suratpengantar', $file->getRandomName());
            } else {
                return $this->response->setJSON(['success' => false, 'errors' => 'Invalid file type. Only PDF files are allowed']);
            }
        }

        $data = [
            'jenis_instansi' => $this->request->getPost('jenis_instansi'),
            'nama_instansi_pribadi' => $this->request->getPost('nama'),
            'provinsi' => $this->request->getPost('provinsi'),
            'telepon' => $this->request->getPost('telepon'),
            'email' => $this->request->getPost('email'),
            'jabatan_pekerjaan' => $this->request->getPost('jabatan_pekerjaan'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'jalan' => $this->request->getPost('jalan'),
            'rt_rw' => $this->request->getPost('rt_rw'),
            'desa' => $this->request->getPost('desa'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'kab_kota' => $this->request->getPost('kab_kota'),
            'kode_pos' => $this->request->getPost('kode_pos'),
            'surat_pengantar' => $filePath
        ];

        if ($pengusulModel->update($id_pengusul, $data)) {
            session()->set($data);

            return $this->response->setJSON(['success' => true, 'message' => 'Profil berhasil diperbarui.']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal memperbarui profil.']);
        }
    }

    public function tambahcalon()
    {
        $id_pengusul = session()->get('id_pengusul');

        if (!$id_pengusul) {
            return redirect()->to('/login');
        }

        return view('pengusul/tambahcalon', ['id_pengusul' => $id_pengusul]);
    }

    public function inputKategori()
    {
        $Model = new PendaftaranModel();
        $id_pengusul = $this->request->getPost('id_pengusul');
        $kategori = $this->request->getPost('kategori');

        $totalKategori = $Model->where('kategori', $kategori)->countAllResults();

        switch ($kategori) {
            case 'Perintis Lingkungan':
                $prefix = 'A';
                break;
            case 'Pengabdi Lingkungan':
                $prefix = 'B';
                break;
            case 'Penyelamat Lingkungan':
                $prefix = 'C';
                break;
            case 'Pembina Lingkungan':
                $prefix = 'D';
                break;
            default:
                $prefix = 'X';
        }

        $kode_registrasi = $prefix . str_pad($totalKategori + 1, 2, '0', STR_PAD_LEFT);

        $data = [
            'id_pengusul' => $id_pengusul,
            'kategori' => $kategori,
            'tanggal_pendaftaran' => date('Y-m-d H:i:s'),
            'kode_registrasi' => $kode_registrasi
        ];

        session()->set('pendaftaran_data', $data);

        return redirect()->to('pengusul/tambahcalonidentitas')->with('success', 'Kategori berhasil dipilih, lanjutkan mengisi identitas.');
    }



    public function tambahCalonIdentitas()
    {
        // Ambil data dari session yang sudah diset di inputKategori()
        $pendaftaranData = session()->get('pendaftaran_data');

        if (!$pendaftaranData || !isset($pendaftaranData['kategori'])) {
            return redirect()->back()->with('error', 'Data kategori atau pendaftaran tidak ditemukan.');
        }

        $provinsi_list = [
            'Aceh',
            'Bali',
            'Bangka Belitung',
            'Banten',
            'Bengkulu',
            'DI Yogyakarta',
            'DKI Jakarta',
            'Gorontalo',
            'Jambi',
            'Jawa Barat',
            'Jawa Tengah',
            'Jawa Timur',
            'Kalimantan Barat',
            'Kalimantan Selatan',
            'Kalimantan Tengah',
            'Kalimantan Timur',
            'Kalimantan Utara',
            'Kepulauan Bangka Belitung',
            'Kepulauan Riau',
            'Lampung',
            'Maluku',
            'Maluku Utara',
            'Nusa Tenggara Barat',
            'Nusa Tenggara Timur',
            'Papua',
            'Papua Barat',
            'Papua Barat Daya',
            'Papua Pegunungan',
            'Papua Selatan',
            'Papua Tengah',
            'Riau',
            'Sulawesi Barat',
            'Sulawesi Selatan',
            'Sulawesi Tengah',
            'Sulawesi Tenggara',
            'Sulawesi Utara',
            'Sumatera Barat',
            'Sumatera Selatan',
            'Sumatera Utara'
        ];

        return view('pengusul/tambahcalonidentitas', [
            'id_pengusul' => $pendaftaranData['id_pengusul'],  // Data dari session
            'kategori' => $pendaftaranData['kategori'],        // Data dari session
            'provinsi_list' => $provinsi_list
        ]);
    }

    public function simpanCalonIdentitas()
    {
        $Model = new PendaftaranModel();

        // Ambil data pendaftaran dari session
        $pendaftaranData = session()->get('pendaftaran_data');

        if (!$pendaftaranData || !isset($pendaftaranData['kategori'])) {
            return redirect()->back()->with('error', 'Data kategori atau pendaftaran tidak ditemukan.');
        }

        if ($pendaftaranData['kategori'] == 'Penyelamat Lingkungan') {
            $data = [
                'nama' => $this->request->getPost('nama_kelompok'),
                'tahun_pembentukan' => $this->request->getPost('tahun_berdiri'),
                'jumlah_anggota' => $this->request->getPost('jumlah_anggota'),
                'jalan' => $this->request->getPost('jalan'),
                'rt_rw' => $this->request->getPost('rt_rw'),
                'desa' => $this->request->getPost('desa'),
                'kecamatan' => $this->request->getPost('kecamatan'),
                'kab_kota' => $this->request->getPost('kab_kota'),
                'provinsi' => $this->request->getPost('provinsi'),
                'kode_pos' => $this->request->getPost('kode_pos'),
                'sosial_media' => $this->request->getPost('media_sosial'),
                'nama_ketua' => $this->request->getPost('nama_ketua'),
                'nik' => $this->request->getPost('nik_ketua'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'usia' => $this->request->getPost('usia'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'pekerjaan' => $this->request->getPost('pekerjaan'),
                'pendidikan' => $this->request->getPost('pendidikan'),
            ];
        } else {
            $data = [
                'nama' => $this->request->getPost('nama_individu'),
                'nik' => $this->request->getPost('nik_individu'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'usia' => $this->request->getPost('usia'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'pekerjaan' => $this->request->getPost('pekerjaan'),
                'telepon' => $this->request->getPost('telepon'),
                'email' => $this->request->getPost('email'),
                'pendidikan' => $this->request->getPost('pendidikan'),
                'jalan' => $this->request->getPost('jalan'),
                'rt_rw' => $this->request->getPost('rt_rw'),
                'desa' => $this->request->getPost('desa'),
                'kecamatan' => $this->request->getPost('kecamatan'),
                'kab_kota' => $this->request->getPost('kab_kota'),
                'provinsi' => $this->request->getPost('provinsi'),
                'kode_pos' => $this->request->getPost('kode_pos'),
                'sosial_media' => $this->request->getPost('media_sosial'),
            ];
        }
        // Gabungkan data identitas dengan data pendaftaran sebelumnya dari session
        $finalData = array_merge($pendaftaranData, $data);

        // Simpan data ke database
        if ($Model->insert($finalData)) {
            // Hapus session setelah data disimpan
            session()->remove('pendaftaran_data');

            return redirect()->to('pengusul/tambahcalonkegiatan')->with('success', 'Identitas berhasil disimpan.');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }

        return redirect()->to('pengusul/tambahcalonkegiatan')->with('success', 'Identitas berhasil disimpan.');
    }

    public function tambahCalonKegiatan()
    {
        $id_pendaftaran = session()->get('id_pendaftaran');
        $kategori = session()->get('kategori');
        $data['title'] = 'Tambah Calon Kegiatan';

        if (!$id_pendaftaran || !$kategori) {
            return redirect()->back()->with('error', 'Data kategori atau pendaftaran tidak ditemukan.');
        }

        return view('pengusul/tambahcalonkegiatan', [
            'id_pendaftaran' => $id_pendaftaran,
            'kategori' => $kategori
        ]);
    }

    public function simpanCalonKegiatan()
    {
        $Model = new PendaftaranModel();

        // Ambil id_pendaftaran dari session
        $id_pendaftaran = session()->get('id_pendaftaran');

        // Data dari form kegiatan
        $data = [
            'id_pendaftaran' => $id_pendaftaran,
            'tema' => $this->request->getPost('tema'),
            'sub_tema' => $this->request->getPost('sub_tema'),
            'bentuk_kegiatan' => $this->request->getPost('jenis_kegiatan'),
            'tahun_mulai' => $this->request->getPost('tahun_mulai'),
            'deskripsi_kegiatan' => $this->request->getPost('deskripsi_kegiatan'),
            'lokasi_kegiatan' => $this->request->getPost('lokasi_kegiatan'),
            'pihak_dan_peran' => $this->request->getPost('pihak_dan_peran'),
            'keberhasilan' => $this->request->getPost('keberhasilan')
        ];

        // Simpan data ke tabel 'kegiatan'
        $Model->saveKegiatan($data);

        return redirect()->to('pengusul/tambahcalondampak')->with('success', 'Kegiatan berhasil disimpan.');
    }

    public function tambahCalonDampak()
    {
        $id_pendaftaran = session()->get('id_pendaftaran');
        $kategori = session()->get('kategori');
        $data['title'] = 'Tambah Calon Kegiatan';

        if (!$id_pendaftaran || !$kategori) {
            return redirect()->back()->with('error', 'Data kategori atau pendaftaran tidak ditemukan.');
        }

        return view('pengusul/tambahcalondampak', [
            'id_pendaftaran' => $id_pendaftaran,
            'kategori' => $kategori
        ]);
    }

    public function simpanCalonDampak()
    {
        $Model = new PendaftaranModel();

        // Ambil id_pendaftaran dari session
        $id_pendaftaran = session()->get('id_pendaftaran');

        // Data dari form dampak
        $data = [
            'id_pendaftaran' => $id_pendaftaran,
            'dampak_lingkungan' => $this->request->getPost('dampak_lingkungan'),
            'dampak_ekonomi' => $this->request->getPost('dampak_ekonomi'),
            'dampak_sosial_budaya' => $this->request->getPost('dampak_sosial_budaya')
        ];

        // Simpan data ke tabel 'dampak'
        $Model->saveDampak($data);

        return redirect()->to('pengusul/tambahcalonpmik')->with('success', 'Dampak berhasil disimpan.');
    }


    public function tambahCalonPmik()
    {
        $id_pendaftaran = session()->get('id_pendaftaran');
        $kategori = session()->get('kategori');
        $data['title'] = 'Tambah Calon Kegiatan';

        if (!$id_pendaftaran || !$kategori) {
            return redirect()->back()->with('error', 'Data kategori atau pendaftaran tidak ditemukan.');
        }

        return view('pengusul/tambahcalonpmik', [
            'id_pendaftaran' => $id_pendaftaran,
            'kategori' => $kategori
        ]);
    }

    public function simpanCalonPmik()
    {
        $Model = new PendaftaranModel();

        // Ambil id_pendaftaran dari session
        $id_pendaftaran = session()->get('id_pendaftaran');

        // Data dari form Pmik
        $data = [
            'id_pendaftaran' => $id_pendaftaran,
            'prakarsa' => $this->request->getPost('prakarsa'),
            'motivasi' => $this->request->getPost('motivasi'),
            'inovasi' => $this->request->getPost('inovasi'),
            'kreativitas' => $this->request->getPost('kreativitas')
        ];

        // Simpan data ke tabel 'pmik'
        $Model->savePmik($data);

        return redirect()->to('pengusul/tambahcalonkeswadayaan')->with('success', 'PMIK berhasil disimpan.');
    }


    public function tambahCalonKeswadayaan()
    {
        $id_pendaftaran = session()->get('id_pendaftaran');
        $kategori = session()->get('kategori');
        $data['title'] = 'Tambah Calon Kegiatan';

        if (!$id_pendaftaran || !$kategori) {
            return redirect()->back()->with('error', 'Data kategori atau pendaftaran tidak ditemukan.');
        }

        return view('pengusul/tambahcalonkeswadayaan', [
            'id_pendaftaran' => $id_pendaftaran,
            'kategori' => $kategori
        ]);
    }

    public function simpanCalonKeswadayaan()
    {
        $Model = new PendaftaranModel();

        // Ambil id_pendaftaran dari session
        $id_pendaftaran = session()->get('id_pendaftaran');

        // Data dari form Keswadayaan
        $data = [
            'id_pendaftaran' => $id_pendaftaran,
            'sumber_biaya' => $this->request->getPost('sumber_biaya'),
            'teknologi_kegiatan' => $this->request->getPost('teknologi_kegiatan'),
            'status_lahan_kegiatan' => $this->request->getPost('status_lahan_kegiatan'),
            'jumlah_kelompok_serupa' => $this->request->getPost('jumlah_kelompok_serupa')
        ];

        // Simpan data ke tabel 'keswadayaan'
        $Model->saveKeswadayaan($data);

        return redirect()->to('pengusul/tambahcalonkeistimewaan')->with('success', 'Keswadayaan berhasil disimpan.');
    }

    public function tambahCalonKeistimewaan()
    {
        $id_pendaftaran = session()->get('id_pendaftaran');
        $kategori = session()->get('kategori');
        $data['title'] = 'Tambah Calon Kegiatan';

        if (!$id_pendaftaran || !$kategori) {
            return redirect()->back()->with('error', 'Data kategori atau pendaftaran tidak ditemukan.');
        }

        return view('pengusul/tambahcalonkeistimewaan', [
            'id_pendaftaran' => $id_pendaftaran,
            'kategori' => $kategori
        ]);
    }

    public function simpanCalonKeistimewaan()
    {
        $Model = new PendaftaranModel();

        // Ambil id_pendaftaran dari session
        $id_pendaftaran = session()->get('id_pendaftaran');

        // Data dari form Keistimewaan
        $data = [
            'id_pendaftaran' => $id_pendaftaran,
            'keistimewaan' => $this->request->getPost('keistimewaan'),
            'penghargaan' => $this->request->getPost('penghargaan'),
            'foto_kegiatan1' => $this->request->getPost('foto_kegiatan1'),
            'foto_kegiatan2' => $this->request->getPost('foto_kegiatan2'),
            'foto_kegiatan3' => $this->request->getPost('foto_kegiatan3'),
            'foto_kegiatan4' => $this->request->getPost('foto_kegiatan4'),
            'foto_kegiatan5' => $this->request->getPost('foto_kegiatan5'),
            'deskripsi_foto_kegiatan1' => $this->request->getPost('deskripsi_foto_kegiatan1'),
            'deskripsi_foto_kegiatan2' => $this->request->getPost('deskripsi_foto_kegiatan2'),
            'deskripsi_foto_kegiatan3' => $this->request->getPost('deskripsi_foto_kegiatan3'),
            'deskripsi_foto_kegiatan4' => $this->request->getPost('deskripsi_foto_kegiatan4'),
            'deskripsi_foto_kegiatan5' => $this->request->getPost('deskripsi_foto_kegiatan5'),
            'tautan_video' => $this->request->getPost('tautan_video'),
            'tautan_dokumen_pendukung' => $this->request->getPost('tautan_dokumen_pendukung')
        ];

        // Simpan data ke tabel 'keistimewaan'
        $Model->saveKeistimewaan($data);

        return redirect()->to('pengusul/usulansaya')->with('success', 'Keistimewaan berhasil disimpan.');
    }


    public function usulansaya()
    {
        $Model = new PendaftaranModel();

        // Ambil ID pengusul dari session
        $id_pengusul = session()->get('id_pengusul');

        // Ambil data pendaftaran berdasarkan ID pengusul
        $usulan = $Model->where('id_pengusul', $id_pengusul)->findAll();

        $data = [
            'title' => 'Usulan Saya',
            'usulan' => $usulan // Kirim data usulan ke view
        ];

        // Load view untuk menampilkan data calon
        return view('pengusul/usulansaya', $data);
    }

    public function usulandlhk()
    {
        $data['title'] = 'Usulan DLHK';
        return view('pengusul/usulandlhk', ['title' => 'Usulan DLHK']);
    }

    public function detailusulansaya($id)
    {
        $Model = new PendaftaranModel();
        $pendaftaran = $Model->getDetailById($id);

        // Validasi jika data ditemukan atau tidak
        if (!$pendaftaran) {
            return redirect()->to('/pengusul/usulansaya')->with('error', 'Data tidak ditemukan.');
        }

        $temaKegiatan = [
            ['value' => 'Keanekaragaman Hayati', 'label' => 'Keanekaragaman Hayati'],
            ['value' => 'Perubahan Iklim', 'label' => 'Perubahan Iklim'],
            ['value' => 'Pencemaran dan Kerusakan Lingkungan', 'label' => 'Pencemaran dan Kerusakan Lingkungan'],
            ['value' => 'Hukum dan Budaya', 'label' => 'Hukum dan Budaya']
        ];

        // Ambil data dari semua tabel terkait menggunakan join
        $data = [
            'title' => 'Usulan Saya',
            'pendaftaran' => $pendaftaran,
            'temaKegiatan' => $temaKegiatan
        ];

        return view('pengusul/detailusulansaya', $data);
    }
    public function detailusulansayaedit()
    {
        $data['title'] = 'Edit Detail Usulan Saya';
        return view('pengusul/detailusulansayaedit', ['title' => 'Edit Detail Usulan Saya']);
    }
    public function detailusulandlhk()
    {
        $data['title'] = 'Detail Usulan DLHK';
        return view('pengusul/detailusulandlhk', ['title' => 'Detail Usulan DLHK']);
    }

    public function tambahartikel()
    {
        // Mengambil ID pengusul dari session
        $data = [
            'title' => 'Tambah Artikel',
            'id_pengusul' => session()->get('id_pengusul'),
        ];

        return view('pengusul/tambahartikel', $data);
    }

    public function tambahArtikelAction()
    {
        $model = new ArtikelModel();

        // Ambil input dari formulir
        $judulArtikel = $this->request->getPost('judul_artikel');
        $konten = $this->request->getPost('konten');

        // Memproses foto yang diupload
        $foto = $this->request->getFile('foto');

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul_artikel' => 'required|min_length[3]|max_length[255]',
            'konten' => 'required',
            'foto' => 'uploaded[foto]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,2048]',
        ]);

        if (!$this->validate($validation->getRules())) { // Memperbaiki cara validasi
            return $this->response->setJSON([
                'success' => false,
                'messages' => $validation->getErrors(),
            ]);
        }

        // Menyimpan foto jika ada
        // $fotoPath = '';
        // if ($foto->isValid() && !$foto->hasMoved()) {
        //     // Generate nama file unik
        //     $fotoPath = 'uploads/artikel/' . uniqid() . '-' . $foto->getName();
        //     // Pindahkan file ke folder tujuan
        //     $foto->move('uploads/artikel', $fotoPath);
        // }

        // Menangani upload file foto
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Memastikan tipe file adalah jpg/jpeg/png
            if (in_array($foto->getClientMimeType(), ['image/jpeg', 'image/png'])) {
                $fotoPath = $foto->store('artikel', $foto->getRandomName());
            } else {
                return $this->response->setJSON(['success' => false, 'errors' => 'Invalid file type. Only JPG and PNG files are allowed']);
            }
        }

        // Simpan data artikel ke dalam database
        $dataArtikel = [
            'id_pengusul' => session()->get('id_pengusul'), // Ambil id_pengusul dari session
            'judul' => $judulArtikel,
            'konten' => $konten,
            'foto' => $fotoPath,
        ];

        // Simpan artikel
        if ($model->insert($dataArtikel)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Artikel berhasil ditambahkan.']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal menambahkan artikel.']);
        }
    }

    public function artikelsaya()
    {
        $model = new ArtikelModel(); // Gantilah ini dengan nama model yang sesuai untuk artikel
        $id_pengusul = session()->get('id_pengusul'); // Mengambil id_pengusul dari session

        // Mengambil artikel berdasarkan id_pengusul
        $data['artikels'] = $model->where('id_pengusul', $id_pengusul)->findAll();

        // Menyiapkan data untuk view
        $data['title'] = 'Artikel Saya';

        // Menampilkan view dengan data artikel
        return view('pengusul/artikelsaya', $data);
    }

    public function detailartikel($id)
    {
        $Model = new ArtikelModel();
        $artikel = $Model->getDetailById($id);

        if (!$artikel) {
            return redirect()->to('/pengusul/artikelsaya')->with('error', 'Data tidak ditemukan.');
        }

        $data = [
            'title' => 'Detail Artikel Saya',
            'artikel' => $artikel, // Menambahkan data artikel
        ];
        return view('pengusul/detailartikelsaya', $data);
    }

    public function pemberitahuan()
    {
        $data['title'] = 'Pemberitahuan';
        return view('pengusul/pemberitahuan', ['title' => 'Pemberitahuan']);
    }
    public function alurpendaftaran()
    {
        $data['title'] = 'Alur Pendaftaran';
        return view('pengusul/alurpendaftaran', ['title' => 'Alur Pendaftaran']);
    }
    public function videopanduan()
    {
        $data['title'] = 'Video Panduan';
        return view('pengusul/videopanduan', ['title' => 'Video Panduan']);
    }
    public function panduanpendaftaran()
    {
        $data['title'] = 'Panduan Pendaftaran';
        return view('pengusul/panduanpendaftaran', ['title' => 'Panduan Pendaftaran']);
    }

    public function halamanLainnya()
    {
        $pengusulModel = new PengusulModel();
        $pengusul = $pengusulModel->where('id_pengusul', session()->get('id_pengusul'))->first();

        // Cek apakah semua field sudah diisi
        if (empty($pengusul['nama_instansi_pribadi']) || empty($pengusul['telepon']) || empty($pengusul['email'])) {
            return redirect()->to(base_url('pengusul/profil'))->with('error', 'Silakan lengkapi profil Anda terlebih dahulu.');
        }

        // Jika profil sudah lengkap, lanjutkan ke halaman lainnya
        return view('pengusul/halaman_lainnya');
    }
}
