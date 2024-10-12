<?php

namespace App\Controllers;

class AdminController extends BaseController
{
    public function dashboard()
    {
        $data['title'] = "Dashboard Admin";
        return view('admin/dashboard', ['title' => 'Dashboard Admin']);
    }

    public function akunpengusul()
    {
        $data['title'] = "Akun Pengusul";
        return view('admin/akunpengusul', ['title' => 'Akun Pengusul']);
    }

    public function artikeladmin()
    {
        $data['title'] = "Artikel Admin";
        return view('admin/artikeladmin', ['title' => 'Artikel Admin']);
    }

    public function artikelpengguna()
    {
        $data['title'] = "Artikel Pengguna";
        return view('admin/artikelpengguna', ['title' => 'Artikel Pengguna']);
    }

    public function akundlhk()
    {
        $data['title'] = "Akun DLHK";
        return view('admin/akundlhk', ['title' => 'Akun DLHK']);
    }
}
