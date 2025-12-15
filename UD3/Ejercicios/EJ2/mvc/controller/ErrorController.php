<?php
namespace Ejercicios\EJ2\mvc\controller;
use Ejercicios\EJ2\mvc\controller\Controller;

class ErrorController extends Controller{
    public function pageNotFound(){
        $this->vista->showView("page-not-found");
        header("HTTP/1.1 404 Page not found");
        exit;
    }
}