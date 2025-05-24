<?php

class Conexion{
    static public function conectar(){
        $link = new PDO("mysql:host:localhost; port= 3306; dbname=2dosemestreglobalprogramacion","root","");
        $link ->exec("set names utf8");
        return $link;
    }
    static public function consulta($sql){
        
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt ->execute();

        return $stmt->fetchAll();
    }
}


?>