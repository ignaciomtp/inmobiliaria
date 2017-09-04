<?php

class Propietario{
    private $id;
    private $nombre;
    private $apellidos;
    private $dni;
    private $telefono;
    private $direccion;
    private $cp;
    private $localidad;
    private $provincia;
    private $email;
    private $pass;
    
    
    public function __construct($nombre, $apellidos, $dni, $telefono, $direccion,
        $cp, $localidad, $provincia, $email, $pass) {
        
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->cp = $cp;
        $this->dni = $dni;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->direccion = $direccion;
        $this->localidad = $localidad;
        $this->provincia = $provincia;
        $this->pass = $pass;
  
    }
    
    public function insertar(){
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $sql = "INSERT INTO propietarios (nombre, apellidos, dni, telefono, direccion, "
                . "cp, localidad, provincia, email, password) VALUES (:nom, :ape, :dn, :tel, :dir, "
                . ":c, :lo, :pro, :em, :pass)";
        
        $s = $conn->prepare($sql);
        $s->bindValue(":nom", $this->nombre);
        $s->bindValue(":ape", $this->apellidos);
        $s->bindValue(":dn", $this->dni);
        $s->bindValue(":tel", $this->telefono);
        $s->bindValue(":dir", $this->direccion);
        $s->bindValue(":lo", $this->localidad);
        $s->bindValue(":pro", $this->provincia);
        $s->bindValue(":em", $this->email);
        $s->bindValue(":c", $this->cp);
        $s->bindValue(":pass", $this->pass);
        
        $s->execute();
       
        $id = $conn->lastInsertId();
        
        $conn = null;    
        $this->id = $id;
        
    }
    
    public function getId(){
        return $this->id;
    }
    
    public static function buscarEmail($mail){
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $sql = "SELECT * FROM propietarios WHERE email = '$mail'";
        
        $s = $conn->prepare($sql);
        $s->execute();
        $conn = null; 
        return $s->fetch();
        
    }
    
}