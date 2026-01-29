<?php
namespace Ejercicios\musica\model\vo;
use Ejercicios\musica\model\vo\Vo;

class UserVO implements Vo {

    private ?int $id_user;
    private string $nombre;
    private string $email;
    private string $pass;

    public function __construct(
        ?int $id_user,
        string $nombre,
        string $email,
        string $pass
    ) {
        $this->id_user = $id_user;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->pass = $pass;
    }

    /** Get the value of id_user */
    public function getId_user() {
        return $this->id_user;
    }

    /** Set the value of id_user */
    public function setId_user($id_user) {
        $this->id_user = $id_user;
        return $this;
    }

    /** Get the value of nombre */
    public function getNombre() {
        return $this->nombre;
    }

    /** Set the value of nombre */
    public function setNombre($nombre) {
        $this->nombre = $nombre;
        return $this;
    }

    /** Get the value of email */
    public function getEmail() {
        return $this->email;
    }

    /** Set the value of email */
    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    /** Get the value of pass */
    public function getPass() {
        return $this->pass;
    }

    /** Set the value of pass */
    public function setPass($pass) {
        $this->pass = $pass;
        return $this;
    }

    public function toArray(): array {
        return [
            "id_user" => $this->id_user,
            "nombre" => $this->nombre,
            "email" => $this->email
        ];
    }

    public static function fromArray(array $data): UserVO {
        return new UserVO(
            $data['id_user'],
            $data['nombre'],
            $data['email'],
            $data['pass']
        );
    }

    public function updateVoParams(Vo $vo) {
        $this->nombre = $vo->getNombre() ?? $this->nombre;
        $this->pass = $vo->getPass() ?? $this->pass;
    }
}