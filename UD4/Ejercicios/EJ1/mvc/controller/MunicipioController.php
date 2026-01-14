<?php

namespace Ejercicios\EJ1\mvc\controller;
use Ejercicios\EJ1\mvc\core\Request;
use Ejercicios\EJ1\mvc\model\MunicipioModel;
use Ejercicios\EJ1\mvc\model\vo\Municipio;

class MunicipioController{

    public function index(){
        //Obtener todos los municipios
        $municipios = MunicipioModel::getMunicipios();
        $json = [];
        foreach ($municipios as $municipio) {
            $json[] = $municipio->toArray();
        }
        //Devolver los muncipios en formato json (HTTP RESPONSE).
        http_response_code(200);
        echo json_encode($json);
    }

    //  public function show(int $id){
    //     //Obtener todos los municipios
    //     $municipio = MunicipioModel::getFilter();
    //     $json = $municipio->toArray();
      
    //     //Devolver los muncipios en formato json (HTTP RESPONSE).
    //     http_response_code(200);
    //     echo json_encode($json);
    // }

    //   public function store(){
    //     //Obtener todos los municipios
    //     $request = new Request();
    //     $municipio = new Municipio();
    //     $municipio = MunicipioModel::getFilter();
    //     $json = $municipio->toArray();
      
    //     //Devolver los muncipios en formato json (HTTP RESPONSE).
    //     http_response_code(200);
    //     echo json_encode($json);
    // }
}