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
        'judul',
        'konten',
        'foto',
        'status',
        'tanggal',
        'slug'
    ];

    public function getDetailById($id)
    {
        return $this->where('id_artikel', $id)->first();
    }

    public function getDetailBySlug($slug)
    {
        return $this->where('slug', $slug)->first(); // Misalkan Anda memiliki kolom slug dalam tabel artikel
    }
}
