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
        return view('template/header', $data)
            . view('homepage')
            . view('template/footer');
    }
}
