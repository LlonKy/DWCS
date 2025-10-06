<<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Ejercicio 8</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
     <form action="" method="POST">
        <label>A</label>
        <input type="number" name="n1">
        <br>
        <label>B</label>
        <input type="number" name="n2">
        <br>
        <input type="submit" value="Calcular">
    </form>

    <?php
    if (!empty($_POST["n1"]) && !empty($_POST["n2"])) {

        function potencia($a, $b) {
            return pow($a, $b);
        }

        $a = $_POST["n1"];
        $b = $_POST["n2"];
        $resultado = potencia($a, $b);

        echo "El resultado de $a + $b es: $resultado";
    }
    ?>

    </body>
</html>