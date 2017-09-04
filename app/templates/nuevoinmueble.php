<?php
 if ( !usuarioAutenticado() ){
    header('Location: http://localhost/immobiliaria/login/'); 
}
 
$tipos = Inmueble::listarTipos();
$provincias = Provincia::listar();
$modalidades = Inmueble::listarModalidades();

 ob_start() ?>

<h1>Nuevo Inmueble</h1>
<div class="jumbotron">
     <form action="../insertarinmueble/" method="post" enctype="multipart/form-data">
         <div class="col-md-6">
             
            <div class="form-group">
                <label for="tipo">Tipo:</label>
                <select name="tipo" id="tipo" class="form-control">
                    <?php
                       foreach($tipos as $tipo){
                           echo "<option value='".$tipo['id']."'>".$tipo['tipo']."</option>";
                       }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="modalidad">Modalidad:</label>
                <select name="modalidad" id="modalidad" class="form-control">
                    <?php
                       foreach($modalidades as $mod){
                           echo "<option value='".$mod['id']."'>".$mod['modalidad']."</option>";
                       }
                    ?>                     
                </select>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" name="direccion" id="direccion" class="form-control" />
            </div>    
            <div class="form-group">
                <label for="localidad">Localidad:</label>
                <input type="text" name="localidad" id="localidad" class="form-control" />
            </div>

             
             
             <div class="row">
                 <div class="col-md-6">
                     <div class="form-group">
                        <label for="cp">Código Postal:</label>
                        <input type="text" name="cp" id="cp" class="form-control" />
                    </div>
                 </div>
                 <div class="col-md-6">
                     <div class="form-group">
                        <label for="provincia">Provincia:</label>
                        <select name="provincia" id="provincia" class="form-control">
                            <?php
                               foreach($provincias as $prov){
                                   echo "<option value='".$prov['id']."'>".$prov['provincia']."</option>";
                               }
                            ?>                          
                        </select>
                    </div>
                 </div>
             </div>
             
             


         </div>
         
         <div class="col-md-6">
             <div class="form-group">
                 <label for="precio">Precio:</label>
                 <input type="text" id="precio" name="precio" class="form-control" />
             </div>

             <div class="form-group">
                 <label for="descripcion">Descripción:</label>
                 <textarea name="descripcion" id="descripcion" class="form-control" rows="5"></textarea>
             </div>             
             

             
             <div class="row">
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="habitaciones">Habitaciones:</label>
                          <input type="text" name="habitaciones" id="habitaciones" class="form-control" />
                       </div>                 
                    </div>

                    <div class="col-md-6">
                       <div class="form-group">

                          <label for="superficie">Superficie:</label>
                          <input type="text" name="superficie" id="superficie" class="form-control" />

                          <input type="text" name="propietario" value="<?php echo $_SESSION['user'] ?>" hidden />
                       </div>                    
                    </div>                 
             </div>                 
             
             
                <div class="form-group">
                    <label for="foto">Foto principal (luego puedes añadir más):</label>
                    <input type="file" id="foto" name="foto" class="form-control" />
                </div>
             
             
         </div>
         
         <hr />
         
         <div class="limpiar"></div>
          <div class="text-center"><input type="submit" value="Guardar" class="btn btn-lg btn-primary" /></div>
     </form>
</div>

 <?php 

 $contenido = ob_get_clean() ?>

 <?php include 'layout.php' ?>