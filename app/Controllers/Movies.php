<?php

namespace App\Controllers;

use App\Models;
use CodeIgniter\Exceptions\PageNotFoundException;

class Movies extends BaseController
{
    public function index(int $id): string
    {
        $movies = model(Models\Movies::class);
        $data['movie'] = $movies->find($id);
        if ($data['movie'] === null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $data['title'] = $data['movie']['title'];
        return view('templates/header', $data)
            . view('movie')
            . view('templates/footer');
    }
}
