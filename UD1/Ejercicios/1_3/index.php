<?php
include_once "conexion.php";

$db = crearConexion();

$stmt = $db->query("SELECT * FROM videojuegos ORDER BY id");
$videojuegos = $stmt->fetchAll(PDO::FETCH_ASSOC);
$db = null;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Videojuegos</title>
</head>
<body>
    <h1>Videojuegos Registrados</h1>
    <a href="agregar.php">Agregar un nuevo videojuego</a><br>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Plataforma</th>
            <th>Anio Lanzamiento</th>
            <th>Genero</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($videojuegos as $v): ?>
            <tr>
                <td><?php echo ($v['id'])?></td>
                <td><?php echo($v['nombre'])?></td>
                <td><?php echo($v['plataforma'])?></td>
                <td><?php echo($v['anio_lanzamiento'])?></td>
                <td><?php echo($v['genero'])?></td>
                <td>
                    <a href="editar.php?id=<?php $v['id']?>">Editar</a>
                    <a href="eliminar.php?id=<?php $v['id']?>">Eliminar</a>
                </td>
            </tr>
            
        <?php endforeach; ?>
    </table>

</body>
</html>