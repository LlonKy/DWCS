<?php
namespace Ejercicios\EJ2\mvc\view;
class View{
    public function showView(string $view, ?array $data = null){
        include_once VIEW_PATH."$view-view.php";
    }
}