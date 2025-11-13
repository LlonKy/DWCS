<?php
include_once "acceso_datos.php";
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $idProyecto = $_GET["idProyecto"];
        $p = getProyect($idProyecto);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Proyecto</title>
</head>
<body>
    <h1>holaa</h1>
    <section>
        <?php
            echo "<article>";
            $responsable = getUserbyID($p->responsableId)->nombre;  
            echo "<h2>$p->nombre</h2>";
            echo "<p>Responsable: $responsable</p>";
            echo "<p>$p->descripcion</p>";
            echo "</article>";  
        ?>
    </section>
</body>
</html>