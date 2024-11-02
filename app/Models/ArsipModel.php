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
}
