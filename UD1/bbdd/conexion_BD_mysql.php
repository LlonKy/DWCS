<?php
//1. Establecer conexion
$db = new mysqli("mariadb", "usuarioDB", "abc123", "mi_base_de_datos");
if($db->connect_error){
    die();
}

//2. Realizar operacion
$sql = "INSERT INTO clientes(nombre,telefono) VALUES('Persona','667218510')";
$resultado = $db->query($sql);
var_dump($resultado);
//3. Cerrar conexion
$db->close();