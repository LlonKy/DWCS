<?php
if (!$_COOKIE["random"] && !$_COOKIE["nIntentos"]) {
    setcookie("random",rand(1,1000));
    setcookie("nIntentos",1);
    setcookie("tiempo",time());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nUsu = $_POST['numero'];
    setcookie("nIntentos",$_COOKIE["nIntentos"]+1);
}

function borrarCookies(){
    setcookie("random",rand(1,1000),1);
    setcookie("nIntentos",1,1);
    setcookie("tiempo",time());
}

var_dump($_COOKIE['random']);
var_dump($nUsu);
var_dump($_COOKIE['nIntentos']);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="numero">Numero a adivinar</label>
        <input type="number" id="numero" name="numero"><br>
        <input type="submit" value="Adivinar">
    </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($nUsu == $_COOKIE['random']) {
                echo "Has ganado, te ha llevado: ".$_COOKIE['nIntentos']." intentos y ". time()-$_COOKIE['tiempo']. " segundos";
                borrarCookies();
            }
            if ($_COOKIE["nIntentos"]==10) {
                echo "Has perdido, el numero secreto era: ". $_COOKIE["random"];
                borrarCookies();
            } else if ($nUsu > $_COOKIE['random']) {
                echo "El numero secreto es menor";
            } else if ($nUsu < $_COOKIE['random']) {
                echo "El numero secreto es mayor";
            } 
        }
    ?>
</body>
</html>