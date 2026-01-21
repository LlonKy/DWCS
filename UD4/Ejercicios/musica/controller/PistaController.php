<?php
namespace Ejercicios\musica\controller;

use Ejercicios\musica\model\PistaModel;
use Ejercicios\musica\model\vo\PistaVO;
use Ejercicios\musica\core\Response;
use Ejercicios\musica\core\Request;
class PistaController{
    public function index(int $id){
        $pistas = PistaModel::get($id);
        $json = [];
        foreach ($pistas as $pista) {
            $json[] = $pista->toArray();
        }

        Response::json($json, 200);
    }

    public function show(int $id){
        $pista = PistaModel::get($id);
        if (!isset($pista)) {
            Response::notFound();
            return;
        }
        Response::json($pista->toArray(),200);
        
    }

    public function store(){
        $request = new Request();
        $pista = PistaVO::fromArray($request->body());
        $pista = PistaModel::add($pista);

        Response::json($pista->toArray(),201);
    }

    public function update(int $id){
        $request = new Request();
        $pista = PistaModel::getById($id);
        if (!isset($pista)) {
            Response::notFound();
            return;
        }

        $pista->updateVoParams(PistaVO::fromArray($request->body()));
        
        $pista->setId_disco($id);
        $pista = PistaModel::update($pista);

        Response::json($pista->toArray(), 200);
    }

    public function destroy(int $id){
        if (PistaModel::delete($id)) {
            Response::json(['mensaje' => "pista $id eliminada"],204);
        } else {
            Response::notFound();
        }
    }
}