<?php
include_once "conexion.php";

$correo = $_POST['correo'] ?? null;
$nick = $_POST['nick'] ?? null;
$nombre = $_POST['nombre'] ?? null;
$ape1 = $_POST['ape1'] ?? null;
$ape2 = $_POST['ape2'] ?? null;
$pwd = $_POST['passwd'] ?? null;

if (!empty($correo) && !empty($nick) && !empty($pwd)) {
    $pwd = password_hash($pwd, PASSWORD_DEFAULT);
    $db = crearConexion();

    $check = $db->prepare("SELECT * FROM registro WHERE correo = ? OR userNick = ?");
    $check->execute([$correo, $nick]);
    if ($check->rowCount() > 0) {
        echo "Ya existe un usuario con ese correo o nick.";
    } else {
        $sql = "INSERT INTO registro (correo, userNick, nombre, apellido1, apellido2, password)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([$correo, $nick, $nombre, $ape1, $ape2, $pwd]);
        echo "Registro completado. <a href='login.php'>Inicia sesión</a>";
    }

    $db = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Registrarse en la Videoteca</h2>

    <form action="" method="POST">
        <label for="correo">Correo Electronico</label>
        <input type="email" id="correo" name="correo"><br>

        <label for="nick">User Nick</label>
        <input type="text" id="nick" name="nick"><br>

        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre"><br>

        <label for="ape1">Primer Apellido</label>
        <input type="text" id="ape1" name="ape1"><br>

        <label for="ape2">Segundo Apellido</label>
        <input type="text" id="ape2" name="ape2"><br>

        <label for="passwd">Contrasena</label>
        <input type="password" id="passwd" name="passwd"><br>

        <button type="submit">Registrarse</button><br>

        <a href="login.php">Ya estás registrado?</a>
    </form>
</body>
</html>