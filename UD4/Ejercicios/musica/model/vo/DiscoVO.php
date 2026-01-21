<?php
namespace Ejercicios\musica\model\vo;

use Ejercicios\musica\model\vo\Vo;
class DiscoVO implements Vo {

    private ?int $id;
    private string $titulo;
    private int $anho;
    private int $id_banda;

    public function __construct(
        ?int $id,
        string $titulo,
        int $anho,
        int $id_banda
    ) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->anho = $anho;
        $this->id_banda = $id_banda;
    }

    /** Get the value of id */
    public function getId() {
        return $this->id;
    }

    /** Set the value of id */
    public function setId($id) {
        $this->id = $id;
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

    /** Get the value of anho */
    public function getAnho() {
        return $this->anho;
    }

    /** Set the value of anho */
    public function setAnho($anho) {
        $this->anho = $anho;
        return $this;
    }

    /** Get the value of id_banda */
    public function getId_banda() {
        return $this->id_banda;
    }

    /** Set the value of id_banda */
    public function setId_banda($id_banda) {
        $this->id_banda = $id_banda;
        return $this;
    }

    public function toArray(): array {
        return [
            "id" => $this->id,
            "titulo" => $this->titulo,
            "anho" => $this->anho,
            "id_banda" => $this->id_banda
        ];
    }

    public static function fromArray(array $data): DiscoVO {
        return new DiscoVO(
            $data['id'],
            $data['titulo'],
            $data['anho'],
            $data['id_banda']
        );
    }

    public function updateVoParams(Vo $vo) {
        $this->titulo = $vo->getTitulo() ?? $this->titulo;
        $this->anho = $vo->getAnho() ?? $this->anho;
        $this->id_banda = $vo->getId_banda() ?? $this->id_banda;
    }
}