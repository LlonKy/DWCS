<?php
namespace Ejercicios\musica\controller;

use Ejercicios\musica\model\DiscoModel;
use Ejercicios\musica\model\vo\DiscoVO;
use Ejercicios\musica\core\Response;
use Ejercicios\musica\core\Request;
class DiscoController {
     public function index(){
        $discos = DiscoModel::get();
        $json = [];
        foreach ($discos as $disco) {
            $json[] = $disco->toArray();
        }

        Response::json($json, 200);
    }

    public function show(int $id){
        $disco = DiscoModel::getById($id);
        if (!isset($disco)) {
            Response::notFound();
            return;
        }
        Response::json($disco->toArray(),200);
        
    }

    public function store(){
        $request = new Request();
        $disco = DiscoVO::fromArray($request->body());
        $disco = DiscoModel::add($disco);

        Response::json($disco->toArray(),201);
    }

    public function update(int $id){
        $request = new Request();
        $disco = DiscoModel::getById($id);
        if (!isset($disco)) {
            Response::notFound();
            return;
        }

        $disco->updateVoParams(DiscoVO::fromArray($request->body()));
        
        $disco->setId($id);
        $disco = DiscoModel::update($disco);

        Response::json($disco->toArray(), 200);
    }

    public function destroy(int $id){
        if (DiscoModel::delete($id)) {
            Response::json(['mensaje' => "disco $id eliminada"],204);
        } else {
            Response::notFound();
        }
    }

    public function showDiscosBanda(int $id){
        $discos = DiscoModel::getDiscosBanda($id);

        if (!isset($discos)) {
            Response::notFound();
            return;
        }

        $discosJson = [];

        foreach ($discos as $d) {
            $discosJson[] = $d->toArray();
        }

        Response::json($discosJson, 200);
    }
}