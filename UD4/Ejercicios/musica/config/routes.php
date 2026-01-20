<?php
use Ejercicios\musica\core\Router;
use Ejercicios\musica\controller\BandaController;


//Endpoints

$router->get('/bandas',[BandaController::class, 'index']);
$router->get("/bandas/{id}",[BandaController::class, 'show']);
$router->post("/bandas",[BandaController::class, 'store']);