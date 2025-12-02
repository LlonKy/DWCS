<?php
namespace Ejercicios\EJ1\mvc\model;
use Ejercicios\EJ1\mvc\model\Model;
use Ejercicios\EJ1\mvc\model\vo\Escuela;
use Ejercicios\EJ1\mvc\model\vo\Municipio;
use Pdo;

class EscuelaModel extends Model{
    
    public static function getEscuelas($nombreMunicipio = null, $nombre = null){
        $sql = "SELECT e.cod_escuela,e.nombre,e.direccion,m.nombre as nombreMunicipio,e.hora_apertura,e.hora_cierre,e.comedor FROM escuela e inner join municipio m on e.cod_municipio = m.cod_municipio WHERE 1";
        $db = parent::getConnection();
        $escuelas = [];

        if (isset($nombreMunicipio)) {
            $sql .= " AND m.nombre LIKE :nombreMunicipio";
        }
        if (isset($nombre)) {
            $sql .= " AND e.nombre LIKE :nombre";
        }

        $stmt = $db->prepare($sql);

        if (isset($nombreMunicipio)) {
            $stmt->bindValue(":nombreMunicipio","%".$nombreMunicipio."%",PDO::PARAM_STR);
        }
        if (isset($nombre)) {
            $stmt->bindValue(":nombre","%$nombre%",PDO::PARAM_STR);
        }


        $stmt->execute();

        foreach ($stmt as $e) {
            $escuela = new Escuela;
            $escuela->cod_escuela = $e['cod_escuela'];
            $escuela->nombre = $e['nombre'];
            $escuela->direccion = $e['direccion'];
            $escuela->nombre_municipio = $e['nombreMunicipio'];
            $escuela->hora_apertura = $e['hora_apertura'];
            $escuela->hora_cierre = $e['hora_cierre'];
            $escuela->comedor = $e['comedor'];
            $escuelas[] = $escuela;
        }

        $stmt->closeCursor();

        $db = null;

        return $escuelas;

    }

    public static function addEscuela(string $nombre,string $direccion,string $hora_apertura,string $hora_cierre,string $comedor, int $cod_municipio){
        $sql = "INSERT INTO escuela (nombre, direccion, cod_municipio, hora_apertura, hora_cierre, comedor)
            VALUES (:nombre, :direccion, :cod_municipio, :hora_apertura, :hora_cierre, :comedor)";
        $db = parent::getConnection();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":nombre",$nombre);
        $stmt->bindValue(":direccion",$direccion);
        $stmt->bindValue(":cod_municipio",$cod_municipio);
        $stmt->bindValue(":hora_apertura",$hora_apertura);
        $stmt->bindValue(":hora_cierre",$hora_cierre);
        $stmt->bindValue(":comedor",$comedor);

        try {
            $stmt->execute();
            $toret = true;
        } catch (\Throwable $th) {
            echo $th->getMessage();
            $toret = false;
        }
        $db = null;

        return $toret;
    }

    public static function deleteEscuela($cod_escuela){
        $sql = "DELETE FROM escuela WHERE cod_escuela = :cod_escuela";
        $db = parent::getConnection();

        $stmt = $db->prepare($sql);
        $stmt->bindValue(":cod_escuela",$cod_escuela);

        try {
            $stmt->execute();
            $toret = true;
            if ($stmt->rowCount()!= 1) {
                $toret = false;
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
            $toret = false;
        }

        $db = null;

        return $toret;
    }
}