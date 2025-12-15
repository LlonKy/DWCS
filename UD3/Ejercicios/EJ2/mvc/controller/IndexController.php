<?php
namespace Ejercicios\EJ2\mvc\controller;
use Ejercicios\EJ2\mvc\controller\Controller;

class IndexController extends Controller{
    public function getIndex(){
        $this->vista->showView("index");
    }
}