<?php

namespace App\Controllers;

class PengusulController extends BaseController
{
    public function profilpengusul()
    {
        return view('pengusul/profilpengusul', ['title' => 'Profil Pengusul']);
    }
}