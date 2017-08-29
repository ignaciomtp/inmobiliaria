<?php

class Inmueble{
    private $id;
    private $tipo;
    private $propietario;
    private $modalidad;
    private $direccion;
    private $localidad;
    private $cp;
    private $provincia;
    private $superficie;
    private $habitaciones;
    
    
    public function __construct($tipo, $propietario, $modalidad, 
            $direccion, $localidad, $cp, $provincia, $superficie, $habitaciones) {
        
        $this->tipo = $tipo;
        $this->propietario = $propietario;
        $this->modalidad = $modalidad;
        $this->direccion = $direccion;
        $this->localidad = $localidad;
        $this->cp = $cp;
        $this->provincia = $provincia;
        $this->superficie = $superficie;
        $this->habitaciones = $habitaciones;
        
    }
    
    public function insertar(){
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $sql = "INSERT INTO inmuebles (tipo, propietario, modalidad, direccion, "
                . "localidad, cp, provincia, superficie, habitaciones) VALUES ("
                . ":tip, :prop, :mod, :dir, :loc, :cod, :prov, :sup, :hab)";
        
        $s = $conn->prepare($sql);
        $s->bindValue(":tip", $this->tipo);
        $s->bindValue(":prop", $this->propietario);
        $s->bindValue(":mod", $this->modalidad);
        $s->bindValue(":dir", $this->direccion);
        $s->bindValue(":loc", $this->localidad);
        $s->bindValue(":cod", $this->cp);
        $s->bindValue(":prov", $this->provincia);
        $s->bindValue(":sup", $this->superficie);
        $s->bindValue(":hab", $this->habitaciones);
        
        $s->execute();
        
        $conn = null;        
        
    }
    
    
    public function listarTodos(){
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $sql = "SELECT * FROM inmuebles";
        $s = $conn->prepare($sql);
        $s->execute();
        $conn = null;
        return $s->fetchAll();
    }
    
     public function listarTipo($tipo){
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $sql = "SELECT * FROM inmuebles WHERE tipo = $tipo";
        $s = $conn->prepare($sql);
        $s->execute();
        $conn = null;
        return $s->fetchAll();
    }   
    
    
}
