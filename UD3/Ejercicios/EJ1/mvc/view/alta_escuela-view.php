<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Escuela</title>
</head>
<body>
    <form action="?controller=EscuelaController&action=altaEscuela" method="POST">

    <label for="nombre">Nombre de la Escuela:</label>
    <input type="text" id="nombre" name="nombre" required>
    <br>

    <label for="direccion">Dirección:</label>
    <input type="text" id="direccion" name="direccion" required>
    <br>

    <label for="hora_apertura">Hora de Apertura:</label>
    <input type="time" id="hora_apertura" name="hora_apertura" required>
    <br>

    <label for="hora_cierre">Hora de Cierre:</label>
    <input type="time" id="hora_cierre" name="hora_cierre" required>
    <br>

    <label for="comedor">¿Tiene Comedor?</label>
    <select id="comedor" name="comedor" required>
        <option value="S">Sí</option>
        <option value="N">No</option>
    </select>
    <br>

    <label for="municipio">Municipio</label>
    <select id="municipio" name="municipio" required>
    <?php
        $municipios = $data;
        foreach ($municipios as $m) {
            echo "<option value='$m->cod_municipio'>$m->nombre</option>";
        }
    
    ?>
    </select>
    <br>
    <input type="submit" value="Enviar">
</form>
</body>
</html>