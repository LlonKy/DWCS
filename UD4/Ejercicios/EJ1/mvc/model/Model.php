<?php
namespace Ejercicios\EJ1\mvc\model;
use Pdo;
class Model
{
    protected static function getConnection()
    {
        $db = new PDO('mysql:host=mariadb; dbname=escolas_infantis', 'root', 'bitnami');
        return $db;
    }
}