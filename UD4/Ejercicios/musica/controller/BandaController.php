<?php
namespace  Ejercicios\musica\controller;

use Ejercicios\musica\core\Request;
use Ejercicios\musica\model\BandaModel;
use Ejercicios\musica\core\Response;
use Ejercicios\musica\model\vo\BandaVO;
class BandaController {
    public function index(){
        $bandas = BandaModel::get();
        $json = [];
        foreach ($bandas as $banda) {
            $json[] = $banda->toArray();
        }

        Response::json($json, 200);
    }

    public function show(int $id){
        $banda = BandaModel::getById($id);
        if (!isset($banda)) {
            Response::notFound();
            return;
        }
        Response::json($banda->toArray(),200);
        
    }

    public function store(){
        $request = new Request();
        $banda = BandaVO::fromArray($request->body());
        $banda = BandaModel::add($banda);

        Response::json($banda->toArray(),201);
    }

    public function update(int $id){
        $request = new Request();
        $banda = BandaModel::getById($id);
        if (!isset($banda)) {
            Response::notFound();
            return;
        }

        $banda->updateVoParams(BandaVO::fromArray($request->body()));
        
        $banda->setId($id);
        $banda = BandaModel::update($banda);

        Response::json($banda->toArray(), 200);
    }

    public function destroy(int $id){
        if (BandaModel::delete($id)) {
            Response::json(['mensaje' => "Banda $id eliminada"],204);
        } else {
            Response::notFound();
        }
    }
}