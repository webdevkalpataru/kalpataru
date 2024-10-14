<?php

namespace App\Controllers;

use App\Models\PengusulModel;
use App\Models\PendaftaranModel;
use App\Models\ArtikelModel;
use Dompdf\Dompdf;
use Dompdf\Options;
// use CodeIgniter\Controller;

class PengusulController extends BaseController
{
    protected $PendaftaranModel;

    public function __construct()
    {
        $this->PendaftaranModel = new PendaftaranModel();
    }

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

        // Validasi file upload untuk KTP (JPG/JPEG) dan SKCK (PDF)
        $validationRule = [
            'ktp' => [
                'uploaded[ktp]',
                'mime_in[ktp,image/jpg,image/jpeg]',
                'max_size[ktp,1024]',
            ],
            'skck' => [
                'uploaded[skck]',
                'mime_in[skck,application/pdf]',
                'max_size[skck,1024]',
            ]
        ];

        if (!$this->validate($validationRule)) {
            return redirect()->back()->withInput()->with('error', 'Validasi file gagal. Pastikan format dan ukuran file benar.');
        }

        // Simpan file KTP
        $ktpFile = $this->request->getFile('ktp');
        if ($ktpFile->isValid() && !$ktpFile->hasMoved()) {
            $ktpFileName = $ktpFile->getRandomName();
            $ktpFile->store('ktp', $ktpFileName);
        }

        // Simpan file SKCK
        $skckFile = $this->request->getFile('skck');
        if ($skckFile->isValid() && !$skckFile->hasMoved()) {
            $skckFileName = $skckFile->getRandomName();
            $skckFile->store('skck', $skckFileName);
        }

