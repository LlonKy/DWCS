<?php
namespace Ejercicios\musica\model;
use Ejercicios\musica\model\Model;
use Ejercicios\musica\model\vo\PistaVO;
use PDO;
use PDOException;

class PistaModel extends Model{

    public static function get(int $id){
         $sql = "SELECT * from pista Where id_disco = :id";
        $db = self::getConnection();
        $pistas = [];

        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(":id",$id,PDO::PARAM_INT);
            $stmt->execute();
            foreach ($stmt as $b) {
                $pista = new PistaVO(
                    $b["id_disco"],
                    $b["numero"],
                    $b["titulo"],
                    $b["duracion"]
                );

                $pistas[] = $pista;
            }
        } catch (PDOException $e) {
            error_log("Error al hacer la consulta: ".$e->getMessage()) ;
        } finally{
            $db = null;
        }

        return $pistas;
    }
    public static function add(PistaVO $vo):PistaVO|false{
        $sql = "INSERT INTO pista (id_disco,numero,titulo,duracion)
        VALUES (id_disco, :numero, :titulo, :duracion)";
        $db = self::getConnection();

        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(":id_disco",$vo->getId_disco(), PDO::PARAM_INT);
            $stmt->bindValue(":numero", $vo->getnumero(), PDO::PARAM_INT);
            $stmt->bindValue(":titulo", $vo->gettitulo(), PDO::PARAM_STR);
            $stmt->bindValue(":duracion", $vo->getduracion(), PDO::PARAM_INT);
            
            if($stmt->execute()){
                $id = $vo->getId_disco();
            }
        } catch (PDOException $e) {
            error_log("Error agregando pista: ". $e->getMessage());
        } finally{
            $db = null;
        }

        return $id ? self::getById($id) : false;
    }

    public static function update(PistaVO $vo):PistaVO|false{
        if ($vo->getId_disco() === null) {
            return false;
        }

        $sql = "UPDATE pista SET numero = :numero,
        titulo = :titulo,
        duracion = :duracion
        Where id_disco = :id";
        $result = false;

        try {
            $db = self::getConnection();
            $stmt = $db->prepare($sql);

            $stmt->bindValue(":numero", $vo->getnumero());
            $stmt->bindValue(":titulo", $vo->gettitulo());
            $stmt->bindValue(":duracion", $vo->getduracion());
            $stmt->bindValue(":id", $vo->getId_disco());

            $result = $stmt->execute();
        } catch (PDOException $th) {
            error_log("Error actualizando pista: ".$th->getMessage());
        } finally{
            $db = null;
        }

        return $result ? self::getById($vo->getId_disco()) : false;
    }

    public static function delete(int $id):bool{
        $sql = "DELETE from pista where id = :id";
        $result = false;
        $db = self::getConnection();

        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            if($stmt->execute()){
                $result = $stmt->rowCount() === 1;
            }
        } catch (PDOException $th) {
            error_log("Error eliminando la pista con id: $id ". $th->getMessage());
        } finally{
            $db = null;
        }

        return $result;
    }
}