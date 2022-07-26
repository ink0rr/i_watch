<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models;

class Studios extends BaseController
{
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->studios = model(Models\Studios::class);
    }

    public function add_studio()
    {
        $data['title'] = 'IOO Watch - Tambah Studios';

        return view('admin/templates/header', $data) .
            view('admin/templates/sidebar') .
            view('admin/templates/navbar') .
            view('admin/studio/add_form') .
            view('admin/templates/footer');
    }

    public function insert()
    {
        if (!$this->validate(['name' => 'required|max_length[255]'])) {
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }
        $this->studios->insert([
            'name' => $this->request->getPost('name'),
        ]);
        session()->setFlashdata('success', 'Studio berhasil ditambah');
        return redirect()->to(base_url('/admin/studios'));
    }

    public function edit_studio($id)
    {
        $data['studio'] = $this->studios->where('id', $id)->first();
        $data['title'] = 'IOO Watch - Edit Studio';
        return view('admin/templates/header', $data) .
            view('admin/templates/sidebar') .
            view('admin/templates/navbar') .
            view('admin/studio/edit_form') .
            view('admin/templates/footer');
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        if (!$this->validate(['name' => 'required|max_length[255]'])) {
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }
        $this->studios->where('id', $id)->set(['name' => $this->request->getPost('name')])->update();

        session()->setFlashdata('success', 'Studio berhasil diedit');
        return redirect()->to(base_url('/admin/studios'));
    }

    public function delete($id)
    {
        $this->studios->where('id', $id)->delete();
        session()->setFlashdata('success', 'Studio berhasil dihapus');
        return redirect()->to(base_url('/admin/studios'));
    }
}
