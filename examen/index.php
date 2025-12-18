<?php
include_once('globals.php');
include("controlador/enunciado-controller.php");
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