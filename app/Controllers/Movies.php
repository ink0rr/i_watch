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
    protected $helpers = ['form'];

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

    public function add_movie()
    {
        $data['title'] = 'IOO Watch - Tambah Movie';

        return view('admin/templates/header', $data) .
            view('admin/templates/sidebar') .
            view('admin/templates/navbar') .
            view('admin/movie/add_form') .
            view('admin/templates/footer');
    }

    public function insert()
    {
        $validationRule = [
            'image' => [
                'label' => 'Image File',
                'rules' => 'uploaded[image]'
                    . '|is_image[image]'
                    . '|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]'
                    . '|max_size[image,2048]',
            ],
            'title' => 'required|max_length[255]',
            'description' => 'required',
            'genre' => 'required|max_length[255]',
            'age_rating' => 'required|max_length[10]',
            'director' => 'required|max_length[255]',
            'writer' => 'required|max_length[255]',
            'stars' => 'required|max_length[255]',
            'duration' => 'required|max_length[3]'
        ];
        if (!$this->validate($validationRule)) {
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $img = $this->request->getFile('image');
        $filename = $img->getRandomName();
        $this->movies->insert([
            'image' => $filename,
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'duration' => $this->request->getPost('duration'),
            'genre' => $this->request->getPost('genre'),
            'age_rating' => $this->request->getPost('age_rating'),
            'director' => $this->request->getPost('director'),
            'writer' => $this->request->getPost('writer'),
            'stars' => $this->request->getPost('stars'),
        ]);

        $img->move('uploads/movies/', $filename);
        session()->setFlashdata('success', 'Movie berhasil ditambah');
        return redirect()->to(base_url('/admin/movies'));
    }

    public function edit_movie($id)
    {
        $data['movie'] = $this->movies->where('id', $id)->first();
        $data['title'] = 'IOO Watch - Edit Movie';

        return view('admin/templates/header', $data) .
            view('admin/templates/sidebar') .
            view('admin/templates/navbar') .
            view('admin/movie/edit_form') .
            view('admin/templates/footer');
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        if (empty($this->request->getFile('image'))) {
            $filename = $this->request->getPost('temp_image');
        } else {
            $data = $this->movies->where('id', $id)->first();
            if (!$data) {
                session()->setFlashdata('error', 'Terjadi kesalahan pada kueri');
                return redirect()->to(base_url('/admin/movies'));
            }
            $path = $_SERVER['DOCUMENT_ROOT'] . "/uploads/movies/{$data['image']}";
            unlink($path);

            $validationRule = [
                'image' => [
                    'label' => 'Image File',
                    'rules' => 'uploaded[image]'
                        . '|is_image[image]'
                        . '|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]'
                        . '|max_size[image,2048]'
                ]
            ];

            $img = $this->request->getFile('image');
            $filename = $img->getRandomName();

            $img->move('uploads/movies/', $filename);
        }

        $validationRule = [
            'title' => 'required|max_length[255]',
            'description' => 'required',
            'genre' => 'required|max_length[255]',
            'age_rating' => 'required|max_length[10]',
            'director' => 'required|max_length[255]',
            'writer' => 'required|max_length[255]',
            'stars' => 'required|max_length[255]',
            'duration' => 'required|max_length[3]'
        ];
        if (!$this->validate($validationRule)) {
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }
        $this->movies->where('id', $id)->set([
            'image' => $filename,
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'duration' => $this->request->getPost('duration'),
            'genre' => $this->request->getPost('genre'),
            'age_rating' => $this->request->getPost('age_rating'),
            'director' => $this->request->getPost('director'),
            'writer' => $this->request->getPost('writer'),
            'stars' => $this->request->getPost('stars')
        ])->update();

        session()->setFlashdata('success', 'Movie berhasil diedit');
        return redirect()->to(base_url('/admin/movies'));
    }

    public function delete($id)
    {
        $data = $this->movies->where('id', $id)->first();
        if (!$data) {
            session()->setFlashdata('error', 'Terjadi kesalahan pada kueri');
            return redirect()->to(base_url('/admin/movies'));
        }
        $path = $_SERVER['DOCUMENT_ROOT'] . "/uploads/movies/{$data['image']}";
        unlink($path);
        $this->movies->where('id', $id)->delete();
        session()->setFlashdata('success', 'Movie berhasil dihapus');
        return redirect()->to(base_url('/admin/movies'));
    }
}
