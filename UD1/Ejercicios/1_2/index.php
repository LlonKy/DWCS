<?php
    include_once "Persona.php";
    include_once "Direccion.php";
    include_once "Estudiante.php";
    include_once "Profesor.php";
    include_once "Curso.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $direc = new Direccion("rua","Vilagarcia",36600);
    $person = new Persona("David",21,$direc);
    $est = new Estudiante("David",21,$direc,"DAW");
    $est2 = new Estudiante("Daniel",21,$direc,"DAW");
    $prof = new Profesor("David",21,$direc,"Programacion");
    $curso = new Curso("DAW");
    $curso->agregarEstudiante($est);
    $curso->agregarEstudiante($est2);

    echo $curso->mostrarEstudiantes();
    //$notas = [10,5,8,4,7];
    //echo $prof->mostrarInformacion();
    // echo $est->calcularPromedio($notas);
    // echo $est->mostrarInformacion();
    ?>
</body>
</html>