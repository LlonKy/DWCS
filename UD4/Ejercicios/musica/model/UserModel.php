<?php
namespace Ejercicios\musica\model;
use Ejercicios\musica\model\Model;
use Ejercicios\musica\model\vo\UserVO;
use Exception;
use PDO;
use PDOException;


class UserModel extends Model{
    public static function getUser(string $email, string $pass):?UserVO{
        $sql = "SELECT * FROM users where email = :email";

        try {
            $db = self::getConnection();
            $stmt = $db->prepare($sql);
            $stmt->bindValue(":email", $email, PDO::PARAM_STR);
            
            $stmt->execute();

            $result = $stmt->fetch();
            $user = false;
            if ($result) {
                $user = UserVO::fromArray($result);
                if (!password_verify($pass, $user->getPass())) {
                    throw new Exception("Contraseña incorrecta");
                }
            }

        } catch (PDOException $th) {
            error_log("Error al recuperar el usuario con estas credenciales: ".$email." , ".$pass);
            $user = null;
        } finally{
            $db = null;
        }

        return $user;
    }

    public static function addUser(UserVO $user):?UserVO{
        $sql = "INSERT INTO users (nombre,email,pass) VALUES (:nombre,:email,:pass)";

        try {
            $db = self::getConnection();
            $stmt = $db->prepare($sql);

            $stmt->bindValue(":nombre", $user->getNombre(), PDO::PARAM_STR);
            $stmt->bindValue(":email", $user->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(":pass", password_hash($user->getPass(),PASSWORD_DEFAULT), PDO::PARAM_STR);
            
            if(!$stmt->execute() || !$stmt->rowCount() == 1){
                throw new Exception("Error en INSERT" .$stmt->rowCount() . "filas afectadas");
            }
            $user->setId_user($db->lastInsertId());
            
        } catch (PDOException $th) {
            error_log("Error añadiendo al usuario" . $th->getMessage());
            $user = null;
        } finally {
            $db = null;
        }

        return $user;
    }

    
}