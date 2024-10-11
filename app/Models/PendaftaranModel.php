<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranModel extends Model
{
    protected $table = 'pendaftaran'; // Nama tabel pendaftaran
    protected $primaryKey = 'id_pendaftaran'; // Primary key

    // Kolom yang diizinkan untuk diisi secara massal
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
}
