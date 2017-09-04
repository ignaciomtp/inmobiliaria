
 <?php ob_start() ?>
 <h1>Inicio</h1>
 
 <?php //echo $params['mensaje'] 
         
 $inmuebles = Inmueble::listarTodos();
 
 ?>
 
 <div class="jumbotron">
     <?php
        foreach($inmuebles as $inm){
            echo "<a href='inmueble/".$inm['id']."'>";
            echo "<div class='col-md-3'><div class='well2'>";
            echo "  <img src='img/fotos/".$inm['foto']."' class='img-responsive' />";
            echo "  <div class='well2-int'>";
            echo "  <h4>".  devolverTipo($inm['tipo'])." en <span>".$inm['localidad']."</span></h4>";
            echo "  <span class='precio'>".number_format($inm['precio'], 0, ',', '.').
                    verPrecioMod($inm['modalidad'])."</span>";
            echo "  <h5>".$inm['modalidad']."</h5>";
            echo "</div></div></div></a>";
        }
     
     ?>
     
     <div class="limpiar"></div>
 </div>

 <?php $contenido = ob_get_clean() ?>

 <?php include 'layout.php' ?>

 