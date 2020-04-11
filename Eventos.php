<!DOCTYPE html>
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
                        </div><button type="button" class="close d-none" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                    
                        <div class="modal-body">
                       
             <h4>Opciones</h4>
                     
             <div class="btn-group-vertical mx-auto d-block" role="group"><button  class="btn btn-light text-left" type="button" onclick=" location.href='EditarUsuario.php' "><i class="fa fa-pencil"></i>&nbsp;Editar usuario</button><button class="btn btn-light text-left" type="button"><i class="fa fa-power-off"></i>&nbsp;Cerrar sesión</button>
                           </div>
                    </div>
                </div>
            </div>
        </div><button class="btn btn-primary pull-right" data-bs-hover-animate="pulse" data-toggle="modal" data-target="#modalOpciones" type="button">Nombre Completo</button></div>
    
       
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
                    <h6>Correo: </h6>
             <br>
                                 <h6>Celular: </h6>
             <br>
               <h6>Descripción: </h6>
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
                    <h6>Correo: </h6>
             <br>
                                 <h6>Celular: </h6>
             <br>
               <h6>Descripción: </h6>
             <br>
             <div class="btn-group"  style=" float:right;">
                 
            <button class="btn btn-primary" type="submit">Confirmar</button> &nbsp;
                <button class="btn btn-primary" type="submit">Denegar</button>
             </div>
                </div>
                </div>
                       
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
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>04/03/2020</td>
      <td>09:33 a.m</td>
      <td>Calle arteaga 220</td>
      <td>Juan Perez</td>
       <td><button  class="btn btn-primary fa fa-address-card-o" data-toggle="modal" data-target="#modalDetallesConfirmados" type="button"></button></td>
    </tr>
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
    <tr>
      <td>04/03/2020</td>
      <td>10:23 a.m</td>
      <td>Calle Benito 240</td>
      <td>Maria Ortega</td>
       <td><button  class="btn btn-primary fa fa-address-card-o" data-toggle="modal" data-target="#modalDetallesNoConfirmados" type="button"></button></td>
    </tr>
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
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/current-day.js"></script>
    <script src="assets/js/HMY-Responsive-nav-menu-V1.js"></script>
</body>

</html>