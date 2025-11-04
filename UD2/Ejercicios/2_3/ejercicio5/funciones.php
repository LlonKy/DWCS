<?php
include_once "clases.php";
// Definicion de constantes de la BD
define('DB_DSN', 'mysql:host=mariadb;dbname=e_5');
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

/**
 * Realiza un alta de usuario y devuelve true. Si algo falla devuelve un mensaje de error.
 *
 * @param string $nombre Nombre del usuario
 * @param string $ap1 Primer apellido del usuario
 * @param string $mail Correo del usuario.
 * @param string $nic Nombre del usuario en el sistema. 
 * @param string $pass Contrasenha
 * @param string $pass2 Verificación de contraseanha.
 * @return boolean
 */
function alta_usuario(
    string $nombre,
    string $ap1,
    string $mail,
    string $nic,
    string $pass,
    string $pass2
): bool|string {

   

    //Comprobamos que no exista un usuario con ese nic o correo.
    $sql = 'SELECT COUNT(*) AS num_usr FROM USUARIO WHERE nic=? OR mail=?';
    $conexion = conexion_bd();
    $query = $conexion->prepare($sql);
    $query->bindParam(1, $nic, PDO::PARAM_STR);
    $query->bindParam(2, $mail, PDO::PARAM_STR);
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
    $sql = 'INSERT INTO USUARIO(nic,nombre,apellido1,mail,pass) VALUES (:nic, :nombre, :ap1, :mail, :pass)';
    $query = $conexion->prepare($sql);
    $query->bindParam(':nic', $nic);
    $query->bindParam(':nombre', $nombre);
    $query->bindParam(':ap1', $ap1);
    $query->bindParam(':mail', $mail);
    $query->bindParam(':pass', $pass);
    $toret = false;
    try {
        $toret = $query->execute() ;
    } catch (PDOException $e) {
        $toret = false;
    } finally {
        //Cerramos la conexion
        $query = null;
        $conexion = null;
    }

    return $toret;
}

/**
 * Esta función permite comprobar si un usuario está registrado con la contraseña indicada.
 */
function comprobar_usuario(string $nic, string $pass):bool{
    $sql = 'SELECT COUNT(*) AS num_usr FROM USUARIO WHERE nic=? AND pass=?';
    $conexion = conexion_bd();
    $query = $conexion->prepare($sql);
    $query->bindParam(1, $nic, PDO::PARAM_STR);
    $query->bindValue(2,sha1($pass) , PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch();
    $toret = isset($result['num_usr']) && $result['num_usr']==1;
    //Cerramos la conexion
    $query = null;
    $conexion = null;
    return $toret;

}

function addProducto($nombre){
    $sql = "INSERT INTO PRODUCTOS (nombre) VALUES (:nombre)";
    $db = conexion_bd();
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $msg = "";

    try {
        $stmt->execute();
        $msg = "Producto añadido correctamente";
    } catch (PDOException $e) {
        $msg = "Error al añadir el producto, puede que ya exista";
    }

    $stmt->closeCursor();
    $db = null;

    return $msg;
}


function listarCarrito(){
    $sql = "SELECT * FROM Carrito";
    $db = conexion_bd();
    $stmt = $db->query($sql);
    $carrito = [];

        foreach ($stmt as $resultado) {
            $carrito = new Carrito;
            $carrito->idProducto = $resultado["idProducto"];
            $carrito->nic = $resultado["nic"];
            $carrito->nombreProducto = $resultado["nombreProducto"];
            $carrito->$cantidadProducto = $resultado["cantidadProducto"];
            $carritos[] = $carrito;
        }


    $stmt->closeCursor();
    $db = null;

    return $carrito;
}

function addCarrito()

function comprobar_producto(string $nombre):bool{
    $sql = 'SELECT COUNT(*) AS num_p FROM PRODUCTOS WHERE nombre=?';
    $conexion = conexion_bd();
    $query = $conexion->prepare($sql);
    $query->bindParam(1, $nombre, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch();
    $toret = isset($result['num_p'])==1;
    //Cerramos la conexion
    $query = null;
    $conexion = null;
    return $toret;

}