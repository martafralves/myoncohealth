<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ContactModel;

class Contact extends BaseController
{
    public function __construct(){
        helper(['form', 'url']);
    }
    public function enquiry()
    {
        $db2 = db_connect('secondDb');//connecting to the second DB
        $contactmodel = new ContactModel($db2);

        $data = [];

        $rules = [ //validation rules for contact form
            'firstname' => [
                'rules' => 'required|min_length[2]|max_length[20]',
                'label' => 'First Name'
                ],
            'lastname' => [
                'rules' => 'required|min_length[2]|max_length[20]',
                'label' => 'Last Name'
                ],
            'phone' => [
                'rules' => 'required|numeric',
                'label' => 'Phone Number'
                ],
            'email' => 'required|valid_email',
            'query' => 'required',
        ];

        if($this->request->getMethod()=='post'){
            if($this->validate($rules)){
                $cdata=[
                    'firstname' => $this->request->getVar('firstname'),
                    'lastname' => $this->request->getVar('lastname'),
                    'phone' =>$this->request->getVar('phone'),
                    'email' =>$this->request->getVar('email'),
                    'query' =>$this->request->getVar('query'),
                ];
                $contactmodel->save($cdata);
                $session = session();
                $session->setFlashdata('success', 'Your query was sent successfully.');
                return redirect()->to('/enquiries');
            }else{
                $data['validation'] = $this->validator;
            }
        }

        echo view('templates/header');
        echo view('pages/enquiries', $data);
        echo view('templates/footer');
    }
}
