<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen UD4</title>
</head>
<style>
    table{
        margin-left: 2%;
        margin-right: 2%;
    }
    .ejercicio{
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        width: 100px;
        vertical-align: top;
        padding: 10px 20px 10px 20px;
    }

    .puntuacion{
        font-family:'Courier New', Courier, monospace;
        font-weight: bold;
        color: green;
        width: 100px;
        vertical-align: top;
        padding: 10px 20px 10px 20px;
    }

    .enunciado{
        font-family: Arial, Helvetica, sans-serif;
        text-align: justify;
        line-height: 1.5;
        padding: 10px 20px 10px 20px;
        
    }


</style>

<body>
    <?php include "header.html" ?>
    <h1>Examen UD4</h1>
    <h2>Modelo Vista Controlador</h2>
    <table>
        <tr>
            <td class="ejercicio">Ejercicio 1</td>
            <td class="enunciado">
            Respetando el modelo vista controlador, implementa una página que muestre en una tabla los coches registrados en la base de datos. Las columnas de la tabla deben ser: matrícula, marca, modelo y color. La página tendrá un filtro para buscar coches por color y si este filtro no se cubre mostrará todos los coches. <br>Ten en cuenta las siguientes especificaciones:
                <ul>
                    <li>La ruta para acceder a la página será: http://localhost?controller=CocheController&action=listarCoches</li>
                    <li>Los scripts que contengan las vistas deben finalizar con -view.php.</li>
                    <li>Las vistas se cargan desde el método show de la clase /vista/View.</li>
                </ul>
            </td>
            <td class="puntuacion">5 puntos</td>
        </tr>
        <tr>
            <td class="ejercicio">Ejercicio 2</td>
            <td class="enunciado">
            Respetando el modelo vista controlador, implementa una página que permita registrar nuevos conductores. Los datos de un conductor son: nombre, apellido1, apellido2 y licencia. <br>Ten en cuenta las siguientes especificaciones:
            <ul>
                <li>Todos los campos son obligatorios salvo el apellido2.</li>
                <li>La licencia se corresponde con el DNI. (ej. 12345678A)</li>
                <li>La ruta para acceder a la página será http://localhost?controller=ConductorController&action=altaConductor.</li>
                <li>Los scripts que contengan las vistas deben finalizar con -view.php.</li>
                <li>Las vistas se cargan desde el método show de la clase /vista/View.</li>
                <li>Debe mostrarse el resultado de la operación: Registrado o No registrado.</li>
            </ul>
            
            </td>
            <td class="puntuacion">5 puntos</td>
        </tr>
        
    </table>

</body>

</html>