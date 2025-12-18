<?php
namespace Ejercicios\EJ2\mvc\model;
use Ejercicios\EJ2\mvc\model\Model;
use Ejercicios\EJ2\mvc\model\vo\ProductVo;
use Ejercicios\EJ2\mvc\model\vo\Vo;
use Pdo;

class ProductModel extends Model{

    public function getProducts(){
        $sql = "SELECT * from producto";
        $db = self::getConnection();
        
        $stmt = $db->prepare( $sql);

        $stmt->execute();
        $productos = [];
        foreach ($stmt as $p) {
            $producto = new ProductVo();
            $producto->codProducto = $p['cod_producto'];
            $producto->denominacion = $p['denominacion'];
            $producto->descripcion = $p['descripcion'];
            $producto->precio = $p['precio'];
            $producto->cantidad = $p['cantidad'];
            $productos[] = $producto;
        }

        $stmt->closeCursor();
        $db = null;

        return $productos;
    }

    public function addProduct($denominacion, $descripcion, $precio, $cantidad) {
    $sql = "INSERT INTO producto(denominacion, descripcion, precio, cantidad)
            VALUES (:denominacion, :descripcion, :precio, :cantidad)";

    $db = self::getConnection();

    $stmt = $db->prepare($sql);

    $stmt->bindValue(":denominacion", $denominacion, PDO::PARAM_STR);
    $stmt->bindValue(":descripcion", $descripcion, PDO::PARAM_STR);
    $stmt->bindValue(":precio", $precio); 
    $stmt->bindValue(":cantidad", $cantidad);

    $toret = $stmt->execute();
    $stmt->closeCursor();
    $db = null;

    return $toret;
}
}