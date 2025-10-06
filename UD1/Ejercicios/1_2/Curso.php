<?php
include_once "Estudiante.php";
class Curso{
    private array $estudiantes;
    private $nombreCurso;
    public function __construct($nombre){
        $this->nombreCurso = $nombre;
        $this->estudiantes = [];
    }

    public function getEstudiantes(){
        return $this->estudiantes;
    }

    public function setEstudiantes($estudiantes){
        $this->estudiantes = $estudiantes;
    }

    public function agregarEstudiante(Estudiante $estudiante){
        $this->estudiantes[] = $estudiante;
        return $estudiante;
    }

    public function mostrarEstudiantes(){
        $lista = "";
        foreach ($this->estudiantes as $e) {
            $lista .= "<br>".$e->mostrarInformacion();
        }

        return $lista;
    }
}