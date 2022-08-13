<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Pages extends BaseController
{
    public function __construct(){
        helper(['form', 'url']);
    }
    
    public function index()
    {
        echo view('templates/header');
        echo view('pages/home');
        echo view('templates/footer');
    }

    public function about()
    {
        echo view('templates/header');
        echo view('pages/about');
        echo view('templates/footer');
    }

}
