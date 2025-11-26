<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista productos</title>
</head>

<body>
    <h1>Listado de Artículos</h1>
    <table>
        <tr>
            <th>Descripcion</th>
            <th>Hora y fecha</th>
        </tr>
        <?php
        // Recorremos fila a fila el resultado de la consulta
        echo "<table>";
        foreach ($data as $row) {
            echo "<tr>";
            echo "<td> " . $row['descripcion'] . " </td>";
            echo "<td> " . $row['fecha_hora'] . " </td>";
            echo "</tr>";
        }
        echo "</table>";


        ?>
    </table>
</body>

</html>