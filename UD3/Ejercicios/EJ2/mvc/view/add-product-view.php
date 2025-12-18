<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Producto</title>
</head>
<body>
      <h2>Formulario de Producto</h2>

    <form action="?controller=ProductController&action=addProduct" method="POST">
        <label for="denominacion">Denominación:</label><br>
        <input type="text" id="denominacion" name="denominacion" required><br><br>

        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion" required></textarea><br><br>

        <label for="precio">Precio:</label><br>
        <input type="number" id="precio" name="precio"  required><br><br>

        <label for="cantidad">Cantidad:</label><br>
        <input type="number" id="cantidad" name="cantidad" required><br><br>

        <input type="submit" value="Agregar Producto">
    </form>
</body>
</html>