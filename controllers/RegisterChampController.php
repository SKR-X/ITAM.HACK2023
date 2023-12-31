<?php

namespace App\Controllers;

use App\Core\Controller;

use App\Models\RegisterChampModel;

use App\Controllers\LoginController;

class RegisterChampController extends Controller
{

    private $RegistrationModel;

    public function __construct()
    {
        $this->RegistrationModel = new RegisterChampModel();
    }


    public function actionIndex()
    {
        $this->viewPage('RegChampPage','regChamp',array('countries' => $this->RegistrationModel->takeAllFromTable('countries'),'clubs' => $this->RegistrationModel->takeAllFromTable('clubs')));
    }

    public function actionResult()
    {
        if(empty($_POST)) {
            $this->viewPage('404Page','404');
            exit();
        } else {
                switch ($this->RegistrationModel->userArray($_COOKIE,'sportsmensreg', $_POST, 'reg')) {
                    case 'email':
                        $this->viewError('emailReg');
                        break;
                    case 'emailErr':
                        $this->viewError('emailErr');
                        break;
                    case 'OK':
                        $this->viewPage('SuccessPage','success');
                        break;
                }
            }
        }
}
