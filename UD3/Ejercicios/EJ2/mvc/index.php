<?php
require_once "globals.php";

spl_autoload_register(function ($clase){
    
    $ruta = $_SERVER['DOCUMENT_ROOT'] . '/' . str_replace('\\','/',$clase) . '.php';
    if (file_exists($ruta)) {
        require_once $ruta;
    } else {
        error_log("Ruta no encontrada: ". $ruta);
    }
});

$controller = $_REQUEST['controller'] ?? "ErrorController";

try {
    $controller = "Ejercicios\\EJ2\\mvc\\controller\\$controller";
    $objeto = new $controller;
    $action = $_REQUEST['action'] ?? 'pageNotFound';
} catch (\Throwable $th) {
    $objeto = new Ejercicios\EJ2\mvc\controller\ErrorController();
    $action = "pageNotFound";
}

try {
    $objeto->$action();
} catch (\Throwable $th) {
    $objeto = new Ejercicios\EJ2\mvc\controller\ErrorController();
    $objeto->pageNotFound();
}
