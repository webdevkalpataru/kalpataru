<?php

namespace App\Models;

use CodeIgniter\Model;

class PenerimaModel extends Model
{
    protected $table = 'penerima';
    protected $primaryKey = 'id_penerima';
    protected $allowedFields = [
        'id_admin',
        'nama',
        'email',
        'kata_sandi',
        'instagram',
        'facebook',
        'youtube',
        'status_akun'
    ];
}
