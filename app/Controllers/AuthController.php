<?php

namespace App\Controllers;

use App\Models\PengusulModel;

class AuthController extends BaseController
{
    public function login()
    {
        return view('auth/login', ['title' => 'Login']);
    }

    public function loginAction()
    {
        $session = session();
        $model = new PengusulModel();

        // Ambil data dari input
        $email = $this->request->getPost('email');
        $kataSandi = $this->request->getPost('kata_sandi');

        // Cek email di database
        $user = $model->getUserByEmail($email);

        if ($user) {
            // Verifikasi kata sandi
            if (password_verify($kataSandi, $user['kata_sandi'])) {
                // Set session data
                $session->set([
                    'id_pengusul' => $user['id_pengusul'],
                    'email' => $user['email'],
                    'role_akun' => $user['role_akun'],
                    'logged_in' => true
                ]);

                // Arahkan pengguna berdasarkan role
                if ($user['role_akun'] === 'pengusul') {
                    return redirect()->to('/halaman_pengusul');
                } elseif ($user['role_akun'] === 'DLHK') {
                    return redirect()->to('/halaman_dlhk');
                }
            } else {
                $session->setFlashdata('errors', 'Kata sandi salah');
            }
        } else {
            $session->setFlashdata('errors', 'Email tidak ditemukan');
        }

        return redirect()->back()->withInput();
    }

    public function register()
    {
        $provinsi_list = [
            'Aceh',
            'Bali',
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

        $data = [
            'jenis_instansi' => $this->request->getPost('jenis_instansi'),
            'nama_instansi_pribadi' => $this->request->getPost('nama_instansi_pribadi'),
            'provinsi' => $this->request->getPost('provinsi'),
            'telepon' => $this->request->getPost('telepon'),
            'email' => $this->request->getPost('email'),
            'kata_sandi' => password_hash($this->request->getPost('kata_sandi'), PASSWORD_DEFAULT),
            'role_akun' => 'Pengusul',
            'status_akun'  => 'Pending'
        ];

        if ($model->insert($data)) {
            return $this->response->setJSON(['success' => true]);
        } else {
            log_message('error', 'Registration failed: ' . json_encode($model->errors()));
            return $this->response->setJSON(['success' => false, 'errors' => $model->errors()]);
        }
    }
}
