<?php

namespace App\Controllers;

use App\Models;
use CodeIgniter\Exceptions\PageNotFoundException;

class Movies extends BaseController
{
    public function __construct()
    {
        $this->movies = new Models\Movies();
        $this->seats = new Models\Seats();
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

    public function reservations($id)
    {
        $data['movie'] = $this->movies->find($id);

        //gw make ini karena query builder ci4 ribet :( kalo tau bentuknya, konversi aja
        $db = \Config\Database::connect();
        $data['screening'] = $db->query("select * 
        from screenings 
        join movies
        on screenings.movie_id = movies.id 
        join studios
        on screenings.studio_id = studios.id
        where screenings.id =$id")->getResultArray();
        $data['seats'] = $db->query("select seats.name
        from seats
        left join reservations
        on seats.id = reservations.seat_id
        where screening_id =$id")->getResultArray();

        $data['title'] = $data['movie']['title'];

        if ($data['movie'] === null || $data['seats'] === null || $data['screening'] === null) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('template/header', $data)
            . view('movie/reservation')
            . view('template/footer');
    }
}
