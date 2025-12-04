<?php
namespace Ejercicios\EJ1\mvc\model;
use Ejercicios\EJ1\mvc\model\Model;
use Ejercicios\EJ1\mvc\model\vo\Municipio;
use Pdo;
use PDOException;
class MunicipioModel extends Model{

    public static function getMunicipios(){
        $sql = "SELECT cod_municipio, nombre from municipio";
        $sql .= " ORDER BY nombre";
        $db = parent::getConnection();
        $municipios = [];

        $stmt = $db->query($sql);

        foreach ($stmt as $m) {
            $municipio = new Municipio(null,"",null,null,null,null);
            $municipio->codMunicipio = $m['cod_municipio'];
            $municipio->nombre = $m['nombre'];
            $municipios[] = $municipio;
        }

        $stmt->closeCursor();
        $db = null;

        return $municipios;
    }

     public static function getFilter(?array $data=null): array
    {
        $sql = "SELECT * FROM municipio WHERE 1=1";
        $resultados = [];

        try {
            $db = self::getConnection();

            if (isset($data)) {
                if (isset($data['nombre'])) {
                    $sql .= " AND nombre LIKE :nombre";
                }
                if (isset($data['cod_provincia'])) {
                    $sql .= " AND cod_provincia = :cod_provincia";
                }
            }

            $stmt = $db->prepare($sql);

            if (isset($data)) {
                if (isset($data['nombre'])) {
                    $stmt->bindValue(":nombre", "%" . $data['nombre'] . "%", PDO::PARAM_STR);
                }
                if (isset($data['cod_provincia'])) {
                    $stmt->bindValue(":cod_provincia", (int)$data['cod_provincia'], PDO::PARAM_INT);
                }
            }

            $stmt->execute();

            foreach ($stmt as $row) {
                $resultados[] = self::rowToVO($row);
            }

            $stmt->closeCursor();
        } catch (PDOException $th) {
            error_log("Error accediendo a municipios: " . $th->getMessage());
        } finally {
            $db = null;
        }

        return $resultados;
    }

    private static function rowToVO(array $row): Municipio
    {
        return new Municipio(
            (int)$row['cod_municipio'],
            $row['nombre'],
            isset($row['latitud']) ? (float)$row['latitud'] : null,
            isset($row['longitud']) ? (float)$row['longitud'] : null,
            isset($row['altitud']) ? (float)$row['altitud'] : null,
            isset($row['cod_provincia']) ? (int)$row['cod_provincia'] : null
        );
    }
}