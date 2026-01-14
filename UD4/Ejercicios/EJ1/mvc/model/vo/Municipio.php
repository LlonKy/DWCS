<?php
namespace Ejercicios\EJ1\mvc\model\vo;
class Municipio implements Vo{
    public $codMunicipio;
    
    public $nombre;

    public $latitud;

    public $longitud;

    public $altitud;

    public $codProvincia;


    public function __construct(
        ?int $codMunicipio,
        string $nombre,
        ?float $latitud,
        ?float $longitud,
        ?float $altitud,
        ?int $codProvincia
    ) {
        $this->codMunicipio = $codMunicipio;
        $this->nombre = $nombre;
        $this->latitud = $latitud;
        $this->longitud = $longitud;
        $this->altitud = $altitud;
        $this->codProvincia = $codProvincia;
    }

    public function toArray(): array{
        return [
            "codMunicipio" => $this->codMunicipio,
            "nombre" => $this->nombre,
            "latitud" => $this->latitud,
            "longitud" => $this->longitud,
            "altitud" => $this->altitud,
            "codProvincia" => $this->codProvincia
        ];
    }

    public function fromArray(array $data):Municipio{
        return new Municipio($data["codMunicipio"],$data["nombre"],$data["latitud"],$data["longitud"],$data["altitud"],$data["codProvincia"]);
    }
}