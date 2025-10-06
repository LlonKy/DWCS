<?php
include_once "conexion.php";

$nombre = $_POST['nombre'] ?? null;
$plataforma = $_POST['plataforma'] ?? null;
$anio = $_POST['anio'] ?? null;
$genero = $_POST['genero'] ?? null;

if (!empty($nombre) && !empty($plataforma) && !empty($anio) && !empty($genero)) {
    $db = crearConexion();

    $sql = "INSERT INTO videojuegos (nombre,plataforma,anio_lanzamiento,genero) VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->execute([$nombre, $plataforma, $anio, $genero]);
    $db = null;
} else {
    $mensaje = "Todos los campos son obligatorios";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Videojuego</title>
</head>
<body>
    
<form method="POST" action="">
    <label>Nombre:</label>
    <input type="text" name="nombre" required><br>

    <label>Plataforma:</label>
    <input type="text" name="plataforma" required><br>

    <label>Año de lanzamiento:</label>
    <input type="number" name="anio" required><br>

    <label>Genero:</label>
    <input type="text" name="genero" required><br>

    <button type="submit">Guardar Videojuego</button>
</form>


<a href="index.php">Volver al listado de juegos</a>
</body>
</html>