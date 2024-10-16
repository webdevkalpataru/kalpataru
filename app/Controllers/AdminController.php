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

    public function akuntimteknis()
    {
        $data['title'] = "Akun Tim Teknis";
        return view('admin/akuntimteknis', ['title' => 'Akun Tim Teknis']);
    }

    public function tambahartikeladmin()
    {
        $data['title'] = "Tambah Artikel Admin";
        return view('admin/tambahartikeladmin', ['title' => 'Tambah Artikel Admin']);
    }

    public function beritaadmin()
    {
        $data['title'] = "Berita Admin";
        return view('admin/beritaadmin', ['title' => 'Berita Admin']);
    }

    public function daftartimteknis()
    {
        $data['title'] = "Daftar Tim Teknis";
        return view('admin/daftartimteknis', ['title' => 'Daftar Tim Teknis']);
    }

    public function akundppk()
    {
        $data['title'] = "Akun DPPK";
        return view('admin/akundppk', ['title' => 'Akun DPPK']);
    }

    public function daftardppk()
    {
        $data['title'] = "Daftar DPPK";
        return view('admin/daftardppk', ['title' => 'Daftar DPPK']);
    }

    public function tambahberitaadmin()
    {
        $data['title'] = "Tambah Berita Admin";
        return view('admin/tambahberitaadmin', ['title' => 'Tambah Berita Admin']);
    }

    public function pengumumanadmin()
    {
        $data['title'] = "Pengumuman Admin";
        return view('admin/pengumumanadmin', ['title' => 'Pengumuman Admin']);
    }

    public function tambahpengumumanadmin()
    {
        $data['title'] = "Tambah Pengumuman Admin";
        return view('admin/tambahpengumumanadmin', ['title' => 'Tambah Pengumuman Admin']);
    }

    public function akunpengguna()
    {
        $data['title'] = "Akun Pengguna";
        return view('admin/akunpengguna', ['title' => 'Akun Pengguna']);
    }

    public function daftarakunpengguna()
    {
        $data['title'] = "Daftar Akun Pengguna";
        return view('admin/daftarakunpengguna', ['title' => 'Daftar Akun Pengguna']);
    }

    public function daftarakundlhk()
    {
        $data['title'] = "Daftar Akun DLHK";
        return view('admin/daftarakundlhk', ['title' => 'Daftar Akun DLHK']);
    }
}
