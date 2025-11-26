<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escuelas</title>
</head>
<body>
    <h1>Listado de Escuelas de Galicia</h1>
    <table>
        <tr>
            <th>Cod Escuela</th>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Cod Municipio</th>
            <th>Hora Apertura</th>
            <th>Hora Cierre</th>
            <th>Comedor</th>
        </tr>
        <?php
            foreach ($data as $row) {
            echo "<tr>";
            echo "<td> " . $row->cod_escuela . " </td>";
            echo "<td> " . $row->nombre . " </td>";
            echo "<td> " . $row->direccion . " </td>";
            echo "<td> " . $row->cod_municipio . " </td>";
            echo "<td> " . $row->hora_apertura . " </td>";
            echo "<td> " . $row->hora_cierre . " </td>";
            echo "<td> " . $row->comedor . " </td>";

            echo "</tr>";
            }
        ?>
    </table>
</body>
</html>