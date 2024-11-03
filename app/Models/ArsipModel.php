<?php

namespace App\Models;

use CodeIgniter\Model;

class ArsipModel extends Model
{
    protected $table = 'arsip_penerima';
    protected $primaryKey = 'id_arsip_penerima';
    protected $allowedFields = [
        'id_admin',
        'nama',
        'usia',
        'foto_profil',
        'telepon',
        'email',
        'kategori',
        'tema',
        'sub_tema',
        'link_dokumentasi',
        'bentuk_kegiatan',
        'status',
        'jenis_kelamin',
        'tahun_penerimaan',
        'slogan',
        'kabupaten',
        'kecamatan',
        'desa',
        'profil',
        'nama_pengusul',
        'instansi_pengusul',
        'email_pengusul',
        'jabatan_pengusul',
        'telepon_pengusul',
        'provinsi'
    ];

    public function tambahArsip($data)
    {
        return $this->insert($data);
    }

    public function dataProvinsi()
    {
        $query = $this->db->query("
        SELECT 
            provinsi,
            SUM(CASE WHEN kategori = 'Perintis Lingkungan' THEN 1 ELSE 0 END) AS perintis,
            SUM(CASE WHEN kategori = 'Pengabdi Lingkungan' THEN 1 ELSE 0 END) AS pengabdi,
            SUM(CASE WHEN kategori = 'Penyelamat Lingkungan' THEN 1 ELSE 0 END) AS penyelamat,
            SUM(CASE WHEN kategori = 'Pembina Lingkungan' THEN 1 ELSE 0 END) AS pembina,
            COUNT(*) AS total
        FROM arsip_penerima
        GROUP BY provinsi
        ORDER BY provinsi DESC
    ");
        return $query->getResultArray();
    }

    public function dataKategori()
    {
        return $this->select("SUM(CASE WHEN kategori = 'Perintis Lingkungan' THEN 1 ELSE 0 END) AS total_perintis")
            ->select("SUM(CASE WHEN kategori = 'Pengabdi Lingkungan' THEN 1 ELSE 0 END) AS total_pengabdi")
            ->select("SUM(CASE WHEN kategori = 'Penyelamat Lingkungan' THEN 1 ELSE 0 END) AS total_penyelamat")
            ->select("SUM(CASE WHEN kategori = 'Pembina Lingkungan' THEN 1 ELSE 0 END) AS total_pembina")
            ->get()
            ->getRow();
    }
}
