<?php

namespace App\Core;

class View
{

    // В РОДИТЕЛЬСКОМ КОНТРОЛЛЕРЕ ТО ЖЕ САМОЕ НАЗВАНИЕ МЕТОДА!!!

    public function viewPage($pageName, $config, $queryArr, $cookieLang, $data = NULL)
    {
        switch ($config) {
            case 'loginInfoADM':
                $config = array(
                    'view' => 'PostInfoLoginView',
                    'title' => 'Error',
                    'css' => 'Admin',
                    'menu' => 'none',
                    'header' => 'panel'
                );
                break;
            case 'panelADM':
                $config = array(
                    'view' => 'AdminPanelView',
                    'title' => 'Panel',
                    'css' => 'Admin',
                    'menu' => 'none',
                    'header' => 'panel'
                );
                break;
            case 'loginADM':
                $config = array(
                    'view' => 'AdminLoginView',
                    'title' => 'Login',
                    'css' => 'Admin',
                    'menu' => 'none',
                    'header' => 'login'
                );
                break;
            case 'champ':
                $config = array(
                    'view' => 'ChampView',
                    'title' => 'Alliance Kumite',
                    'css' => 'Champ'
                );
                break;
            case 'reg':
                $config = array(
                    'view' => 'RegView',
                    'title' => 'Register',
                    'css' => 'Reg',
                    'header' => 'reg'
                );
                break;
            case '404':
                $config = array(
                    'view' => '404View',
                    'title' => '404 Page',
                    'css' => 'Err',
                    'menu' => 'none',
                    'header' => '404err'
                );
                break;
            case 'main':
                $config = array(
                    'view' => 'MainView',
                    'title' => 'Alliance Kumite',
                    'css' => 'Main',
                    'header' => 'main'
                );
                break;
            case 'login':
                $config = array(
                    'view' => 'LoginView',
                    'title' => 'Log in',
                    'css' => 'Login',
                    'header' => 'login'
                );
                break;
            case 'success':
                $config = array(
                    'view' => 'SuccessView',
                    'title' => 'Alliance Kumite',
                    'css' => 'Success',
                    'header' => 'suc'
                );
                break;
            case 'userPanel':
                $config = array(
                    'view' => 'UserPanelView',
                    'title' => 'Panel',
                    'css' => 'UserPanel',
                    'header' => 'userPanel'
                );
                break;
            case 'resetPass':
                $config = array(
                    'view' => 'ResetPasswordView',
                    'title' => 'Reset Password',
                    'css' => 'ResetPass',
                    'header' => 'resetPass'
                );
                break;
            case 'resetWithId':
                $config = array(
                    'view' => 'ResetWithIdView',
                    'title' => 'Reset Password',
                    'css' => 'ResetPass',
                    'header' => 'resetPass'
                );
                break;
            case 'allChamps':
                $config = array(
                    'view' => 'AllChampsView',
                    'title' => 'Наши участники',
                    'css' => 'allchamps',
                    'header' => 'allChamps'
                );
                break;
            case 'regChamp':
                $config = array(
                    'view' => 'RegChampView',
                    'css' => 'Reg',
                    'title' => 'Наши участники',
                    'header' => 'regChamp'
                );
                break;
            case 'userCabReg':
                $config = array(
                    'view' => 'UserCabRegView',
                    'css' => 'UserCab',
                    'header' => 'regChamp'
                );
                break;
            case 'userCab':
                $config = array('view' => 'UserCabView', 'title' => 'Personal Area', 'css' => 'UserCab', 'header' => 'userCab');
                break;
            case 'loginReg':
                $config = array('view' => 'LoginRegView', 'title' => 'Personal Area', 'css' => 'Login', 'header' => 'userCab');
                break;
            case 'allHacks':
                $config = array('view' => 'AllHacksView', 'css' => 'Champ', 'header' => 'userCab');
                break;
        }
        if ($cookieLang === false) {
            $lang = $this->setLanguage("gb");
            if (file_exists(ROOT . '/app/pages/' . $pageName . '.php')) {
                require_once(ROOT . '/app/pages/' . $pageName . '.php');
            }
            return $lang;
        } else {
            $lang = $this->setLanguage($cookieLang);
            if (file_exists(ROOT . '/app/pages/' . $pageName . '.php')) {
                require_once(ROOT . '/app/pages/' . $pageName . '.php');
            }
            return $lang;
        }
    }

    private function setLanguage($langName)
    {
        if (file_exists(ROOT . '/app/content/langs/' . $langName . '.ini')) {
            return parse_ini_file(ROOT . '/app/content/langs/' . $langName . '.ini', TRUE);
        }
    }

    // старый бред

    // -- Массив $array обязан образовываться от работы метода configTake() (Core/Model.php) --

    // Метод для вывода страницы с указанным конфигом в БД

    // public static function viewPageDB($array){
    //     $config = $array['config'];
    //     $query = $array['queryArr'];
    //     if(file_exists(ROOT.'/app/pages/'.$config['pagename'].'Page.php')){
    //     require_once (ROOT.'/app/pages/'.$config['pagename'].'Page.php');   
    //     }
    // }

}
