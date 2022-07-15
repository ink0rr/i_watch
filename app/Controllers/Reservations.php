<?php

namespace App\Controllers;

use App\Libraries\Breadcrumb;
use App\Models;
use CodeIgniter\Exceptions\PageNotFoundException;
use Exception;


class Reservations extends BaseController
{
    private Breadcrumb $breadcrumb;
    private Models\Seats $seats;
    private Models\Screenings $screenings;

    public function __construct()
    {
        $this->breadcrumb = new Breadcrumb();
        $this->seats = model(Models\Seats::class);
        $this->screenings = model(Models\Screenings::class);
        $this->movies = model(Models\Movies::class);
        $this->reservations = model(Models\Reservations::class);
        helper(['form']);
    }

    public function index($id, $id_screenings)
    {
        $data['screenings'] = $this->screenings->find($id_screenings);
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

    public function payment()
    {
        if ($this->request->getMethod() === 'post') {
            // var_dump($this->request->getPost('total'));
            // $seat = (isset($_POST['seat']) ? $_POST['seat'] : array());
            $seat = $this->request->getPost('seat');
            // var_dump($seat);
            if (is_array($seat)) {
                try {
                    foreach ($seat as $row) {
                        $seat_id = $this->seats
                            ->where('name', $row)
                            ->find();
                        $this->reservations->save([
                            'user_id' => session()->get('id'),
                            'screening_id' => $this->request->getPost('screening_id'),
                            'seat_id' => $seat_id[0]['id'],
                            'paid' => 0
                        ]);
                    }
                } catch (Exception $e) {
                    dd((array)$e);
                }
            }
            $screening_id = $this->request->getPost('screening_id');
            $data['movie'] = $this->screenings
                ->join("movies", "screenings.movie_id = movies.id")
                ->join('studios', 'screenings.studio_id = studios.id')
                ->where("screenings.id = $screening_id")->find();

            $data['title'] = $data['movie'][0]['title'];
            return view('template/header', $data)
                . view('movie/payment')
                . view('template/footer');
        } else {
            throw PageNotFoundException::forPageNotFound();
        }
    }
}
