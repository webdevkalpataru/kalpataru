<?php

namespace App\Controllers;

use App\Models\PendaftaranModel;
use App\Models\PengusulModel;
use App\Models\IdentitasModel;
// use CodeIgniter\Controller;

class PengusulController extends BaseController
{
    protected $pengusulModel, $pendaftaranModel;

    public function __construct()
    {
        $this->pendaftaranModel = new PendaftaranModel();
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
        $Model = new IdentitasModel();
        $id_pengusul = $this->request->getPost('id_pengusul');
        $kategori = $this->request->getPost('kategori');

        $data = [
            'id_pengusul' => $id_pengusul,
            'kategori' => $kategori,
            'tanggal_pendaftaran' => date('Y-m-d H:i:s')
        ];

        if ($Model->insert($data)) {
            // Dapatkan ID dari pendaftaran yang baru disimpan
            $id_pendaftaran = $Model->insertID();

            session()->set('id_pendaftaran', $id_pendaftaran);
            session()->set('kategori', $kategori);

            return redirect()->to('pengusul/tambahcalonidentitas')->with('success', 'Kategori berhasil disimpan.');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
        }
    }

    public function tambahCalonIdentitas()
    {
        $id_pendaftaran = session()->get('id_pendaftaran');
        $kategori = session()->get('kategori');

        if (!$id_pendaftaran || !$kategori) {
            return redirect()->back()->with('error', 'Data kategori atau pendaftaran tidak ditemukan.');
        }

        return view('pengusul/tambahcalonidentitas', [
            'id_pendaftaran' => $id_pendaftaran,
            'kategori' => $kategori
        ]);
    }

