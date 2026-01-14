<?php
namespace Ejercicios\EJ1\mvc\model\vo;
class Escuela {

    public $codEscuela;

    public $nombre;

    public $direccion;

    public $codMunicipio;

    public $nombre_municipio;

    public $horaApertura;

    public $horaCierre;

    public $comedor;

     public function __construct(
        ?int $codEscuela = null,
        ?string $nombre = null,
        ?string $direccion = null,
        ?int $codMunicipio = null,
        ?string $horaApertura = null,
        ?string $horaCierre = null,
        ?bool $comedor = null,
        ?string $nombre_municipio = null

    ) {
        $this->codEscuela = $codEscuela;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->codMunicipio = $codMunicipio;
        $this->horaApertura = $horaApertura;
        $this->horaCierre = $horaCierre;
        $this->comedor = $comedor;
        $this->nombre_municipio = $nombre_municipio;
    }
}