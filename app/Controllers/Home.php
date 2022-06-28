<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function __construct() {
        // parent::__construct();
    }
    public function index()
    {
        $data['title'] = "IOO Watch";
        
        return view('templates/header', $data)
        . view('homepage')
        . view('templates/footer');
    }
}
