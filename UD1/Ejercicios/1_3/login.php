<?php
include_once "conexion.php";

$correo = $_POST['correo'] ?? null;
$pwd = $_POST['passwd'] ?? null;

if (isset($correo) && isset($pwd)) {
    $pwd = password_hash($pwd, PASSWORD_DEFAULT);
    $sql = "SELECT correo, password FROM registro where correo = '$correo' and password = '$pwd'";
    $resultado = $db->exec($sql);
   
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="POST">

        <label for="correo">Correo Electronico</label>
        <input type="email" id="correo" name="correo"><br>

        <label for="passwd">Contrasena</label>
        <input type="password" id="passwd" name="passwd"><br>

        <button type="submit">Logearse</button><br>

        <a href="register.php">No tienes cuenta?</a>
    </form>
</body>
</html>