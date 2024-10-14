<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranModel extends Model
{
    // Untuk tabel pendaftaran
    protected $table = 'pendaftaran';
    protected $primaryKey = 'id_pendaftaran';
    protected $allowedFields = [
        'id_pengusul',
        'id_tim_teknis',
        'kode_registrasi',
        'kategori',
        'tanggal_pendaftaran',
        'status_pendaftaran',
        'catatan_verifikasi',
        'skor_sidang_1',
        'skor_sidang_2',
        'skor_dokumen',
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
        'tanggal_skck',
        'nama_kelompok',
        'jumlah_anggota',
        'tahun_pembentukan',
        'legalitas',
        'edit'
    ];

    public function getDetailById($id)
    {
        // Ambil data dari tabel pendaftaran dan join dengan tabel lainnya
        return $this->select('pendaftaran.*, kegiatan.id_pendaftaran AS kegiatan_id, dampak.id_pendaftaran AS dampak_id, pmik.id_pendaftaran AS pmik_id, keswadayaan.id_pendaftaran AS keswadayaan_id, keistimewaan.id_pendaftaran AS keistimewaan_id')
            ->join('kegiatan', 'kegiatan.id_pendaftaran = pendaftaran.id_pendaftaran', 'left')
            ->join('dampak', 'dampak.id_pendaftaran = pendaftaran.id_pendaftaran', 'left')
            ->join('pmik', 'pmik.id_pendaftaran = pendaftaran.id_pendaftaran', 'left')
            ->join('keswadayaan', 'keswadayaan.id_pendaftaran = pendaftaran.id_pendaftaran', 'left')
            ->join('keistimewaan', 'keistimewaan.id_pendaftaran = pendaftaran.id_pendaftaran', 'left')
            ->where('pendaftaran.id_pendaftaran', $id)
            ->first();        // Mengambil satu baris data berdasarkan ID

    }

    // Function to insert into 'kegiatan' table
    public function saveKegiatan($data)
    {
        // Sesuaikan dengan kolom yang ada di tabel kegiatan
        return $this->db->table('kegiatan')->insert($data);
    }

    // Method untuk menyimpan data dampak
    public function insertDampak($data)
    {
        // Sesuaikan dengan kolom yang ada di tabel dampak
        return $this->db->table('dampak')->insert($data);
    }

    // Method untuk menyimpan data PMIK
    public function insertPMIK($data)
    {
        // Sesuaikan dengan kolom yang ada di tabel PMIK
        return $this->db->table('pmik')->insert($data);
    }

    // Method untuk menyimpan data keswadayaan
    public function insertKeswadayaan($data)
    {
        $this->table = 'keswadayaan';  // Change the table to 'keswadayaan'
        $this->allowedFields = [
            'id_pendaftaran',
            'sumber_biaya',
            'teknologi_kegiatan',
            'status_lahan_kegiatan',
            'jumlah_kelompok_serupa'
        ];
        return $this->insert($data);  // Insert into 'keswadayaan' table
    }

    // Function to insert into 'keistimewaan' table
    public function saveKeistimewaan($data)
    {
        $this->table = 'keistimewaan';  // Change the table to 'keistimewaan'
        $this->allowedFields = [
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
        return $this->insert($data);  // Insert into 'keistimewaan' table
    }

    // Method to switch back to 'pendaftaran' table
    public function switchToPendaftaran()
    {
        $this->table = 'pendaftaran';
        $this->allowedFields = [
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
            'nama_ketua',
            'jumlah_anggota',
            'tahun_pembentukan',
            'legalitas'
        ];
    }


    // Method untuk mendapatkan data pendaftaran berdasarkan ID pengusul
    public function getPendaftaranByPengusul($id_pengusul)
    {
        return $this->where('id_pengusul', $id_pengusul)->findAll();
    }

    // Method untuk mendapatkan data pendaftaran berdasarkan status
    public function getPendaftaranByStatus($status_pendaftaran)
    {
        return $this->where('status_pendaftaran', $status_pendaftaran)->findAll();
    }

    // Method untuk membuat pendaftaran baru
    public function createPendaftaran($data)
    {
        return $this->insert($data);
    }

    // Method untuk memperbarui pendaftaran berdasarkan ID
    public function updatePendaftaran($id_pendaftaran, $data)
    {
        return $this->update($id_pendaftaran, $data);
    }

    // Method untuk menghapus pendaftaran berdasarkan ID
    public function deletePendaftaran($id_pendaftaran)
    {
        return $this->delete($id_pendaftaran);
    }

    public function getKegiatanByPendaftaranId($id_pendaftaran)
    {
        return $this->db->table('kegiatan')
            ->where('id_pendaftaran', $id_pendaftaran)
            ->get()
            ->getResultArray();
    }
}
