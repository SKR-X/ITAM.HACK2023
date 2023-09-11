<?php

namespace App\Controllers;

use App\Core\Controller as Controller;

use App\Models\LoginRegModel as LoginRegModel;

use App\Core\Session as Session;

class LoginRegController extends Controller
{

    private $LoginModel;

    public function __construct()
    {
        $this->LoginModel = new LoginRegModel();
    }

    public function actionIndex()
    {
            $this->viewPage('LoginRegPage','loginreg',array('champ' => $_GET['champ']));
    }

    private function checkUser() {
        if(!empty($_POST) && isset($_POST['email']) && isset($_POST['pass']) && !empty($_POST['email']) && !empty($_POST['pass']) && $this->LoginModel->checkUser($_POST['email'],$_POST['pass'])) {
            return true;
        } else {
            return false;
        }
    }

    public function actionCheckPostLogin()
    {
        if($this->checkUser()) {
            Session::sessionStart('id2',$this->LoginModel->takeOneFromTableWhereEqually('UserId','sportsmensreg','UserEmail',$_POST['email']));
            header('Location: /usercabreg');
        } else {
            $this->viewError('loginErr');
        }
    }
}