<?php
include_once "conexion.php";
$db = crearConexion();

$id = $_GET['id'] ?? null;
$nombre = $_POST['nombre'];
$plataforma = $_POST['plataforma'];
$anio = $_POST['anio'];
$genero = $_POST['genero'];

if (!$id) {
   die("Id no proporcionado");
}

$stmt = $db->prepare("SELECT * FROM videojuegos where id = ?");
$stmt->execute([$id]);
$videojuego = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$videojuego) {
    die("Videojuego no encontrado");
}

if (!empty($nombre) && !empty($plataforma) && !empty($anio) && !empty($genero)) {
    $sql = "UPDATE videojuegos SET nombre=?, plataforma=?,anio_lanzamiento=?,genero=? WHERE id=?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$nombre,$plataforma,$anio,$genero,$id]);
}

$db = null;

?>


<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Editar Videojuego</title>
</head>
<body>
<h2>Editar videojuego</h2>

<form method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?php echo ($videojuego['nombre'])?>" required><br>

    <label>Plataforma:</label>
    <input type="text" name="plataforma" value="<?php echo ($videojuego['plataforma']) ?>" required><br>

    <label>Año de lanzamiento:</label>
    <input type="number" name="anio" value="<?php echo($videojuego['anio_lanzamiento']) ?>" required><br>

    <label>Genero:</label>
    <input type="text" name="genero" value="<?php echo($videojuego['genero']) ?>" required><br>

    <button type="submit">Guardar cambios</button>
</form>

<a href="index.php">Volver</a>
</body>
</html>