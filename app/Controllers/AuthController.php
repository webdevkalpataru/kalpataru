<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\PengusulModel;

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


    // BAGIAN AUTH ADMIN DPPK SEKRE
    public function logininternal()
    {
        $data['title'] = "Masuk Akun Internal";
        return view('auth/logininternal', ['title' => 'Login Internal']);
    }

    public function registerinternal()
    {
        $data['title'] = "Daftar Akun Internal";
        return view('auth/registerinternal', $data);
    }

    public function createRegisterInternal()
    {
        // Load validation service
        $validation = \Config\Services::validation();

        // Aturan validasi untuk form pendaftaran admin
        $validation->setRules([
            'nip' => [
                'label' => 'NIP',
                'rules' => 'required|numeric|min_length[8]|is_unique[admin.nip]'
            ],
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required|alpha_space'
            ],
            'no_sk' => [
                'label' => 'Nomor SK',
                'rules' => 'required'
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[admin.email]'
            ],
            'kata_sandi' => [
                'label' => 'Kata Sandi',
                'rules' => 'required|min_length[8]|regex_match[/[a-z]/]|regex_match[/[A-Z]/]|regex_match[/[!@#$%^&*_-]/]'
            ],
            'passwordcheck' => [
                'label' => 'Konfirmasi Kata Sandi',
                'rules' => 'required|matches[kata_sandi]'
            ]
        ]);

        // Lakukan validasi input
        if (!$this->validate($validation->getRules())) {
            return $this->response->setJSON([
                'success' => false,
                'errors' => $validation->getErrors()
            ]);
        }

        // Ambil data input dari form
        $email = $this->request->getPost('email');
        $nip = $this->request->getPost('nip');
        $nama = $this->request->getPost('nama');
        $no_sk = $this->request->getPost('no_sk');
        $kata_sandi = password_hash($this->request->getPost('kata_sandi'), PASSWORD_DEFAULT);

        // Data yang akan dimasukkan ke database
        $data = [
            'nip' => $nip,
            'nama' => $nama,
            'no_sk' => $no_sk,
            'email' => $email,
            'kata_sandi' => $kata_sandi
        ];

        // Simpan data ke database menggunakan AdminModel
        $model = new AdminModel();

        if ($model->insert($data)) {
            // Jika pendaftaran berhasil
            return $this->response->setJSON(['success' => true]);
        } else {
            // Jika ada kesalahan saat menyimpan ke database
            log_message('error', 'Pendaftaran admin gagal: ' . json_encode($model->errors()));
            return $this->response->setJSON([
                'success' => false,
                'errors' => 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.'
            ]);
        }
    }
}