        // Simpan data lainnya tergantung kategori
        if ($pendaftaranData['kategori'] == 'Penyelamat Lingkungan') {
            $data = [
                'nama' => $this->request->getPost('nama'),
                'tahun_pembentukan' => $this->request->getPost('tahun_pembentukan'),
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
                'nik' => $this->request->getPost('nik'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'usia' => $this->request->getPost('usia'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'pekerjaan' => $this->request->getPost('pekerjaan'),
                'telepon' => $this->request->getPost('telepon'),
                'email' => $this->request->getPost('email'),
                'pendidikan' => $this->request->getPost('pendidikan'),
                'tanggal_skck' => $this->request->getPost('tanggal_skck'),
                'ktp' => $ktpFileName,
                'skck' => $skckFileName
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
                'tanggal_skck' => $this->request->getPost('tanggal_skck'),
                'ktp' => $ktpFileName,
                'skck' => $skckFileName
            ];
        }

        // Gabungkan data identitas dengan data pendaftaran sebelumnya dari session
        $finalData = array_merge($pendaftaranData, $data);

        // Simpan data ke database
        if ($Model->insert($finalData)) {
            // Hapus session setelah data disimpan
            session()->remove('pendaftaran_data');

            return redirect()->to('pengusul/usulansaya')->with('success', 'Identitas berhasil disimpan.');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }


    // -------------------------------------------------------------------------------------------------------------------

    public function simpanForm($formType)
    {
        $model = new PendaftaranModel();
        $id_pendaftaran = session()->get('id_pendaftaran');

        if (!$id_pendaftaran) {
            return redirect()->back()->with('error', 'ID pendaftaran tidak ditemukan di session.');
        }

        switch ($formType) {
            case 'kegiatan':
                $data = [
                    'id_pendaftaran' => $id_pendaftaran,
                    'tema' => $this->request->getPost('tema'),
                    'sub_tema' => $this->request->getPost('sub_tema'),
                    'bentuk_kegiatan' => $this->request->getPost('bentuk_kegiatan'),
                    'tahun_mulai' => $this->request->getPost('tahun_mulai'),
                    'deskripsi_kegiatan' => $this->request->getPost('deskripsi_kegiatan'),
                    'lokasi_kegiatan' => $this->request->getPost('lokasi_kegiatan'),
                    'koordinat' => $this->request->getPost('koordinat'),
                    'pihak_dan_peran' => $this->request->getPost('pihak_dan_peran'),
                    'keberhasilan' => $this->request->getPost('keberhasilan'),
                ];

                $existingKegiatan = $model->getKegiatanByIdPendaftaran($id_pendaftaran);
                if ($existingKegiatan) {
                    $model->updateKegiatan($data, ['id_pendaftaran' => $id_pendaftaran]);
                } else {
                    $model->insertKegiatan($data);
                }
                break;

            case 'dampak':
                $dampak = $model->getDampakByIdPendaftaran($id_pendaftaran);
                $data = [
                    'id_pendaftaran' => $id_pendaftaran,
                    'dampak_lingkungan' => $this->request->getPost('dampak_lingkungan'),
                    'dampak_ekonomi' => $this->request->getPost('dampak_ekonomi'),
                    'dampak_sosial_budaya' => $this->request->getPost('dampak_sosial_budaya'),
                ];
                if ($dampak) {
                    $model->updateDampak($data, ['id_pendaftaran' => $id_pendaftaran]);
                } else {
                    $model->insertDampak($data);
                }
                break;

            case 'pmik':
                $pmik = $model->getPMIKByIdPendaftaran($id_pendaftaran);
                $data = [
                    'id_pendaftaran' => $id_pendaftaran,
                    'prakarsa' => $this->request->getPost('prakarsa'),
                    'motivasi' => $this->request->getPost('motivasi'),
                    'inovasi' => $this->request->getPost('inovasi'),
                    'kreativitas' => $this->request->getPost('kreativitas'),
                ];
                if ($pmik) {
                    $model->updatePMIK($data, ['id_pendaftaran' => $id_pendaftaran]);
                } else {
                    $model->insertPMIK($data);
                }
                break;

            case 'keswadayaan':
                $keswadayaan = $model->getKeswadayaanByIdPendaftaran($id_pendaftaran);
                $data = [
                    'id_pendaftaran' => $id_pendaftaran,
                    'sumber_biaya' => $this->request->getPost('sumber_biaya'),
                    'teknologi_kegiatan' => $this->request->getPost('teknologi_kegiatan'),
                    'status_lahan_kegiatan' => $this->request->getPost('status_lahan_kegiatan'),
                    'jumlah_kelompok_serupa' => $this->request->getPost('jumlah_kelompok_serupa'),
                ];
                if ($keswadayaan) {
                    $model->updateKeswadayaan($data, ['id_pendaftaran' => $id_pendaftaran]);
                } else {
                    $model->insertKeswadayaan($data);
                }
                break;

            case 'keistimewaan':
                $keistimewaan = $model->getKeistimewaanByIdPendaftaran($id_pendaftaran);
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
                    'tautan_dokumen_pendukung' => $this->request->getPost('tautan_dokumen_pendukung'),
                ];
                if ($keistimewaan) {
                    $model->updateKeistimewaan($data, ['id_pendaftaran' => $id_pendaftaran]);
                } else {
                    $model->insertKeistimewaan($data);
                }
                break;

            default:
                return redirect()->back()->with('error', 'Form tidak ditemukan.');
        }

        return redirect()->to('pengusul/detailusulan')->with('success', 'Data berhasil disimpan.');
    }


    public function detailUsulanSayaEdit($id)
    {
        $model = new PendaftaranModel();
        $pendaftaran = $model->getPendaftaranById($id);

        $kegiatan = $model->getKegiatanByIdPendaftaran($id);
        $dampak = $model->getDampakByIdPendaftaran($id);
        $pmik = $model->getPMIKByIdPendaftaran($id);
        $keswadayaan = $model->getKeswadayaanByIdPendaftaran($id);
        $keistimewaan = $model->getKeistimewaanByIdPendaftaran($id);

        if (!$pendaftaran) {
            return redirect()->to('pengusul/usulansaya')->with('error', 'Data tidak ditemukan.');
        }

        $data = [
            'pendaftaran' => $pendaftaran,
            'kegiatan' => $kegiatan,
            'dampak' => $dampak,
            'pmik' => $pmik,
            'keswadayaan' => $keswadayaan,
            'keistimewaan' => $keistimewaan,
        ];

        return view('pengusul/detailusulansayaedit', $data);
    }


    // -------------------------------------------------------------------------------------------------------------------


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

        // Ambil data dari semua tabel terkait menggunakan join
        $data = [
            'title' => 'Usulan Saya',
            'pendaftaran' => $pendaftaran,
        ];

        return view('pengusul/detailusulansaya', $data);
    }

