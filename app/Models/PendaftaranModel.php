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

    public function insertIdentitas($data)
    {
        return $this->insert($data);
    }

    // Method untuk menyimpan data kegiatan
    public function insertKegiatan($data)
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
        // Sesuaikan dengan kolom yang ada di tabel keswadayaan
        return $this->db->table('keswadayaan')->insert($data);
    }

    // Method untuk menyimpan data keistimewaan
    public function insertKeistimewaan($data)
    {
        // Sesuaikan dengan kolom yang ada di tabel keistimewaan
        return $this->db->table('keistimewaan')->insert($data);
    }
}
