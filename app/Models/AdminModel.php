<?php
namespace App\Models;
use CodeIgniter\Model;

class AdminModel extends Model{
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $allowedFields = ['adminuser', 'password'];



    public function verifyUser($username){
        $builder = $this -> db -> table('admin');
        $builder -> select('id, adminuser, password');
        $builder -> where('adminuser', $username);
        $result = $builder ->get();

        if(count($result->getResultArray())==1){
            return $result -> getRowArray();
        }else{
            return false;
        }
    }
}