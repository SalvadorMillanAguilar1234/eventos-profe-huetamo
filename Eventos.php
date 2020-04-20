<!DOCTYPE html>
<?php
require_once 'Entidad.php';
require_once 'Modelo.php';
require_once 'Controlador.php';

error_reporting(E_ALL ^ E_NOTICE);
session_start();

//Extraer el nombre completo del usuario
$nombreCompleto="";
if ($_SESSION['idUsuarios'] == 1) {
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
                        <?php }?>
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
                        </div><button type="button" class="close d-none" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                    
                        <div class="modal-body">
                       
             <h4>Opciones</h4>
                     
             <div class="btn-group-vertical mx-auto d-block" role="group"><button  class="btn btn-light text-left" type="button" onclick=" location.href='EditarUsuario.php' "><i class="fa fa-pencil"></i>&nbsp;Editar usuario</button>
<form method="post" action="?operaciones=cerrarSesion">
                                        <button class="btn btn-light text-left" type="submit" style="width: 100%"><i class="fa fa-power-off"></i>&nbsp;Cerrar sesión</button>
                                    </form>
</div>
                    </div>
                </div>
            </div>
        </div><button class="btn btn-primary pull-right" data-bs-hover-animate="pulse" data-toggle="modal" data-target="#modalOpciones" type="button"><?php echo $nombreCompleto; ?></button></div>
    
       
        <div class="modal left fade in" role="dialog" tabindex="-1" id="modalDetallesConfirmados" aria-labelledby="modalChatLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="col-12 col-lg-12 col-xl-12 padMar text-right">
                            <h5 class="text-primary padMar margenesCajas pointer" data-dismiss="modal"><i class="icon ion-android-arrow-dropleft"></i>&nbsp; Ocultar</h5>
                        </div><button type="button" class="close d-none" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                    <div class="modal-body">
                       
                        <div class="container">              
                <div class="bg-faded p-5 rounded col-xl-12 mx-auto">                        
     
                    <h3>Información</h3>
            <br>
                    <h6><label id="textCorreo">Correo</label></h6>
             <br>
                                <h6><label id="textCelular">Celular</label></h6>
             <br>
             <h6><label id="textDescripcion">descripcion</label></h6>
             <br>
            <div
                class="checkbox">
                <!--  <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Remember me</label></div> -->
    </div>  
                 
            </div>
                </div>
                       
                    </div>
                </div>
            </div>
        </div>
    
    <div class="modal left fade in" role="dialog" tabindex="-1" id="modalDetallesNoConfirmados" aria-labelledby="modalChatLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="col-12 col-lg-12 col-xl-12 padMar text-right">
                            <h5 class="text-primary padMar margenesCajas pointer" data-dismiss="modal"><i class="icon ion-android-arrow-dropleft"></i>&nbsp; Ocultar</h5>
                        </div><button type="button" class="close d-none" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                    <div class="modal-body">
                       
                        <div class="container">              
                <div class="bg-faded p-5 rounded col-xl-12 mx-auto">                        
       
            
           <h3>Información</h3>
            <br>
                    <h6><label id="textCorreo1">Correo</label></h6>
             <br>
                                <h6><label id="textCelular1">Celular</label></h6>
             <br>
             <h6><label id="textDescripcion1">descripcion</label></h6>
             <br>
             <div class="btn-group"  style=" float:right;">
                 
           <form class="form-signin" id="editarEstadoEvento" method="post"  class="form-horizontal" action="?operaciones=editarEstadoEvento">       
             <input class="form-control" hidden="true" name="txtIdE1" id="txtIdE1" value="" required=""  autofocus="">
               <button class="btn btn-primary" type="submit">Confirmar</button> &nbsp;
            </form>
                 
                 <form class="form-signin" id="eliminarEvento" method="post"  class="form-horizontal" action="?operaciones=eliminarE" onsubmit="return confirmation()">       
                     <input class="form-control" hidden="true" name="txtIdE" id="txtIdE" value="" required=""  autofocus="">
             <input class="form-control" name="txtUrl" hidden="true" id="txtUrl" value="1" required=""  autofocus="">
              <button class="btn btn-primary" type="submit">Denegar</button>
            </form>
               
                  <script type="text/javascript">

function confirmation() {
    if(confirm("Desea denegar y eliminar el evento?"))
    {
        return true;
    }
    return false;
}

