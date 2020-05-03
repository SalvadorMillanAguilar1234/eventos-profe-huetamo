<!DOCTYPE html>
<?php 
require_once 'Entidad.php';
require_once 'Controlador.php';

error_reporting(E_ALL ^ E_NOTICE);
session_start();

//Extraer el nombre completo del usuario
$nombreCompleto="";
if ($_SESSION['idUsuarios'] == true) {
foreach ($modelo->ListarUsuario($_SESSION['idUsuarios']) as $row):
    $nombreCompleto= $row->__GET('nombres')." ".$row->__GET('apellidos');
endforeach;
}else{
    $_SESSION['idUsuarios']=0;
}
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
        <link rel="stylesheet" href="assets/css/Bootstrap-Calendar.css">
        <link rel="stylesheet" href="assets/css/HMY-Responsive-nav-menu-V1-1.css">
        <link rel="stylesheet" href="assets/css/HMY-Responsive-nav-menu-V1.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    </head>

    <body style="background: linear-gradient(rgba(200, 200, 200, .65), rgba(200, 200, 200, 0.65));">
        <nav class="navbar navbar-light navbar-expand-lg bg-dark py-lg-4" id="mainNav">
            <div class="container"><a class="navbar-brand text-uppercase d-lg-none text-expanded" href="index.php">El profe de huetamo</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="nav navbar-nav mx-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="index.php">Inicio</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="Agendar.php">Agendar</a></li>
                        <?php if ($_SESSION['idUsuarios'] == 1) { ?>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="Eventos.php">Eventos</a></li>
                        <?php }?>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="AcercaDe.php">Acerca de</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php if ($_SESSION['idUsuarios'] == true) { ?>
            <!-- Si est� registrdo -->
            <div>
                <div class="modal left fade in" role="dialog" tabindex="-1" id="modalOpcionesEU" aria-labelledby="modalChatLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="col-12 col-lg-12 col-xl-12 padMar text-right">
                                    <h5 class="text-primary padMar margenesCajas pointer" data-dismiss="modal"><i class="icon ion-android-arrow-dropleft"></i>&nbsp; Ocultar</h5>
                                </div><button type="button" class="close d-none" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Ã—</span></button></div>

                            <div class="modal-body">

                                <h4>Opciones</h4>

                                <div class="btn-group-vertical mx-auto d-block" role="group"><button  class="btn btn-light text-left" type="button" onclick=" location.href = 'EditarUsuario.php'"><i class="fa fa-pencil"></i>&nbsp;Editar usuario</button>
                                    <form method="post" action="?operaciones=cerrarSesion">
                                        <button class="btn btn-light text-left" type="submit" style="width: 100%"><i class="fa fa-power-off"></i>&nbsp;Cerrar sesión</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><button class="btn btn-primary pull-right" data-bs-hover-animate="pulse" data-toggle="modal" data-target="#modalOpcionesEU" type="button"><?php echo utf8_encode($nombreCompleto); ?></button></div>
        <?php } else { ?>
            <!-- Si no está registrdo -->
            <div>
                <div class="modal left fade in" role="dialog" tabindex="-1" id="modalOpciones" aria-labelledby="modalChatLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="col-12 col-lg-12 col-xl-12 padMar text-right">
                                    <h5 class="text-primary padMar margenesCajas pointer" data-dismiss="modal"><i class="icon ion-android-arrow-dropleft"></i>&nbsp; Ocultar</h5>
                                </div><button type="button" class="close d-none" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Ã—</span></button></div>
                            <div class="modal-body">
                                <h4>Opciones</h4>
                                <div class="btn-group-vertical mx-auto d-block" role="group"><button class="btn btn-light text-left" type="button" onclick=" location.href = 'Registro.php'"><i class="fa fa-user-circle"></i>&nbsp;Registrarse</button>
                                    <button class="btn btn-light text-left" type="button" onclick=" location.href = 'Login.php'"><i class="fa fa-user-circle-o" ></i>&nbsp;Iniciar sesion</button></div>
                            </div>
                        </div>
                    </div>
                </div><button class="btn btn-primary pull-right" data-bs-hover-animate="pulse" data-toggle="modal" data-target="#modalOpciones" type="button"><i ></i>Registras / Iniciar sesion</button></div>
        <?php }
        ?>


        <section class="page-section cta">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <div class="cta-inner text-center rounded">
                            <h2 class="section-heading mb-5"><span class="section-heading-upper">Horario de servicio</span></h2>
                            <ul class="list-unstyled mx-auto list-hours mb-5 text-left">
                                <li class="d-flex list-unstyled-item list-hours-item">Domingo<span class="ml-auto">8:00 AM a 3:00 PM</span></li>
                                <li class="d-flex list-unstyled-item list-hours-item">Lunes<span class="ml-auto">Cerrado</span></li>
                                <li class="d-flex list-unstyled-item list-hours-item">Martes<span class="ml-auto">Cerrado</span></li>
                                <li class="d-flex list-unstyled-item list-hours-item">Miercoles<span class="ml-auto">Cerrado</span></li>
                                <li class="d-flex list-unstyled-item list-hours-item">Jueves<span class="ml-auto">Cerrado</span></li>
                                <li class="d-flex list-unstyled-item list-hours-item">Viernes<span class="ml-auto">Cerrado</span></li>
                                <li class="d-flex list-unstyled-item list-hours-item">Sábado<span class="ml-auto">8:00 AM a 3:00 PM</span></li>
                            </ul>
                            <p class="address mb-5"><em><strong>Verduzco 121 col centro</strong><span><br>Coalcomán, Michoacán</span></em></p>
                            <p class="address mb-0"><small><em>llamanos al teléfono:</em></small><span><br>312-194-4293</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="page-section about-heading">
            <div class="container"><img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="assets/img/Carniceria.jpg">
                <div class="about-heading-content">
                    <div class="row">
                        <div class="col-lg-10 col-xl-9 mx-auto">
                            <div class="bg-faded rounded p-5">
                                <h2 class="section-heading mb-4"><span class="section-heading-upper">SOBRE NUESTRO NEGOCIO&nbsp;</span></h2>
                                <div align="justify"> <p>Fundado en 1998, nuestro establecimiento ha estado brindando las mejores carnitas de la 
                                        región y ofreciendo servicios en evento sociales en Morelia, Coalcomán, Churumuco, Huetamo y Comburindio. 
                                        Estamos dedicados a ofrecer siempre producto de calidad y el auténtico sabor de tierra caliente !!!</p>
                                    <p class="mb-0"><span>Ya sea para quinceañeras, bodas o bautizos,&nbsp;</span><em>lust</em><span>&nbsp;Super carnitas 
                                            y chicharrón el profe de Huetamo estará disponible para ofrecerle las mejores delicias culinarias de la región tierra caliente.</span>
                                    </p> </div>
                                <br>
                                <br>

                                <p style="float: right;  font-size: .8em;" >Developed by Jonathan Orozco Cervantes & Salvador Millán Aguilar</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="text-light bg-dark footer text-faded text-center py-5">
            <div class="container">       
                <div class="text-center center-block">      
                    <a href="https://www.facebook.com/restaurantelostruenos/"><i id="social-fb" class="fa fa-facebook fa-2x social"></i></a> &nbsp;
                    <a href="tel:+523121944293" title="Comuniquese al: 312-194-4293"><i id="social-tw" class="fa fa-whatsapp fa-2x social"></i></a>	            
                </div>          
            </div>
        </footer>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/bs-init.js"></script>
        <script src="assets/js/current-day.js"></script>
        <script src="assets/js/HMY-Responsive-nav-menu-V1.js"></script>
    </body>

</html>