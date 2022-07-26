<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\AdminModel;
use App\Models\userModel;
use App\Models\BookingModel;
use App\Models\ContactModel;
use App\Libraries\Hash;

class Admin extends BaseController
{
    public $AdminModel;
    public $session;

    public function __construct(){
        helper(['form', 'url']);

        $this -> AdminModel = new AdminModel(); 
        $this -> session = session();
        
        /*if(!$this -> session ->userdata('id'))
            return redirect('/adminlogin');
        if($this->session->userdata('level') == '2')
        return redirect('/notfound');*/

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
                        return redirect()->to(base_url('/admindash'));
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
        echo view('templates/headerAdmin');
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
            return redirect()->to(base_url('/'));
        }

        public function admindashboard()
    {
        $data=[];
        echo view('templates/headerAdmin', $data);
        echo view('admin/admindash');
        echo view('templates/footer');
    }

    public function listpatients()
    {
        $patient = new userModel();
        $data['patient'] = $patient ->findAll();

        echo view('templates/headerAdmin', $data);
        echo view('admin/listpatients');
        echo view('templates/footer');
    }

    public function addpatient(){
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
                $session->setFlashdata('success', 'Patient added successfully.');
                return redirect()->to(base_url('/listpatients'));
            }
        }
        echo view('templates/headerAdmin', $data);
        echo view('admin/addpatient',);
        echo view('templates/footer');
    }

    public function editpt($id){

        $patient = new userModel();
        $data['patient'] = $patient->find($id);

        echo view('templates/headerAdmin', $data);
        echo view('admin/editpatient');
        echo view('templates/footer');
    }

    public function update($id){
        $patient = new userModel();
        $data = [
            'firstname' => $this->request->getPost('firstname'),
            'lastname' => $this->request->getPost('lastname'),
            'gender' => $this->request->getPost('gender'),
            'dob' => $this->request->getPost('dob'),
            'diagnosis' => $this->request->getPost('diagnosis'),
            'email' => $this->request->getPost('email')
        ];

        $patient->update($id, $data);
        return redirect()->to(base_url('/listpatients'))->with('success', 'Patient record updated.');
    }
    public function deletept($id){
        $patient = new userModel();

        $patient->delete($id);
        return redirect()->to(base_url('/listpatients'))->with('success', 'Patient Deleted Successfully');
    }

    public function listptappointments(){
        $appts = new BookingModel();
        $data['appts'] = $appts ->findAll();
        
        echo view('templates/headerAdmin', $data);
        echo view('admin/listappointments');
        echo view('templates/footer');
    }

    public function editappt($id){
        $appts = new BookingModel();
        $data['appts'] = $appts->find($id);

        echo view('templates/headerAdmin', $data);
        echo view('admin/editpatientappt');
        echo view('templates/footer');

    }

    public function updateappt($id){
        $appts = new BookingModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'reason' => $this->request->getPost('reason'),
            'date' => $this->request->getPost('date'),
            'time' => $this->request->getPost('time'),
            'observations' => $this->request->getPost('observations'),
        ];

        $appts->update($bid, $data);
        return redirect()->to(base_url('/listappointments'))->with('success', 'Patient appointment updated.');
    }

    public function deleteappt($id){
        $appts = new BookingModel();

        $appts->delete($id);
        return redirect()->to(base_url('/listappointments'))->with('success', 'Appointment Deleted Successfully');
    }
    
}
