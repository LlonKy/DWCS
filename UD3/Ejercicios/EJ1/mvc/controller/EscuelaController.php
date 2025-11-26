<?php
namespace Ejercicios\EJ1\mvc\controller;
use Ejercicios\EJ1\mvc\model\EscuelaModel;
use Ejercicios\EJ1\mvc\model\vo\Escuela;
class EscuelaController extends Controller{
    public function listarEscuelas(){
        $escuelas = EscuelaModel::getEscuelas();
        if (isset($escuelas)) {
            $this->vista->showView("lista_escuelas",$escuelas);
        } else {
            $this->vista->showView("error_lista");
        }

    }
}