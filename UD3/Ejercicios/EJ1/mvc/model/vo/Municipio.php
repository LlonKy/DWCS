<?php
namespace Ejercicios\EJ1\mvc\model\vo;
class Municipio{
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

}