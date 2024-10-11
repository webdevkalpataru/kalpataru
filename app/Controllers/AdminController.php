<?php

namespace App\Controllers;

class AdminController extends BaseController
{
    public function dashboard()
    {
        $data['title'] = "Dashboard Admin";
        return view('admin/dashboard', ['title' => 'Dashboard Admin']);
    }
}
