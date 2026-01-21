<?php
namespace Ejercicios\musica\model\vo;
use Ejercicios\musica\model\vo\Vo;

class PistaVO implements Vo {

    private int $id_disco;
    private int $numero;
    private string $titulo;
    private string $duracion;

    public function __construct(
        int $id_disco,
        int $numero,
        string $titulo,
        string $duracion
    ) {
        $this->id_disco = $id_disco;
        $this->numero = $numero;
        $this->titulo = $titulo;
        $this->duracion = $duracion;
    }

    /** Get the value of id_disco */
    public function getId_disco() {
        return $this->id_disco;
    }

    /** Set the value of id_disco */
    public function setId_disco($id_disco) {
        $this->id_disco = $id_disco;
        return $this;
    }

    /** Get the value of numero */
    public function getNumero() {
        return $this->numero;
    }

    /** Set the value of numero */
    public function setNumero($numero) {
        $this->numero = $numero;
        return $this;
    }

    /** Get the value of titulo */
    public function getTitulo() {
        return $this->titulo;
    }

    /** Set the value of titulo */
    public function setTitulo($titulo) {
        $this->titulo = $titulo;
        return $this;
    }

    /** Get the value of duracion */
    public function getDuracion() {
        return $this->duracion;
    }

    /** Set the value of duracion */
    public function setDuracion($duracion) {
        $this->duracion = $duracion;
        return $this;
    }

    public function toArray(): array {
        return [
            "id_disco" => $this->id_disco,
            "numero" => $this->numero,
            "titulo" => $this->titulo,
            "duracion" => $this->duracion
        ];
    }

    public static function fromArray(array $data): PistaVO {
        return new PistaVO(
            $data['id_disco'],
            $data['numero'],
            $data['titulo'],
            $data['duracion']
        );
    }

    public function updateVoParams(Vo $vo) {
        $this->id_disco = $vo->getId_disco() ?? $this->id_disco;
        $this->numero = $vo->getNumero() ?? $this->numero;
        $this->titulo = $vo->getTitulo() ?? $this->titulo;
        $this->duracion = $vo->getDuracion() ?? $this->duracion;
    }
}