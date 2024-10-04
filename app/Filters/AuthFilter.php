<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Periksa apakah pengguna sudah login
        if (!session()->get('logged_in')) {
            // Jika belum login, kembalikan JSON dengan pesan
            if ($request->isAJAX()) {
                return \Config\Services::response()
                    ->setJSON(['success' => false, 'message' => 'Harap login terlebih dahulu'])
                    ->setStatusCode(401);
            } else {
                // Arahkan ke halaman login jika bukan AJAX request
                return redirect()->to('/auth/login');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada aksi khusus setelah permintaan
    }
}
