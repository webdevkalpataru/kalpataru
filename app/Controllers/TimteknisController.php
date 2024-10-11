<?php

namespace App\Controllers;

class TimteknisController extends BaseController
{
    public function datacalonusulan()
    {
        $data['title'] = "Data Calon Usulan";
        return view('timteknis/datacalonusulan', ['title' => 'Data Calon Usulan']);
    }
    public function detaildatacalonusulan()
    {
        $data['title'] = "Detail Data Calon Usulan";
        return view('timteknis/detaildatacalonusulan', ['title' => 'Detail Data Calon Usulan";']);
    }
    public function verifikasiadministrasi()
    {
        $data['title'] = "Verifikasi Administrasi";
        return view('timteknis/verifikasiadministrasi', ['title' => 'Verifikasi Administrasi']);
    }
    public function sidang1()
    {
        $data['title'] = "Sidang 1";
        return view('timteknis/sidang1', ['title' => 'Sidang 1']);
    }
    public function sidang2()
    {
        $data['title'] = "Sidang 2";
        return view('timteknis/sidang2', ['title' => 'Sidang 2']);
    }
}
