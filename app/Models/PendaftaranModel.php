<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranModel extends Model
{
    // Default table is pendaftaran
    protected $table = 'pendaftaran';
    protected $primaryKey = 'id_pendaftaran';
    protected $allowedFields = [
        // Fields for 'pendaftaran' table
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

    // Function to insert into 'kegiatan' table
    public function saveKegiatan($data)
    {
        $this->table = 'kegiatan';  // Change the table to 'kegiatan'
        $this->allowedFields = [
            'id_pendaftaran',
            'tema',
            'sub_tema',
            'jenis_kegiatan',
            'tahun_mulai',
            'deskripsi_kegiatan',
            'lokasi_kegiatan',
            'pihak_dan_peran',
            'keberhasilan'
        ];
        return $this->insert($data);  // Insert into 'kegiatan' table
    }

    // Function to insert into 'dampak' table
    public function saveDampak($data)
    {
        $this->table = 'dampak';  // Change the table to 'dampak'
        $this->allowedFields = [
            'id_pendaftaran',
            'dampak_lingkungan',
            'dampak_ekonomi',
            'dampak_sosial_budaya'
        ];
        return $this->insert($data);  // Insert into 'dampak' table
    }

    // Function to insert into 'pmik' table
    public function savePmik($data)
    {
        $this->table = 'pmik';  // Change the table to 'pmik'
        $this->allowedFields = [
            'id_pendaftaran',
            'prakarsa',
            'motivasi',
            'inovasi',
            'krativitas'
        ];
        return $this->insert($data);  // Insert into 'pmik' table
    }

    // Function to insert into 'keswadayaan' table
    public function saveKeswadayaan($data)
    {
        $this->table = 'keswadayaan';  // Change the table to 'keswadayaan'
        $this->allowedFields = [
            'id_pendaftaran',
            'sumber_biaya',
            'teknologi_kegiatan',
            'status_lahan_kegiatan',
            'jumlah_kelompok_serupa'
        ];
        return $this->insert($data);  // Insert into 'keswadayaan' table
    }

    // Function to insert into 'keistimewaan' table
    public function saveKeistimewaan($data)
    {
        $this->table = 'keistimewaan';  // Change the table to 'keistimewaan'
        $this->allowedFields = [
            'id_pendaftaran',
            'keistimewaan',
            'penghargaan',
            'foto_kegiatan1',
            'foto_kegiatan2',
            'foto_kegiatan3',
            'foto_kegiatan4',
            'foto_kegiatan5',
            'deskripsi_foto_kegiatan1',
            'deskripsi_foto_kegiatan2',
            'deskripsi_foto_kegiatan3',
            'deskripsi_foto_kegiatan4',
            'deskripsi_foto_kegiatan5',
            'tautan_video',
            'tautan_dokumen_pendukung'
        ];
        return $this->insert($data);  // Insert into 'keistimewaan' table
    }

    // Method to switch back to 'pendaftaran' table
    public function switchToPendaftaran()
    {
        $this->table = 'pendaftaran';
        $this->allowedFields = [
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

    public function getDataByPengusul($id_pengusul)
    {
        return $this->where('id_pengusul', $id_pengusul)->findAll();
    }
}
