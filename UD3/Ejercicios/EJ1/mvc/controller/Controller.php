<?php
namespace Ejercicios\EJ1\mvc\controller;
use Ejercicios\EJ1\mvc\view\View;

class Controller{
    protected View $vista;

    public function __construct(){
        $this->vista = new View();
    }
}