<?php

namespace App\Controllers;

use App\Models\PengusulModel; // Pastikan model user sudah ada

class AuthController extends BaseController
{
    public function login()
    {
        return view('auth/login', ['title' => 'Login']);
    }

    public function register()
    {
        // Jika request adalah POST (artinya user sedang submit form)
        if ($this->request->getMethod() == 'post') {
            // Validasi input
            $validationRules = [
                'nama_instansi_pribadi' => 'required|min_length[3]|max_length[100]',
                'email' => 'required|valid_email',
                'password' => 'required|min_length[6]',
                'password_confirm' => 'required|matches[password]',
                'telepon' => 'required|numeric',
                'provinsi' => 'required',
                'jenis_instansi' => 'required',
                'surat_pengantar' => 'uploaded[surat_pengantar]|mime_in[surat_pengantar,application/pdf]',
            ];

            if (!$this->validate($validationRules)) {
                // Jika validasi gagal, kembalikan ke form dengan error message
                return view('auth/register', [
                    'title' => 'Register',
                    'validation' => $this->validator
                ]);
            }

            // Jika validasi sukses, simpan user ke database
            $PengusulModel = new PengusulModel();

            // Enkripsi password sebelum menyimpannya
            $passwordHash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

            // Upload file surat pengantar
            $suratPengantar = $this->request->getFile('surat_pengantar');
            if ($suratPengantar->isValid() && !$suratPengantar->hasMoved()) {
                $suratPengantar->move(WRITEPATH . 'upload/', $suratPengantar->getName());
            }

            // Simpan data user ke database
            $PengusulModel->save([
                'nama_instansi_pribadi' => $this->request->getPost('nama_instansi_pribadi'),
                'email' => $this->request->getPost('email'),
                'password' => $passwordHash,
                'telepon' => $this->request->getPost('telepon'),
                'provinsi' => $this->request->getPost('provinsi'),
                'jenis_instansi' => $this->request->getPost('jenis_instansi'),
                'surat_pengantar' => $suratPengantar->getName(),
                'role_akun' => $this->request->getPost('pengusul')
            ]);

            // Redirect ke halaman login setelah pendaftaran sukses
            return redirect()->to('/auth/login')->with('success', 'Registrasi berhasil! Silakan login.');
        }

        // Jika request adalah GET, tampilkan form register
        return view('auth/register', ['title' => 'Register']);
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