    public function editUsulan($id)
    {
        $Model = new PendaftaranModel();
        $pendaftaran = $Model->getDetailById($id);

        // Validasi jika data ditemukan atau tidak
        if (!$pendaftaran) {
            return redirect()->to('/pengusul/usulansaya')->with('error', 'Data tidak ditemukan.');
        }

        session()->set('id_pendaftaran', $pendaftaran['id_pendaftaran']); // Menyimpan id_pendaftaran ke session

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

        $tema = [
            'Keanekaragaman Hayati',
            'Perubahan Iklim',
            'Pencemaran dan Kerusakan Lingkungan',
            'Hukum dan Budaya'
        ];

        $subtema = [
            'Pelestarian keanekaragaman hayati dan kawasan dilindungi yang meliputi pelestarian sumber daya genetik, jenis, dan ekosistem',
            'Pemanfaatan keanekaragaman hayati secara berkelanjutan',
            'Jasa lingkungan',
            'Adaptasi perubahan iklim',
            'Mitigasi Perubahan Iklim',
            'Penerapan ekonomi hijau dan ekonomi biru',
            'Penanganan pencemaran air, tanah, udara dari industri, pertanian, domestic terutama plastik',
            'Pencegahan dan penanggulangan kerusakan lingkungan',
            'Ekonomi Sirkular',
            'Keadilan terhadap pemanfaatan sumber daya alam dan lingkungan',
            'Kearifan tradisional dalam pengelolaan sumber daya alam',
            'Komunikasi dan pendidikan lingkungan hidup'
        ];

        // Ambil data dari semua tabel terkait menggunakan join
        $data = [
            'title' => 'Edit Usulan Saya',
            'pendaftaran' => $pendaftaran,
            'tema' => $tema,
            'sub_tema' => $subtema,
            'provinsi_list' => $provinsi_list
        ];
        return view('pengusul/detailusulansayaedit', $data);
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
            'judul_artikel' => 'required|min_length[3]|max_length[255]|regex_match[/^[a-zA-Z0-9\s\-\_\.\,]+$/]', // Regex untuk karakter yang diperbolehkan
            'konten' => 'required',
            'foto' => 'uploaded[foto]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,2048]',
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
            'id_pengusul' => session()->get('id_pengusul'),
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

    public function detailartikel($slug)
    {
        $Model = new ArtikelModel();
        $artikel = $Model->where('slug', $slug)->first(); // Ambil artikel berdasarkan slug

        if (!$artikel) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Ambil ID pengguna yang sedang login (baik admin maupun pengusul)
        $id_pengusul = session()->get('id_pengusul');
        $id_admin = session()->get('id_admin'); // Asumsi admin juga disimpan dalam session

        // Jika artikel masih ditangguhkan
        if ($artikel['status'] == 'Ditangguhkan') {
            // Cek apakah yang mengakses adalah admin atau pembuat artikel
            if (!$id_admin && $artikel['id_pengusul'] != $id_pengusul) {
                // Jika bukan admin atau pembuat artikel, tampilkan 404
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }

        $data = [
            'title' => 'Detail Artikel Saya',
            'artikel' => $artikel,
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

    public function generatePDF($kode_registrasi)
    {
        $id_pengusul = session()->get('id_pengusul');

        if (!$id_pengusul) {
            return redirect()->back()->with('error', 'Error');
        }

        $pendaftaranModel = new PendaftaranModel();
        $pengusulModel = new PengusulModel();

        $pendaftaranData = $pendaftaranModel->where('kode_registrasi', $kode_registrasi)->first();

        if (!$pendaftaranData || $pendaftaranData['id_pengusul'] != $id_pengusul) {
            return redirect()->back()->with('error', 'Error');
        }

        $pengusulData = $pengusulModel->where('id_pengusul', $id_pengusul)->first();

        $kegiatan = $pendaftaranModel->getKegiatanByPendaftaranId($pendaftaranData['id_pendaftaran']);
        $pendaftaranData['kegiatan'] = $kegiatan;

        $dampak = $pendaftaranModel->db->table('dampak')->where('id_pendaftaran', $pendaftaranData['id_pendaftaran'])->get()->getRowArray();
        $pmik = $pendaftaranModel->db->table('pmik')->where('id_pendaftaran', $pendaftaranData['id_pendaftaran'])->get()->getRowArray();
        $keswadayaan = $pendaftaranModel->db->table('keswadayaan')->where('id_pendaftaran', $pendaftaranData['id_pendaftaran'])->get()->getRowArray();
        $keistimewaan = $pendaftaranModel->db->table('keistimewaan')->where('id_pendaftaran', $pendaftaranData['id_pendaftaran'])->get()->getRowArray();

        $data = [
            'pendaftaran' => array_merge($pendaftaranData, [
                'dampak_lingkungan' => $dampak['dampak_lingkungan'] ?? '',
                'dampak_ekonomi' => $dampak['dampak_ekonomi'] ?? '',
                'dampak_sosial_budaya' => $dampak['dampak_sosial_budaya'] ?? '',
                'prakarsa' => $pmik['prakarsa'] ?? '',
                'motivasi' => $pmik['motivasi'] ?? '',
                'inovasi' => $pmik['inovasi'] ?? '',
                'krativitas' => $pmik['krativitas'] ?? '',
                'sumber_biaya' => $keswadayaan['sumber_biaya'] ?? '',
                'teknologi_kegiatan' => $keswadayaan['teknologi_kegiatan'] ?? '',
                'status_lahan_kegiatan' => $keswadayaan['status_lahan_kegiatan'] ?? '',
                'jumlah_kelompok_serupa' => $keswadayaan['jumlah_kelompok_serupa'] ?? '',
                'keistimewaan' => $keistimewaan['keistimewaan'] ?? '',
                'penghargaan' => $keistimewaan['penghargaan'] ?? ''
            ]),
            'pengusul' => $pengusulData,
            'kegiatan' => $kegiatan
        ];

        $kategori = $pendaftaranData['kategori'];
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

        session()->set('prefix', $prefix);

        $html = view('pengusul/pdf', $data);

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $options->set('defaultPaperSize', 'A4');
        $options->set('defaultPaperOrientation', 'portrait');
        $options->set('dpi', 150);
        $options->set('enable_php', false);
        $options->set('enable_javascript', true);
        $options->set('enable_html5_parser', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $dompdf->stream('laporan_calon_usulan.pdf', ['Attachment' => false]);
    }
}
