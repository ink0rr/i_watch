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
        helper(['form']);
    }

    public function login()
    {
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
                if ($user['status'] ==  1) {
                    return redirect()->to(base_url('/admin'));
                }
                return redirect()->to(base_url());
            }
        }
        $data['title'] = 'Login - IOO Watch';
        return view('auth/header', $data)
            . view('auth/login');
    }

    public function register()
    {
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
                    return redirect()->to(base_url('/masuk'));
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

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }

    private function setUserSession($user)
    {
        session()->set([
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'status' => $user['status'],
            'isLoggedIn' => true,
        ]);
    }
}
