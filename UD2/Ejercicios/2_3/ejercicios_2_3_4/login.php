<?php
include_once "funciones.php";
session_start([ 
        'cookie_path' => '/',
        'cookie_lifetime' => 600,
        'cookie_secure' => true,
        'cookie_httponly' => true,
        'cookie_samesite' => 'login.php',
    ]);



$recordar = $_POST['recordar'] ?? null;

if (isset($_SESSION['nic'])) {
    header("Location: restringido.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && comprobar_usuario($_POST['nic'],$_POST['pass']) && isset($recordar)) {
    $_SESSION['nic'] = $_POST['nic'];
    $_SESSION['pass'] = $_POST['pass'];
    setcookie("COOKIE_RECORDAR", $_SESSION['nic'], time()+84600 * 30);
    header("Location: restringido.php");
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && comprobar_usuario($_POST['nic'],$_POST['pass'])) {
    $_SESSION['nic'] = $_POST['nic'];
    $_SESSION['pass'] = $_POST['pass'];
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
            <input type="text" name="nic" value = "<?php if (isset($_COOKIE['COOKIE_RECORDAR'])) {
                echo $_COOKIE['COOKIE_RECORDAR'];
            }?>"><br>
            <label for="pass">Contraseña</label><br>
            <input type="password" name="pass"><br>
            <label for="recordar">Recuerdame</label>
            <input type="checkbox" id ="recordar" name="recordar"><br>
            <button type="submit">Acceder</button>
        </form>
    </fieldset>
    <a href="registro.php">Registrar usuario</a>
    
</body>
</html>