</script>
                 
             </div>
                </div>
                </div>
                       
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
                        </div><button type="button" class="close d-none" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                    </div>
                    <div class="modal-body">
                        <form id="eliminarEvento" method="post" action="?operaciones=eliminarE">
                            <center><label>&iquest;Seguro que desea eliminar el evento?</label></center>
                            <input hidden="true" name="txtIdE3" id="txtIdE3">
                            <input hidden="true" name="txtUrl" id="txtUrl" value="1">
                            <div  class="modal-footer" style="float: right">
                                <button type="button" class="btn btn-primary"  data-dismiss="modal" aria-label="Close">Cancelar</button>
                                <button  class="btn btn-danger "  > Eliminar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
    
    <section class="page-section">
        <div class="container col-xl-12">          
            
            <div class="bg-faded  rounded col-xl-12 mx-auto">       
                <br>
                <h3>Confirmados</h3>
    <div class="table-responsive">
               <table class="table table-striped">
                   <thead class="page-section cta" style="color: white">
                      
      <tr>
      <th scope="col">Fecha</th>
      <th scope="col">Hora</th>
      <th scope="col">Dirección</th>
      <th scope="col">Usuario</th>
      <th scope="col">Detalles</th>
        <th scope="col">Eliminar</th>
    </tr>
    
  </thead>
  <tbody>
       <?php foreach ($modelo->ListarEventosFiltro(1) as $row): 
             foreach ($modelo->ListarUsuario($row->__GET('idUsuario')) as $row1): 
                          ?>
    <tr>
      <td><?php echo $row->__GET('fecha'); ?></td>
      <td><?php echo $row->__GET('hora'); ?></td>
      <td><?php echo $row->__GET('direccion'); ?></td>
      <td><?php echo $row1->__GET('nombres')." ".$row1->__GET('apellidos'); ?></td>
      <td><button  class="btn btn-primary fa fa-address-card-o" type="button" onclick="abrirMConfE('<?php echo $row1->__GET('correo'); ?>','<?php echo $row1->__GET('celular'); ?>','<?php echo $row->__GET('descripcion'); ?>')"></button></td>
<!--Eliminar-->
      <td><button  class="btn btn-primary fa fa-times" type="button" onclick="abrirModalEminarE('<?php echo $row->__GET('idEventos'); ?>')"></button></td>
    </tr>
    <?php endforeach;
          endforeach;
    ?>
  </tbody>
</table>
           </div>  
                
                
                <hr width=100% style="background-color: silver">
                
                  <br>
                <h3>No confirmados</h3>
    <div class="table-responsive">
               <table class="table table-striped">
                   <thead class="page-section cta" style="color: white">
      <tr>
      <th scope="col">Fecha</th>
      <th scope="col">Hora</th>
      <th scope="col">Dirección</th>
      <th scope="col">Usuario</th>
      <th scope="col">Detalles</th>
    </tr>
  </thead>
 <tbody>
       <?php foreach ($modelo->ListarEventosFiltro(0) as $row): 
             foreach ($modelo->ListarUsuario($row->__GET('idUsuario')) as $row1): 
                          ?>
    <tr>
      <td><?php echo $row->__GET('fecha'); ?></td>
      <td><?php echo $row->__GET('hora'); ?></td>
      <td><?php echo $row->__GET('direccion'); ?></td>
      <td><?php echo $row1->__GET('nombres')." ".$row1->__GET('apellidos'); ?></td>
       <td><button  class="btn btn-primary fa fa-address-card-o" type="button" onclick="abrirMConfE1('<?php echo $row->__GET('idEventos'); ?>','<?php echo $row1->__GET('correo'); ?>','<?php echo $row1->__GET('celular'); ?>','<?php echo $row->__GET('descripcion'); ?>')"></button></td>
    </tr>
    <?php endforeach;
          endforeach;
    ?>
  </tbody>
</table>
           </div>   
        </div>
         </div>  
     
    </section>
    <footer class="text-light bg-dark footer text-faded text-center py-5">
        <div class="container">       
             <div class="text-center center-block">      
                <a href="https://www.facebook.com/restaurantelostruenos/"><i id="social-fb" class="fa fa-facebook fa-2x social"></i></a> &nbsp;
	            <a href="" title="Comuniquese al: 312-194-4293"><i id="social-tw" class="fa fa-whatsapp fa-2x social"></i></a>	            
</div>          
          </div>
    </footer>
    
    <script src="assets/js/funciones.js" type="text/javascript"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/current-day.js"></script>
    <script src="assets/js/HMY-Responsive-nav-menu-V1.js"></script>
</body>

</html>