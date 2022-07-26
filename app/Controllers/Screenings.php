<?php

namespace App\Controllers;

use App\Models;
use App\Controllers\BaseController;

class Screenings extends BaseController
{
    private Models\Movies $movies;
    private Models\Screenings $screenings;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->movies = model(Models\Movies::class);
        $this->studios = model(Models\Studios::class);
        $this->screenings = model(Models\Screenings::class);
        $this->db = db_connect();
    }

    public function add_screening()
    {
        $data['movie'] = $this->movies->findAll();
        $data['studio'] = $this->studios->findAll();
        $data['title'] = 'IOO Watch - Tambah Screening';

        return view('admin/templates/header', $data) .
            view('admin/templates/sidebar') .
            view('admin/templates/navbar') .
            view('admin/screening/add_form') .
            view('admin/templates/footer');
    }

    public function insert()
    {
        $validationRule = [
            'movie_id' => 'required',
            'studio_id' => 'required',
            'price' => 'required|max_length[11]',
            'start_time' => 'required',
        ];
        if (!$this->validate($validationRule)) {
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }
        $this->screenings->insert([
            'movie_id' => $this->request->getPost('movie_id'),
            'studio_id' => $this->request->getPost('studio_id'),
            'price' => $this->request->getPost('price'),
            'start_time' => $this->request->getPost('start_time')
        ]);
        session()->setFlashdata('success', 'Screening berhasil ditambah');
        return redirect()->to(base_url('/admin/screenings'));
    }

    public function edit_screening($id)
    {
        $data['screening'] = $this->screenings
            ->select('screenings.id , screenings.movie_id, screenings.studio_id, movies.title, studios.name, price, start_time')
            ->join('movies', 'screenings.movie_id = movies.id')
            ->join('studios', 'screenings.studio_id = studios.id')
            ->where('screenings.id', $id)->first();
        $data['movie'] = $this->movies->findAll();
        $data['studio'] = $this->studios->findAll();
        $data['title'] = 'IOO Watch - Edit Screening';
        return view('admin/templates/header', $data) .
            view('admin/templates/sidebar') .
            view('admin/templates/navbar') .
            view('admin/screening/edit_form') .
            view('admin/templates/footer');
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        if (empty($this->request->getPost('start_time'))) {
            $start_time = $this->request->getPost('temp_start_time');
        } else {
            $start_time = $this->request->getPost('start_time');
        }

        $validationRule = [
            'movie_id' => 'required',
            'studio_id' => 'required',
            'price' => 'required|max_length[11]',
        ];

        if (!$this->validate($validationRule)) {
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $this->screenings->where('id', $id)->set([
            'movie_id' => $this->request->getPost('movie_id'),
            'studio_id' => $this->request->getPost('studio_id'),
            'price' => $this->request->getPost('price'),
            'start_time' => $start_time
        ])->update();

        session()->setFlashdata('success', 'Screening berhasil diedit');
        return redirect()->to(base_url('/admin/screenings'));
    }

    public function delete($id)
    {
        $this->screenings->where('id', $id)->delete();
        session()->setFlashdata('success', 'Screening berhasil dihapus');
        return redirect()->to(base_url('/admin/screenings'));
    }
}
