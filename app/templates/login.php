 <?php 
 $error = "";
 if ( usuarioAutenticado() ){
    header('Location: http://localhost/immobiliaria/miperfil/'); // Cuidado con esta función. Debe ser llamada antes de MOSTRAR NADA por pantalla, incluidos espacios en blanco.
 }
 else if($_POST){
     $userMail = $_POST['mail'];
     $pass = $_POST['pass'];
     
     if(login($userMail, $pass)){
         header('Location: http://localhost/immobiliaria/miperfil/');
     }
     else{
         $error = "<div class='error'>
                <h4>ERROR</h4>
                <span>El email o la contraseña son erróneos</span>
            </div>";
     }
 }

 
 ob_start() ?>

<div class="centrado">

    <div class="well ">
        <form class="form-signin" method="POST">
            <h2 class="form-signin-heading">Iniciar Sesión</h2>
            <label for="inputEmail" class="sr-only">Dirección de Email </label>
            <input type="email" name="mail" id="inputEmail" class="form-control" placeholder="Dirección de Email" required autofocus>
            <label for="inputPassword" class="sr-only">Contraseña</label>
            <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Contraseña" required>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me"> Recuérdame
              </label>
            </div>
            <?php
                echo $error;
            ?>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        </form>

    </div>
    
</div>
<div class="centrado">
    <span>¿No tienes cuenta?</span>
    <a href="../registro/" class="btn btn-lg btn-info btn-block">Regístrate</a>
</div>

 <?php 
 
 $contenido = ob_get_clean() ?>

 <?php include 'layout.php' ?>
