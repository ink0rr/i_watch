<?php

namespace App\Controllers;

use App\Models;

class Home extends BaseController
{
    public function index(): string
    {

        $movies = model(Models\Movies::class);
        $data['movies'] = $movies->findAll();

        $data['title'] = 'IOO Watch';
        return view('templates/header', $data)
            . view('homepage')
            . view('templates/footer');
    }

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
