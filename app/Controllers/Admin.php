<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\AdminModel;

class Admin extends BaseController
{
    public $AdminModel;
    public $session;

    public function __construct(){
        helper('form');
        $this -> AdminModel = new AdminModel(); 
        $this -> session = session();
    }

    public function adminlogin(){
        $data = [];

        if($this->request->getMethod() == 'post'){
            $rules = [
                'username' => 'required',
                'password' => 'required'
            ];

            if($this->validate($rules)){ 
                $username = $this -> request ->getVar('username');
                $password = $this -> request -> getVar('password');

                $userdata = $this->AdminModel->verifyUser($username);
                if($userdata){
                    if(password_verify($password, $userdata['password'])){
                        $this->setAdminSession($userdata);
                        return redirect()->to('/admindash');
                        //print_r($userdata);
                    }else{
                        $this ->session->setTempdata('error','Invalid password.',3);
                        print_r($userdata);
                        //return redirect()->to(current_url());
                    }
                }else{ //error msg
                    $this ->session->setTempdata('error','Username does not exist.',3);
                    return redirect()->to(current_url());
                }
            }else{
                $data['validation'] = $this -> validator;
            }
        }
        echo view('templates/header');
        echo view('Admin/adminlogin');
        echo view('templates/footer');
        
    
    } 

    private function setAdminSession($userdata){
        $userdata = [
            'id' => $userdata['id'],
            'adminuser' => $userdata['adminuser'],
            'isLoggedIn' => true,
        ];
        session()->set($userdata);
        return true;
        }
    

        public function logout(){
            session()->destroy();
            return redirect()->to('/');
        }

        public function admindashboard()
    {
        $data=[];
        echo view('templates/header', $data);
        echo view('admin/admindash');
        echo view('templates/footer');
    }
    
}
