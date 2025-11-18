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
            <th>Codigo</th>
            <th>Fecha</th>
            <th>Titulo</th>
        </tr>
        <?php
        // Recorremos fila a fila el resultado de la consulta
        foreach ($data as $row) {
            echo "<tr>";
            echo "<td> " . $row['cod_articulo'] . " </td>";
            echo "<td> " . $row['fecha'] . " </td>";
            echo "<td> " . $row['titulo'] . " </td>";
            echo '<td> <a href="?controller=ReviewController&action=listarReviews&cod_articulo='.$row['cod_articulo'].'">Reviews</a> </td>';
            echo "</tr>";
        }
        echo "</table>";

        ?>
    </table>
</body>

</html>