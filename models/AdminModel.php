<?php

namespace App\Models;

use App\Core\Model as Model;

class AdminModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function deleteTables($table)
    {
        if($this->deleteTable($table . "_categories") &&
        $this->deleteTable($table . "_participants") &&
        $this->deleteTable($table . "_posts") &&
        $this->deleteAllFromTableWhereEqually("champpages", "UrlName", $table)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function createTablesChamp($table)
    {
        $this->query('CREATE TABLE IF NOT EXISTS ' . $table . "_categories" . ' (
        CategoryId INT UNSIGNED NOT NULL AUTO_INCREMENT,
        CategoryName TEXT,
        CategoryFileDraw TEXT,
        Categorytatami INT,
        PRIMARY KEY (CategoryID))');
        $this->query('CREATE TABLE IF NOT EXISTS ' . $table . "_posts" . ' (
        PostId INT UNSIGNED NOT NULL AUTO_INCREMENT,
        Header Text,
        Info Text,
        Image Text,
        Date DATE,
        PRIMARY KEY (PostId))');
        $this->query('CREATE TABLE IF NOT EXISTS ' . $table . "_participants" . ' (
        ParticipantId INT UNSIGNED NOT NULL AUTO_INCREMENT,
        CountryName TEXT,
        CountryId INT,
        Club TEXT,
        ClubId INT,
        Region TEXT,
        RegionId INT,
        Coach TEXT,
        CoachId INT,
        CategoryId INT,
        FIO TEXT,
        Photo TEXT,
        Gender TEXT,
        School TEXT,
        Grade TEXT,
        DateBr DATE,
        Weight TEXT,
        Kata boolean,
        Kumite boolean,    
        PRIMARY KEY (ParticipantId))');
        return true;
    }

    // public function parseTXT()
    // {
    //     echo $this->uploadDir . basename($_FILES['userfile']['name']) . '<br>';
    //     if (move_uploaded_file($_FILES['userfile']['tmp_name'], $this->uploadDir . basename($_FILES['userfile']['name']))) {
    //         if (($handle = fopen($this->uploadDir . basename($_FILES['userfile']['name']), 'r')) !== FALSE) {
    //             while (($data = fgetcsv($handle, 1000, ';')) !== FALSE) {
    //                 $num = count($data);
    //                 for ($c = 0; $c < $num; $c++) {
    //                     switch ($c) {
    //                         case 0:
    //                             echo 'FIO:' . iconv('windows-1251', 'utf-8', $data[$c]) . '<br>';
    //                             break;
    //                         case 1:
    //                             echo 'Country:' . $data[$c] . '<br>';
    //                     }
    //                 }
    //             }
    //         } else {
    //             return 'ERR IN FOPEN';
    //         }
    //     } else {
    //         return 'ERR IN UPLOADING';
    //     }
    // }
}
