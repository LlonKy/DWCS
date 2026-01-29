<?php

namespace Ejercicios\ejercicio4_2\controller;
use Ejercicios\ejercicio4_2\controller\Controller;
use Ejercicios\ejercicio4_2\core\Response;
use Ejercicios\ejercicio4_2\model\UsuarioModel;
use Ejercicios\ejercicio4_2\model\vo\UsuarioVo;
use Firebase\JWT\JWT;

class AuthController extends Controller{
    public function login(){
        $this->request->validate([
            'email' => 'string|required|max:256',
            'password' => 'string|required|max:256'
        ]);
        $data = $this->request->body();
        $user = UsuarioModel::getByEmailPassword($data['email'],$data['password']);
        if ($user === null) {
            Response::json(['message', 'No autenticado. Revise credenciales'],401);
            return;
        }

        $token = self::createJwt($user,3600);
        Response::json(['token' => $token],200);
    }

    private function createJwt(UsuarioVo $vo, $expireSeconds){
        $payload = [
            "sub" =>$vo->getId(),
            "email" => $vo->getEmail(),
            "role" => "user",
            "iat" => time(),
            "exp" => time() + $expireSeconds 
        ];

        $jwt = JWT::encode($payload, $_ENV['JWT_SECRET_KEY'], $_ENV['JWT_ALGO']);

        return $jwt;
    }
}