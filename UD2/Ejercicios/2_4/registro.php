<?php
include_once "acceso_datos.php";
$roles = getRoles();
$correo = $_POST["correo"] ?? null;
$nombre = $_POST["nombre"] ?? null;
$rolId = $_POST["rolId"] ?? null;
$pwd = $_POST["pass"] ?? null;
$pwd2 = $_POST["pass2"] ?? null;
if (isset($roles) && isset($correo) && isset($nombre) && isset($rolId) && isset($pwd) && isset($pwd2) && !comprobar_usuario($correo,$pwd)) {
    alta_usuario($correo,$nombre,$rolId,$pwd,$pwd2);
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
        <form action="" method="post">
            <label for="correo">Correo electrónico</label><br>
            <input type="email" name="correo" required><br>
            <label for="nombre">Nombre</label><br>
            <input type="text" name="nombre" required><br>
            <?php
            echo "<select name='rolId' id='rolId'>Rol";
            foreach ($roles as $r) {
            echo "<option value=$r->rolId>$r->nombre</option>";
        }
            echo "</select><br>"
           ?>
            <label for="pass">Contraseña</label><br>
            <input type="password" name="pass" required><br>
            <label for="pass2">Repita la contraseña</label><br>
            <input type="password" name="pass2" required><br>
            <button type="submit">Guardar</button>
        </form>
    </fieldset>
    <a href="login.php">Login</a>
</body>
</html>