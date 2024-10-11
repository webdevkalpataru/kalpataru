<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'artikel'; // Nama tabel
    protected $primaryKey = 'id_artikel'; // Nama kolom primary key
    protected $allowedFields = [
        'id_artikel',
        'id_admin',
        'id_penerima',
        'id_pengusul',
        'judul_artikel',
        'konten',
        'foto',
        'status'
    ];
}
