<?php

namespace App\Controllers;

use App\Models\PengusulModel; // Pastikan model user sudah ada

class AuthController extends BaseController
{
    public function login()
    {
        $data['title'] = "Masuk Akun";
        return view('auth/login', ['title' => 'Login']);
    }

    public function loginAction()
    {
        $model = new PengusulModel();

        // Ambil input dari formulir
        $email = $this->request->getPost('email');
        $kataSandi = $this->request->getPost('kata_sandi');

        // Cari pengguna berdasarkan email
        $user = $model->where('email', $email)->first();

        // Periksa apakah pengguna ditemukan
        if ($user) {
            // Verifikasi kata sandi
            if (password_verify($kataSandi, $user['kata_sandi'])) {
                // Cek status akun
                if ($user['status_akun'] === 'Aktif') {
                    $sessionData = [
                        'id_pengusul' => $user['id_pengusul'],
                        'nama' => $user['nama_instansi_pribadi'],
                        'email' => $user['email'],
                        'role_akun' => $user['role_akun'],
                        'provinsi' => $user['provinsi'],
                        'jenis_instansi' => $user['jenis_instansi'],
                        'telepon' => $user['telepon'],
                        'jabatan_pekerjaan' => $user['jabatan_pekerjaan'],
                        'jenis_kelamin' => $user['jenis_kelamin'],
                        'jalan' => $user['jalan'],
                        'rt_rw' => $user['rt_rw'],
                        'desa' => $user['desa'],
                        'kecamatan' => $user['kecamatan'],
                        'kab_kota' => $user['kab_kota'],
                        'kode_pos' => $user['kode_pos'],
                        'surat_pengantar' => $user['surat_pengantar'],
                        'logged_in' => true,
                    ];
                    session()->set($sessionData);

                    // Kembalikan URL untuk redirect sesuai role_akun
                    return $this->response->setJSON(['success' => true, 'redirectUrl' => '/pengusul/profil']);
                } else {
                    return $this->response->setJSON(['success' => false, 'message' => 'Akun Anda belum aktif.']);
                }
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Kata sandi salah.']);
            }
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Pengguna tidak ditemukan.']);
        }
    }

    public function logoutAction()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }

    public function register()
    {
        $provinsi_list = [
            'Aceh',
            'Bali',
            'Bangka Belitung',
            'Banten',
            'Bengkulu',
            'DI Yogyakarta',
            'DKI Jakarta',
            'Gorontalo',
            'Jambi',
            'Jawa Barat',
            'Jawa Tengah',
            'Jawa Timur',
            'Kalimantan Barat',
            'Kalimantan Selatan',
            'Kalimantan Tengah',
            'Kalimantan Timur',
            'Kalimantan Utara',
            'Kepulauan Bangka Belitung',
            'Kepulauan Riau',
            'Lampung',
            'Maluku',
            'Maluku Utara',
            'Nusa Tenggara Barat',
            'Nusa Tenggara Timur',
            'Papua',
            'Papua Barat',
            'Papua Barat Daya',
            'Papua Pegunungan',
            'Papua Selatan',
            'Papua Tengah',
            'Riau',
            'Sulawesi Barat',
            'Sulawesi Selatan',
            'Sulawesi Tengah',
            'Sulawesi Tenggara',
            'Sulawesi Utara',
            'Sumatera Barat',
            'Sumatera Selatan',
            'Sumatera Utara'
        ];

        $data['title'] = 'Daftar Akun';
        $data['provinsi_list'] = $provinsi_list;

        return view('auth/register', $data);
    }

    public function createRegister()
    {
        $model = new PengusulModel();

        $email = $this->request->getPost('email');
        $existingUser = $model->where('email', $email)->first();

        if ($existingUser) {
            return $this->response->setJSON(['success' => false, 'errors' => 'Email sudah terdaftar']);
        }

        $file = $this->request->getFile('surat_pengantar');
        $filePath = '';

        if ($file && $file->isValid() && !$file->hasMoved()) {
            if ($file->getClientMimeType() == 'application/pdf') {
                $filePath = $file->store('suratpengantar', $file->getRandomName());
            } else {
                return $this->response->setJSON(['success' => false, 'errors' => 'Invalid file type. Only PDF files are allowed']);
            }
        }

        $data = [
            'jenis_instansi' => $this->request->getPost('jenis_instansi'),
            'nama_instansi_pribadi' => $this->request->getPost('nama_instansi_pribadi'),
            'provinsi' => $this->request->getPost('provinsi'),
            'telepon' => $this->request->getPost('telepon'),
            'email' => $email,
            'kata_sandi' => password_hash($this->request->getPost('kata_sandi'), PASSWORD_DEFAULT),
            'role_akun' => 'Pengusul',
            'status_akun'  => 'Pending',
            'surat_pengantar' => $filePath
        ];

        if ($model->insert($data)) {
            return $this->response->setJSON(['success' => true]);
        } else {
            log_message('error', 'Registration failed: ' . json_encode($model->errors()));
            return $this->response->setJSON(['success' => false, 'errors' => $model->errors()]);
        }
    }

    public function downloadSuratPengantar($filename)
    {
        $filePath = WRITEPATH . 'uploads/suratpengantar/' . $filename;

        if (file_exists($filePath)) {
            return $this->response->download($filePath, null)->setFileName($filename);
        } else {
            return $this->response->setJSON(['success' => false, 'errors' => 'File not found.']);
        }
    }
}
