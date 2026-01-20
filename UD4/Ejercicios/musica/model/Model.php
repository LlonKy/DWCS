<?php
namespace Ejercicios\musica\model;

use PDO;
class Model{
    protected static function getConnection(){
        $db = new PDO("mysql:host=mariadb; dbname=musica","root","bitnami");
        return $db;
    }
}