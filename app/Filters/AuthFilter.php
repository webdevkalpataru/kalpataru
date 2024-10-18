<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{


    public function before(RequestInterface $request, $arguments = null)
    {
        // Cek apakah pengguna sudah login
        if (!session()->get('logged_in')) {
            return redirect()->to('/'); // Arahkan ke halaman utama jika belum login
        }

        // Cek URI untuk menentukan akses
        $uri = service('uri');

        // Cek apakah halaman yang diakses adalah halaman admin
        if ($uri->getSegment(1) == 'admin') {
            // Pastikan pengguna yang login adalah admin
            if (session()->get('role') != 'admin') {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }

        // Cek apakah halaman yang diakses adalah halaman pengusul
        if ($uri->getSegment(1) == 'pengusul') {
            // Pastikan pengguna yang login adalah pengusul atau DLHK
            $roleAkun = session()->get('role_akun');
            if ($roleAkun != 'pengusul' && $roleAkun != 'DLHK') {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(); // Halaman 404 jika bukan pengusul atau DLHK
            }
        }
    }


    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada aksi khusus setelah permintaan
    }
}
