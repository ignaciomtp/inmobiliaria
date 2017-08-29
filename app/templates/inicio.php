
 <?php ob_start() ?>
 <h1>Inicio</h1>
 
 <?php //echo $params['mensaje'] 
         
    if(isset($_SESSION['user'])){
        echo "<pre>";
        print_r($_SESSION['user']);
        echo "</pre>";
    }
  ?>

 <?php $contenido = ob_get_clean() ?>

 <?php include 'layout.php' ?>