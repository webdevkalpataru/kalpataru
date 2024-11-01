<?php

namespace App\Controllers;

class StatistikController extends BaseController
{
    public function datausulanprovinsi()
{
    $data = [
        'title' => 'Data Usulan Provinsi' // Pastikan variabel ini di-set
    ];

    return view('datausulanprovinsi', $data); // Kirim data ke view
}
    public function profilpenerima()
    {
        return view('profilpenerima');
    }
}
