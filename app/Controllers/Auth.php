<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function login(): string
    {
        $data['title'] = 'Login - IOO Watch';
        return view('auth/header', $data) .
            view('auth/login');
    }

    public function register(): string
    {
        $data['title'] = 'Register - IOO Watch';
        return view('auth/header', $data) .
            view('auth/register');
    }

    public function forgetPassword(): string
    {
        $data['title'] = 'Lupa Password - IOO Watch';
        return view('auth/header', $data) .
            view('auth/forget-password');
    }
}
