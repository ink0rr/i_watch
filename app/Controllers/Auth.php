<?php

namespace App\Controllers;

use App\Models;
use Exception;

class Auth extends BaseController
{
    private Models\Users $users;

    public function __construct()
    {
        $this->users = model(Models\Users::class);
    }

    public function login()
    {
        helper(['form']);
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
            ];
            $errors = [
                'password' => [
                    'validateUser' => 'Incorrect Email or Password'
                ]
            ];
            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $user = $this->users
                    ->where('email', $this->request->getPost('email'))
                    ->first();

                $this->setUserSession($user);
                return redirect()->to('/');
            }
        }
        $data['title'] = 'Login - IOO Watch';
        return view('auth/header', $data)
            . view('auth/login');
    }

    public function register()
    {
        helper(['form']);
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'name' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[8]|max_length[255]',
                'password_confirm' => 'matches[password]',
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                try {
                    $this->users->save([
                        'name' => $this->request->getPost('name'),
                        'email' => $this->request->getPost('email'),
                        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                    ]);
                    return redirect()->to('/');
                } catch (Exception $e) {
                    dd((array)$e);
                }
            }
        }

        $data['title'] = 'Register - IOO Watch';
        return view('auth/header', $data)
            . view('auth/register');
    }

    public function forgetPassword(): string
    {
        $data['title'] = 'Lupa Password - IOO Watch';
        return view('auth/header', $data)
            . view('auth/forget-password');
    }

    private function setUserSession($user)
    {
        session()->set('user', [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'isLoggedIn' => true,
        ]);
    }
}
