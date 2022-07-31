<?php
namespace App\Models;
use CodeIgniter\Model;

class userModel extends Model{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['firstname', 'lastname', 'dob', 'gender', 'diagnosis', 'email', 'password', 'updated_at'];



    public function verifyEmail($email){
        $builder = $this -> db -> table('users');
        $builder -> select('id, firstname, lastname, password');
        $builder -> where('email', $email);
        $result = $builder ->get();

        if(count($result->getResultArray())==1){
            return $result -> getRowArray();
        }else{
            return false;
        }
    }

}