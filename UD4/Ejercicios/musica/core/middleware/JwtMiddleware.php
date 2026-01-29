<?php

namespace Ejercicios\musica\core\middleware;
use Ejercicios\musica\core\Request;
use Ejercicios\musica\core\Response;
use Ejercicios\musica\model\UserModel;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
class JwtMiddleware implements Middleware{
    public function handle(Request $request){
        //Comprobar que el usuario no esté autenticado
        $token = $request->getHeader('Authorization');
        if(!isset($token)){
            Response::json(["messaje"=>"Usuario no autenticado."],401);
            exit;
        }

        $token = str_replace('Bearer ','',$token);

        try {
            $payload = JWT::decode($token, new Key($this->secretKey,'HS256'));
            $request->user = UserModel::get($payload->sub);
        } catch (Exception $th) {
            Response::json(["messaje"=>"Usuario no autenticado."],401);
            exit;
        }
    }    
}