<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\userModel;
use App\Libraries\Hash;

class Auth extends BaseController
{
    public $userModel;
    public $session;

    public function __construct(){
        helper('form');
        $this -> userModel = new userModel(); //so we can reuse the model
        $this -> session = session();
    }

    public function login()
    {
        $data = [];

        if($this->request->getMethod() == 'post'){
            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required'
            ];

            if($this->validate($rules)){ //if user entered valid input, we will authenticate
                $email = $this -> request ->getVar('email');
                $password = $this -> request -> getVar('password');

                $userdata = $this->userModel->verifyEmail($email);
                if($userdata){
                    if(password_verify($password, $userdata['password'])){
                        $this->setUserSession($userdata);
                        return redirect()->to('/dashboard');
                        //print_r($userdata)
                    }else{
                        $this ->session->setTempdata('error','Invalid password.',3);
                    return redirect()->to(current_url());
                    }
                }else{ //error msg
                    $this ->session->setTempdata('error','Email does not exist.',3);
                    return redirect()->to(current_url());
                }
            }else{
                $data['validation'] = $this -> validator;
            }
        }
        echo view('templates/header');
        echo view('pages/login');
        echo view('templates/footer');

	}
    private function setUserSession($userdata){
        $userdata = [
            'id' => $userdata['id'],
            'firstname' => $userdata['firstname'],
            'lastname' => $userdata['lastname'],
            'gender' => $userdata['gender'],
            'dob' => $userdata['dob'],
            'diagnosis' => $userdata['diagnosis'],
            'isLoggedIn' => true,
        ];
        session()->set($userdata);
        return true;
    }

    public function register(){
        $data = [];

        //check if method is post or get
        if($this->request->getMethod() == 'post'){
            //validation
            $rules = [
                'firstname' => 'required|min_length[3]|max_length[20]',
                'lastname' => 'required|min_length[3]|max_length[20]',
                'gender' => 'required|min_length[3]|max_length[20]',
                'dob' => [
                    'rules' => 'required|check_date',
                    'label' => 'Date of Birth',
                    'errors' => ['check_date' => 'Your date of birth has to be before today.']
                ],
                'diagnosis' => 'required|min_length[3]|max_length[155]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
                'password' =>'required|min_length[8]|max_length[255]',
                'cpassword' => [
                    'rules' => 'required|matches[password]',
                    'label' => 'confirm password'
                    ]
            ];
            if(! $this->validate($rules)){//if form not valid
                $data['validation'] = $this->validator;
            }else{
                //store user in DB
                $usermodel = new userModel();

                $newData = [
                    'firstname' => $this->request->getVar('firstname'),
                    'lastname' => $this->request->getVar('lastname'),
                    'gender' => $this->request->getVar('gender'),
                    'dob' => $this->request->getVar('dob'),
                    'diagnosis' => $this->request->getVar('diagnosis'),
                    'email' => $this->request->getVar('email'),
                    'password' => Hash::make($this->request->getVar('password'))
                ];
                $usermodel->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Successful Registration');
                return redirect()->to('/login');
            }
        }
        //if it's get method, we return the view
        echo view('templates/header', $data);
        echo view('pages/register');
        echo view('templates/footer');
    }

    public function dashboard()
    {
        $data=[];
        echo view('templates/header', $data);
        echo view('pages/dashboard');
        echo view('templates/footer');
    }

    public function userprofile()
    {
        $data=[];
        $usermodel = new userModel();

        if($this->request->getMethod() == 'post'){
            //validation
            $rules = [
                'firstname' => 'required|min_length[3]|max_length[20]',
                'lastname' => 'required|min_length[3]|max_length[20]',
                'gender' => 'required|min_length[3]|max_length[20]',
                'diagnosis' => 'required|min_length[3]|max_length[155]',
            ];

            if($this->request->getPost('password') != ''){//if user typed something in password field
                $rules['password'] = 'required|min_length[8]|max_length[255]';
                $rules['cpassword'] = [
                    'rules' => 'required|matches[password]',
                    'label' => 'confirm password'
                ];
            }
            if(! $this->validate($rules)){//if form not valid
                $data['validation'] = $this->validator;
            }else{

                $newData = [
                    'id' => session()->get('id'),
                    'firstname' => $this->request->getPost('firstname'),
                    'lastname' => $this->request->getPost('lastname'),
                    'gender' => $this->request->getPost('gender'),
                    'diagnosis' => $this->request->getPost('diagnosis'),
                ];

                if($this->request->getPost('password') != ''){
                    $newData['password'] =  Hash::make($this->request->getVar('password'));
                }

                $usermodel->save($newData);
                session()->setFlashdata('success', 'Successfully Updated');
                return redirect()->to('/profile');
            }
        }
        $data['user'] = $usermodel->where('id', session()->get('id'))->first();
        echo view('templates/header', $data);
        echo view('pages/profile');
        echo view('templates/footer');
    }


    public function logout(){
		session()->destroy();
		return redirect()->to('/');
	}
}
