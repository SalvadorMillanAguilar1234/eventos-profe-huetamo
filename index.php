<!DOCTYPE html>
<?php
//Archivos del MVC
require_once 'Entidad.php';
require_once 'Modelo.php';
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
//Inicio Variables de validación de campos
$exText = "/^([0-9a-zA-Z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF\-\_,#.:  ? \s])*$/";
$tipV = $exText . ".test(tipoP)&& tipoP";
$fraV = $exText . ".test(fraceP)&& fraceP";
$nomV = $exText . ".test(nambreP)&& nambreP";
$imgV = "/\.(jpg|png|gif)$/i.test(imagenP)&& imagenP";
$imgEV = "/\.(jpg|png|gif)$/i.test(imagenEP) ";
$desV = $exText . ".test(descripcionP)&& descripcionP && descripcionP.length <= 240";
//Fin Variables de validación de campos
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
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    </head>

    <body style="background: linear-gradient(rgba(200, 200, 200, .65), rgba(200, 200, 200, 0.65));" >
        <div id="productos"> <nav class="navbar navbar-light navbar-expand-lg bg-dark py-lg-4" id="mainNav">
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
                <?php if($_SESSION['idUsuarios']==1){?>
                <button class="btn btn-primary pull-right fa fa-plus"
                         style="float: left"
                         data-bs-hover-animate="pulse" data-toggle="modal" 
                         data-target="#modalRegistrarP" type="button"><i ></i> Producto</button>
                <?php } ?>
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

            <section class="page-section">
                <div class="container">
                    <div class="product-item">

                        <div class="bg-faded p-5 rounded">
                            <center><h2 class="section-heading mb-0"><span class="section-heading-upper">Super carnitas y chicharrÃ³n el profe de Huetamo</span>
                                </h2></center> <br><h4 align="justify"> <span class="section-heading-lower" >Ofrecemos el mejor servicio de carnitas para cualquier tipo de evento. Y estamos disponibles en:
                                    Morelia, CoalcomÃ¡n, Churumuco, Huetamo y Comburindio.
                                </span></h4>
                        </div>
                    </div>
                </div>
            </section>

            <section class="page-section">
                <div class="container" @click="show = !show">
                    <div class="product-item">
                        <center>
                            <div class="bg-faded p-5 rounded">
                                <a type="submit">
                                    <h2 class="section-heading mb-0"><span class="section-heading-upper">Productos en tienda f&iacute;sica</span>
                                    </h2>
                                </a>
                            </div></center>

                    </div>
                </div>
            </section>
            <div v-show="show"><!-- Productos para tienda física -->
                <?php
                $alternador_DL = true;
                //Extracción de datos del producto
                foreach ($modelo->ListarProductos("0") as $row):
                    ?>
                    <section class="page-section">
                        <div class="container">
                            <div class="product-item">
                                <?php if($_SESSION['idUsuarios']==1){?>
                                <span style="float: right">
                                    
                                       <?php
                                       //creación de variable para extraer solo el nombre del archivo
                                       $valores = explode("\ ", $row->__GET('imagenP'));
                                       $R= $valores[1];
                                       ?>
                                    <a v-if="true" href='' data-bs-hover-animate='pulse'
                                       aria-hidden="true" data-toggle='modal' data-target='#modalEditarP' @click="abrirMEditP('<?php echo $row->__GET('tipoP');?>','<?php echo $row->__GET('frase');?>','<?php echo $row->__GET('nombreP');?>','<?php echo $valores[1];?>','<?php echo str_replace("\r\n", "<br>",$row->__GET('descripcionP'));?>','<?php echo $row->__GET('idP');?>')"
                                       > <i class="fa fa-pencil-square fa-lg fa-2x" aria-hidden="true" style="color: blue"></i></a>
                                    <a v-show="true" href='' data-bs-hover-animate='pulse'
                                       aria-hidden="true" data-toggle='modal' data-target='#modalEliminarP' @click="abrirMEP(<?php echo $row->__GET('idP'); ?>,'<?php echo $R; ?>')"
                                       > <i class="fa fa-minus-square fa-lg fa-2x" aria-hidden="true" style="color: red"></i></a></span>
                                       <?php }?>
                                <br><br>
                                <div class="d-flex product-item-title">
                                    <!-- mr cambia la dirección del mensaje a la derecha-->
                                    <?php
                                    if ($alternador_DL) {
                                        $alternador_DL = false;
                                        ?>
                                        <div class="d-flex mr-auto bg-faded p-5 rounded">
                                            <?php
                                        } else {
                                            $alternador_DL = true;
                                            ?>
                                            <div class="d-flex ml-auto bg-faded p-5 rounded">
                                            <?php }
                                            ?>

                                            <h2 class="section-heading mb-0"><span class="section-heading-upper"><?php echo $row->__GET('frase'); ?></span><span class="section-heading-lower"><?php echo $row->__GET('nombreP'); ?></span></h2>
                                        </div>
                                    </div><img class="img-fluid d-flex mx-auto product-item-img mb-3 mb-lg-0 rounded" src="<?php echo $row->__GET('imagenP'); ?>">
                                    <div class="bg-faded p-5 rounded">
                                        <p class="mb-0"><?php echo $row->__GET('descripcionP'); ?></p>
                                    </div>
                                </div>
                            </div>
                    </section>
                <?php endforeach; ?>
            </div>

            <section class="page-section">
                <div class="container" @click="show2 = !show2">
                    <div class="product-item">

                        <div class="bg-faded p-5 rounded">
                            <center><a type="submit"><h2 class="section-heading mb-0"><span class="section-heading-upper">Productos para eventos</span>
                                    </h2></a></center>
                        </div>
                    </div>
                </div>
            </section>
            <div v-show="show2"><!-- Productos para tienda física -->
                <?php
                $alternador_DL = true;
                //Extracción de datos del producto
                foreach ($modelo->ListarProductos("1") as $row):
                    ?>
                    <section class="page-section">
                        <div class="container">
                            <div class="product-item">
                                <?php if($_SESSION['idUsuarios']==1){?>
                                <span style="float: right">
                                    <?php
                                       //creación de variable para extraer solo el nombre del archivo
                                       $valores = explode("\ ", $row->__GET('imagenP'));
                                       $R= $valores[1];
                                       ?>
                                    <a v-if="true" href='' data-bs-hover-animate='pulse'
                                       aria-hidden="true" data-toggle='modal' data-target='#modalEditarP' @click="abrirMEditP('<?php echo $row->__GET('tipoP');?>','<?php echo $row->__GET('frase');?>','<?php echo $row->__GET('nombreP');?>','<?php echo $valores[1];?>','<?php echo str_replace("\r\n", "<br>",$row->__GET('descripcionP'));?>','<?php echo $row->__GET('idP');?>')"
                                       > <i class="fa fa-pencil-square fa-lg fa-2x" aria-hidden="true" style="color: blue"></i></a>
                                    <a v-show="true" href='' data-bs-hover-animate='pulse'
                                       aria-hidden="true" data-toggle='modal' data-target='#modalEliminarP' @click="abrirMEP(<?php echo $row->__GET('idP'); ?>,'<?php echo $R; ?>')"
                                       > <i class="fa fa-minus-square fa-lg fa-2x" aria-hidden="true" style="color: red"></i></a></span>
                                <?php }?><br><br>
                                <div class="d-flex product-item-title">
                                    <!-- mr cambia la dirección del mensaje a la derecha-->
                                    <?php
                                    if ($alternador_DL) {
                                        $alternador_DL = false;
                                        ?>
                                        <div class="d-flex mr-auto bg-faded p-5 rounded">
                                            <?php
                                        } else {
                                            $alternador_DL = true;
                                            ?>
                                            <div class="d-flex ml-auto bg-faded p-5 rounded">
                                            <?php }
                                            ?>
                                            <h2 class="section-heading mb-0"><span class="section-heading-upper"><?php echo $row->__GET('frase'); ?></span><span class="section-heading-lower"><?php echo $row->__GET('nombreP'); ?></span></h2>
                                        </div>
                                    </div><img class="img-fluid d-flex mx-auto product-item-img mb-3 mb-lg-0 rounded" src="<?php echo $row->__GET('imagenP'); ?>">
                                    <div class="bg-faded p-5 rounded">
                                        <p class="mb-0"><?php echo nl2br($row->__GET('descripcionP')); ?></p>
                                    </div>
                                </div>
                            </div>
                    </section>
                <?php endforeach; ?>
            </div>


            <footer class="text-light bg-dark footer text-faded text-center py-5">
                <div class="container">       
                    <div class="text-center center-block">      
                        <a href="https://www.facebook.com/restaurantelostruenos/"><i id="social-fb" class="fa fa-facebook fa-2x social"></i></a> &nbsp;
                        <a href="tel:+523121944293" title="Comuniquese al: 312-194-4293"><i id="social-tw" class="fa fa-whatsapp fa-2x social"></i></a>	            
                    </div>          
                </div>
            </footer>

            <!-- Modal de registrar Evento-->
            <div class="modal left fade in" role="dialog" tabindex="-1" id="modalRegistrarP" aria-labelledby="modalChatLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5  style="float: left">Producto</h5>
                            <div class="col-9 col-lg-9 col-xl-9 padMar text-right">
                                <h5 style="float: right" class="text-primary padMar margenesCajas pointer" data-dismiss="modal"><i class="icon ion-android-arrow-dropleft"></i>&nbsp; Ocultar</h5>
                            </div><button type="button" class="close d-none" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Ã—</span></button></div>
                        <div class="modal-body">
                            <form id="registrarEvento" method="post" action="?operaciones=registrarP" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Tipo de producto:</label>
                                    <div class="row col-mx-15">
                                        <div class="col-6">
                                            <input type="radio"  id="txtTipoP" name="txtTipoP" v-model='tipoP' value="0" > 
                                            Para tienda f&iacute;sica 
                                        </div>
                                        <div class="col-6">
                                            <input type="radio"  id="txtTipoP" name="txtTipoP" v-model='tipoP' value="1"> Para eventos
                                        </div>
                                    </div><br>
                                    <!--Validaciones de campos --->
                                    <p v-if='<?php echo $tipV; ?>' class="alert alert-success">Correcto</p>
                                    <p v-else class="alert alert-danger">Solo se permiten letras, n&uacute;mero, guiones, signos de interrogaci&oacute;n y comas</p>
                                </div>
                                <div class="form-group">
                                    <label>Frace para el producto:</label>
                                    <input type="text" class="form-control" id="txtFraceP" name="txtFraceP" placeholder="Las mejores, las inigualables, Los m&uacute;s crujientes de la regi&oacute;n" 
                                           v-model='fraceP' required>
                                    <br>
                                    <!--Validaciones de campos --->
                                    <p v-if='<?php echo $fraV; ?>' class="alert alert-success">Correcto</p>
                                    <p v-else class="alert alert-danger">Solo se permiten letras, n&uacute;mero, guiones, signos de interrogaci&oacute;n y comas</p>
                                </div>
                                <div class="form-group">
                                    <label>Nomrbe para el producto:</label>
                                    <input type="text" class="form-control" id="txtNombreP" name="txtNombreP" placeholder="Chorizo, Chicharr&oacute;n, etc." 
                                           v-model='nambreP' required>
                                    <br>
                                    <!--Validaciones de campos --->
                                    <p v-if='<?php echo $nomV; ?>' class="alert alert-success">Correcto</p>
                                    <p v-else class="alert alert-danger">Solo se permiten letras, n&uacute;mero, guiones, signos de interrogaci&oacute;n y comas</p>
                                </div>
                                <div class="form-group">
                                    <label>Foto para el producto:</label>
                                    <input type="file" class="form-control" id="txtImagenP" name="txtImagenP" 
                                           v-model='imagenP' required>
                                    <br>
                                    <!--Validaciones de campos --->
                                    <p v-if='<?php echo $imgV; ?>' class="alert alert-success">Correcto</p>
                                    <p v-else class="alert alert-danger">Solo se aceptan imagenes .jpg, .png y gif</p>
                                </div>
                                <div class="form-group">
                                    <label>Descripci&oacute;n para el producto:</label>
                                    <textarea type="text" class="form-control" id="txtDescripcionP" name="txtDescripcionP" placeholder="En super carnitas el profe de huetamo le ofrecemos las mejores carnitas. El precio por kg es de $100 pesos." 
                                              v-model='descripcionP' required></textarea>
                                    <br>
                                    <!--Validaciones de campos --->
                                    <p v-if='<?php echo $desV; ?>' class="alert alert-success">Correcto</p>
                                    <p v-else class="alert alert-danger">Solo se permiten letras, n&uacute;mero, guiones, signos de interrogaci&oacute;n y comas</p>
                                </div>
                                <div v-if="<?php echo $fraV . "&&" . $nomV . "&&" . $imgV . "&&" . $desV . "&&" . $tipV; ?>" class="modal-footer" style="float: right">
                                    <button type="button" class="btn btn-danger"  data-dismiss="modal" aria-label="Close">Cancelar</button>
                                    <input type="submit" class="btn btn-primary mdi mdi-content-save"  value="Registrar"> 
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Modal de registrar Evento-->
            <div class="modal left fade in" role="dialog" tabindex="-1" id="modalEditarP" aria-labelledby="modalChatLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5  style="float: left">Editar producto</h5>
                            <div class="col-9 col-lg-9 col-xl-9 padMar text-right">
                                <h5 style="float: right" class="text-primary padMar margenesCajas pointer" data-dismiss="modal"><i class="icon ion-android-arrow-dropleft"></i>&nbsp; Ocultar</h5>
                            </div><button type="button" class="close d-none" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Ã—</span></button></div>
                        <div class="modal-body">
                            <form id="registrarEvento" method="post" action="?operaciones=editarP" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Tipo de producto:</label>
                                    <div class="row col-mx-15">
                                        <div class="col-6">
                                            <input type="radio"  id="txtTipoP" name="txtTipoP" v-model='tipoP' value="0" > 
                                            Para tienda f&iacute;sica 
                                        </div>
                                        <div class="col-6">
                                            <input type="radio"  id="txtTipoP" name="txtTipoP" v-model='tipoP' value="1"> Para eventos
                                        </div>
                                    </div><br>
                                    <!--Validaciones de campos --->
                                    <p v-if='<?php echo $tipV; ?>' class="alert alert-success">Correcto</p>
                                    <p v-else class="alert alert-danger">Solo se permiten letras, n&uacute;mero, guiones, signos de interrogaci&oacute;n y comas</p>
                                </div>
                                <div class="form-group">
                                    <label>Frace para el producto:</label>
                                    <input type="text" class="form-control" id="txtFraceP" name="txtFraceP" placeholder="Las mejores, las inigualables, Los m&uacute;s crujientes de la regi&oacute;n" 
                                           v-model='fraceP' required>
                                    <br>
                                    <!--Validaciones de campos --->
                                    <p v-if='<?php echo $fraV; ?>' class="alert alert-success">Correcto</p>
                                    <p v-else class="alert alert-danger">Solo se permiten letras, n&uacute;mero, guiones, signos de interrogaci&oacute;n y comas</p>
                                </div>
                                <div class="form-group">
                                    <label>Nomrbe para el producto:</label>
                                    <input type="text" class="form-control" id="txtNombreP" name="txtNombreP" placeholder="Chorizo, Chicharr&oacute;n, etc." 
                                           v-model='nambreP' required>
                                    <br>
                                    <!--Validaciones de campos --->
                                    <p v-if='<?php echo $nomV; ?>' class="alert alert-success">Correcto</p>
                                    <p v-else class="alert alert-danger">Solo se permiten letras, n&uacute;mero, guiones, signos de interrogaci&oacute;n y comas</p>
                                </div>
                                <div class="form-group">
                                    <label>Foto para el producto:</label>
                                    <input type="file" class="form-control" id="txtImagenP" name="txtImagenP" 
                                           v-model='imagenEP'>
                                    <br>
                                    <!--Validaciones de campos--->
                                    
                                    <p v-show='!imagenEP' class="alert alert-success">Si no seleccionas otra imagen se quedara la anterios y es correcto</p>
                                    <p v-if='<?php echo $imgEV; ?>' class="alert alert-success">Correcto</p>
                                    <p v-else class="alert alert-danger">Solo se aceptan imagenes .jpg, .png y gif</p>
                                </div>
                                <div class="form-group">
                                    <label>Descripci&oacute;n para el producto:</label>
                                    <textarea type="text" class="form-control" id="txtDescripcionP" name="txtDescripcionP" placeholder="En super carnitas el profe de huetamo le ofrecemos las mejores carnitas. El precio por kg es de $100 pesos." 
                                              v-model='descripcionP' required></textarea>
                                    <br>
                                    <!--Validaciones de campos --->
                                    <p v-if='<?php echo $desV; ?>' class="alert alert-success">Correcto</p>
                                    <p v-else class="alert alert-danger">Solo se permiten letras, n&uacute;mero, guiones, signos de interrogaci&oacute;n y comas</p>
                                </div>
                                <input type="hidden" name="txtIdP" id="txtIdP">
                                <input type="hidden" name="txtImagenEP" id="txtImagenEP">
                                <div v-if="<?php echo $fraV . "&&" . $nomV . "&&" . $desV . "&&" . $tipV; ?>" class="modal-footer" style="float: right">
                                    <button type="button" class="btn btn-danger"  data-dismiss="modal" aria-label="Close">Cancelar</button>
                                    <input type="submit" class="btn btn-primary mdi mdi-content-save"  value="Editar"> 
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal de Eliminar Producto-->
            <div class="modal left fade in" role="dialog" tabindex="-1" id="modalEliminarP" aria-labelledby="modalChatLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5  style="float: left"> Eliminar producto</h5>
                            <div class="col-9 col-lg-9 col-xl-9 padMar text-right">
                                <h5 style="float: right" class="text-primary padMar margenesCajas pointer" data-dismiss="modal"><i class="icon ion-android-arrow-dropleft"></i>&nbsp; Ocultar</h5>
                            </div><button type="button" class="close d-none" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Ã—</span></button>

                        </div>
                        <div class="modal-body">
                            <form id="eliminarEvento" method="post" action="?operaciones=eliminarP">
                                <center><label>&iquest;Seguro que desea eliminar el producto?</label></center>
                                <input type="hidden" name="txtIdP2" id="txtIdP2">
                                <input type="hidden" name="txtR" id="txtR">
                                <div  class="modal-footer" style="float: right">
                                    <button type="button" class="btn btn-primary"  data-dismiss="modal" aria-label="Close">Cancelar</button>
                                    <button  class="btn btn-danger "  > Eliminar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <script src="assets/js/funcionesP.js" type="text/javascript"></script>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/bs-init.js"></script>
        <script src="assets/js/current-day.js"></script>
        <script src="assets/js/HMY-Responsive-nav-menu-V1.js"></script>
    </body>

</html>