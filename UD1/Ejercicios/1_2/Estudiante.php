<?php
include_once "Persona.php";
include_once "PersonaAbstracta.php";
include_once "Identificable.php";
class Estudiante extends PersonaAbstracta implements Identificable{
    private $grado;
    private array $calificaciones;


    public function __construct($nombre,$edad,$direccion,$grado){
        parent::__construct($nombre,$edad);
        $this->grado = $grado;
        $this->numEst = rand(1,100);
    }
    public function getGrado(){
        return $this->grado;
    }

    public function setGrado($grado){
        $this->grado = $grado;
        return $this;
    }

    public function getCalificaciones(){
        return $this->calificaciones;
    }

    public function setCalificaciones($calificaciones){
        $this->calificaciones = $calificaciones;
        return $this;
    }

    public function mostrarInformacion(){
        $mensaje = "Nombre: {$this->getNombre()}, <br>
                    Edad: {$this->getEdad()}, <br>
                    Grado: {$this->getGrado()}";
        return $mensaje;
    }

    public static function calcularPromedio(array $calificaciones){
        $contador = 0;
        foreach ($calificaciones as $nota) {
            $promedio += $nota;
            $contador++;
        }

        return $promedio/$contador;
    }

    public function getPromedio(array $calificaciones){
        return $this->calcularPromedio($calificaciones);
    }

    public function esMayorDeEdad(){
        return $this->edad >=18;
    }

    public function getIdentificador(){
        return $this->numEst;
    }

}

function showIds(array $identificadores){
    foreach ($identificadores as $objeto) {
        if (is_a($objeto,`Identificable`)) {
            echo "ID: ".$objeto->getIdentificador();
        }else {
            die();
        }
    }
}