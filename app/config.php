<?php

	define( "DB_DSN", "mysql:host=localhost;dbname=immobiliaria;charset=utf8" );
        define( "DB_USERNAME", "root" );
	define( "DB_PASSWORD", '' );

        
        function generarUrlMenu($val){
            $uri = $_SERVER['REQUEST_URI'];
            
            $params = explode('/', $uri);
                        
            if(count($params) > 3){
                if(in_array($val, $params)){
                    echo "";
                }
                else{
                    if($val == "inicio"){
                        echo "../";
                    }
                    else{
                        echo "../$val/";
                    }                    
                }                
            }
            else{
                if($val == "inicio"){
                    echo "";
                }
                else{
                    echo "$val/";
                }
            }
            
        }
        
        function usuarioAutenticado(){
            // Si no hay una sesión iniciada, lo hacemos
            if ( !isset($_SESSION) ){
              session_start();
            }

            // If existe la variable de sesión "user" entonces es que un usuario ha iniciado sesión
            if ( isset($_SESSION['user']) ){
              return true;
            } else {
              return false;
            }
        }
        
        function login($mail, $pass){
            if ( !isset($_SESSION) ){
              session_start();
            }
            
            $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $sql = "SELECT * FROM propietarios WHERE email = '$mail'";
            
            $s = $conn->prepare($sql);
            $s->execute();
            
            $usuario = $s->fetch();
            $conn = null;
            
            if($usuario){
                if(password_verify($pass, $usuario['password'])){
                    $_SESSION['user'] = $usuario['id'];
                    $_SESSION['nombre'] = $usuario['nombre'];
                    return true;                    
                }
                else{
                    return false;
                }

            }
            else{
                return false;
            }
            
        }
        
        function cerrarSesion(){
            if(usuarioAutenticado()){
                if(!isset($_SESSION)){
                    session_start();
                }
                
                unset($_SESSION['user']);
                unset($_SESSION['nombre']);
                session_destroy();
            }
        }
        
        
        