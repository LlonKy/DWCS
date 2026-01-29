<?php

namespace Ejercicios\musica\core\middleware;
use Ejercicios\musica\core\middleware\Middleware;
use Ejercicios\musica\core\Request;
class LogMiddleware implements Middleware{
    public function handle(Request $request){
        error_log("Acceso caputrado".$request->uri());
    }
}