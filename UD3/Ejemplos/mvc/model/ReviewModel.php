<?php

class ReviewModel{
        private static function getConnection()
    {
        $db = new PDO('mysql:host=mariadb; dbname=articulos', 'root', 'bitnami');
        return $db;
    }

    public static function getReviews($cod_articulo):array|null{
        try{
        $sql = 'SELECT descripcion,fecha_hora FROM resena WHERE cod_articulo = :cod_articulo';
        $db = self::getConnection();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':cod_articulo',$cod_articulo,PDO::PARAM_INT);
        $stmt->execute();
        $arr = [];
        while ($row = $stmt->fetch()) {
            $arr[] = $row;
        }
        $stmt->closeCursor();
        } catch (PDOException $th) {
            error_log($th->getMessage());
            $arr = null;
        }finally{
            $db = null;
        }

        return $arr;
    }
}