<?php
include_once "clases.php";

define('DB_DSN', 'mysql:host=mariadb;dbname=empresa');
define('DB_USER', 'root');
define('DB_PASS', 'bitnami');

/**
 * Devuelve una conexion con la base de datos.
 *
 * @return PDO
 */
function conexion_bd()
{
    try {
        $db = new PDO(DB_DSN, DB_USER, DB_PASS);
    } catch (PDOException $e) {
        die('Fallo en la conexión de con la BD. ' . $e->getMessage());
    }
    return $db;
}

function alta_usuario(
    string $correo,
    string $nombre,
    string $rolId,
    string $pass,
    string $pass2
): bool|string {

   

    //Comprobamos que no exista un usuario con ese nic o correo.
    $sql = 'SELECT COUNT(*) AS num_usr FROM usuario WHERE correo=?';
    $conexion = conexion_bd();
    $query = $conexion->prepare($sql);
    $query->bindParam(1, $correo, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch();
    
    if (isset($result['num_usr']) && $result['num_usr'] > 0) {
        return 'El nombre de usuario y/o el correo ya existen.';
    }
    //Cerramos el cursor.
    $query->closeCursor();

    //Calculamos el hash de la contraseña
    $pass = sha1($pass);

    //Preparamos la consulta para insertar el nuevo usuario
    $sql = 'INSERT INTO usuario(rolId,nombre,correo,pwd) VALUES (:rolId, :nombre, :correo, :pass)';
    $query = $conexion->prepare($sql);
    $query->bindParam(':rolId', $rolId);
    $query->bindParam(':nombre', $nombre);
    $query->bindParam(':correo', $correo);
    $query->bindParam(':pass', $pass);
    $toret = false;
    try {
        $toret = $query->execute() ;
    } catch (PDOException $e) {
        error_log($e->getMessage());
        $toret = false;
    } finally {
        //Cerramos la conexion
        $query = null;
        $conexion = null;
    }

    return $toret;
}

function comprobar_usuario(string $correo, string $pass):bool{
    $sql = 'SELECT COUNT(*) AS num_usr FROM usuario WHERE correo=? AND pwd=?';
    $conexion = conexion_bd();
    $query = $conexion->prepare($sql);
    $query->bindParam(1, $correo, PDO::PARAM_STR);
    $query->bindValue(2,sha1($pass) , PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch();
    $toret = isset($result['num_usr']) && $result['num_usr']==1;
    //Cerramos la conexion
    $query = null;
    $conexion = null;
    return $toret;

}

function getUser($correo){
    $sql = "SELECT * FROM usuario where correo = ?";
    $db = conexion_bd();
    $stmt = $db->prepare($sql);
    $stmt->bindParam(1,$correo);
    $stmt->execute();
    $resultado = $stmt->fetch();
    
    if ($resultado) {
        $user = new Usuario();
        $user->idUser = $resultado["idUser"];
        $user->rolId = $resultado["rolId"];
        $user->nombre = $resultado["nombre"];
        $user->correo = $resultado["correo"];
        $user->pwd = $resultado["pwd"];
    }

    $stmt->closeCursor();
    $db = null;

    return $user;
}

function getUserRol($correo){
    $sql = "SELECT rolId FROM usuario where correo = ?";
    $db = conexion_bd();
    $stmt = $db->prepare($sql);
    $stmt->bindParam(1,$correo);
    $stmt->execute();
    $resultado = $stmt->fetch();
    $userRol = null;
    
    if ($resultado) {
        $userRol = $resultado["rolId"];
    }

    $stmt->closeCursor();
    $db = null;

    return $userRol;
}
function getRol($rolId){
    $sql = "SELECT * FROM rol where rolId = ?";
    $db = conexion_bd();
    $stmt = $db->prepare($sql);
    $stmt->bindParam(1,$rolId);
    $stmt->execute();
    $resultado = $stmt->fetch();
    
    if ($resultado) {
        $rol = new Rol();
        $rol->rolId = $resultado["rolId"];
        $rol->nombre = $resultado["nombre"];
    }

    $stmt->closeCursor();
    $db = null;

    return $rol;
}
function getRoles(){
    $sql = "SELECT * FROM rol";
    $db = conexion_bd();
    $stmt = $db->query($sql);
    $roles = [];

        foreach ($stmt as $resultado) {
            $r = new Rol;
            $r->rolId = $resultado["rolId"];
            $r->nombre = $resultado["nombre"];
            $roles[] = $r;
        }

    $stmt->closeCursor();
    $db = null;

    return $roles;
}