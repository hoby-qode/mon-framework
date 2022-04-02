<?php 

namespace Core;
use PDO;
class Utils {

    public static function redirect($url):void {
        header("location:$url");
        exit();
    }

    public static function bdd() {
        return new PDO('mysql:host=localhost;dbname=php_poo;charset=utf8','root','', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]);
    }
}