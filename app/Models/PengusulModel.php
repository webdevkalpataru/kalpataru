<?php

namespace App\Models;

use CodeIgniter\Model;

class PengusulModel extends Model
{
    protected $table = 'pengusul';
    protected $primaryKey = 'id_pengusul';
    protected $allowedFields = [
        'id_admin', 'role_akun', 'jenis_instansi', 'nama_instansi_pribadi', 
        'telepon', 'email', 'kata_sandi', 'jabatan_pekerjaan', 'jenis_kelamin', 
        'status_akun', 'jalan', 'rt_rw', 'desa', 'kecamatan', 'kab_kota', 
        'provinsi', 'kode_pos', 'surat_pengantar'
    ];
}
