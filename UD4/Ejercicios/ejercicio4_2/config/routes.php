<?php
namespace Ejercicios\ejercicio4_2\config;
use Ejercicios\ejercicio4_2\controller\AuthController;


$router->post("/login",[AuthController::class,'login'],[]);
