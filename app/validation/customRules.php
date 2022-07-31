<?php
namespace App\validation;
use App\Models\userModel;

class customRules{
    public function check_date(string $string, string &$error = null) : bool {
        if($string > date('Y-m-d')){
            return false;
        }else{
            return true;
        }
    }
    }
