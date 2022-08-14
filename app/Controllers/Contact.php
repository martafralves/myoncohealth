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
                return redirect()->to(base_url('/enquiries'));
            }else{
                $data['validation'] = $this->validator;
            }
        }

        echo view('templates/header');
        echo view('pages/enquiries', $data);
        echo view('templates/footer');
    }

    
    public function listenquiries(){
        $db2 = db_connect('secondDb');//connecting to the second DB

        $enquiry = new ContactModel($db2);
        $data['enquiry'] = $enquiry -> findAll();

        echo view('templates/headerAdmin');
        echo view('admin/listenquiries', $data);
        echo view('templates/footer');
    }

    public function editenquiry($id){
        $db2 = db_connect('secondDb');
        $enquiry = new ContactModel($db2);
        $data['enquiry'] = $enquiry->find($id);

        echo view('templates/headerAdmin');
        echo view('admin/editenquiries', $data);
        echo view('templates/footer');
    }

    public function updateenquiry($id){
        $db2 = db_connect('secondDb');
        $enquiry = new ContactModel($db2);
        
        $data = [
            'firstname' => $this->request->getPost('firstname'),
            'lastname' => $this->request->getPost('lastname'),
            'phone' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email'),
            'query' => $this->request->getPost('query'),
        ];

        $enquiry->update($id, $data);
        return redirect()->to(base_url('/listenquiries'))->with('success', 'Enquiry updated Successfully.');

    }

    public function deleteenquiry($id){
        $db2 = db_connect('secondDb');
        $enquiry = new ContactModel($db2);
        $enquiry->delete($id);
        return redirect()->to(base_url('/listenquiries'))->with('success', 'This enquiry is now resolved');
    }
}
