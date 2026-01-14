<?php
require_once "globals.php";
use Ejercicios\EJ1\mvc\core\Request;
use Ejercicios\EJ1\mvc\controller\MunicipioController;

spl_autoload_register(function($clase){
    $ruta = $_SERVER['DOCUMENT_ROOT'].'/'.str_replace('\\','/',$clase).'.php';
    if (file_exists($ruta)) {
        require_once $ruta;
    } else {
        error_log("No se encuentra la clase : $ruta");
    }
});

// 0. Declarar endpoints
$endpoints = [
    ['method' => 'GET',
    "uri" => '/municipios',
    "handler" => [MunicipioController::class,'index']],
];

// 1 Obtener el método, uri y body de la petición
$request = new Request();

// 2 Localizar el endpoint.

foreach ($endpoints as $route) {
    if ($route['method'] == $request->method()) {
        $pattern = '#^'.preg_replace('#\{[\w]+\}#','([\w]+)',$route['uri']).'$#';
        //Comprobar si la uri encaja
        if (preg_match($pattern,$request->uri(), $matches)) {
            //Llamar al método del controlador adecuado
            $controller = new $route['handler'][0]();

        }
    }
}