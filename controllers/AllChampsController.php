<?php

namespace App\Controllers;

use App\Core\Controller as Controller;

use App\Core\Model as Model;
use App\Models\ChampModel;

// Основной контроллер вывод 404 / глав. страницы

class AllChampsController extends Controller
{
    private $Model;

    // private $pageInDB;

    public function __construct()
    {
        $this->Model = new ChampModel('--');
    }

    public function actionIndex()
    {
        $clubs = $this->Model->getAll('SELECT * FROM clubs');

         if (isset($_GET['clubs'])) {
            $this->viewPage('AllChampsPage', 'allChamps', array(
                'participants' => $this->Model->takeAllFromTableWhereLimitOrder('sportsmens', 'ClubId', $_GET['clubs'], (!isset($_COOKIE['Limit']) ? 50 : $_COOKIE['Limit']),'Club','ASC'),
                'count' => $this->Model->numRows($this->Model->query('SELECT * FROM ?n WHERE ClubId = ?i','sportsmens', $_GET['clubs'])),
                'clubs' => $clubs,
                'countCookie' => (!isset($_COOKIE['Limit'])) ? 50 : $_COOKIE['Limit'],
            ));
        } else {
            $this->viewPage('AllChampsPage', 'allChamps', array(
                'participants' => $this->Model->takeAllFromTableLimitOrder('sportsmens', (!isset($_COOKIE['Limit']) ? 50 : $_COOKIE['Limit']),'Club','ASC'),
                'countCookie' => (!isset($_COOKIE['Limit'])) ? 50 : $_COOKIE['Limit'],
                'count' => $this->Model->countTable('sportsmens'),
                'clubs' => $clubs,
                'countCookie' => (!isset($_COOKIE['Limit'])) ? 50 : $_COOKIE['Limit'],
            ));
        }
    }

    
}
