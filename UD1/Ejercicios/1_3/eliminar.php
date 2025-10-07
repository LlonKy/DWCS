<?php
include_once "conexion.php";
$id = $_GET['id'] ?? null;
$db = crearConexion();

if (!$id) {
    die("Id no encontrado");
}

$stmt = $db->prepare("SELECT * FROM videojuegos where id = ?");
$stmt->execute([$id]);
$videojuego = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (!$videojuego) {
    die("Videojuego no encontrado");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $sql = $db->prepare("DELETE FROM videojuegos where id = ?");
    $resultado = $sql->execute([$id]);
}

if ($resultado) {
    header('Location: /Ejercicios/1_3/index.php');
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Editar Videojuego</title>
</head>
<body>
<h2>Eliminar Videojuego</h2>

<p>Estas seguro de que quieres eliminar este juego?</p>

  <?php foreach ($videojuego as $v): ?>
            <tr>
                <td><?php echo($v['nombre'])?></td>
                <td><?php echo($v['plataforma'])?></td>
                <td><?php echo($v['anio_lanzamiento'])?></td>
                <td><?php echo($v['genero'])?></td>
            </tr><br>
        <?php endforeach; ?>

    <form action="" method="POST">
        <button type="submit">Eliminar videojuego</button><br>
        
    </form>
<a href="index.php">Volver a la pagina principal</a>
</body>
</html>