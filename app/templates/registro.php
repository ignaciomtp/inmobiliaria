<?php
 if ( usuarioAutenticado() ){
    header('Location: http://localhost/immobiliaria/miperfil/'); // Cuidado con esta función. Debe ser llamada antes de MOSTRAR NADA por pantalla, incluidos espacios en blanco.
}

$provincias = Provincia::listar();

 ob_start() ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/propio.js"></script>
 <h1>Registro</h1>
 <h3>Introduce tus datos  </h3>
 
 
 <div class="jumbotron">
     <form action="../insertar/" method="post" onsubmit="validar()">
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
                <label for="mail">Email:</label>
                <input type="email" name="mail" id="mail" class="form-control" onblur="validar()" />
            </div>      

            <div class="form-group">
                <label for="pass">Contraseña:</label>
                <input type="password" name="pass" id="pass" class="form-control" />
            </div>                   
            <div class="form-group">
                <label for="pass2">Confirmar Contraseña:</label>
                <input type="password" name="pass2" id="pass2" class="form-control" />
            </div>          
                  
             
         </div>
         
         
         <div class="col-md-6">
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" name="telefono" class="form-control" />
            </div>   
             
            <div class="form-group">
                <label for="dni">DNI:</label>
                <input type="text" name="dni" class="form-control" />
            </div>        

            <div class="form-group">
                <label for="direccion">Direccion:</label>
                <input type="text" name="direccion" class="form-control" />
            </div>        
             
            <div class="form-group">
                <label for="localidad">Localidad:</label>
                <input type="text" name="localidad" class="form-control" />
            </div>     
             
             <div class="row">
                 <div class="col-md-6">
                    <div class="form-group">
                        <label for="cp">Código Postal:</label>
                        <input type="text" name="cp" class="form-control" />
                    </div>                             
                 </div>
                 <div class="col-md-6">
                    <div class="form-group">
                        <label for="provincia">Provincia:</label>
                        <select name="provincia" id="provincia" class="form-control">
                            <?php
                                foreach($provincias as $pro){
                                    echo "<option val='".$pro['id']."'>".$pro['provincia']."</option>";
                                }
                            ?>
                        </select>
                    </div>                         
                 </div>
             </div>

         </div>

         <div class="text-center"><input type="submit" value="Guardar" class="btn btn-lg btn-primary" /></div>
         
     </form>
     

 </div>

<script>
    $(document).ready(function(){
        
        
    });
    
    function validar(){
        var pass1 = $('#pass').val();
        var pass2 = $('#pass2').val();
        var mail = $('#mail').val();
   
        if(pass1 != pass2 || !comprobarEmail(mail)){
            return false;
        }
        else{
            return true;
        }
    }
    
    
</script>
 
 
 <?php 

 $contenido = ob_get_clean() ?>

 <?php include 'layout.php' ?>