    public function inputIdentitas()
    {
        $Model = new IdentitasModel();

        $id_pendaftaran = session()->get('id_pendaftaran');
        $kategori = session()->get('kategori');

        // Cek apakah kategori yang dipilih adalah penyelamat lingkungan
        if ($kategori == 'Penyelamat Lingkungan') {
            $data = [
                'id_pendaftaran' => $id_pendaftaran,
                'nama' => $this->request->getPost('nama_kelompok'),
                'tahun_berdiri' => $this->request->getPost('tahun_berdiri'),
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

            // Simpan ke database
            $Model->insert($data);
        } else {
            $data = [
                'id_pendaftaran' => $id_pendaftaran,
                'nama_individu' => $this->request->getPost('nama'),
                'nik_individu' => $this->request->getPost('nik'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'usia' => $this->request->getPost('usia'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'pekerjaan' => $this->request->getPost('pekerjaan'),
                'telepon' => $this->request->getPost('telepon'),
                'email' => $this->request->getPost('email'),
                'jalan' => $this->request->getPost('jalan'),
                'rt_rw' => $this->request->getPost('rt_rw'),
                'desa' => $this->request->getPost('desa'),
                'kecamatan' => $this->request->getPost('kecamatan'),
                'kab_kota' => $this->request->getPost('kab_kota'),
                'provinsi' => $this->request->getPost('provinsi'),
                'kode_pos' => $this->request->getPost('kode_pos'),
                'pendidikan' => $this->request->getPost('pendidikan'),
                'media_sosial' => $this->request->getPost('sosial_media'),
            ];

            // Simpan ke database
            $Model->insert($data);
        }

        // Redirect atau kembalikan response berhasil
        return redirect()->to('pengusul/tambahcalonkegiatan');
    }

    public function tambahcalonkegiatan()
    {
        $data['title'] = 'Tambah Kegiatan';
        return view('pengusul/tambahcalonkegiatan', $data);
    }

    public function simpanCalonKegiatan()
    {
        $data = [
            'tema' => $this->request->getPost('tema'),
            'sub_tema' => $this->request->getPost('sub_tema'),
            'jenis_kegiatan' => $this->request->getPost('jenis_kegiatan'),
            'tahun_mulai' => $this->request->getPost('tahun_mulai'),
            'deskripsi_kegiatan' => $this->request->getPost('deskripsi_kegiatan'),
            'lokasi_kegiatan' => $this->request->getPost('lokasi_kegiatan'),
            'pihak_dan_peran' => $this->request->getPost('pihak_dan_peran'),
            'keberhasilan' => $this->request->getPost('keberhasilan'),
        ];

        $this->pendaftaranModel->simpanKeSession($data);

        return redirect()->to('pengusul/tambahcalondampak');
    }



    public function tambahcalondampak()
    {
        $data['title'] = 'Tambah Dampak';
        return view('pengusul/tambahcalondampak', $data);
    }

    public function simpanCalonDampak()
    {
        $data = [
            'dampak_lingkungan' => $this->request->getPost('dampak_lingkungan'),
            'dampak_ekonomi' => $this->request->getPost('dampak_ekonomi'),
            'dampak_sosial_budaya' => $this->request->getPost('dampak_sosial_budaya'),
        ];

        $this->pendaftaranModel->simpanKeSession($data);

        return redirect()->to('pengusul/tambahcalonpmik');
    }


    public function tambahcalonpmik()
    {
        $data['title'] = 'Tambah PMIK';
        return view('pengusul/tambahcalonpmik', $data);
    }

    public function simpanCalonPmik()
    {
        $data = [
            'prakarsa' => $this->request->getPost('prakarsa'),
            'motivasi' => $this->request->getPost('motivasi'),
            'inovasi' => $this->request->getPost('inovasi'),
            'krativitas' => $this->request->getPost('krativitas'),
        ];

        $this->pendaftaranModel->simpanKeSession($data);

        return redirect()->to('pengusul/tambahcalonkeswadayaan');
    }


    public function tambahcalonkeswadayaan()
    {
        $data['title'] = 'Tambah Keswadayaan';
        return view('pengusul/tambahcalonkeswadayaan', $data);
    }

    public function simpanCalonKeswadayaan()
    {
        $data = [
            'sumber_biaya' => $this->request->getPost('sumber_biaya'),
            'teknologi_kegiatan' => $this->request->getPost('teknologi_kegiatan'),
            'status_lahan_kegiatan' => $this->request->getPost('status_lahan_kegiatan'),
            'jumlah_kelompok_serupa' => $this->request->getPost('jumlah_kelompok_serupa'),
        ];

        $this->pendaftaranModel->simpanKeSession($data);

        return redirect()->to('pengusul/tambahcalonkeistimewaan');
    }


    public function tambahcalonkeistimewaan()
    {
        $data['title'] = 'Tambah Keistimewaan';
        return view('pengusul/tambahcalonkeistimewaan', $data);
    }
    public function simpanCalonKeistimewaan()
    {
        $data = [
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

        // Simpan data ke session
        $this->pendaftaranModel->simpanKeSession($data);

        // Redirect ke function selesai untuk penyimpanan semua data ke database
        return redirect()->to(base_url('pengusul/selesai'));
    }



    public function selesai()
    {
        // Ambil data dari session
        $pendaftaranData = $this->pendaftaranModel->ambilDariSession();

        if (!empty($pendaftaranData)) {
            try {
                // Simpan semua data ke database
                $this->pendaftaranModel->simpanSemuaDataKeDatabase();

                // Hapus data dari session setelah penyimpanan selesai
                session()->remove('pendaftaranData');

                // Redirect ke halaman konfirmasi atau halaman sukses
                return view('pengusul/usulansaya');
            } catch (\Exception $e) {
                // Tangkap kesalahan dan log
                log_message('error', 'Error saat menyimpan data: ' . $e->getMessage());

                // Redirect kembali dengan pesan error
                return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
            }
        } else {
            // Jika data di session kosong, tampilkan pesan error
            return redirect()->back()->with('error', 'Data tidak ditemukan, silakan isi semua form.');
        }
    }

    public function usulansaya()
    {
        $data['title'] = 'Usulan Saya';
        return view('pengusul/usulansaya', ['title' => 'Usulan Saya']);
    }
    public function usulandlhk()
    {
        $data['title'] = 'Usulan DLHK';
        return view('pengusul/usulandlhk', ['title' => 'Usulan DLHK']);
    }

    public function detailusulansaya()
    {
        $data['title'] = 'Detail Usulan Saya';
        return view('pengusul/detailusulansaya', ['title' => 'Detail Usulan Saya']);
    }
    public function detailusulandlhk()
    {
        $data['title'] = 'Detail Usulan DLHK';
        return view('pengusul/detailusulandlhk', ['title' => 'Detail Usulan DLHK']);
    }
    public function tambahartikel()
    {
        $data['title'] = 'Tambah Artikel';
        return view('pengusul/tambahartikel', ['title' => 'Tambah Artikel']);
    }
    public function artikelsaya()
    {
        $data['title'] = 'Artikel Saya';
        return view('pengusul/artikelsaya', ['title' => 'Artikel Saya']);
    }
    public function detailartikelsaya()
    {
        $data['title'] = 'Detail Artikel Saya';
        return view('pengusul/detailartikelsaya', ['title' => 'Detail Artikel Saya']);
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
