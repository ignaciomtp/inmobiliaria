<?php

// Si el usuario no está autenticado entonces lo mandamos a la página de autenticación(login.php)
if ( !usuarioAutenticado() ){
    header('Location: http://localhost/immobiliaria/login/'); // Cuidado con esta función. Debe ser llamada antes de MOSTRAR NADA por pantalla, incluidos espacios en blanco.
}

$misInmuebles = Inmueble::listarPorPropietario($_SESSION['user']);


 ob_start() ?>

 <h1>Panel de Control</h1>
 
 <div class="col-md-3">
     
 </div>
 
 
 
 <div class="col-md-9">
     <a href="<?php generarUrlMenu('nuevoinmueble') ?>" class="btn btn-sm btn-success">Subir Inmueble</a>
     <table class="table table-striped">
         <thead>
             <tr><th>Id</th><th>direccion</th><th>Localidad</th><th>tipo</th><th></th><th></th></tr>
         </thead>
         <tbody>
             <?php
                foreach($misInmuebles as $inm){
                    $tipo = devolverTipo($inm['tipo']);
                    echo "<tr><td>".$inm['id']."</td><td>".$inm['direccion']."</td><td>".$inm['localidad'];
                    echo "  </td><td>$tipo</td><td><a href='#' class='btn btn-sm btn-info'>editar</a></td>";
                    echo "  <td><a href='#' class='btn btn-sm btn-danger'>Borrar</a></td></tr>";
                }
             ?>
         </tbody>
     </table>
 </div>

 <?php 


 
 $contenido = ob_get_clean() ?>

 <?php include 'layout.php' ?>