<?php
namespace Ejercicios\EJ2\mvc\controller;
use Ejercicios\EJ2\mvc\view\View;

class Controller{
    protected View $vista;
    
    public function __construct(){
        $this->vista = new View();
    }
}