<?php

namespace App\Models;

use App\Core\Model;

class LoginRegModel extends Model {

    public function checkUser($email,$passUser) {
        if(password_verify($passUser, $this->takeOneFromTableWhereEqually('UserPassword','sportsmensreg','UserEmail',strtolower($email)))) {
            return true;
        } else {
            return false;
        }
    }
}