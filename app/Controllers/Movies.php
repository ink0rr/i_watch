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
        $db = \Config\Database::connect();
        $data['seats'] = $db->query("select seats.name
        from `seats`
        left join `reservations`
        on seats.id = reservations.seat_id
        where screening_id =$id")->getResultArray();
        $data['title'] = "Reservations";

        return view('template/header', $data)
            . view('movie/reservation')
            . view('template/footer');
    }
}
