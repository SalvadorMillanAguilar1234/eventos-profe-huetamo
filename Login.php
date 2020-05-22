<!DOCTYPE html>
<?php
require_once 'Entidad.php';
require_once 'Modelo.php';
require_once 'Controlador.php';

error_reporting(E_ALL ^ E_NOTICE);
?>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Super carnitas y chicharr&#243;n el profe de huetamo</title>
        <link rel="icon" type="image/png" href="assets/img/Carniceria.jpg" />
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
        <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
        <link rel="stylesheet" href="assets/css/HMY-Responsive-nav-menu-V1-1.css">
        <link rel="stylesheet" href="assets/css/HMY-Responsive-nav-menu-V1.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    </head>

    <body style="background: linear-gradient(rgba(200, 200, 200, 0.65), rgba(200, 200, 200, 0.65));">
        <nav class="navbar navbar-light navbar-expand-lg bg-dark py-lg-4" id="mainNav">
            <div class="container"><a class="navbar-brand text-uppercase d-lg-none text-expanded" href="index.php">El profe de huetamo</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="nav navbar-nav mx-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="index.php">Inicio</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="Agendar.php">Agendar</a></li>
<?php if ($_SESSION['idUsuarios'] == 1) { ?>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="Eventos.php">Eventos</a></li>
                        <?php } ?>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="AcercaDe.php">Acerca de</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <a class="btn btn-primary pull-right" data-bs-hover-animate="pulse" href="Registro.php"  type="submit">Registro</a>


        <div id="validaciones">
            <section class="page-section">
                <div class="container">              
                    <div class="bg-faded p-5 rounded col-xl-6 mx-auto">                        
                        <form class="form-signin" name="form" id="login" method="post" action="?operaciones=veLog">

                            <input class="form-control" type="email" v-model="email" name="inputCorreo" id="inputCorreo" required="" placeholder="Correo" autofocus="">
                            <br>
                            <input class="form-control" type="password" v-model="password" name="inputContrasena1" id="inputContrasena1" required="" placeholder="Contraseña">
                            <br>

                            <div
                                class="checkbox">
                                <!--  <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Remember me</label></div> -->
                            </div>   
                            <br>
                            <button class="btn btn-primary btn-block btn-lg btn-signin" type="submit">Ingresar</button></form><a class="forgot-password" href="#" data-toggle="modal" data-target="#modalRecuperarC">¿Olvidaste la contraseña?</a></div>
                </div>


            </section>
        </div>
        <footer class="text-light bg-dark footer text-faded text-center py-5">
            <div class="container">       
                <div class="text-center center-block">      
                    <a href="https://www.facebook.com/restaurantelostruenos/"><i id="social-fb" class="fa fa-facebook fa-2x social"></i></a> &nbsp;
                    <a href="" title="Comuniquese al: 312-194-4293"><i id="social-tw" class="fa fa-whatsapp fa-2x social"></i></a>	            
                </div>          
            </div>
        </footer>
        
        <!-- Modal de recuperar contraseñao-->
            <div class="modal left fade in" role="dialog" tabindex="-1" id="modalRecuperarC" aria-labelledby="modalChatLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5  style="float: left">Recuperar contraseña</h5>
                            <div class="col-9 col-lg-9 col-xl-9 padMar text-right">
                                <h5 style="float: right" class="text-primary padMar margenesCajas pointer" data-dismiss="modal"><i class="icon ion-android-arrow-dropleft"></i>&nbsp; Ocultar</h5>
                            </div><button type="button" class="close d-none" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Ã</span></button></div>
                        <div class="modal-body">
                            <form id="registrarEvento" method="post" action="?operaciones=recuperarP" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Ingresa el correo electrónico con el que te registrastes en este sitio:</label>
                                    <input type="text" class="form-control" id="txtPassOL" name="txtPassOL" placeholder="micorreo@gmail.com" required>
                                    </div>
                                <div  class="modal-footer" style="float: right">
                                    <button type="button" class="btn btn-danger"  data-dismiss="modal" aria-label="Close">Cancelar</button>
                                    <input type="submit" class="btn btn-primary mdi mdi-content-save"  value="Solicitar contraseña"> 
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        
        <script src="assets/js/validaciones.js" type="text/javascript"></script>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/bs-init.js"></script>
        <script src="assets/js/current-day.js"></script>
        <script src="assets/js/HMY-Responsive-nav-menu-V1.js"></script>
    </body>

</html>
