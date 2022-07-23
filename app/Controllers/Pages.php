<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Pages extends Controller
{
    public function index()
    {
        echo view('templates/header');
        echo view('pages/home');
        echo view('templates/footer');   
    }

    public function showpage($page='home'){
        if(!is_file(APPPATH. '/views/pages/'.$page.'.php')){
            //Throw error if page doesn't exist
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        echo view('templates/header'); 
        return view('pages/about');
        echo view('templates/footer');
    }

    //public function login(){
      //  echo view('templates/header'); 
        //return view('pages/login');
        //echo view('templates/footer');
    //}

    //public function register(){
      //  echo view('templates/header');
        //return view ('pages/register');
        //echo view('templates/footer');
    //}

    public function enquiry(){
        echo view('templates/header');
        return view ('pages/enquiries');
        echo view('templates/footer');
    }
}