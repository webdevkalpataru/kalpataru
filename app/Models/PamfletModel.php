<?php

namespace App\Models;

use CodeIgniter\Model;

class PamfletModel extends Model
{
    protected $table = 'flayer'; // Nama tabel
    protected $primaryKey = 'id_flayer'; // Nama kolom primary key
    protected $allowedFields = [
        'foto',
        'status',
    ];

    // Aturan validasi
    protected $validationRules = [
        'foto' => 'permit_empty|max_length[255]', // Boleh kosong, maksimum 255 karakter
        'status' => 'required|in_list[Aktif,Nonaktif]', // Status harus diisi dan hanya bisa Aktif atau Nonaktif
    ];

    protected $validationMessages = [
        'status' => [
            'required' => 'Status harus dipilih.',
            'in_list' => 'Status tidak valid. Harus Aktif atau Nonaktif.',
        ],
        'foto' => [
            'max_length' => 'Nama file foto tidak boleh lebih dari 255 karakter.',
        ],
    ];

    protected $skipValidation = false; // Set ke true jika ingin melewati validasi

    // Fungsi tambahan jika diperlukan
    public function getPamflet($id_flayer = null)
    {
        if ($id_flayer) {
            return $this->asArray()->where(['id_flayer' => $id_flayer])->first();
        }
        return $this->findAll();
    }
}
