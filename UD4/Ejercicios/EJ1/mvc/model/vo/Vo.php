<?php

namespace Ejercicios\EJ1\mvc\model\vo;

interface Vo{
    public function toArray():array;
    public static function fromArray(array $data);
}