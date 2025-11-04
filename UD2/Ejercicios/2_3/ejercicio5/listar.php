<?php
include_once "funciones.php";

$carrito = null;
$producto = $_POST["producto"] ?? null;

if (!comprobar_producto($producto)) {
    addProducto($producto);
} else {
    
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $carrito = listarCarrito();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Productos</title>
</head>
<body>
    <form method="POST">
        <label for="producto">Producto</label>
        <input type="text" id="producto" name="producto">
    </form>

    <table>
        <?php

        echo "<tr>";
        echo "    <th>Nic</th>";
        echo "    <th>NombreProducto</th>";
        echo "    <th>Cantidad</th>";
        echo "</tr>";

        foreach ($carrito as $c) {
            echo "<tr>";
            echo "<td>", $c->nic, "</td>";
            echo "<td>", $c->nombreProducto, "</td>";
            echo "<td>", $c->cantidadProducto, "</td>";
            //echo "<td> <a href='?eliminar=", $v->getId(), "'>Eliminar</a><br><a href='modificar.php?id=", $v->getId(), "'>Modificar</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>