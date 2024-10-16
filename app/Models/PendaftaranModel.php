<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranModel extends Model
{
    // Default tabel yang digunakan
    protected $table = 'pendaftaran';
    protected $primaryKey = 'id_pendaftaran';
    protected $allowedFields = [
        'id_pendaftaran',
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
        'nama_kelompok',
        'nama_ketua',
        'jumlah_anggota',
        'tahun_pembentukan',
        'legalitas',
        'edit',
        'kode_registrasi',
        'status_dokumen',
        'skor_dokumen',
        'tanggal_skck',
        'tanggal_legalitas'
    ];

    public function getDetailById($id)
    {
        return $this->select('
                pendaftaran.*,
                kegiatan.id_kegiatan AS kegiatan_id, 
                kegiatan.*,
                dampak.id_dampak AS dampak_id, 
                dampak.*,
                pmik.id_pmik AS pmik_id, 
                pmik.*,
                keswadayaan.id_keswadayaan AS keswadayaan_id, 
                keswadayaan.*,
                keistimewaan.id_keistimewaan AS keistimewaan_id,
                keistimewaan.*,
            ')
            ->join('kegiatan', 'kegiatan.id_pendaftaran = pendaftaran.id_pendaftaran', 'left')
            ->join('dampak', 'dampak.id_pendaftaran = pendaftaran.id_pendaftaran', 'left')
            ->join('pmik', 'pmik.id_pendaftaran = pendaftaran.id_pendaftaran', 'left')
            ->join('keswadayaan', 'keswadayaan.id_pendaftaran = pendaftaran.id_pendaftaran', 'left')
            ->join('keistimewaan', 'keistimewaan.id_pendaftaran = pendaftaran.id_pendaftaran', 'left')
            ->where('pendaftaran.id_pendaftaran', $id)
            ->first();
    }

    // -------------------------------------------------------------------------

    public function getPendaftaranById($id)
    {
        return $this->find($id);
    }

    // ------------------IDENTITAS------------------
    public function insertIdentitas($data)
    {
        return $this->db->table('pendaftaran')->insert($data);
    }

    public function getIdentitasByIdPendaftaran($id_pendaftaran)
    {
        return $this->db->table('pendaftaran')->where('id_pendaftaran', $id_pendaftaran)->get()->getRowArray();
    }

    public function updateIdentitas($data, $where)
    {
        return $this->db->table('pendaftaran')->where($where)->update($data);
    }

    // ------------------KEGIATAN------------------
    public function insertKegiatan($data)
    {
        return $this->db->table('kegiatan')->insert($data);
    }

    public function getKegiatanByIdPendaftaran($id_pendaftaran)
    {
        return $this->db->table('kegiatan')->where('id_pendaftaran', $id_pendaftaran)->get()->getRowArray();
    }

    public function updateKegiatan($data, $where)
    {
        return $this->db->table('kegiatan')->where($where)->update($data);
    }

    // ------------------DAMPAK------------------
    public function insertDampak($data)
    {
        return $this->db->table('dampak')->insert($data);
    }

    public function getDampakByIdPendaftaran($id_pendaftaran)
    {
        return $this->db->table('dampak')->where('id_pendaftaran', $id_pendaftaran)->get()->getRowArray();
    }

    public function updateDampak($data, $where)
    {
        return $this->db->table('dampak')->where($where)->update($data);
    }

    // ------------------PMIK------------------
    public function insertPMIK($data)
    {
        return $this->db->table('pmik')->insert($data);
    }

    public function getPMIKByIdPendaftaran($id_pendaftaran)
    {
        return $this->db->table('pmik')->where('id_pendaftaran', $id_pendaftaran)->get()->getRowArray();
    }

    public function updatePMIK($data, $where)
    {
        return $this->db->table('pmik')->where($where)->update($data);
    }

    // ------------------KESWADAYAAN------------------
    public function insertKeswadayaan($data)
    {
        return $this->db->table('keswadayaan')->insert($data);
    }

    public function getKeswadayaanByIdPendaftaran($id_pendaftaran)
    {
        return $this->db->table('keswadayaan')->where('id_pendaftaran', $id_pendaftaran)->get()->getRowArray();
    }

    public function updateKeswadayaan($data, $where)
    {
        return $this->db->table('keswadayaan')->where($where)->update($data);
    }

    // ------------------KEISTIMEWAAN------------------
    public function insertKeistimewaan($data)
    {
        return $this->db->table('keistimewaan')->insert($data);
    }

    public function getKeistimewaanByIdPendaftaran($id_pendaftaran)
    {
        return $this->db->table('keistimewaan')->where('id_pendaftaran', $id_pendaftaran)->get()->getRowArray();
    }

    public function updateKeistimewaan($data, $where)
    {
        return $this->db->table('keistimewaan')->where($where)->update($data);
    }

    // -------------------------------------------------------------------------


    // Method untuk mendapatkan data pendaftaran berdasarkan ID pengusul
    public function getPendaftaranByPengusul($id_pengusul)
    {
        return $this->where('id_pengusul', $id_pengusul)->findAll();
    }

    // Method untuk mendapatkan data pendaftaran berdasarkan status
    public function getPendaftaranByStatus($status_pendaftaran)
    {
        return $this->where('status_pendaftaran', $status_pendaftaran)->findAll();
    }

    // Method untuk membuat pendaftaran baru
    public function createPendaftaran($data)
    {
        return $this->insert($data);
    }

    // Method untuk memperbarui pendaftaran berdasarkan ID
    public function updatePendaftaran($id_pendaftaran, $data)
    {
        return $this->update($id_pendaftaran, $data);
    }

    // Method untuk menghapus pendaftaran berdasarkan ID
    public function deletePendaftaran($id_pendaftaran)
    {
        return $this->delete($id_pendaftaran);
    }
}
