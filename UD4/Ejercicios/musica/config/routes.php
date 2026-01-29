<?php
use Ejercicios\musica\controller\UserController;
use Ejercicios\musica\core\middleware\LogMiddleware;
use Ejercicios\musica\core\Router;
use Ejercicios\musica\controller\BandaController;
use Ejercicios\musica\controller\DiscoController;
use Ejercicios\musica\controller\PistaController;



//Endpoints

$router->get('/bandas',[BandaController::class, 'index'], [LogMiddleware::class]); //
$router->get("/bandas/{id}",[BandaController::class, 'show']); //
$router->get("/bandas/{id}/discos",[DiscoController::class, 'showDiscosBanda']); //
$router->get("/discos",[DiscoController::class, "index"]); //
$router->get("/discos/{id}/pistas",[PistaController::class, "index"]); //
$router->get("/discos/{id}/pistas/{id}",[PistaController::class,'show']);
$router->post("/bandas",[BandaController::class, 'store']);//
$router->post("/bandas/discos", [DiscoController::class, "store"]);//
$router->post("/discos/{id}/pistas",[PistaController::class,'store']);
$router->put("/bandas/{id}",[BandaController::class, 'update']);//
$router->put("/discos/{id}",[DiscoController::class, 'update']);//
$router->put("/discos/{id}/pistas/{id}",[PistaController::class, 'update']);
$router->delete("/bandas/{id}", [BandaController::class,'destroy']);//
$router->delete("/discos/{id}", [DiscoController::class,'destroy']);//
$router->delete("/discos/{id}/pistas/{id}",[PistaController::class, 'destroy']);

$router->post('/login', [UserController::class, 'login']);
$router->post('/register', [UserController::class, 'register']);
