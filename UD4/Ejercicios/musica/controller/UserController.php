<?php
namespace Ejercicios\musica\controller;

use Ejercicios\musica\core\Request;
use Ejercicios\musica\core\Response;
use Ejercicios\musica\model\UserModel;
use Ejercicios\musica\model\vo\UserVO;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
class UserController {
    private Request $request;
    private $secretKey = "sad98723hjnd0912.si237dh1209dhEHDFRJWI2d2..3";

    public function __construct(){
        $this->request = new Request();
    }

    public function login(){
        $data = $this->request->body();
        $user = UserModel::getUser($data['email'], $data['pass']);
        if($user ===null){
            Response::json(['message'=>'No autenticado. Revise credenciales.'],401);
            return;
        }
        $token = self::createJwt($user, 3600);
        Response::json(['token'=> $token], 200);

    }

    public function register(){
        $data = $this->request->body();
        $usuario = UserVO::fromArray($data);
        $usuario = UserModel::addUser($usuario);
        
        if($usuario === null){
            Response::serverError();
            return;
        }

        Response::json($usuario->toArray(),201);
    }



    private function createJwt(UserVO $vo,  $expireSeconds){
        
        $payload = [
            "sub" => $vo->getId_user(),
            "email" => $vo->getEmail(),
            "iat" => time(),
            "exp" => time() + $expireSeconds
        ];
        
        $jwt = JWT::encode($payload, $this->secretKey, 'HS256');

        return $jwt;
    }


}