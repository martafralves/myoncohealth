<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Users extends BaseController
{
    public function login(){
      $data = [];
      helper(['form']); //will load all the helpers that I need in my application


        echo view('templates/header', $data); 
        return view('pages/login');
        echo view('templates/footer');
      }

    public function register(){
      $data = [];
      helper(['form']); //will load all the helpers that I need in my application

      if($this->request->getMethod() == 'post'){
          //validation rules
          $rules = [
            'name' => 'required|min_length[5]|max_length[20]',
            ''
          ]
      }
        echo view('templates/header', $data); 
        return view('pages/register');
        echo view('templates/footer');
    }
}
