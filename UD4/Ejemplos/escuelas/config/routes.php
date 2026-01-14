<?php
use Ejemplos\escuelas\core\Router;
use Ejemplos\escuelas\controller\MunicipioController;
use Ejemplos\escuelas\controller\EscuelaController;

//Endpoints para municipios
$router->get('/municipios',[MunicipioController::class, 'index']);
$router->get('/municipios/{id}',[MunicipioController::class, 'show']);
$router->post('/municipios',[MunicipioController::class, 'store']);
$router->put('/municipios/{id}',[MunicipioController::class, 'update']);
$router->delete('/municipios/{id}',[MunicipioController::class, 'destroy']);
$router->get('/escuelas',[EscuelaController::class, 'index']);
$router->get('/escuelas/{id}',[EscuelaController::class, 'show']);
$router->post('/escuelas',[EscuelaController::class, 'store']);
