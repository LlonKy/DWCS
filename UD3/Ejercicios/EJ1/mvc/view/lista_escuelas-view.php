<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escuelas</title>
</head>
<body>
    <h1>Listado de Escuelas de Galicia</h1>
    <form action="?controller=EscuelaController&action=listarEscuelas" method="POST">
        <select name="filtroMunicipios" id="filtroMunicipios">
            <?php
            $municipios = $data['municipios'];
            foreach ($municipios as $m) {
                echo "<option value='$m->nombre'>$m->nombre</option>";
            }
    
            ?>
        </select>
        <label for="nombre">Filtrar por nombre</label>
        <input type="text" name="nombre" id="nombre">
        <label for="enviar">Filtrar</label>
        <input type="submit" id="enviar" value="Enviar">

    </form>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Municipio</th>
            <th>Hora Apertura</th>
            <th>Hora Cierre</th>
            <th>Comedor</th>
        </tr>
        <?php
            $escuelas = $data['escuelas'];
            foreach ($escuelas as $row) {
            echo "<tr>";
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