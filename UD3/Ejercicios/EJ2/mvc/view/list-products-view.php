<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Products</title>
</head>
<body>
    <h1>Lista de Productos</h1>

    <table>
        <thead>
            <tr>
                <th>Denominación</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($data as $producto) {
                    echo "<tr>";
                    echo "<td>$producto->denominacion</td>";
                    echo "<td>$producto->descripcion</td>";
                    echo "<td>$producto->precio</td>";
                    echo "<td>$producto->cantidad</td>";
                    echo "</tr>";

                }
            ?>
        </tbody>
</body>
</html>