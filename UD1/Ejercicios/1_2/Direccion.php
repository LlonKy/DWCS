<?php

class Direccion{
    private $calle;
    private $ciudad;
    private $codigoPostal;

    public function __construct($calle,$ciudad,$codigo){
        $this->calle = $calle;
        $this->ciudad = $ciudad;
        $this->codigoPostal = $codigo;
    }

    public function getCalle(){
        return $this->calle;
    }

    public function getCiudad(){
        return $this->ciudad;
    }

    public function getCodigo(){
        return $this->codigoPostal;
    }

    public function setCalle($calle){
        $this->calle = $calle;
        return $this;
    }

    public function setCiudad($ciudad){
        $this->ciudad = $ciudad;
        return $this;
    }

    public function setCodigo($codigo){
        $this->codigoPostal = $codigo;
        return $this;
    }
}