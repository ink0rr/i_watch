<?php

namespace App\Controllers;

use App\Models;
use CodeIgniter\Exceptions\PageNotFoundException;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->movies = model(Models\Movies::class);
        $this->studios = model(Models\Studios::class);
        $this->screenings = model(Models\Screenings::class);
        $this->reservations = model(Models\Reservations::class);
        $this->users = model(Models\Users::class);
    }

    public function index()
    {
        $data['movie_total'] = $this->movies->countAllResults();
        $data['screening_total'] = $this->screenings->countAllResults();
        $data['reservation_total'] = $this->reservations->countAllResults();
        $data['title'] = "IOO WATCH - Admin";


        return view('admin/templates/header', $data) .
            view('admin/templates/sidebar') .
            view('admin/templates/navbar') .
            view('admin/dashboard') .
            view('admin/templates/footer');
    }

    public function movies()
    {
        $data['movie'] = $this->movies->findAll();
        $data['title'] = 'IOO Watch - Movies';
        return view('admin/templates/header', $data) .
            view('admin/templates/sidebar') .
            view('admin/templates/navbar') .
            view('admin/movie/index') .
            view('admin/templates/footer');
    }

    public function screenings()
    {
        $data['screening'] = $this->screenings
            ->select('screenings.id ,movies.title, studios.name, price, start_time')
            ->join('movies', 'screenings.movie_id = movies.id')
            ->join('studios', 'screenings.studio_id = studios.id')
            ->orderBy('id', 'ASC')
            ->findAll();
        $data['title'] = 'IOO Watch - Screenings';
        return view('admin/templates/header', $data) .
            view('admin/templates/sidebar') .
            view('admin/templates/navbar') .
            view('admin/screening/index') .
            view('admin/templates/footer');
    }

    public function studios()
    {
        $data['studio'] = $this->studios->findAll();
        $data['title'] = 'IOO Watch - Studios';
        return view('admin/templates/header', $data) .
            view('admin/templates/sidebar') .
            view('admin/templates/navbar') .
            view('admin/studio/index') .
            view('admin/templates/footer');
    }
}
