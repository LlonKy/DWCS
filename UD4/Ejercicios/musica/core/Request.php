<?php
namespace Ejercicios\musica\core;

use Ejercicios\musica\model\vo\UserVO;
class Request {

    public UserVO $user = null;
    public function uri():string{
        return $_SERVER["REQUEST_URI"];
    }

    public function method():string{
        return $_SERVER["REQUEST_METHOD"];
    }

    public function body():array{
        $body_text = file_get_contents("php://input");
        return json_decode($body_text,true) ?? [];
    }

    public function getHeader(string $headerKey){
        $headers = getallheaders();
        return $headers[$headerKey];
    }

}