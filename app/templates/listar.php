 <?php 
 
 ob_start() ?>
 <h1>Listar</h1>
 <h3>Esto es listar  </h3>
 

 <?php 

             $uri = $_SERVER['REQUEST_URI'];
            
            $params = explode('/', $uri);
            
            echo "<pre>";
            print_r($params);
            echo "</pre>";
 
 $contenido = ob_get_clean() ?>

 <?php include 'layout.php' ?>