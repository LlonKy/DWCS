<?php
include_once "funciones.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && comprobar_usuario($_POST['nic'],$_POST['pass'])) {
    session_start();
    $_SESSION["nic"] = $_POST['nic'];
    $_SESSION["pass"] = $_POST['pass'];
    header("Location: restringido.php");
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <fieldset>
        <form action="" method="post">
            <label for="nic">Nombre de usuario (nic)</label><br>
            <input type="text" name="nic"><br>
            <label for="pass">Contraseña</label><br>
            <input type="password" name="pass"><br>
            <button type="submit">Acceder</button>
        </form>
    </fieldset>
    <a href="registro.php">Registrar usuario</a>
    
</body>
</html>