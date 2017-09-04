<?php

class Provincia{
    
    public static function listar(){
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $sql = "SELECT * FROM provincias";
        $s = $conn->prepare($sql);
        $s->execute();
        $conn = null;
        return $s->fetchAll();            
    }
    
}

