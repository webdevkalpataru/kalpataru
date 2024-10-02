<?php

namespace App\Models;

use CodeIgniter\Model;

class PengusulModel extends Model
{
    protected $table = 'pengusul'; // Nama tabel
    protected $primaryKey = 'id_pengusul'; // Nama kolom primary key
    protected $allowedFields = [
        'id_admin',
        'role_akun',
        'jenis_instansi',
        'nama_instansi_pribadi',
        'telepon',
        'email',
        'kata_sandi',
        'jabatan_pekerjaan',
        'jenis_kelamin',
        'status_akun',
        'jalan',
        'rt_rw',
        'desa',
        'kecamatan',
        'kab_kota',
        'provinsi',
        'kode_pos',
        'surat_pengantar'
    ];

    public function login($email, $password)
    {
        // Ambil data pengguna berdasarkan email
        $user = $this->where('email', $email)->first();

        // Cek apakah pengguna ada dan verifikasi kata sandi
        if ($user && password_verify($password, $user['kata_sandi'])) {
            return $user; // Mengembalikan data pengguna jika berhasil
        }

        return false; // Mengembalikan false jika login gagal
    }

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first(); // Asumsi menggunakan CodeIgniter Model
    }

    public function createPengusul($data)
    {
        return $this->insert($data);
    }
}
