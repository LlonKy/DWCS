<?php
namespace Ejercicios\EJ1\mvc\controller;
use Ejercicios\EJ1\mvc\model\EscuelaModel;
use Ejercicios\EJ1\mvc\model\MunicipioModel;
use Ejercicios\EJ1\mvc\model\vo\Escuela;
class EscuelaController extends Controller{
    public function listarEscuelas(){ 
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

    public function altaEscuela(){
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $municipios = MunicipioModel::getMunicipios();
            $this->vista->showView("alta_escuela",$municipios);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"] ?? null;
            $direccion = $_POST["direccion"] ?? null;
            $hora_apertura = $_POST["hora_apertura"] ?? null;
            $hora_cierre = $_POST["hora_cierre"] ?? null;
            $comedor = $_POST["comedor"] ?? null;
            $cod_municipio = $_POST["municipio"] ?? null;
            
            if (isset($nombre) && isset($direccion) && isset($hora_apertura) && isset($hora_cierre) && isset($comedor)) {
                EscuelaModel::addEscuela($nombre,$direccion,$hora_apertura,$hora_cierre,$comedor,$cod_municipio);
                $this->vista->showView("confirm");
            } else {
                $this->vista->showView("error");
            }
        }
    }

    public function deleteEscuela(){
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $escuela = $_GET['cod_escuela'];
            $confirmDelete = EscuelaModel::deleteEscuela($escuela);

            if ($confirmDelete) {
                $this->vista->showView("confirm");
            } else {
                $this->vista->showView("error");
            }
        }
    }
}