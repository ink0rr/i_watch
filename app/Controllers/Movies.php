<?php

namespace App\Controllers;

use App\Models;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Libraries\Breadcrumb;

class Movies extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->movies = new Models\Movies();
        $this->seats = new Models\Seats();
        $this->breadcrumb = new Breadcrumb();
    }
    public function index(int $id): string
    {
        $data['movie'] = $this->movies->find($id);

        //gw make ini karena query builder ci4 ribet :( kalo tau bentuknya, konversi aja
        $data['screenings'] = $this->db->query("SELECT * 
        FROM screenings 
        WHERE movie_id = $id 
        GROUP BY DAY(start_time)")->getResultArray();

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
        $data['start_time'] = $this->db->query("select start_time from screenings where movie_id = $id and DAY(start_time) = $day and MONTH(start_time) = $month")->getResultArray();
        var_dump($data);
    }

    public function reservations($id)
    {
        $data['movie'] = $this->movies->find($id);

        $data['screening'] = $this->db->query("select * 
        from screenings 
        join movies
        on screenings.movie_id = movies.id 
        join studios
        on screenings.studio_id = studios.id
        where screenings.id =$id")->getResultArray();
        $data['seats'] = $this->db->query("select seats.name
        from seats
        left join reservations
        on seats.id = reservations.seat_id
        where screening_id =$id")->getResultArray();

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
