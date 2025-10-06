<?php
abstract class PersonaAbstracta{
    protected $edad;
    protected $nombre;

    public function __construct($nombre,$edad){
        $this->nombre = $nombre;
        $this->edad = $edad;
    }
    public abstract function mostrarInformacion();
    public abstract function esMayorDeEdad();
}