<?php

	define( "DB_DSN", "mysql:host=localhost;dbname=immobiliaria;charset=utf8" );
        define( "DB_USERNAME", "root" );
	define( "DB_PASSWORD", '' );
        define( "FOTOS", "img/fotos/");

        
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
        
        
        function urls_amigables($url) {

                // Tranformamos todo a minusculas

                $url = strtolower($url);
                
                //Rememplazamos caracteres especiales latinos

                $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ', 'Á'
                    . '', 'É', 'Í', 'Ó', 'Ú', 'Ñ');

                $repl = array('a', 'e', 'i', 'o', 'u', 'n', 'a', 'e', 'i', 'o', 'u', 'n');

                $url = trim($url);
                $url = str_replace ($find, $repl, $url);

                // Añaadimos los guiones

                $find = array(' ', '&', '\r\n', '\n', '+'); 
                $url = str_replace ($find, '-', $url);

                // Eliminamos y Reemplazamos demás caracteres especiales

                $find = array('/[^a-z0-9\-<>.]/', '/[\-]+/', '/<[^>]*>/');

                $repl = array('-', '-', '-');

                $url = preg_replace ($find, $repl, $url);

                return $url;

        }
        
        function subeImagen($destino, $imagen, $ctemp){
            $imagen = urls_amigables($imagen);
            $partes_ruta = pathinfo($destino.$imagen);


            //Mientras que el nombre del fichero exista en destino
            $a=0;
            while(file_exists($destino.$imagen))
            {
                    // Aumentar nombre de fichero
                    $a++;
                    // Hasta obtener un nombre valido
                    $imagen=$partes_ruta['filename'].
                                            "_".
                                            $a.
                                            ".".
                                            $partes_ruta['extension'];
            }

            //subirImagen($destino, $foto);
            move_uploaded_file($ctemp, $destino.$imagen);	

            return $imagen;
		
	}
        
        
        function devolverTipo($tipo){

            switch ($tipo){
                case 1: 
                    $t = "Casa";
                    break;
                case 2:
                    $t = "Piso";
                    break;
                case 3: 
                    $t = "Local Comercial";
                    break;
                case 4:
                    $t = "Plaza de Garaje";
                    break;
                case 5:
                    $t = "Terreno";
                    break;
                case 6:
                    $t = "Estudio";
                    break;

            }

            return $t;
        }
        
        function verPrecioMod($modalidad){
            if($modalidad == "Alquiler"){
                return " €/mes";
            }
            else{
                return " €";
            }
        }
        