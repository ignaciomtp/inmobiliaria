

        <?php
            require_once __DIR__ . '/app/config.php';
            require_once __DIR__ . '/app/Model.php';
            require_once __DIR__ . '/app/Controller.php';
            
            

            // enrutamiento
            $map = array(
                'inicio' => array(
                  'controller' =>'Controller',
                  'action' =>'inicio',
                  ),
                'listar' => array(
                  'controller' =>'Controller',
                  'action' =>'listar',
                  ),
                'buscar' => array(
                  'controller' =>'Controller',
                  'action' =>'buscarPorNombre',
                  ),
                'ver' => array(
                  'controller' =>'Controller',
                  'action' =>'ver',
                  ),
                'registro' => array(
                  'controller' =>'Controller',
                  'action' =>'registro',
                  ),
                'contacto' => array(
                  'controller' =>'Controller',
                  'action' =>'contacto',
                  ),
                'insertar' => array(
                  'controller' =>'Controller',
                  'action' =>'insertar',
                  ),
                'login' => array(
                  'controller' =>'Controller',
                  'action' =>'login',
                  ),
                'loginerror' => array(
                  'controller' =>'Controller',
                  'action' =>'loginError',
                  ),
                'miperfil' => array(
                  'controller' =>'Controller',
                  'action' =>'miPerfil',
                  ),
                'logout' => array(
                  'controller' =>'Controller',
                  'action' =>'logout',
                  ),
                'nuevoinmueble' => array(
                  'controller' =>'Controller',
                  'action' =>'nuevoInmueble',
                  ),
                'insertarinmueble' => array(
                  'controller' =>'Controller',
                  'action' =>'insertarinmueble',
                  ),
                'panel' => array(
                  'controller' =>'Controller',
                  'action' =>'panel',
                  ),
                'verinmueble' => array(
                  'controller' =>'Controller',
                  'action' =>'verInmueble',
                  ),
                'pruebas' => array(
                  'controller' =>'Controller',
                  'action' =>'pruebas',
                  )
            );            

            // Parseo de la ruta
            if (isset($_GET['ctl'])) {
                if (isset($map[$_GET['ctl']])) {
                    $ruta = $_GET['ctl'];
                } else {
                    header('Status: 404 Not Found');
                    echo '<html><body><h1>Error 404: No existe la ruta <i>' .
                            $_GET['ctl'] .
                            '</p></body></html>';
                    exit;
                }
            } else {
                $ruta = 'inicio';
            }
        
            $controlador = $map[$ruta];
            // Ejecución del controlador asociado a la ruta

            if (method_exists($controlador['controller'], $controlador['action'])) {
                call_user_func(array(new $controlador['controller'], $controlador['action']));
                
            } else {

                header('Status: 404 Not Found');
                echo '<html><body><h1>Error 404: El controlador <i>' .
                        $controlador['controller'] .
                        '->' .
                        $controlador['action'] .
                        '</i> no existe</h1></body></html>';
            }        
        

