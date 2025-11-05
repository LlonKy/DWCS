<?php
include_once "acceso_datos.php";
session_start();

$correo = $_POST["mail"] ?? null;
$pass = $_POST["pass"] ?? null;

if ($_SERVER["REQUEST_METHOD"] == "POST" && comprobar_usuario($correo,$pass)) {
    $userRol = getRol(getUserRol($correo));
    $_SESSION["rol"] = $userRol->rolId;

    if (isset($_SESSION["rol"])) {
        switch ($_SESSION["rol"]) {
            case '1':
                header("Location: paginajefe.php");
                break;
             case '2':
                header("Location: paginaprogramador.php");
                break;
             case '3':
                header("Location: paginaresponsable.php");
                break;
            
            default:
                break;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <fieldset>
        <form method="post">
            <label for="mail">Correo electrónico</label><br>
            <input type="email" name="mail" required><br>
            <label for="pass">Contraseña</label><br>
            <input type="password" name="pass" required><br>
            <button type="submit">Login</button>
        </form>
    </fieldset>
    <a href="registro.php">Registrarse</a>
</body>
</html>