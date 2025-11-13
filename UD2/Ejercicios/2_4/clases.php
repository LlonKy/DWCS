<?php


class Usuario{
    public $idUser;
    public $rolId;
    public $nombre;
    public $correo;
    public $pwd;
}

class Rol{
    public $rolId;
    public $nombre;
}

class Proyecto{
    public $idProyecto;

    public $responsableId;
    
    public $nombre;
    
    public $descripcion;
}