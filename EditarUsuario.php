<!DOCTYPE html>
<?php
require_once 'Entidad.php';
require_once 'Modelo.php';
require_once 'Controlador.php';

//variables para validaciÛn
$ex = "/^[A-Z\u00A0-\uD7FF]([a-zA-Z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF\s])*$/";
$exEmail = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/";
$exPassword = "/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{6,16}$/";
$nombreV = $ex . ".test(nombre)&& nombre && nombre.length";
$apellidoV = $ex . ".test(apellido)&& apellido";
$celularV = "/^[0-9]*$/.test(celular) && celular && celular.length == 10";
$emailV = $exEmail . ".test(email) && email";
$password1V = $exPassword . ".test(password1) && password1";
$password2V = $exPassword . ".test(password2) && password2";

error_reporting(E_ALL ^ E_NOTICE);
session_start();

//Extraer el nombre completo del usuario
$nombreCompleto="";
if ($_SESSION['idUsuarios'] == true) {
foreach ($modelo->ListarUsuario($_SESSION['idUsuarios']) as $row):
    $nombreCompleto= $row->__GET('nombres')." ".$row->__GET('apellidos');
endforeach;
}else{
    //enviar a login
    header('Location: Login.php');
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
        <div>
            <div class="modal left fade in" role="dialog" tabindex="-1" id="modalOpciones" aria-labelledby="modalChatLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="col-12 col-lg-12 col-xl-12 padMar text-right">
                                <h5 class="text-primary padMar margenesCajas pointer" data-dismiss="modal"><i class="icon ion-android-arrow-dropleft"></i>&nbsp; Ocultar</h5>
                            </div><button type="button" class="close d-none" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">√ó</span></button></div>

                        <div class="modal-body">

                            <h4>Opciones</h4>

                            <div class="btn-group-vertical mx-auto d-block" role="group"><button class="btn btn-light text-left" type="button"><i class="fa fa-pencil"></i>&nbsp;Editar usuario</button>
                                <form method="post" action="?operaciones=cerrarSesion">
                                        <button class="btn btn-light text-left" type="submit" style="width: 100%"><i class="fa fa-power-off"></i>&nbsp;Cerrar sesi√≥n</button>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><button class="btn btn-primary pull-right" data-bs-hover-animate="pulse" data-toggle="modal" data-target="#modalOpciones" type="button"><?php echo $nombreCompleto; ?></button></div>


            <div id="validaciones">
        <section class="page-section">
            <div class="container">              
                <div class="bg-faded p-5 rounded col-xl-6 mx-auto">  
                      <?php foreach ($modelo->ListarUsuario($_SESSION['idUsuarios']) as $row): 
                          
                          ?>
                    <!-- MÈtodo para la asignacion de datos, a los input-->
                    <!-- Nota: se pudo asignar los datos directamente a las variable en la interpolaciÛn no era opciÛn,
                               esto hace que los datos siempre tengan el valor asignado, sin permitir cambios por el usuario.
                               por eso se hizo un llamado autom·tico a la funcion la primera vez que enpre al sito, la variable interruptor
                               fue ocultar-->
                    <div v-if='!ocultar'>
                    {{enviar('<?php echo $row->__GET('nombres'); ?>','<?php echo $row->__GET('apellidos'); ?>',
                             '<?php echo $row->__GET('celular'); ?>','<?php echo $row->__GET('correo'); ?>',
                             '<?php echo $row->__GET('contrasena'); ?>')}}
                     <!-- al asignar el valor de 1 a el dato ocultar, ya nunca m·s ara la acci¥n de reasignar los valores de la BD-->
                    {{ocultar='1'}}
                    </div>
                    <form class="form-signin" id="editarUsuario" method="post"  class="form-horizontal" action="?operaciones=editarUsuario">  
                  
                        <input class="form-control" type="hidden" name="inputId" id="inputId" value="<?php echo $row->__GET('idUsuarios'); ?>" required=""  autofocus="">
                        <input class="form-control" type="text" v-model="nombre" name="inputNombres" id="inputNombres" required=""  placeholder="Nombres" autofocus="">
                            <br>
                            <p v-if='<?php echo $nombreV; ?>' class="alert alert-success">Correcto</p>
                            <p v-else class="alert alert-danger">Solo se permiten  letras, tildes, espacios y la primer letra tiene que ser may&#250;scula.</p>

                            <input class="form-control" type="text" v-model="apellido" name="inputApellidos" id="inputApellidos" required="" placeholder="Apellidos" autofocus="">
                            <br>
                            <p v-if='<?php echo $apellidoV; ?>' class="alert alert-success">Correcto</p>
                            <p v-else class="alert alert-danger">Solo se permiten  letras, tildes, espacios y la primer letra tiene que ser may&#250;scula.</p>
                            <input class="form-control" type="tel" v-model="celular" name="inputCelular" id="inputCelular" required=""  placeholder="Celular">
                            <br>
                            <p v-if='<?php echo $celularV; ?>' class="alert alert-success">Correcto</p>
                            <p v-else class="alert alert-danger">El tel&#233;fono debe tener 10 n&#250;meros. Ejemplo: 4531447879</p>
                            <input class="form-control" type="email" v-model="email" name="inputCorreo" id="inputCorreo" required=""  placeholder="Correo" autofocus="">
                            <br>
                            <p v-if='<?php echo $emailV; ?>' class="alert alert-success">Correcto</p>
                            <p v-else class="alert alert-danger">La estructura del email es incorrecta.</p>      
                            <input class="form-control" type="password" v-model="password1" name="inputContrasena1" id="inputContrasena1" required=""  placeholder="Contrase√±a">
                            <br> 
                            <p v-if='<?php echo $password1V; ?>' class="alert alert-success">Correcto</p>
                            <p v-else class="alert alert-danger">Debe incluir almenos una letra mayuscura y min&#250;scula, un n&#250;mero, tiene que ser mayor a 6 y menor a 16</p>  
                            <input class="form-control" type="password" v-model="password2" name="inputContrasena2" id="inputContrasena2" required=""  placeholder="Repetir contrase√±a">
                            <br>
                            <p v-if='<?php echo $password2V; ?>' class="alert alert-success">Correcto</p>
                            <p v-else class="alert alert-danger">Debe incluir almenos una letra mayuscura y min&#250;scula, un n&#250;mero, tiene que ser mayor a 6 y menor a 16</p>  

                            <p v-show='password1 != password2' class="alert alert-danger">Las contrase&ntilde;as no coinciden</p>
                        <div
                            class="checkbox">
                            <!--  <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Remember me</label></div> --->
                        </div>    
                        <br>
                        <button v-if="<?php echo $nombreV; ?> && <?php echo $apellidoV; ?>&&<?php echo $celularV; ?>&&<?php echo $emailV; ?>
                                    && <?php echo $password1V; ?>&&<?php echo $password2V; ?>&& password1 == password2" class="btn btn-primary btn-block btn-lg btn-signin" type="submit">Editar</button>
                                    <button v-else class="btn btn-primary btn-block btn-lg btn-signin" type="submit" disabled="true">Editar</button>
                    </form>
                 <?php endforeach; ?>
                </div>
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



        <script src="assets/js/validaciones_editar_user.js" type="text/javascript"></script>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/bs-init.js"></script>
        <script src="assets/js/current-day.js"></script>
        <script src="assets/js/HMY-Responsive-nav-menu-V1.js"></script>
    </body>

</html>