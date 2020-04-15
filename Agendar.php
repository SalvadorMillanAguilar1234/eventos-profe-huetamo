<!DOCTYPE html>
<?php
//Archivos del MVC
require_once 'Entidad.php';
require_once 'Modelo.php';
require_once 'Controlador.php';

error_reporting(E_ALL ^ E_NOTICE);
session_start();

$modal = "modalOpciones";
if ($_SESSION['idUsuarios'] == true) {
    $modal = "modalAgendarE";
    //Extraer el nombre completo del usuario
    $nombreCompleto = "";
    foreach ($modelo->ListarUsuario($_SESSION['idUsuarios']) as $row):
        $nombreCompleto = $row->__GET('nombres') . " " . $row->__GET('apellidos');
    endforeach;
}else {
    $_SESSION['idUsuarios'] = 0;
}



//Inicio Variables de validación de campos
$ex = "/^([0-9a-zA-Z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF\-\_,#.:  \s])*$/";
$lugV = $ex . ".test(direccionE)&& direccionE && direccionE.length >= 10";
$exRH = "/^(?:0?[1-9]|1[0-9]|2[0-3]):[0-5][0-9]\s?(?:[aApP](\.?)[mM]\1)?$/.test(horaE)";
$desV = $ex . ".test(descripcionE)&& descripcionE && descripcionE.length <= 240";
//Fin Variables de validación de campos
?>
<html>

    <head>
        <meta charset=”utf8? />
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
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    </head>

    <body style="background: linear-gradient(rgba(200, 200, 200, 0.65), rgba(200, 200, 200, 0.65));" >
        <nav class="navbar navbar-light navbar-expand-lg bg-dark py-lg-4" id="mainNav">
            <!--<img src="assets/img/Carniceria.jpg" width="5%"/>-->
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
        <?php if ($_SESSION['idUsuarios'] == true) { ?>
            <!-- Si está registrdo -->
            <div>
                <div class="modal left fade in" role="dialog" tabindex="-1" id="modalOpcionesEU" aria-labelledby="modalChatLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="col-12 col-lg-12 col-xl-12 padMar text-right">
                                    <h5 class="text-primary padMar margenesCajas pointer" data-dismiss="modal"><i class="icon ion-android-arrow-dropleft"></i>&nbsp; Ocultar</h5>
                                </div><button type="button" class="close d-none" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Ãƒâ€”</span></button></div>

                            <div class="modal-body">

                                <h4>Opciones</h4>

                                <div class="btn-group-vertical mx-auto d-block" role="group"><button  class="btn btn-light text-left" type="button" onclick=" location.href = 'EditarUsuario.php'"><i class="fa fa-pencil"></i>&nbsp;Editar usuario</button>
                                    <form method="post" action="?operaciones=cerrarSesion">
                                        <button class="btn btn-light text-left" type="submit" style="width: 100%"><i class="fa fa-power-off"></i>&nbsp;Cerrar sesiÃ³n</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><button class="btn btn-primary pull-right" data-bs-hover-animate="pulse" data-toggle="modal" data-target="#modalOpcionesEU" type="button"><?php echo $nombreCompleto; ?></button></div>
        <?php } else { ?>
            <!-- Si no estÃ¡ registrdo -->
            <div>
                <div class="modal left fade in" role="dialog" tabindex="-1" id="modalOpciones" aria-labelledby="modalChatLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="col-12 col-lg-12 col-xl-12 padMar text-right">
                                    <h5 class="text-primary padMar margenesCajas pointer" data-dismiss="modal"><i class="icon ion-android-arrow-dropleft"></i>&nbsp; Ocultar</h5>
                                </div><button type="button" class="close d-none" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Ãƒâ€”</span></button></div>
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



        <div class="bootstrap_calendar" id="calendario">
            <div class="container py-5">

                <!-- For Demo Purpose -->
                <header class="text-center text-white mb-5">
                    <h1 class="display-4">Agenda tu evento</h1>

                </header>


                <!-- Calendar -->
                <div  class="calendar shadow bg-white p-5">

                    <a class="fa fa-arrow-left" style="float: left"  @click="disminuirMes()" ></a> 
                    <div class="row" style="float: right">

                        <a class="fa fa-arrow-right"  @click="aumentarMes()" ></a> 
                    </div>
                    <div class="d-flex align-items-center col-12">
                        <i class="fa fa-calendar fa-3x mr-3"></i>
                        <h2 class="month font-weight-bold mb-0 text-uppercase">{{name}} {{ano}}</h2>
                    </div>
                    <br>
                    <ol class="day-names list-unstyled">
                        <li class="font-weight-bold text-uppercase">Lun</li>
                        <li class="font-weight-bold text-uppercase">Mar</li>
                        <li class="font-weight-bold text-uppercase">Mie</li>
                        <li class="font-weight-bold text-uppercase">Jue</li>
                        <li class="font-weight-bold text-uppercase">Vie</li>
                        <li class="font-weight-bold text-uppercase">Sab</li>
                        <li class="font-weight-bold text-uppercase">Dom</li>
                    </ol>

                    <!-- Tipos de notificaciones 
                      <div  class='event all-day end  bg-info'>Pendientes</div>
                    <div class='event all-day end bg-success'>Apartado</div>
                    -->
                    <ol  class="days list-unstyled">
                        <li v-for="dia of p-1">
                            <div class='date'>&nbsp;</div>
                        </li>
                        <span v-for="dia of dias">
                            
                            <?php
                            //Extracción de datos de evento
                            foreach ($modelo->ListarEventos() as $row):
                                $f = explode("-", $row->__GET('fecha'));
                                $es = $row->__GET('estado');
                                if ($es == 1) {
                                    $es = true;
                                } else {
                                    $es == false;
                                }
                                ?>
                                <li v-if="dia==<?php echo $f[2]; ?> && mes==<?php echo $f[1]; ?> && ano==<?php echo $f[0]; ?>">
                                    <!-- Creare una nueva variable que almacene el dato que si cumple la condición -->

                                    <div  class='date' >
                                        {{dia}}
                                        <div class="row col-12">
                                            <div class="col-1"></div>
                                            <div class="col-3">
                                                <a v-if="<?php echo $es; ?>&&<?php echo $_SESSION['idUsuarios']; ?> == 1" href='' data-bs-hover-animate='pulse'
                                                   aria-hidden="true" data-toggle='modal' data-target='#modalEliminarE' @click="abrirMEE(<?php echo $row->__GET('idEventos'); ?>)"
                                                   > <i class="fa fa-minus-square fa-lg fa-2x" aria-hidden="true" style="color: red"></i></a>
                                                <a v-if="!<?php echo $es; ?> && <?php echo $_SESSION['idUsuarios']; ?> == <?php echo $row->__GET('idUsuario'); ?>" href='' data-bs-hover-animate='pulse'
                                                   aria-hidden="true" data-toggle='modal' data-target='#modalEditarE' @click="abrirMEditE('<?php echo $row->__GET('direccion'); ?>','<?php echo $row->__GET('hora'); ?>','<?php echo str_replace("\r\n", "<br>", $row->__GET('descripcion')); ?>','<?php echo $row->__GET('idEventos'); ?>',dia)"
                                                   > <i class="fa fa-pencil-square fa-lg fa-2x" aria-hidden="true" style="color: blue"></i></a>
                                                <!-- Eliminar evento--></div>
                                            <div class="col-3">
                                                <a v-if="!<?php echo $es; ?>&& <?php echo $_SESSION['idUsuarios']; ?> == <?php echo $row->__GET('idUsuario'); ?>" href='' data-bs-hover-animate='pulse'
                                                   aria-hidden="true" data-toggle='modal' data-target='#modalEliminarE' @click="abrirMEE(<?php echo $row->__GET('idEventos'); ?>)"
                                                   > <i class="fa fa-minus-square fa-lg fa-2x" aria-hidden="true" style="color: red"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Editar evento-->

                                    <div v-if=" <?php echo $es; ?>" class='event all-day end bg-success'>Apartado</div>
                                    <div v-else class='event all-day end  bg-info'>Por confirmar</div>
                                </li>

                                <span v-else>
                                    <?php
                                endforeach;
                                ?>
                                
                                <a v-if="(dia>diaA+2 || mes > mesA )|| ano>anA" href='' data-bs-hover-animate='pulse' 
                                   data-toggle='modal' data-target='#<?php echo $modal; ?>' @click="abrirModal(dia)">
                                    <li>
                                        <div  class='date'>
                                            {{dia}}
                                        </div>
                                    </li>
                                </a>
                                    <li v-else>
                                    <div  class='date' >
                                        {{dia}}
                                    </div>
                                </li>
                            </span>
                        </span>

                    </ol>
                </div>
            </div>
            <!-- Modal de registrar Evento-->
            <div class="modal left fade in" role="dialog" tabindex="-1" id="modalEditarE" aria-labelledby="modalChatLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5  style="float: left">Editar evento</h5>
                            <div class="col-9 col-lg-9 col-xl-9 padMar text-right">
                                <h5 style="float: right" class="text-primary padMar margenesCajas pointer" data-dismiss="modal"><i class="icon ion-android-arrow-dropleft"></i>&nbsp; Ocultar</h5>
                            </div><button type="button" class="close d-none" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Ã—</span></button></div>
                        <div class="modal-body">
                            <form id="registrarEvento" method="post" action="?operaciones=editarE">
                                <div class="form-group">
                                    <label>Direcci&oacute;n del evento:</label>
                                    <input type="text" class="form-control" id="txtDireccion" name="txtDireccion" placeholder="Zaragoza sur N&#176; 033" 
                                           v-model='direccionE' required>
                                    <br>
                                    <!--Validaciones de campos --->
                                    <p v-if='<?php echo $lugV; ?>' class="alert alert-success">Correcto</p>
                                    <p v-else class="alert alert-danger">Solo se permiten letras, n&uacutemero, guiones y comas</p>
                                </div>
                                <div class="form-group">
                                    <label>Hora del evento:</label>
                                    <input  type="time" class="form-control" id="txtHora" name="txtHora" 
                                            v-model='horaE' required>
                                    <br>
                                    <!--Validaciones de campos --->
                                    <p v-if="<?php echo $exRH; ?>|| horaE" class="alert alert-success">Correcto</p>
                                    <p v-else class="alert alert-danger">Estructura invalida</p>
                                </div>
                                <div  style="width: 100%">
                                    <label for="descripcionTarea">Descripci&#243;n del evento:</label>
                                    <textarea type="text" class="form-control" id="txtDescripcion"  name="txtDescripcion"  
                                              placeholder="Para el evento necesitar&#233; los soguientes productos: ..." 
                                              v-model="descripcionE" required></textarea>
                                    <br>
                                    <!--Validaciones de campos --->
                                    <p v-if='<?php echo $desV; ?>' class="alert alert-success">Correcto</p>
                                    <p v-else class="alert alert-danger">Solo se permiten letras, n&uacutemero, guiones y comas. Adem&aacute;s,
                                        no deve superar los 240 caracteres.</p>
                                </div>
                                <!-- Fecha que selecciona en el calendario -->
                                <input type="hidden"  id="txtIdU" name="txtIdU" value="<?php echo $_SESSION['idUsuarios'] ?>">
                                <input type="hidden"  id="txtFechaE" name="txtFechaE">
                                <input type="hidden" name="txtIdEE" id="txtIdEE">
                                <div v-if="<?php echo $lugV; ?> && (<?php echo $exRH; ?>|| horaE) && <?php echo $desV; ?>" class="modal-footer" style="float: right">
                                    <button type="button" class="btn btn-danger"  data-dismiss="modal" aria-label="Close">Cancelar</button>
                                    <input type="submit" class="btn btn-primary mdi mdi-content-save"  value="Editar"> 
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="page-section clearfix">
            <div class="container">
                <div class="intro"></div>
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

        <!-- Modal de registrar Evento-->
        <div class="modal left fade in" role="dialog" tabindex="-1" id="modalAgendarE" aria-labelledby="modalChatLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5  style="float: left">&nbsp; Evento</h5>
                        <div class="col-10 col-lg-10 col-xl-10 padMar text-right">
                            <h5 style="float: right" class="text-primary padMar margenesCajas pointer" data-dismiss="modal"><i class="icon ion-android-arrow-dropleft"></i>&nbsp; Ocultar</h5>
                        </div><button type="button" class="close d-none" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Ã—</span></button></div>
                    <div class="modal-body">
                        <form id="registrarEvento" method="post" action="?operaciones=registrarE">
                            <div class="form-group">
                                <label>Direcci&oacute;n del evento:</label>
                                <input type="text" class="form-control" id="txtDireccion" name="txtDireccion" placeholder="Zaragoza sur N&#176; 033" 
                                       v-model='direccionE' required>
                                <br>
                                <!--Validaciones de campos --->
                                <p v-if='<?php echo $lugV; ?>' class="alert alert-success">Correcto</p>
                                <p v-else class="alert alert-danger">Solo se permiten letras, n&uacutemero, guiones y comas</p>
                            </div>
                            <div class="form-group">
                                <label>Hora del evento:</label>
                                <input  type="time" class="form-control" id="txtHora" name="txtHora" 
                                        v-model='horaE' required>
                                <br>
                                <!--Validaciones de campos --->
                                <p v-if="<?php echo $exRH; ?>" class="alert alert-success">Correcto</p>
                                <p v-else class="alert alert-danger">Estructura invalida</p>
                            </div>
                            <div  style="width: 100%">
                                <label for="descripcionTarea">Descripci&#243;n del evento:</label>
                                <textarea type="text" class="form-control" id="txtDescripcion"  name="txtDescripcion"  
                                          placeholder="Para el evento necesitar&#233; los soguientes productos: ..." 
                                          v-model="descripcionE" required></textarea>
                                <br>
                                <!--Validaciones de campos --->
                                <p v-if='<?php echo $desV; ?>' class="alert alert-success">Correcto</p>
                                <p v-else class="alert alert-danger">Solo se permiten letras, n&uacutemero, guiones y comas. Adem&aacute;s,
                                    no deve superar los 240 caracteres.</p>
                            </div>
                            <!-- Fecha que selecciona en el calendario -->
                            <input type="hidden"  id="txtFecha" name="txtFecha">
                            <input type="hidden"  id="txtIdU" name="txtIdU" value="<?php echo $_SESSION['idUsuarios'] ?>">

                            <div v-if="<?php echo $lugV; ?> && <?php echo $exRH; ?> && <?php echo $desV; ?>" class="modal-footer" style="float: right">
                                <button type="button" class="btn btn-danger"  data-dismiss="modal" aria-label="Close">Cancelar</button>
                                <input type="submit" class="btn btn-primary mdi mdi-content-save"  value="Registrar"> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <!-- Modal de Eliminar Evento-->
        <div class="modal left fade in" role="dialog" tabindex="-1" id="modalEliminarE" aria-labelledby="modalChatLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5  style="float: left"> Eliminar evento</h5>
                        <div class="col-9 col-lg-9 col-xl-9 padMar text-right">
                            <h5 style="float: right" class="text-primary padMar margenesCajas pointer" data-dismiss="modal"><i class="icon ion-android-arrow-dropleft"></i>&nbsp; Ocultar</h5>
                        </div><button type="button" class="close d-none" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Ã—</span></button>

                    </div>
                    <div class="modal-body">
                        <form id="eliminarEvento" method="post" action="?operaciones=eliminarE">
                            <center><label>&iquest;Seguro que desea eliminar el evento?</label></center>
                            <input type="hidden" name="txtIdE" id="txtIdE">
                            <div  class="modal-footer" style="float: right">
                                <button type="button" class="btn btn-primary"  data-dismiss="modal" aria-label="Close">Cancelar</button>
                                <button  class="btn btn-danger "  > Eliminar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="assets/js/funciones.js" type="text/javascript"></script>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/bs-init.js"></script>
        <script src="assets/js/current-day.js"></script>
        <script src="assets/js/HMY-Responsive-nav-menu-V1.js"></script>
    </body>

</html>