<?php

function generarNumeros(int $nivel){
    $secuencia = array();

    for ($i=0; $i < $nivel; $i++) { 
        $secuencia[$i] = rand(1,4);
    }

    return $secuencia;
}

function comprobarNumeros($arrUsuario, $arrServidor){
    return $arrUsuario === $arrServidor;
}

$nivel= $_POST['nivel']??0;
$numsIn = $_POST['in_nums']??[];
$nums = $_POST['nums']??"";
$jugando = comprobarNumeros($numsIn,$nums);

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simon dice</title>
    <style>
        .hidden{
            display: none;
        }
    </style>

    <script>
        function ocultarNumero(){
            setTimeout(
                function(){
                    document.getElementById("numeros").classList.add('hidden');
                    document.getElementById("formulario").classList.remove('hidden');
                }
                , 3000
            )
        }
    </script>
</head>
<body onload="ocultarNumero()">

    <h1>Juego de Simón dice</h1><br>
    <?php if($jugando):?>
    <div id="numeros">
        <h2>Memoriza estos numeros en orden</h2>
        <?php
            $nivel++;
            $nums = generarNumeros($nivel);
            echo implode("-",$nums);
        ?>
    </div>

    <div id="formulario" class="hidden">
        <form action="" method="POST">
            <label for="in_nums">Numeros</label><br>
            <?php
                for ($i=0; $i < $nivel; $i++) { 
                    echo '<input type="text" name="in_nums[]">';
                }
            ?>
        
            <input type="hidden" name="nums[]" value="<?php $nums;?>">
            <input type="hidden" name="nivel" value="<?php echo $nivel;?>">
            <button type="submit">Comprobar</button>
        </form>
    </div>

    <?php else:?>
    <div id="resultado">
        <?php
            echo "Has fallado!<br> Los numeros eran: $nums , y tu respuesta fue:  $numsIn";
        ?>
        <a href="">Empezar otra vez</a>
    </div>
    <?php endif;?>

</body>
</html> 