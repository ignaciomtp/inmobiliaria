<?php
 if ( usuarioAutenticado() ){
    header('Location: http://localhost/immobiliaria/miperfil/'); // Cuidado con esta función. Debe ser llamada antes de MOSTRAR NADA por pantalla, incluidos espacios en blanco.
}
 


 ob_start() ?>
 <h1>Registro</h1>
 <h3>Introduce tus datos  </h3>
 
 
 <div class="jumbotron">
     <form action="../insertar/" method="post">
         <div class="col-md-6">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" class="form-control" />
            </div>         

            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos" class="form-control" />
            </div>          
             
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" />
            </div>      

            <div class="form-group">
                <label for="pass">Contraseña:</label>
                <input type="password" name="pass" class="form-control" />
            </div>                   

            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" name="telefono" class="form-control" />
            </div>                     
             
         </div>
         
         
         <div class="col-md-6">
            <div class="form-group">
                <label for="dni">DNI:</label>
                <input type="text" name="dni" class="form-control" />
            </div>        

            <div class="form-group">
                <label for="direccion">Direccion:</label>
                <input type="text" name="direccion" class="form-control" />
            </div>        

            <div class="form-group">
                <label for="cp">Código Postal:</label>
                <input type="text" name="cp" class="form-control" />
            </div>        

            <div class="form-group">
                <label for="localidad">Localidad:</label>
                <input type="text" name="localidad" class="form-control" />
            </div>        

            <div class="form-group">
                <label for="provincia">Provincia:</label>
                <input type="text" name="provincia" class="form-control" />
            </div>                     
         </div>

         <div class="text-center"><input type="submit" value="Guardar" class="btn btn-lg btn-primary" /></div>
         
     </form>
     

 </div>

 <?php 

 $contenido = ob_get_clean() ?>

 <?php include 'layout.php' ?>