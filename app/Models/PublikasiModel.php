<?php

namespace App\Models;

use CodeIgniter\Model;

class PublikasiModel extends Model
{
    protected $table = 'video'; // Tabel utama
    protected $primaryKey = 'id_video';
    protected $allowedFields = ['link_video', 'judul_video'];

    // Tabel berita
    protected $beritaTable = 'berita';
    protected $beritaPrimaryKey = 'id_berita';
    protected $beritaAllowedFields = ['id_admin', 'judul', 'konten', 'foto', 'tanggal', 'status'];

    // Metode untuk mengambil semua berita
    public function getBerita()
    {
        return $this->db->table($this->beritaTable)->get()->getResult();
    }

    // Metode lain untuk tabel berita jika diperlukan
}
