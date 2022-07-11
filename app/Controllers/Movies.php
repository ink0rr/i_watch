<?php

namespace App\Controllers;

use App\Models;
use CodeIgniter\Exceptions\PageNotFoundException;

class Movies extends BaseController
{
    public function __construct()
    {
        $this->movies = new Models\Movies();
    }
    public function index(int $id): string
    {
        $data['movie'] = $this->movies->find($id);
        if ($data['movie'] === null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $data['title'] = $data['movie']['title'];
        return view('template/header', $data)
            . view('movie/movie')
            . view('template/footer');
    }

    public function reservations()
    {
        $data['title'] = "Reservations";
        return view('template/header', $data)
            . view('movie/reservation')
            . view('template/footer');
    }
}
