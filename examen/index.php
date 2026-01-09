<?php
require_once('globals.php');
include("controlador/enunciado-controller.php");

spl_autoload_register(function ($clase){
    
    $ruta = $_SERVER['DOCUMENT_ROOT'] . '/' . str_replace('\\','/',$clase) . '.php';
    if (file_exists($ruta)) {
        require_once $ruta;
    } else {
        error_log("Ruta no encontrada: ". $ruta);
    }
});

if (isset($_REQUEST['controller'])) {
    $controller = $_REQUEST['controller'];
    try {
        $objeto = new $controller();
        $action="no definida";
        if (isset($_REQUEST['action'])) {
            $action = $_REQUEST['action'];
        }
        $objeto->$action();
    } catch (\Throwable $th) {
        error_log("Ruta inexistente: controller=" . $controller."&action=$action");
        header("location:/");
    }
} else {
    $objeto = new EnunciadoController();
    $objeto->showEnunciado();
}