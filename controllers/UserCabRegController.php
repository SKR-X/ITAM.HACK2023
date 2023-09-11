<?php

namespace App\Controllers;

use App\Core\Controller;

use App\Models\RegisterChampModel;
use App\Core\Session;

class UserCabRegController extends Controller {
    
    private $Model;
    private $id;
    private $RegisterModel;

    public function __construct()
    {
        $this->RegisterModel = new RegisterChampModel();
        $this->id = Session::sessionReturn('id2');
    }
    
    public function actionIndex()
    {
        if($this->RegisterModel->checkSession('id2')) {
            $this->viewPage('UserCabRegPage','userCabReg',array('countries' => $this->RegisterModel->takeAllFromTable('countries'),'clubs' => $this->RegisterModel->takeAllFromTable('clubs'),'userInfo' => $this->RegisterModel->takeAllFromTableWhereEqually('sportsmensreg','UserId',$this->id), 'info' => $this->RegisterModel->takeAllFromTableWhereEqually('sportsmensreg','UserId',$this->id)[0], 'id' => $this->id));
        } else {
            $this->viewPage('LoginRegPage','loginReg',array('champ' => 'user'));
        }
    }

    public function actionCheckPost()
    {
        if(isset($_POST['oldPass']) && isset($_POST['newPass']) && isset($_POST['email']) && password_verify($_POST['oldPass'], $this->RegisterModel->takeOneFromTableWhereEqually('UserPassword', 'sportsmensreg', 'UserEmail', $_POST['email']))) {
            $this->RegisterModel->updateArray('sportsmensreg',array('UserPassword' => password_hash($_POST['newPass'], PASSWORD_DEFAULT)),array('name' => 'UserEmail', 'str' => $_POST['email']));
        } else if(isset($_POST['oldPass']) && isset($_POST['newPass']) && isset($_POST['email']) && !password_verify($_POST['oldPass'], $this->RegisterModel->takeOneFromTableWhereEqually('UserPassword', 'sportsmensreg', 'UserEmail', $_POST['email']))) {
            $this->viewError('loginErr');
        }
    }

    public function actionResult()
    {
        if(empty($_POST)) {
            $this->viewPage('404Page','404');
            exit();
        } else {
                switch ($this->RegisterModel->userArray($_COOKIE,'sportsmensreg', $_POST, 'update', Session::sessionReturn('id2'))) {
                    case 'emailErr':
                        $this->viewError('emailErr');
                        break;
                    case 'OK':
                        header("Location: /usercabreg");
                }
            }
        }
    }