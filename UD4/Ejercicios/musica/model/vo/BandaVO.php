<?php
namespace Ejercicios\musica\model\vo;
use Ejercicios\musica\model\vo\Vo;

class BandaVO implements Vo{
    private ?int $id;
    private string $nombre;
    private int $num_integrantes;
    private string $genero;
    private string $nacionalidad;

    public function __construct(
        ?int $id,
        string $nombre,
        int $num_integrantes,
        string $genero,
        string $nacionalidad
    ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->num_integrantes = $num_integrantes;
        $this->genero = $genero;
        $this->nacionalidad = $nacionalidad;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of num_integrantes
     */ 
    public function getNum_integrantes()
    {
        return $this->num_integrantes;
    }

    /**
     * Set the value of num_integrantes
     *
     * @return  self
     */ 
    public function setNum_integrantes($num_integrantes)
    {
        $this->num_integrantes = $num_integrantes;

        return $this;
    }

    /**
     * Get the value of genero
     */ 
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set the value of genero
     *
     * @return  self
     */ 
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get the value of nacionalidad
     */ 
    public function getNacionalidad()
    {
        return $this->nacionalidad;
    }

    /**
     * Set the value of nacionalidad
     *
     * @return  self
     */ 
    public function setNacionalidad($nacionalidad)
    {
        $this->nacionalidad = $nacionalidad;

        return $this;
    }

    public function toArray(): array{
        return[
            "id" => $this->id,
            "nombre" => $this->nombre,
            "num_integrantes" => $this->num_integrantes,
            "genero" => $this->genero,
            "nacionalidad" => $this->nacionalidad
        ];
    }

    public static function fromArray(array $data):BandaVO{
        return new BandaVO(
             $data['id'],
            $data['nombre'],
            $data['num_integrantes'],
            $data['genero'],
            $data['nacionalidad']
        );
    }

    public function updateVoParams(Vo $vo){
        $this->nombre = $vo->getNombre() ?? $this->nombre;
        $this->num_integrantes = $vo->getNum_integrantes() ?? $this->num_integrantes;
        $this->genero = $vo->getGenero() ?? $this->genero;
        $this->nacionalidad = $vo->getNacionalidad() ?? $this->nacionalidad;
    }
}