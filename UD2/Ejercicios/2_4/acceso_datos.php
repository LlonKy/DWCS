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
    string $pass
): bool|string {

   

    //Comprobamos que no exista un usuario con ese nic o correo.
    $sql = 'SELECT COUNT(*) AS proyectos FROM usuario WHERE correo=?';
    $conexion = conexion_bd();
    $query = $conexion->prepare($sql);
    $query->bindParam(1, $correo, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch();
    
    if (isset($result['proyectos']) && $result['proyectos'] > 0) {
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
    $sql = 'SELECT COUNT(*) AS proyectos FROM usuario WHERE correo=? AND pwd=?';
    $conexion = conexion_bd();
    $query = $conexion->prepare($sql);
    $query->bindValue(1, $correo, PDO::PARAM_STR);
    $query->bindValue(2,sha1($pass) , PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch();
    $toret = isset($result['proyectos']) && $result['proyectos']==1;
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

function getUserbyID($id){
    $sql = "SELECT * FROM usuario where idUser = ?";
    $db = conexion_bd();
    $stmt = $db->prepare($sql);
    $stmt->bindParam(1,$id);
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

function getResponsables(){
    $sql = "SELECT * FROM usuario WHERE rolId = 3";
    $db = conexion_bd();
    $stmt = $db->query($sql);
    $responsables = [];

        foreach ($stmt as $resultado) {
            $user = new Usuario();
            $user->idUser = $resultado["idUser"];
            $user->rolId = $resultado["rolId"];
            $user->nombre = $resultado["nombre"];
            $user->correo = $resultado["correo"];
            $user->pwd = $resultado["pwd"];
            $responsables[] = $user;
        }

    $stmt->closeCursor();
    $db = null;

    return $responsables;
}


function addProyect($nombre,$responsableId,$descripcion){
    //Comprobamos que no exista un usuario con ese nic o correo.
    $sql = 'SELECT COUNT(*) AS proyectos FROM proyecto WHERE nombre=?';
    $conexion = conexion_bd();
    $query = $conexion->prepare($sql);
    $query->bindValue(1, $nombre, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch();
    
    if (isset($result['proyectos']) && $result['proyectos'] > 0) {
        return 'El proyecto ya existe';
    }
    //Cerramos el cursor.
    $query->closeCursor();

    //Preparamos la consulta para insertar el nuevo usuario
    $sql = 'INSERT INTO proyecto(responsableId,nombre,descripcion) VALUES (:responsableId, :nombre, :descripcion)';
    $query = $conexion->prepare($sql);
    $query->bindValue(':responsableId', $responsableId);
    $query->bindValue(':nombre', $nombre);
    $query->bindValue(':descripcion', $descripcion);
    $toret = false;
    try {
        $toret = $query->execute() ;
        // $query->debugDumpParams();
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

function getProyect($id){
    $sql = "SELECT * FROM proyecto where idProyecto = ?";
    $db = conexion_bd();
    $stmt = $db->prepare($sql);
    $stmt->bindValue(1,$id);
    $stmt->execute();
    $resultado = $stmt->fetch();
    
    if ($resultado) {
        $p = new Proyecto();
        $p->idProyecto = $resultado["idProyecto"];
        $p->responsableId = $resultado["responsableId"];
        $p->nombre = $resultado["nombre"];
        $p->descripcion = $resultado["descripcion"];
    }

    $stmt->closeCursor();
    $db = null;

    return $p;
}

function getProyects(){
    $sql = "SELECT * FROM proyecto";
    $db = conexion_bd();
    $stmt = $db->query($sql);
    $proyectos = [];

        foreach ($stmt as $resultado) {
            $p = new Proyecto();
            $p->idProyecto = $resultado["idProyecto"];
            $p->responsableId = $resultado["responsableId"];
            $p->nombre = $resultado["nombre"];
            $p->descripcion = $resultado["descripcion"];
            $proyectos[] = $p;
        }

    $stmt->closeCursor();
    $db = null;

    return $proyectos;
}