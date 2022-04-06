<?php 

namespace Config;

use PDO;

class DataBase
{
    public function bdd()
    {
        try {
            return new PDO('mysql:host='.$_ENV['DB_HOST'].';dbname='.$_ENV['DB_NAME'].';charset=utf8',$_ENV['DB_USER'],$_ENV['DB_PASSWORD'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ]);
        }catch (\Exception $e) {
            echo '<h1>';
                echo $e->getMessage();
            echo '</h1>';
            die();
        }
    }
}