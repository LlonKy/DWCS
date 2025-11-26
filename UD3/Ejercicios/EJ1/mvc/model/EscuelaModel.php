<?php
namespace Ejercicios\EJ1\mvc\model;
use Ejercicios\EJ1\mvc\model\Model;
use Ejercicios\EJ1\mvc\model\vo\Escuela;

class EscuelaModel extends Model{
    
    public static function getEscuelas($cod_municipio = null, $nombre = null){
        $sql = "SELECT * FROM escuela WHERE 1";
        $db = parent::getConnection();
        $params = [];
        $escuelas = [];

        if (isset($cod_municipio)) {
            $sql .= "AND cod_municipio = :cod_municipio";
            $params[':cod_municipio'] = $cod_municipio;
        }
        if (isset($nombre)) {
            $sql .= "AND nombre LIKE ':nombre'";
            $params[':nombre'] = "%".$nombre."%";
        }

        $stmt = $db->prepare($sql);

        foreach ($params as $key => $value) {
            $stmt->bindValue($key,$value);
        }

        $stmt->execute();

        foreach ($stmt as $e) {
            $escuela = new Escuela;
            $escuela->cod_escuela = $e['cod_escuela'];
            $escuela->nombre = $e['nombre'];
            $escuela->direccion = $e['direccion'];
            $escuela->cod_municipio = $e['cod_municipio'];
            $escuela->hora_apertura = $e['hora_apertura'];
            $escuela->hora_cierre = $e['hora_cierre'];
            $escuela->comedor = $e['comedor'];
            $escuelas[] = $escuela;
        }

        $stmt->closeCursor();

        $db = null;

        return $escuelas;

    }
}