<?php
include_once "acceso_datos.php";
session_start();
$responsables = getResponsables();
$nombre = $_POST["nombre"];
$responsableId = $_POST["responsable"];
$descripcion = $_POST["desc"];

if ($_SESSION["rol"] != 1) {
    header("Location: x.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    addProyect($nombre,$responsableId,$descripcion);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Proyecto</title>
</head>
<body>
    <h1>Nuevo Proyecto</h1>
    <fieldset>
        <form method="post">
            <label for="nombre">Nombre del Proyecto</label>
            <input type="text" name="nombre" id="nombre"><br>
            <?php
            echo "<select name='responsable' id='responsable'>Responsable";
            foreach ($responsables as $r) {
            echo "<option value=$r->idUser>$r->nombre</option>";
        }
            echo "</select><br>"
           ?>
            <label for="nombre">Descripcion</label>
            <input type="textarea" name="desc" id="desc"><br>
            <button type="submit">Guardar</button>
            
        </form>
    </fieldset>
</body>
</html>