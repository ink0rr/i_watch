<?php

namespace App\Controllers;

use App\Libraries\Breadcrumb;
use App\Models;
use CodeIgniter\Exceptions\PageNotFoundException;


class Reservations extends BaseController
{
    private Breadcrumb $breadcrumb;
    private Models\Seats $seats;
    private Models\Screenings $screenings;
    private Models\Movies $movies;

    public function __construct()
    {
        $this->breadcrumb = new Breadcrumb();
        $this->seats = model(Models\Seats::class);
        $this->screenings = model(Models\Screenings::class);
        $this->movies = model(Models\Movies::class);
    }

    public function index($id, $id_screenings)
    {
        $data['movie'] = $this->screenings
            ->join("movies", "screenings.movie_id = movies.id")
            ->join('studios', 'screenings.studio_id = studios.id')
            ->where("screenings.movie_id = $id")
            ->where("screenings.id = $id_screenings")->find();

        $data['seats'] = $this->seats
            ->join('reservations', 'seats.id = reservations.seat_id', 'left')
            ->where("screening_id = $id_screenings")
            ->select('seats.name')->findAll();

        if (empty($data['movie'])) {
            throw PageNotFoundException::forPageNotFound();
        } else {

            $this->breadcrumb->add('Beranda', '/');
            $this->breadcrumb->add($data['movie'][0]['title'], '/movies/' . $id);
            $this->breadcrumb->add('Reservasi', '/reservasi/' . $id_screenings);
            $data['breadcrumbs'] = $this->breadcrumb->render();

            $data['title'] = $data['movie'][0]['title'];
        }

        return view('template/header', $data)
            . view('movie/reservation')
            . view('template/footer');
    }
}
