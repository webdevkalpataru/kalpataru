<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranModel extends Model
{
    protected $table = 'pendaftaran';
    protected $primaryKey = 'id_pendaftaran';
    protected $allowedFields = [
        'id_pengusul',
        'id_tim_teknis',
        'kategori',
        'tanggal_pendaftaran',
        'status_pendaftaran',
        'catatan_verifikasi',
        'skor_sidang_1',
        'skor_sidang_2',
        'nama',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'usia',
        'jenis_kelamin',
        'jalan',
        'rt_rw',
        'desa',
        'kecamatan',
        'kab_kota',
        'provinsi',
        'kode_pos',
        'pekerjaan',
        'telepon',
        'email',
        'sosial_media',
        'pendidikan',
        'ktp',
        'skck',
        'nama_kelompok',
        'jumlah_anggota',
        'tahun_pembentukan',
        'legalitas'
    ];

    // Untuk tabel kegiatan
    protected $kegiatanTable = 'kegiatan';
    protected $kegiatanAllowedFields = [
        'id_pendaftaran',
        'tema',
        'sub_tema',
        'jenis_kegiatan',
        'tahun_mulai',
        'deskripsi_kegiatan',
        'lokasi_kegiatan',
        'pihak_dan_peran',
        'keberhasilan'
    ];

    // Untuk tabel dampak
    protected $dampakTable = 'dampak';
    protected $dampakAllowedFields = [
        'id_pendaftaran',
        'dampak_lingkungan',
        'dampak_ekonomi',
        'dampak_sosial_budaya'
    ];

    // Untuk tabel PMIK
    protected $pmikTable = 'pmik';
    protected $pmikAllowedFields = [
        'id_pendaftaran',
        'prakarsa',
        'motivasi',
        'inovasi',
        'krativitas'
    ];

    // Untuk tabel keswadayaan
    protected $keswadayaanTable = 'keswadayaan';
    protected $keswadayaanAllowedFields = [
        'id_pendaftaran',
        'sumber_biaya',
        'teknologi_kegiatan',
        'status_lahan_kegiatan',
        'jumlah_kelompok_serupa'
    ];

    // Untuk tabel keistimewaan
    protected $keistimewaanTable = 'keistimewaan';
    protected $keistimewaanAllowedFields = [
        'id_pendaftaran',
        'keistimewaan',
        'penghargaan',
        'foto_kegiatan1',
        'foto_kegiatan2',
        'foto_kegiatan3',
        'foto_kegiatan4',
        'foto_kegiatan5',
        'deskripsi_foto_kegiatan1',
        'deskripsi_foto_kegiatan2',
        'deskripsi_foto_kegiatan3',
        'deskripsi_foto_kegiatan4',
        'deskripsi_foto_kegiatan5',
        'tautan_video',
        'tautan_dokumen_pendukung'
    ];

    // Metode untuk menyimpan data ke tabel pendaftaran
    public function simpanPendaftaran($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    // Simpan data kegiatan
    public function simpanKegiatan($data)
    {
        return $this->db->table($this->kegiatanTable)->insert($data);
    }

    // Simpan data dampak
    public function simpanDampak($data)
    {
        return $this->db->table($this->dampakTable)->insert($data);
    }

    // Simpan data PMIK
    public function simpanPMIK($data)
    {
        return $this->db->table($this->pmikTable)->insert($data);
    }

    // Simpan data keswadayaan
    public function simpanKeswadayaan($data)
    {
        return $this->db->table($this->keswadayaanTable)->insert($data);
    }

    // Simpan data keistimewaan
    public function simpanKeistimewaan($data)
    {
        return $this->db->table($this->keistimewaanTable)->insert($data);
    }

    // Simpan ke session sementara
    public function simpanKeSession($data)
    {
        session()->set('pendaftaranData', array_merge(session()->get('pendaftaranData') ?? [], $data));
    }

    // Ambil data dari session
    public function ambilDariSession()
    {
        return session()->get('pendaftaranData') ?? [];
    }

    public function simpanSemuaDataKeDatabase()
    {
        $pendaftaranData = $this->ambilDariSession();

        // Simpan ke tabel `pendaftaran`
        if (!$this->db->table($this->table)->insert($pendaftaranData)) {
            throw new \Exception('Gagal menyimpan data pendaftaran: ' . json_encode($this->db->error()));
        }

        $id_pendaftaran = $this->db->insertID();

        // Simpan ke tabel kegiatan
        if (!$this->db->table($this->kegiatanTable)->insert(array_merge($pendaftaranData, ['id_pendaftaran' => $id_pendaftaran]))) {
            throw new \Exception('Gagal menyimpan data kegiatan: ' . json_encode($this->db->error()));
        }

        // Simpan ke tabel dampak
        if (!$this->db->table($this->dampakTable)->insert(array_merge($pendaftaranData, ['id_pendaftaran' => $id_pendaftaran]))) {
            throw new \Exception('Gagal menyimpan data dampak: ' . json_encode($this->db->error()));
        }

        // Simpan ke tabel PMIK
        if (!$this->db->table($this->pmikTable)->insert(array_merge($pendaftaranData, ['id_pendaftaran' => $id_pendaftaran]))) {
            throw new \Exception('Gagal menyimpan data PMIK: ' . json_encode($this->db->error()));
        }

        // Simpan ke tabel keswadayaan
        if (!$this->db->table($this->keswadayaanTable)->insert(array_merge($pendaftaranData, ['id_pendaftaran' => $id_pendaftaran]))) {
            throw new \Exception('Gagal menyimpan data keswadayaan: ' . json_encode($this->db->error()));
        }

        // Simpan ke tabel keistimewaan
        if (!$this->db->table($this->keistimewaanTable)->insert(array_merge($pendaftaranData, ['id_pendaftaran' => $id_pendaftaran]))) {
            throw new \Exception('Gagal menyimpan data keistimewaan: ' . json_encode($this->db->error()));
        }

        // Clear session data
        session()->remove('pendaftaranData');
    }
}
