<?php
namespace App\Models;
use CodeIgniter\Model;

class ContactModel extends Model{
    protected $table = 'contact';
    protected $primaryKey = 'id';
    protected $allowedFields = ['firstname', 'lastname', 'phone', 'email', 'query', 'created_at'];

    
}