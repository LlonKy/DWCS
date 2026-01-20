<?php
namespace Ejercicios\musica\model;

use Ejercicios\musica\model\Model;
use Ejercicios\musica\model\vo\BandaVO;
use PDO;
use PDOException;

class BandaModel extends Model{
    public static function get(){
        $sql = "SELECT * from banda";
        $db = self::getConnection();
        $bandas = [];

        try {
            $stmt = $db->query($sql);
            foreach ($stmt as $b) {
                $banda = new BandaVO(
                    $b["id"],
                    $b["nombre"],
                    $b["num_integrantes"],
                    $b["genero"],
                    $b["nacionalidad"]
                );

                $bandas[] = $banda;
            }
        } catch (PDOException $e) {
            echo "Error al hacer la consulta: ".$e->getMessage();
        } finally{
            $db = null;
        }

        return $bandas;
    }

    public static function getById(int $id){
         $sql = "SELECT * from banda Where id = :id";
        $db = self::getConnection();
        $banda = null;

        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(":id",$id);
            $stmt->execute();

            if ($stmt->rowCount()) {
                $b = $stmt->fetch();
                $banda = new BandaVO(
                    $b["id"],
                    $b["nombre"],
                    $b["num_integrantes"],
                    $b["genero"],
                    $b["nacionalidad"]
                );
            }
        } catch (PDOException $e) {
            echo "Error al hacer la consulta: ".$e->getMessage();
        } finally{
            $db = null;
        }

        return $banda;
    }
    public static function add(BandaVO $vo):BandaVO|false{
        $sql = "INSERT INTO banda (nombre,num_integrantes,genero,nacionalidad)
        VALUES (:nombre, :num_integrantes, :genero, :nacionalidad)";
        $db = self::getConnection();

        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(":nombre", $vo->getNombre(), PDO::PARAM_STR);
            $stmt->bindValue(":num_integrantes", $vo->getNum_integrantes(), PDO::PARAM_INT);
            $stmt->bindValue(":genero", $vo->getGenero(), PDO::PARAM_STR);
            $stmt->bindValue(":nacionalidad", $vo->getNacionalidad(), PDO::PARAM_STR);
            
            if($stmt->execute()){
                $id = $vo->getId();
            }
        } catch (PDOException $e) {
            error_log("Error agregando municipio: ". $e->getMessage());
        } finally{
            $db = null;
        }

        return $id ? self::getById($id) : false;
    }

    public static function update(){

    }

    public static function delete(){

    }

}