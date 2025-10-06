<?php
//Establecer cnxion
$dsn = "mysql:host=mariadb;dbname=mi_base_de_datos";

try{
    $db = new PDO($dsn,"root","bitnami");
} catch(PDOException $ex){
    echo "Se ha producido un error";
    die();
}