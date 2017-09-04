 <?php 
 
 ob_start() ?>

<div class="jumbotron sep-top">
    <div class="col-md-3">
        <img src="../img/fotos/<?php echo $inm['foto'] ?>" class="img-responsive" />
    </div>
    
    <div class="col-md-9">
        <p><?php echo $inm['descripcion'] ?></p>
        
        
    </div>
    
    <div class="limpiar"></div>
</div>



 <?php 

 
 $contenido = ob_get_clean() ?>

 <?php include 'layout.php' ?>