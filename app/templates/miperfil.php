<?php

// Si el usuario no está autenticado entonces lo mandamos a la página de autenticación(login.php)
if ( !usuarioAutenticado() ){
    header('Location: http://localhost/immobiliaria/login/'); // Cuidado con esta función. Debe ser llamada antes de MOSTRAR NADA por pantalla, incluidos espacios en blanco.
}
 ob_start() ?>

 <h1>Mi Perfil</h1>
 <h3>Esto es mi perfil  </h3>
 

 <?php 


 
 $contenido = ob_get_clean() ?>

 <?php include 'layout.php' ?>