<?php

echo("redirige bien");

//Obtener Uri
$uri = $_SERVER["REQUEST_URI"];

//Obtenemos el método HTTP
$method = $_SERVER["REQUEST_METHOD"];

//Obtener cuerpo de la peticion
$body = file_get_contents('php://input');
echo "uri = $uri";
echo "method = $method";