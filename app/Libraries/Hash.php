<?php
namespace App\Libraries;

class Hash{
    public static function make($password){//function to hash passwords
        return password_hash($password, PASSWORD_BCRYPT);
    }
}
?>