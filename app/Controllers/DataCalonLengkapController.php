<?php

namespace App\Controllers;

class DataCalonLengkapController extends BaseController
{
    public function datacalonlengkap()
    {
        return view('pengusul/datacalonlengkap', ['title' => 'Data Calon Lengkap']);
    }
}