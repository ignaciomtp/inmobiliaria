<?php

    class Controller{
        
        public function inicio()
        {
            $params = array(
                'mensaje' => 'Bienvenido al curso de Symfony2',
                'fecha' => date('d-m-y'),
            );
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
        
        public function insertar(){
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $dni = $_POST['dni'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $cp = $_POST['cp'];
            $localidad = $_POST['localidad'];
            $provincia = $_POST['provincia'];
            $email = $_POST['email'];
            $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            
            $propietario = new Propietario($nombre, $apellidos, $dni, $telefono, 
                    $direccion, $cp, $localidad, $provincia, $email, $password);
            
            $propietario->insertar();
            
            session_start();

            $_SESSION['user'] = $propietario->getId();
            $_SESSION['nombre'] = $nombre;
            
            require __DIR__ . '/templates/inicio.php';
            
        }
        
        
    }