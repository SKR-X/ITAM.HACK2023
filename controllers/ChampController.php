<?php

namespace App\Controllers;

use App\Core\Controller as Controller;

use App\Models\ChampModel as Model;

class ChampController extends Controller
{

    private $Model;
    private $urlName;

    public function __construct($urlName)
    {
        $this->Model = new Model($urlName);
        $this->urlName = $urlName;
    }


    public function ChampInfo()
    {

        switch ($this->Model->checkDate()) {
            case 'err':
                $this->viewError('champds');
                exit();
                break;
            case 'reg':
                header('Location: /login?champ='.$this->urlName);
                break;
        }

        foreach ($_GET as $key => $value) {
            if (!is_numeric($value) && $key!='posts') {
                unset($_GET[$key]);
            }
        }

        $champInfo = $this->Model->takeAllFromTableWhereEqually('champpages', 'UrlName', $this->urlName);
        $countries = $this->Model->countriesInner();
        $cats = $this->Model->categoriesInner();
        $clubs = $this->Model->clubsInner();
        $tatamiMenu = $this->Model->categoriesTatami();
        $tatamiMenuOnline = $this->Model->takeIdFromTable('TatamiId',$this->urlName.'_tatami');
        $posts = $this->Model->postsInner();

        if(isset($_GET['posts'])) {
            $this->viewPage('ChampPage', 'champ', array(
                'champInfo' => $champInfo,
                'posts' =>  $posts,
                'clubs' => $clubs,
            ));
        } else if (isset($_GET['clubs'])) {
            $this->viewPage('ChampPage', 'champ', array(
                'countries' => $countries,
                'champInfo' => $champInfo,
                'categories' => $cats,
                'participants' => $this->Model->takeAllFromTableWhereLimitOrder($this->urlName . '_participants', 'ClubId', $_GET['clubs'], (!isset($_COOKIE['Limit']) ? 50 : $_COOKIE['Limit']),'FIO','ASC'),
                // TODO УБРАТЬ! SQL-запросы в контроллерах недопустимы.
                'count' => $this->Model->numRows($this->Model->query('SELECT * FROM ?n WHERE ClubId = ?i',$this->urlName . '_participants', $_GET['clubs'])),
                'clubs' => $clubs,
                'countCookie' => (!isset($_COOKIE['Limit'])) ? 50 : $_COOKIE['Limit'],
                'tatamiMenu' => $tatamiMenu,
                'tatamiMenuOnline' => $tatamiMenuOnline,
            ));
        } else if(isset($_GET['tatami'])) {
            $this->viewPage('ChampPage', 'champ', array(
                'countries' => $countries,
                'champInfo' => $champInfo,
                'categories' => $cats,
                'clubs' => $clubs,
                'tatamiMenu' => $tatamiMenu,
                'tatamiMenuOnline' => $tatamiMenuOnline,
                'tatami' => $tatamiMenu[$_GET['tatami'] - 1]
            ));
        } else if (isset($_GET['countries']) && !isset($_GET['categories'])) {
            $this->viewPage('ChampPage', 'champ', array(
                'countries' => $countries,
                'champInfo' => $champInfo,
                'categories' => $cats,
                'clubs' => $clubs,
                'participants' => $this->Model->takeAllFromTableWhereLimitOrder($this->urlName . '_participants', 'CountryId', $_GET['countries'], (!isset($_COOKIE['Limit']) ? 50 : $_COOKIE['Limit']),'FIO','ASC'),
                'tatamiMenu' => $tatamiMenu,
                'countCookie' => (!isset($_COOKIE['Limit'])) ? 50 : $_COOKIE['Limit'],
                'count' => $this->Model->numRows($this->Model->query('SELECT * FROM ?n WHERE CountryId = ?i',$this->urlName . '_participants', $_GET['countries'])),
                'tatamiMenuOnline' => $tatamiMenuOnline,
            ));
        } else if(!isset($_GET['countries']) && isset($_GET['categories'])) {
            $this->viewPage('ChampPage', 'champ', array(
                'countries' => $countries,
                'champInfo' => $champInfo,
                'categories' => $cats,
                'clubs' => $clubs,
                'participants' => $this->Model->takeAllFromTableWhereLimit($this->urlName.'_participants','CategoryId',$_GET['categories'],(!isset($_COOKIE['Limit']) ? 50 : $_COOKIE['Limit'])),
                'tatamiMenu' => $tatamiMenu,
                'count' => $this->Model->numRows($this->Model->query('SELECT * FROM ?n WHERE CategoryId = ?i',$this->urlName . '_participants', $_GET['categories'])),
                'tatamiMenuOnline' => $tatamiMenuOnline,
            ));
        } else if(empty($_GET)) {
            $this->viewPage('ChampPage', 'champ', array(
                'countries' => $countries,
                'champInfo' => $champInfo,
                'categories' => $cats,
                'clubs' => $clubs,
                'participants' => $this->Model->takeAllFromTableLimitOrder($this->urlName . '_participants', (!isset($_COOKIE['Limit']) ? 50 : $_COOKIE['Limit']),'FIO','ASC'),
                'tatamiMenu' => $tatamiMenu,
                'countCookie' => (!isset($_COOKIE['Limit'])) ? 50 : $_COOKIE['Limit'],
                'count' => $this->Model->countTable($this->urlName . '_participants'),
                'tatamiMenuOnline' => $tatamiMenuOnline,
            ));
        }
    }
}