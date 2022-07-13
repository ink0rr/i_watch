<?php

namespace App\Controllers;

use App\Libraries\Breadcrumb;
use App\Models;
use CodeIgniter\Exceptions\PageNotFoundException;

class Movies extends BaseController
{
    private Models\Movies $movies;
    private Models\Seats $seats;
    private Models\Screenings $screenings;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->movies = new Models\Movies();
        $this->seats = new Models\Seats();
        $this->breadcrumb = new Breadcrumb();
        $this->movies = model(Models\Movies::class);
        $this->seats = model(Models\Seats::class);
        $this->screenings = model(Models\Screenings::class);
    }

    public function index(int $id): string
    {
        $data['movie'] = $this->movies->find($id);

        $this->db = \Config\Database::connect();
        $data['screenings'] = $this->db->query("SELECT * 
        FROM screenings 
        WHERE movie_id = $id 
        GROUP BY DAY(start_time)
        ORDER BY start_time ASC")->getResultArray();

        if ($data['movie'] === null) {
            throw PageNotFoundException::forPageNotFound();
        }
        $this->breadcrumb->add('Beranda', '/');
        $this->breadcrumb->add($data['movie']['title'], '/movies/' . $id);
        $data['breadcrumbs'] = $this->breadcrumb->render();

        $data['title'] = $data['movie']['title'];
        return view('template/header', $data)
            . view('movie/movie')
            . view('template/footer');
    }

    public function get_start_time()
    {
        $id = $_POST['id'];
        $day = $_POST['hari'];
        $month = $_POST['bulan'];
        $data['start_time'] = $this->db->query("select start_time from screenings where movie_id = $id and DAY(start_time) = $day and MONTH(start_time) = $month order by start_time ASC")->getResult();
        return json_encode($data['start_time']);
    }

    public function reservations($id)
    {
        $data['movie'] = $this->movies->find($id);

        $data['screening'] = $this->screenings
            ->join('movies', 'screenings.movie_id = movies.id')
            ->join('studios', 'screenings.studio_id = studios.id')
            ->orderBy('start_time', 'ASC')
            ->where("screenings.id = $id")->findAll();

        $data['seats'] = $this->seats
            ->join('reservations', 'seats.id = reservations.seat_id', 'left')
            ->where("screening_id = $id")
            ->select('seats.name')->findAll();

        $this->breadcrumb->add('Beranda', '/');
        $this->breadcrumb->add($data['movie']['title'], '/movies/' . $id);
        $this->breadcrumb->add('Reservasi', '/reservasi/' . $id);
        $data['breadcrumbs'] = $this->breadcrumb->render();

        $data['title'] = $data['movie']['title'];

        if ($data['movie'] === null || $data['seats'] === null || $data['screening'] === null) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('template/header', $data)
            . view('movie/reservation')
            . view('template/footer');
    }
}
