<?php
namespace Ejemplos\escuelas\controller;
use Ejemplos\escuelas\core\Request;
use Ejemplos\escuelas\model\EscuelaModel;
use Ejemplos\escuelas\model\vo\EscuelaVO;
use Ejemplos\escuelas\core\Response;
class EscuelaController{

      public function index(){
        //Obtener todos los escuelas
        $escuelas = EscuelaModel::getFilter();
        $json = [];
        foreach($escuelas as $escuela){
            $json[] = $escuela->toArray();
        }
        //Devolver los escuelas en formato json (HTTP RESPONSE).
        Response::json($json, 200);
    }

    public function show(int $id){
        //Obtener todos los escuelas
        $escuela = EscuelaModel::getById($id);
        if(!isset($escuela)){
            Response::notFound();
            return;
        }

        Response::json($escuela->toArray(),200);
    }

    public function store(){
        //Obtener el EscuelaVO de la petición
        $request = new Request();
        $escuela = EscuelaVO::fromArray($request->body());
        $escuela = EscuelaModel::add($escuela);
        Response::json($escuela->toArray(),201);
    }

    public function update(int $id){
        //Obtener el EscuelaVO de la petición
        $request = new Request();
        $escuela = EscuelaModel::getById($id);
        if(!isset($escuela)){
            Response::notFound();
            return;
        }
        $escuela->updateVoParams(EscuelaVO::fromArray($request->body()));

        $escuela->setCodescuela($id);
        $escuela = EscuelaModel::update($escuela);
        Response::json($escuela->toArray(),200);
    }

    public function destroy(int $id){
       
        if(EscuelaModel::delete($id)) {
            Response::json(['mensaje' => 'escuela eliminado'],200);
        }else{
            Response::notFound();
        }            
        
       
    }
}