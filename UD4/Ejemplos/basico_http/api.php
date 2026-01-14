<?php

echo("redirige bien <br>");

//Obtener Uri
$uri = $_SERVER["REQUEST_URI"];

//Obtenemos el método HTTP
$method = $_SERVER["REQUEST_METHOD"];

//Obtener cuerpo de la peticion
$body = file_get_contents('php://input');
echo "uri = $uri <br>";
echo "method = $method <br>";
echo "cuerpo = $body";