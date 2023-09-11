<?php

// Таблица городов. Аякс при смене страны (замена последующих пунктов). Окно добавления участников

namespace App\Models;

use App\Core\Model;

use App\Core\Github\Mailer\PHPMailer;
use App\Core\Github\Mailer\SMTP;

class RegisterChampModel extends Model
{

    private $mail;

        public function __construct()
        {
            $this->mail = new PHPMailer();
            parent::__construct();
        }

        public function toJSONArray($data) {
            foreach ($data as $key => $value) {
                $value = json_encode($value, JSON_UNESCAPED_UNICODE);
            }
            return $data;
        }

        public function toJSON($data) {
            return json_encode($data, JSON_UNESCAPED_UNICODE);
        }

        public function makeData() {
            $data['City'] = $this->takeAllFromTableWhereEqually('cities', 'CountryId', $_POST['CountryId']);
            $data['Region'] = $this->takeAllFromTableWhereEqually('regions', 'CountryId', $_POST['CountryId']);
            $data['Club'] = $this->takeAllFromTableWhereEqually('clubs', 'CountryId', $_POST['CountryId']);

            // не проверено

            return $this->toJSONArray($data);
        }

        public function contextSearch($table,$value) {
            switch ($table) {
                case 'Region':
                    return $this->getAll('SELECT RegionName FROM regions WHERE RegionName LIKE ?s LIMIT 5',"%$value%");
                    break;
                case 'City':
                    return $this->getAll('SELECT CityName FROM cities WHERE CityName LIKE ?s LIMIT 5',"%$value%");
                    break;
                case 'Club':
                    return $this->getAll('SELECT ClubName FROM clubs WHERE ClubName LIKE ?s LIMIT 5',"%$value%");
                    break;
            }
        }
        
        private function checkTableForDuplicate($table,$id,$str) {
            
            return $this->getAll('SELECT * FROM ?n WHERE LOWER(?n) = ?s', $table,$id,$str);
            
        }

        public function userArray($COOKIE,$table,$array, $type, $id = NULL) {
            
            $array['UserEmail'] = strtolower($array['UserEmail']);

            if($type == 'reg' && $this->takeAllFromTableWhereEqually('sportsmensreg','UserEmail',$array['UserEmail'])) {
                return 'email';
            }

            $array['UserEmail'] = strtolower($array['UserEmail']);

            if($type == 'update') {
                unset($array['oldPass']);
                $this->updateArray('sportsmensreg',$array,array('name' => 'UserId', 'str' => $id));
                return 'OK';
            }

            // Записываем все про юзера в бд
            if($array['UserPassword'] = $this->generatePassMail($array['UserEmail'])) {
                $this->insertArray($table,$array);
                return 'OK';
            } else {
                return 'emailErr';
            }
        }

        public function generatePassMail($email)
        {

            $arr = array('a','b','c','d','e','f',
                'g','h','i','j','k','l',
                'm','n','o','p','r','s',
                't','u','v','x','y','z',
                'A','B','C','D','E','F',
                'G','H','I','J','K','L',
                'M','N','O','P','R','S',
                'T','U','V','X','Y','Z',
                '1','2','3','4','5','6',
                '7','8','9','0','.',',',
                '(',')','[',']','!','?',
                '&','^','%','@','*','$',
                '<','>','/','|','+','-',
                '{','}','`','~');
            // Генерируем пароль
            $pass = "";
            for($i = 1; $i <= 10; $i++)
            {
                // Вычисляем случайный индекс массива
                $index = rand(0, count($arr) - 1);
                $pass .= $arr[$index];
            }

            $passHash = password_hash($pass, PASSWORD_DEFAULT);

                //Server settings
                $this->mail->SMTPDebug = SMTP::DEBUG_OFF;                      // ТУТ ДОЛБАНИ ДЛЯ ДЕБАГА, там просто ECHO на страничку (SERVER)
                $this->mail->isSMTP();                                            // Send using SMTP
                $this->mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $this->mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $this->mail->Username   = '';                     // SMTP username
                $this->mail->Password   = '';                               // SMTP password
                $this->mail->Port = 587;
                $this->mail->CharSet = "utf-8";
                $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                                   // TCP port to connect to

                //Recipients
                $this->mail->setFrom('ITAMH.HACK@gmail.com', 'ITAM.HACK');
                $this->mail->addAddress($email);     // Add a recipient

                // Content
                $this->mail->isHTML(false);                                  // Set email format to HTML
                $this->mail->Subject = 'ITAM.HACK';
                $this->mail->Body = 'Your password is ' . $pass;

                if($this->mail->send()) {
                    return $passHash;
                } else {
                    return false;
                }
        }
        
}

