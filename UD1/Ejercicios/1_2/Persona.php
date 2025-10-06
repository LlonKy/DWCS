<?php
include_once "Direccion.php";
class Persona{
    private $nombre;
    private $edad;

    private Direccion $direccion;

    //Constructor
    public function __construct($nombre,$edad,$direccion){
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->direccion = $direccion;
    }

    //Getters y setters

    public function getNombre(){
        return $this->nombre;
    }

    public function getEdad(){
        return $this->edad;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
        return $this;
    }

    public function setEdad($edad){
        if($edad>0){
            $this->edad = $edad;
        }
        return $this;
    }

    public function esMayorDeEdad(){
        return $this->edad>=18?true:false;
    }

     public function mostrarInformacion(){
        $mensaje = "Nombre: {$this->getNombre()}, <br>
                    Edad: {$this->getEdad()}";
        return $mensaje;
    }

    public function mostrarDireccion(){
        $mensaje = "Calle: {$this->direccion->getCalle()}, <br>
                    Ciudad: {$this->direccion->getCiudad()}, <br>
                    CodigoPostal: {$this->direccion->getCodigo()}";
        return $mensaje;
    }

}


