<?php

namespace App\Models;

use CodeIgniter\Model;

class IdentitasModel extends Model
{
    protected $table = 'pendaftaran'; // Nama tabel
    protected $primaryKey = 'id_pendaftaran'; // Nama kolom primary key
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
        'nama_ketua',
        'jumlah_anggota',
        'tahun_pembentukan',
        'legalitas'
    ];
}
