<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir cliente</title>
</head>
<body>
     <h2>Formulario de Cliente</h2>
    <form action="?controller=ClientController&action=addClient" method="POST">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apellidos">Apellidos:</label><br>
        <input type="text" id="apellidos" name="apellidos" required><br><br>

        <label for="telefono">Teléfono:</label><br>
        <input type="number" id="telefono" name="telefono" required><br><br>

        <label for="mail">Correo Electrónico:</label><br>
        <input type="email" id="mail" name="mail" required><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>