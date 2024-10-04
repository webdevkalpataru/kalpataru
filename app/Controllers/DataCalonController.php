<?php

namespace App\Controllers;

class DataCalonController extends BaseController
{
    public function datacalon()
    {
        return view('pengusul/datacalon', ['title' => 'Data Calon']);
    }
}