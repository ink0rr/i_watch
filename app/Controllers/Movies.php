<?php

namespace App\Controllers;

use App\Models;
use CodeIgniter\Exceptions\PageNotFoundException;

class Movies extends BaseController
{
    private Models\Movies $movies;
    private Models\Seats $seats;
    private Models\Screenings $screenings;

    public function __construct()
    {
        $this->movies = model(Models\Movies::class);
        $this->seats = model(Models\Seats::class);
        $this->screenings = model(Models\Screenings::class);
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

        $data['screening'] = $this->screenings
            ->join('movies', 'screenings.movie_id = movies.id')
            ->join('studios', 'screenings.studio_id = studios.id')
            ->where("screenings.id = $id")->findAll();

        $data['seats'] = $this->seats
            ->join('reservations', 'seats.id = reservations.seat_id', 'left')
            ->where("screening_id = $id")
            ->select('seats.name')->findAll();

        $data['title'] = $data['movie']['title'];

        if ($data['movie'] === null || $data['seats'] === null || $data['screening'] === null) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('template/header', $data)
            . view('movie/reservation')
            . view('template/footer');
    }
}
