<?php
namespace Ejercicios\EJ1\mvc\model;
use Ejercicios\EJ1\mvc\model\Model;
use Ejercicios\EJ1\mvc\model\vo\Municipio;
class MunicipioModel extends Model{

    public static function getMunicipios(){
        $sql = "SELECT nombre from municipio";
        $sql .= " ORDER BY nombre";
        $db = parent::getConnection();
        $municipios = [];

        $stmt = $db->query($sql);

        foreach ($stmt as $m) {
            $municipio = new Municipio();
            $municipio->nombre = $m['nombre'];
            $municipios[] = $municipio;
        }

        $stmt->closeCursor();
        $db = null;

        return $municipios;
    }
}