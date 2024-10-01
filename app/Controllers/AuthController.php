<?php

namespace App\Controllers;

class AuthController extends BaseController
{
    public function login()
    {
        return view('auth/login', ['title' => 'Login']);
    }

    public function register()
    {
        return view('auth/register', ['title' => 'Register']);
    }
}
