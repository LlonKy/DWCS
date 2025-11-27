<?php
namespace Ejercicios\EJ1\mvc\controller;
use Ejercicios\EJ1\mvc\model\EscuelaModel;
use Ejercicios\EJ1\mvc\model\MunicipioModel;
use Ejercicios\EJ1\mvc\model\vo\Escuela;
class EscuelaController extends Controller{
    public function listarEscuelas(){ 
        $escuelas = EscuelaModel::getEscuelas();
        $municipios = MunicipioModel::getMunicipios();

        if (isset($_POST["nombre"])) {
            $escuelas = EscuelaModel::getEscuelas(null,$_POST["nombre"]);
        }
        if (isset($escuelas)) {
            $this->vista->showView("lista_escuelas",['escuelas'=>$escuelas, 'municipios'=>$municipios]);
        } else {
            $this->vista->showView("error_lista");
        }

    }
}