<?php
include_once(VIEW_PATH."View.php");
class EnunciadoController{

    public function showEnunciado(){
        $vista = new View();
        $vista->show('enunciado');
    }
}