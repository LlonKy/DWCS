<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Clientes</title>
</head>
<body>
     <h1>Lista de Clientes</h1>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Telefono</th>
                <th>Mail</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($data as $cliente) {
                    echo "<tr>";
                    echo "<td>$cliente->nombre</td>";
                    echo "<td>$cliente->apellidos</td>";
                    echo "<td>$cliente->telefono</td>";
                    echo "<td>$cliente->mail</td>";
                    echo "</tr>";

                }
            ?>
        </tbody>
</body>
</html>