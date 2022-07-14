<?php

namespace App\Controllers;

use App\Libraries\Breadcrumb;
use App\Models;
use CodeIgniter\Exceptions\PageNotFoundException;

class Movies extends BaseController
{
    private Models\Movies $movies;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->breadcrumb = new Breadcrumb();
        $this->movies = model(Models\Movies::class);
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
        $data['start_time'] = $this->db->query("SELECT id, movie_id, start_time FROM screenings WHERE movie_id = $id AND DAY(start_time) = $day AND MONTH(start_time) = $month ORDER BY start_time ASC")->getResult();
        return json_encode($data['start_time']);
    }
}
