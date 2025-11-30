<?php
namespace Ejercicios\EJ1\mvc\controller;
use Ejercicios\EJ1\mvc\model\EscuelaModel;
use Ejercicios\EJ1\mvc\model\MunicipioModel;
use Ejercicios\EJ1\mvc\model\vo\Escuela;
class EscuelaController extends Controller{
    public function listarEscuelas(){ 
        $escuelas = EscuelaModel::getEscuelas();
        $municipios = MunicipioModel::getMunicipios();
        $filtroMunicipio = $_POST["filtroMunicipios"] ?? null;
        $filtroNombre = $_POST["nombre"] ?? null;

        if ($filtroMunicipio === "") $filtroMunicipio = null;
        if ($filtroNombre === "") $filtroNombre = null;

        $escuelas = EscuelaModel::getEscuelas($filtroMunicipio,$filtroNombre);

        if (isset($escuelas)) {
            $this->vista->showView("lista_escuelas",['escuelas'=>$escuelas, 'municipios'=>$municipios]);
        } else {
            $this->vista->showView("page_not_found");
        }

    }
}