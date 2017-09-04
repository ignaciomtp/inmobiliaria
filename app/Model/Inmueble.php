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
    private $foto;
    private $precio;
    private $descripcion;
    
    
    public function __construct($tipo, $propietario, $modalidad, $direccion,
             $localidad, $cp, $provincia, $superficie, $habitaciones, $foto, 
            $precio, $descripcion) {
        
        $this->tipo = $tipo;
        $this->propietario = $propietario;
        $this->modalidad = $modalidad;
        $this->direccion = $direccion;
        $this->localidad = $localidad;
        $this->cp = $cp;
        $this->provincia = $provincia;
        $this->superficie = $superficie;
        $this->habitaciones = $habitaciones;
        $this->foto = $foto;
        $this->precio = $precio;
        $this->descripcion = $descripcion;
        
    }
    
    public function insertar(){
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $sql = "INSERT INTO inmuebles (tipo, propietario, modalidad, direccion, "
                . "localidad, cp, provincia, superficie, habitaciones, foto, precio, descripcion) VALUES ("
                . ":tip, :prop, :mod, :dir, :loc, :cod, :prov, :sup, :hab, :fot, :pre, :desc)";
        
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
        $s->bindValue(":fot", $this->foto);
        $s->bindValue(":pre", $this->precio);
        $s->bindValue(":desc", $this->descripcion);
        
        $s->execute();
        
        $id = $conn->lastInsertId();
        
        $conn = null;    
        $this->id = $id;    
        
    }
    
    public function getId(){
        return $this->id;
    }
    
    public static function listarTodos(){
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        //$sql = "SELECT * FROM inmuebles";
        $sql = "SELECT inmuebles.id, inmuebles.direccion, inmuebles.localidad, "
                . "inmuebles.tipo, inmuebles.foto, inmuebles.precio, modalidad.modalidad "
                . "FROM inmuebles JOIN modalidad "
                . "WHERE inmuebles.modalidad = modalidad.id";
        $s = $conn->prepare($sql);
        $s->execute();
        $conn = null;
        return $s->fetchAll();
    }
    
     public function listarPorTipo($tipo){
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $sql = "SELECT * FROM inmuebles WHERE tipo = $tipo";
        $s = $conn->prepare($sql);
        $s->execute();
        $conn = null;
        return $s->fetchAll();
    }   
    
    public static function listarPorPropietario($prop){
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $sql = "SELECT * FROM inmuebles WHERE propietario = $prop";
        
        $s = $conn->prepare($sql);
        $s->execute();
        $conn = null;
        return $s->fetchAll();
    }   
    
    public static function listarTipos(){
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $sql = "SELECT * FROM tipoinmueble";
        $s = $conn->prepare($sql);
        $s->execute();
        $conn = null;
        return $s->fetchAll();        
    }
    
    
    
    public static function listarModalidades(){
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $sql = "SELECT * FROM modalidad";
        $s = $conn->prepare($sql);
        $s->execute();
        $conn = null;
        return $s->fetchAll();            
    }
    
    public static function seleccionarInmueble($id){
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $sql = "SELECT * FROM inmuebles WHERE id = $id";
        $s = $conn->prepare($sql);
        $s->execute();
        $conn = null;
        return $s->fetch();
    }
}
