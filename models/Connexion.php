<?php

class Connexion
{
    private $db;

    public function setConnexion(){

        self::$db = new PDO('mysql:dbname=???;host=127.0.0.1','root','');
        self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    }

    public function getConnexion(){
        if(self::$db == null){
            self::setConnexion();
        }
        return self::$db;
    }
}