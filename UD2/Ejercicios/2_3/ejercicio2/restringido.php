<?php
session_start();
if ($_SERVER["REQUEST_METHOD" == "POST"]) {
    session_destroy();
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sección restringida</title>
</head>
<body>
    <h1>Sección restringida</h1>
    Estás logueado con el usuario <?php $_SESSION['nic']?>. Pulsa aquí para salir: <a href="">Logout</a>
    <p>
        Esta sección esta restringida solo para los usuarios que están registrados.
    </p>
</body>
</html>