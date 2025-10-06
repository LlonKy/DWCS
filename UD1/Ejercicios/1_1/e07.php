<!DOCTYPE html>
    <?php
    $p1 = $_POST["palabra1"];
    $p2 = $_POST["palabra2"];
    function esAnagrama($p1,$p2){
        if (!empty($p1) && !empty($p2)) {
        $p1 = strtoupper(trim($p1));
        $p2= strtoupper(trim($p2));

        if($p1 == $p2){
            return false;
        }

        if (strlen($p1) !== strlen($p2)) {
            return false;
        } else {
            $letras1 = str_split($p1);
            $letras2 = str_split($p2);

            sort($letras1);
            sort($letras2);

            if ($letras1 === $letras2) {
                return true;
            } else {
                return false;
            }
        }
    }
    }
    
    ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Ejercicio 7</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>

    <form action= "" method="POST">
        <label for="palabra1">Primera palabra:</label>
        <input type="text" name="palabra1" value="<?php $_POST['palabra1']?>"> 
        <br>
        <label for="palabra2">Segunda palabra:</label>
        <input type="text" name="palabra2" value="<?php $_POST['palabra2']?>">
        <br>
        <input type="submit" value="Anagramas">
    </form>

    <?php
        if(isset($_POST['palabra1']) && isset($_POST['palabra2'])){
            echo esAnagrama($_POST['palabra1'],$_POST['palabra2'])?"Son Anagramas":"No son anagramas";
        }
    ?>
</body>
</html>