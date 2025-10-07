<?php
include_once "conexion.php";

$correo = $_POST['correo'] ?? null;
$pwd = $_POST['passwd'] ?? null;
$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] === "POST"){
    if (!empty($correo) && !empty($pwd)) {
    $db = crearConexion();

    $sql = "SELECT password FROM registro WHERE correo = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$correo]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($pwd, $usuario['password'])) {
        $mensaje = "Bienvenido, has iniciado sesión correctamente.";
    } else {
        $mensaje = "Correo o contraseña incorrectos.";
    }

    $db = null;
}
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