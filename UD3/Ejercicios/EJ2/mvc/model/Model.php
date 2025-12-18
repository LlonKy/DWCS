<?php
namespace Ejercicios\EJ2\mvc\model;
use Pdo;
use PDOException;

abstract class Model{
    protected static function getConnection(){
        try {
            $db = new PDO('mysql:host=mariadb; dbname=tienda', 'root', 'bitnami');
        } catch (PDOException $e) {
            die("Error de conexión: ".$e->getMessage());
        }
        return $db;
    }
}