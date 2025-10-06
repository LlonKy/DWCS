<?php
//Establecer cnxion
function crearConexion(){
    $dsn = "mysql:host=mariadb;dbname=videoteca";

    try{
        $db = new PDO($dsn,"root","bitnami");
            return $db;
    } catch(PDOException $ex){
        echo "Se ha producido un error";
        die();
    }

}
