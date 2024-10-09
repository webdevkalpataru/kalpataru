<?php

namespace App\Controllers;

use App\Models\PengusulModel;
use App\Models\PendaftaranModel;


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
        $PendaftaranModel = new PendaftaranModel();
        $id_pengusul = $this->request->getPost('id_pengusul');
        $kategori = $this->request->getPost('kategori');

        $data = [
            'id_pengusul' => $id_pengusul,
            'kategori' => $kategori,
            'tanggal_pendaftaran' => date('Y-m-d H:i:s')
        ];

        if ($PendaftaranModel->insert($data)) {
            // Dapatkan ID dari pendaftaran yang baru disimpan
            $id_pendaftaran = $PendaftaranModel->insertID();

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

    public function simpanCalonIdentitas()
    {
        $PendaftaranModel = new PendaftaranModel();

        // Ambil id_pendaftaran dari session
        $id_pendaftaran = session()->get('id_pendaftaran');
        $kategori = session()->get('kategori');

        if ($kategori == 'Penyelamat Lingkungan') {
            $data = [
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

            // Update data berdasarkan id_pendaftaran
            $PendaftaranModel->update($id_pendaftaran, $data);
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

            // Update data berdasarkan id_pendaftaran
            $PendaftaranModel->update($id_pendaftaran, $data);
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
        $PendaftaranModel = new PendaftaranModel();

        // Ambil id_pendaftaran dari session
        $id_pendaftaran = session()->get('id_pendaftaran');

        // Data dari form kegiatan
        $data = [
            'id_pendaftaran' => $id_pendaftaran,
            'tema' => $this->request->getPost('tema'),
            'sub_tema' => $this->request->getPost('sub_tema'),
            'jenis_kegiatan' => $this->request->getPost('jenis_kegiatan'),
            'tahun_mulai' => $this->request->getPost('tahun_mulai'),
            'deskripsi_kegiatan' => $this->request->getPost('deskripsi_kegiatan'),
            'lokasi_kegiatan' => $this->request->getPost('lokasi_kegiatan'),
            'pihak_dan_peran' => $this->request->getPost('pihak_dan_peran'),
            'keberhasilan' => $this->request->getPost('keberhasilan')
        ];

        // Simpan data ke tabel 'kegiatan'
        $PendaftaranModel->saveKegiatan($data);

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
        $PendaftaranModel = new PendaftaranModel();

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
        $PendaftaranModel->saveDampak($data);

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
        $PendaftaranModel = new PendaftaranModel();

        // Ambil id_pendaftaran dari session
        $id_pendaftaran = session()->get('id_pendaftaran');

        // Data dari form Pmik
        $data = [
            'id_pendaftaran' => $id_pendaftaran,
            'prakarsa' => $this->request->getPost('prakarsa'),
            'motivasi' => $this->request->getPost('motivasi'),
            'inovasi' => $this->request->getPost('inovasi'),
            'krativitas' => $this->request->getPost('krativitas')
        ];

        // Simpan data ke tabel 'pmik'
        $PendaftaranModel->savePmik($data);

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
        $PendaftaranModel = new PendaftaranModel();

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
        $PendaftaranModel->saveKeswadayaan($data);

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
        $PendaftaranModel = new PendaftaranModel();

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
        $PendaftaranModel->saveKeistimewaan($data);

        return redirect()->to('pengusul/usulansaya')->with('success', 'Keistimewaan berhasil disimpan.');
    }


    public function usulansaya()
    {
        $PendaftaranModel = new PendaftaranModel();

        // Ambil ID pengusul dari session
        $id_pengusul = session()->get('id_pengusul');

        // Ambil data pendaftaran berdasarkan ID pengusul
        $data['pendaftaran'] = $PendaftaranModel->getDataByPengusul($id_pengusul);

        // Load view untuk menampilkan data calon
        return view('pengusul/usulansaya', $data);
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
