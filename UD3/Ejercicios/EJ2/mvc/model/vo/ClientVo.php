<?php

namespace Ejercicios\EJ2\mvc\model\vo;
use Ejercicios\EJ2\mvc\model\vo\Vo;

class ClientVo implements Vo{
    public int $codCliente;
    
    public string $nombre;

    public string $apellidos;

    public int $telefono;

    public string $mail;
}