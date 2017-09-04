<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Immobiliaria</title>
        <link href="css/bootstrap.css" type="text/css" rel="stylesheet" />
        <link href="css/propio.css" type="text/css" rel="stylesheet" />
        <link href="../css/bootstrap.css" type="text/css" rel="stylesheet" />
        <link href="../css/propio.css" type="text/css" rel="stylesheet" />        
    </head>
    <body>
        
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="#">Inmobiliaria Pepito</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">

                      <li class="nav-item active">
                          <a class="nav-link" href="<?php generarUrlMenu('inicio') ?>">Inicio

                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php generarUrlMenu('listar') ?>">Listar</a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link" href="<?php generarUrlMenu('contacto') ?>">Contacto</a>
                      </li>

                    </ul>
                    
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                            if ( !usuarioAutenticado() ){
                                echo "<li class='nav-item'>";
                                echo "  <a class='nav-link' href='";
                                generarUrlMenu('login');
                                echo "'>Login</a></li>";
                                
                                echo "<li class='nav-item'>";
                                echo "  <a class='nav-link' href='";
                                generarUrlMenu('registro');
                                echo "'>Registro</a></li>";                                
                            }
                            else{
                                echo "<li class='nav-item'>";
                                echo "  <div class='hola'>Hola, ".$_SESSION['nombre']."</div></li>";
                                
                                echo "<li class='nav-item'>";
                                echo "  <a class='nav-link' href='";
                                generarUrlMenu('panel');
                                echo "'>Panel de Control</a></li>";  
                                
                                echo "<li class='nav-item'>";
                                echo "  <a class='nav-link' href='";
                                generarUrlMenu('logout');
                                echo "'>Cerrar Sesión</a></li>";     
                            }
                        
                        ?>
                    
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container sep-top">
            <?php
                echo $contenido;
            ?>            
        </div>
        

    </body>
</html>
