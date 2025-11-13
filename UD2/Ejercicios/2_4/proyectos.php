<?php
include_once "acceso_datos.php";

$proyectos = getProyects();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos</title>
</head>
<body>
    <section>
        <?php
            foreach ($proyectos as $p) {
                echo "<article>";
                $responsable = getUserbyID($p->responsableId)->nombre;  
                echo "<h2>$p->nombre</h2>";
                echo "<p>Responsable: $responsable</p>";
                echo "<p>$p->descripcion</p>";
                echo "<a href='proyectoVer.php?idProyecto=$p->idProyecto'>Ver</a>";
                echo "</article>";  
            }
        ?>
    </section>
</body>
</html>