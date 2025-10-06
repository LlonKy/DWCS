<?php
//Establecer cnxion
$dsn = "mysql:host=mariadb;dbname=videoteca";

try{
    $db = new PDO($DSN,"root","bitnami");
} catch(PDOException $ex){
    echo "Se ha producido un error";
    die();
}