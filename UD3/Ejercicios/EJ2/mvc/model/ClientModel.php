<?php
namespace Ejercicios\EJ2\mvc\model;
use Ejercicios\EJ2\mvc\model\Model;
use Ejercicios\EJ2\mvc\model\vo\ClientVo;
use Pdo;

class ClientModel extends Model{
    public function getClients(){
        $sql = "SELECT * from cliente";
        $db = self::getConnection();
        
        $stmt = $db->prepare( $sql);

        $stmt->execute();
        $clientes = [];
        foreach ($stmt as $p) {
            $cliente = new ClientVo();
            $cliente->codCliente = $p['cod_cliente'];
            $cliente->nombre = $p['nombre'];
            $cliente->apellidos = $p['apellidos'];
            $cliente->telefono = $p['telefono'];
            $cliente->mail = $p['mail'];
            $clientes[] = $cliente;
        }

        $stmt->closeCursor();
        $db = null;

        return $clientes;
    }

    public function addClient($nombre,$apellidos,$telefono,$mail){
        $sql = "INSERT INTO cliente(nombre, apellidos, telefono, mail) 
        VALUES (:nombre,:apellidos,:telefono,:mail)";

        $db = self::getConnection();

        $stmt = $db->prepare($sql);

        $stmt->bindValue(":nombre",$nombre, PDO::PARAM_STR);
        $stmt->bindValue(":apellidos",$apellidos, PDO::PARAM_STR);
        $stmt->bindValue(":telefono",$telefono, PDO::PARAM_INT);
        $stmt->bindValue(":mail",$mail, PDO::PARAM_STR);

        $toret = $stmt->execute();
        $stmt->closeCursor();
        $db = null;

        return $toret;
    }
}
