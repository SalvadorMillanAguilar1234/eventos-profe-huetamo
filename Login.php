<!DOCTYPE html>
<?php
$exEmail = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/";
$exPassword = "/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{6,16}$/";
$emailV = $exEmail . ".test(email) && email";
$passwordV = $exPassword . ".test(password) && password";
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
                        <li class="nav-item" role="presentation"><a class="nav-link" href="Eventos.php">Eventos</a></li>
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
                        <form class="form-signin">

                            <input class="form-control" type="email" v-model="email" id="inputEmail" required="" placeholder="Correo" autofocus="">
                            <br>
                            <p v-if='<?php echo $emailV; ?>' class="alert alert-success">Correcto</p>
                            <p v-else class="alert alert-danger">La estructura del email es incorrecta.</p>      
                            <input class="form-control" type="password" v-model="password" id="inputPassword" required="" placeholder="Contraseña">
                            <br>
                            <p v-if='<?php echo $passwordV; ?>' class="alert alert-success">Correcto</p>
                            <p v-else class="alert alert-danger">Debe incluir almenos una letra mayuscura y min&#250;scula, un n&#250;mero, tiene que ser mayor a 6 y menor a 16</p>  

                            <div
                                class="checkbox">
                                <!--  <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Remember me</label></div> -->
                            </div>   
                            <br>
                            <button class="btn btn-primary btn-block btn-lg btn-signin" type="submit">Ingresar</button></form><a class="forgot-password" href="#">¿Olvidaste la contraseña?</a></div>
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
        <script src="assets/js/validaciones.js" type="text/javascript"></script>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/bs-init.js"></script>
        <script src="assets/js/current-day.js"></script>
        <script src="assets/js/HMY-Responsive-nav-menu-V1.js"></script>
    </body>

</html>