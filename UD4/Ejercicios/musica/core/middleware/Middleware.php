<?php

namespace Ejercicios\musica\core\middleware;
use Ejercicios\musica\core\Request;
interface Middleware{
    public function handle(Request $request);
}