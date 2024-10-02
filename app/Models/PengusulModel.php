<?php

namespace App\Models;

use CodeIgniter\Model;

class PengusulModel extends Model
{
    protected $table = 'pengusul';
    protected $primaryKey = 'id_pengusul';
    protected $allowedFields = ['nama_instansi_pribadi', 'email', 'password', 'telepon', 'provinsi', 'jenis_instansi', 'surat_pengantar', 'role_akun'];
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    // Hash the password before saving
    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }
}
