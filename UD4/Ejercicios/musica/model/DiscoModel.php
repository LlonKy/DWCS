<?php
namespace Ejercicios\musica\model;
use Ejercicios\musica\model\Model;
use Ejercicios\musica\model\vo\DiscoVO;
use PDO;
use PDOException;

class DiscoModel extends Model{
    public static function get(){
        $sql = "SELECT * from disco";
        $db = self::getConnection();
        $discos = [];

        try {
            $stmt = $db->query($sql);
            foreach ($stmt as $b) {
                $disco = new DiscoVO(
                    $b["id"],
                    $b["titulo"],
                    $b["anho"],
                    $b["id_banda"]
                );

                $discos[] = $disco;
            }
        } catch (PDOException $e) {
            echo "Error al hacer la consulta: ".$e->getMessage();
        } finally{
            $db = null;
        }

        return $discos;
    }

    public static function getById(int $id){
         $sql = "SELECT * from disco Where id = :id";
        $db = self::getConnection();
        $disco = null;

        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(":id",$id);
            $stmt->execute();

            if ($stmt->rowCount()) {
                $b = $stmt->fetch();
                $disco = new DiscoVO(
                    $b["id"],
                    $b["titulo"],
                    $b["anho"],
                    $b["id_banda"]
                );
            }
        } catch (PDOException $e) {
            echo "Error al hacer la consulta: ".$e->getMessage();
        } finally{
            $db = null;
        }

        return $disco;
    }
    public static function add(DiscoVO $vo):DiscoVO|false{
        $sql = "INSERT INTO disco (titulo,anho,id_banda)
        VALUES (:titulo, :anho, :id_banda)";
        $db = self::getConnection();

        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(":titulo", $vo->getTitulo(), PDO::PARAM_STR);
            $stmt->bindValue(":anho", $vo->getAnho(), PDO::PARAM_INT);
            $stmt->bindValue(":id_banda", $vo->getId_banda(), PDO::PARAM_INT);
            
            if($stmt->execute()){
                $id = $vo->getId();
            }
        } catch (PDOException $e) {
            error_log("Error agregando disco: ". $e->getMessage());
        } finally{
            $db = null;
        }

        return $id ? self::getById($id) : false;
    }

    public static function update(DiscoVO $vo):DiscoVO|false{
        if ($vo->getId() === null) {
            return false;
        }

        $sql = "UPDATE disco SET titulo = :titulo,
        anho = :anho,
        id_banda = :id_banda
        Where id = :id";
        $result = false;

        try {
            $db = self::getConnection();
            $stmt = $db->prepare($sql);

            $stmt->bindValue(":titulo", $vo->getTitulo());
            $stmt->bindValue(":anho", $vo->getAnho());
            $stmt->bindValue(":id_banda", $vo->getId_banda());
            $stmt->bindValue(":id", $vo->getId());

            $result = $stmt->execute();
        } catch (PDOException $th) {
            error_log("Error actualizando disco: ".$th->getMessage());
        } finally{
            $db = null;
        }

        return $result ? self::getById($vo->getId()) : false;
    }

    public static function delete(int $id):bool{
        $sql = "DELETE from disco where id = :id";
        $result = false;
        $db = self::getConnection();

        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            if($stmt->execute()){
                $result = $stmt->rowCount() === 1;
            }
        } catch (PDOException $th) {
            error_log("Error eliminando la disco con id: $id ". $th->getMessage());
        } finally{
            $db = null;
        }

        return $result;
    }

}