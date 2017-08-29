 <?php 
 
 ob_start() ?>
 <h1>Listar</h1>
 <h3>Esto es listar  </h3>
 

 <?php 

 echo "Esto es contacto";
 
 $contenido = ob_get_clean() ?>

 <?php include 'layout.php' ?>