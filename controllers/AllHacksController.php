<?php

namespace App\Controllers;

use App\Core\Controller as Controller;

use App\Core\Model as Model;
use App\Models\ChampModel;

// Основной контроллер вывод 404 / глав. страницы

class AllHacksController extends Controller
{
    private $Model;

    // private $pageInDB;

    public function __construct()
    {
        $this->Model = new ChampModel('--');
    }

    public function actionIndex()
    {
        $hacks = $this->Model->getAll('SELECT * FROM champpages');

        $this->viewPage('AllHacksPage', 'allHacks', array(
            'hacks' => $hacks,
        ));

         
    }

    
}