<?php

namespace App\Controllers;

use App\Libraries\Breadcrumb;
use App\Models;
use CodeIgniter\Exceptions\PageNotFoundException;

class Movies extends BaseController
{
    private Breadcrumb $breadcrumb;
    private Models\Movies $movies;
    private Models\Screenings $screenings;

    public function __construct()
    {
        $this->breadcrumb = new Breadcrumb();
        $this->movies = model(Models\Movies::class);
        $this->screenings = model(Models\Screenings::class);
    }

    public function index(int $id): string
    {
        $data['movie'] = $this->movies->find($id);

        $data['screenings'] = $this->screenings
            ->where("movie_id = $id GROUP BY DAY(start_time)")
            ->orderBy('start_time')
            ->findAll();
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

        $data['start_time'] = $this->screenings
            ->select("id, movie_id, start_time")
            ->where('movie_id', $id)
            ->where('DAY(start_time)', $day)
            ->where('MONTH(start_time)', $month)
            ->orderBy('start_time')->findAll();
        return json_encode($data['start_time']);
    }
}
