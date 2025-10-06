<?php
//1. Establecer conexion
$db = new mysqli("mariadb", "root", "bitnami", "mi_base_de_datos");
if($db->connect_error){
    die();
}
$nombre = "david";
$apellido1 = "garcia";
$apellido2 = "aragunde";
$correo = "davicicho11@gmail.com";
$nick = "llonky";
$password = password_hash("ABC123.",PASSWORD_DEFAULT);
//2. Realizar operacion
$sql = "INSERT INTO registro(correo,userNick,nombre,apellido1,apellido2,password) VALUES('$correo','$nick','$nombre','$apellido1','$apellido2','$password')";
$resultado = $db->query($sql);
var_dump($resultado);
//3. Cerrar conexion
$db->close();