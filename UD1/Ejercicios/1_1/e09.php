<<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Ejercicio 9</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
   <body>
    <h1>Introduce 5 números</h1>

    <form action="" method="POST">
        <label>Numero 1</label>
        <input type="text" name="num1"> <br>
        <label>Numero 2</label>
        <input type="text" name="num2"> <br>
        <label>Numero 3</label>
        <input type="text" name="num3"> <br>
        <label>Numero 4</label>
        <input type="text" name="num4"> <br>
        <label>Numero 5</label>
        <input type="text" name="num5"> <br>
        <input type="submit" value="Calcular">
    </form>

    <?php
    if (!empty($_POST["num1"])) {

        $numeros = [
            $_POST["num1"],
            $_POST["num2"],
            $_POST["num3"],
            $_POST["num4"],
            $_POST["num5"]
        ];

        function calcularDatos($arr) {
            $mayor = max($arr);
            $menor = min($arr);
            $media = array_sum($arr) / count($arr);
            $array = ["mayor" => $mayor, "menor" => $menor, "media" => $media];

            return $array;
        }

        $resultado = calcularDatos($numeros);

        echo "Mayor:{$resultado['mayor']} <br>";
        echo "Menor:{$resultado['menor']} <br>";
        echo "Media:{$resultado['media']} <br>";
    }
    ?>
</body>
</html>