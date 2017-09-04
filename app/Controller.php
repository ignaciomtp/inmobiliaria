<?php

    class Controller{
        
        public function inicio()
        {
            session_start();
            require __DIR__ . '/templates/inicio.php';
        }
        
        
        public function listar(){
            require __DIR__ . '/templates/listar.php';
        }
        
        public function registro(){
            require __DIR__ . '/templates/registro.php';
        }
        
        public function contacto(){
            require __DIR__ . '/templates/contacto.php';
        }
        
        public function login(){
            require __DIR__ . '/templates/login.php';
        }
        
        public function loginError(){
            require __DIR__ . '/templates/login.php';
        }
        
        public function logout(){
            cerrarSesion();
            require __DIR__ . '/templates/listar.php';
        }
        
        public function miPerfil(){
            require __DIR__ . '/templates/miperfil.php';
        }
        
        public function panel(){
            require __DIR__ . '/templates/panel.php';
        }
        
        public function insertar(){
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $dni = $_POST['dni'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $cp = $_POST['cp'];
            $localidad = $_POST['localidad'];
            $provincia = $_POST['provincia'];
            $email = $_POST['mail'];
            $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            
            $propietario = new Propietario($nombre, $apellidos, $dni, $telefono, 
                    $direccion, $cp, $localidad, $provincia, $email, $password);
            
            $propietario->insertar();
            
            session_start();

            $_SESSION['user'] = $propietario->getId();
            $_SESSION['nombre'] = $nombre;
            
            require __DIR__ . '/templates/inicio.php';
            
        }
        
        public function nuevoInmueble(){
            require __DIR__ . '/templates/nuevoinmueble.php';
        }
        
        public function insertarInmueble(){
            $tipo = $_POST['tipo'];
            $propietario = $_POST['propietario'];
            $modalidad = $_POST['modalidad'];
            $direccion = $_POST['direccion'];
            $localidad = $_POST['localidad'];
            $cp = $_POST['cp'];
            $provincia = $_POST['provincia'];
            $superficie = $_POST['superficie'];
            $habitaciones = $_POST['habitaciones'];
            $precio = $_POST['precio'];
            $descripcion = $_POST['descripcion'];
            
            
            if($_FILES['foto']['error'] == 0){
                $ctemp = $_FILES['foto']['tmp_name'];
                $foto = $_FILES['foto']['name'];   
                $destino = FOTOS;
                $foto = subeImagen($destino, $foto, $ctemp);
            }
            else{
                $foto = "hey";
            }
         
            $inmubele = new Inmueble($tipo, $propietario, $modalidad, $direccion, 
                    $localidad, $cp, $provincia, $superficie, $habitaciones, 
                    $foto, $precio, $descripcion);
            
            $inmubele->insertar();
            
            //require __DIR__ . '/templates/miperfil.php'; 
            header('Location: http://localhost/immobiliaria/panel/'); 
            
            
            
        }
        
        
        public function verInmueble(){
            
            
            $inm = Inmueble::seleccionarInmueble($_GET['id']);
            require __DIR__ . '/templates/inmueble.php';
            

        }
        
        public function pruebas(){
            require __DIR__ . '/templates/pruebas.php';
        }
    }