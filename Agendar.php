<!DOCTYPE html>
<?php
# definimos los valores iniciales para nuestro calendario
ini_set('date.timezone', 'America/Mexico_City');
$month=date("n");
$year=date("Y");
$diaActual=date("j");
 
# Obtenemos el dia de la semana del primer dia
# Devuelve 0 para domingo, 6 para sabado
$diaSemana=date("w",mktime(0,0,0,$month,1,$year))+7;
# Obtenemos el ultimo dia del mes
$ultimoDiaMes=date("d",(mktime(0,0,0,$month+1,1,$year)-1));
 
$meses=array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
"Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
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

<body style="background: linear-gradient(rgba(200, 200, 200, 0.65), rgba(200, 200, 200, 0.65));">
    <nav class="navbar navbar-light navbar-expand-lg bg-dark py-lg-4" id="mainNav">
        <div class="container"><a class="navbar-brand text-uppercase d-lg-none text-expanded" href="#">Brand</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav mx-auto">
                 <li class="nav-item" role="presentation"><a class="nav-link" href="index.html">Inicio</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Agendar.php">Agendar</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Eventos.html">Eventos</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="AcercaDe.html">Acerca de</a></li>
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
                        <div class="btn-group-vertical mx-auto d-block" role="group"><button class="btn btn-light text-left" type="button" onclick=" location.href='Registro.html' "><i class="fa fa-user-circle"></i>&nbsp;Registrarse</button>
                            <button class="btn btn-light text-left" type="button" onclick=" location.href='Login.html' "><i class="fa fa-user-circle-o" ></i>&nbsp;Iniciar sesion</button></div>
                    </div>
                </div>
            </div>
        </div><button class="btn btn-primary pull-right" data-bs-hover-animate="pulse" data-toggle="modal" data-target="#modalOpciones" type="button"><i ></i>Registras / Iniciar sesion</button></div>
  
        <div class="bootstrap_calendar">
<div class="container py-5">

  <!-- For Demo Purpose -->
  <header class="text-center text-white mb-5">
    <h1 class="display-4">Agenda tu evento</h1>
  </header>


  <!-- Calendar -->
  <div class="calendar shadow bg-white p-5">
    <div class="d-flex align-items-center"><i class="fa fa-calendar fa-3x mr-3"></i>
      <h2 class="month font-weight-bold mb-0 text-uppercase"><?php echo $meses[$month]." ".$year?></h2>
    </div>
    <ol class="day-names list-unstyled">
      <li class="font-weight-bold text-uppercase">Lun</li>
      <li class="font-weight-bold text-uppercase">Mar</li>
      <li class="font-weight-bold text-uppercase">Mie</li>
      <li class="font-weight-bold text-uppercase">Jue</li>
      <li class="font-weight-bold text-uppercase">Vie</li>
      <li class="font-weight-bold text-uppercase">Sab</li>
      <li class="font-weight-bold text-uppercase">Dom</li>
    </ol>

    <ol class="days list-unstyled">
        <?php
		$last_cell=$diaSemana+$ultimoDiaMes;
		// hacemos un bucle hasta 42, que es el máximo de valores que puede
		// haber... 6 columnas de 7 dias
		for($i=1;$i<=42;$i++)
		{
			if($i==$diaSemana)
			{
				// determinamos en que dia empieza
				$day=1;
			}
			if($i<$diaSemana || $i>=$last_cell)
			{
				// celca vacia
				echo "<li><div class='date'>&nbsp;</div></li>";
			}else{
                            echo "<a href='' data-bs-hover-animate='pulse' data-toggle='modal' data-target='#modalAgendarE'><li>";
                            if(($day%10)==0){
                                echo "<div class='date'>$day</div>"
                                        . "
        <div class='event all-day begin bg-warning'>No disponibles</div>";
                            }else{
                                if(($day%10)==2){
                            echo "<div class='date'>$day</div>"
                            . "<div class='event all-day end  bg-info'>Pendientes</div>";
                             }else{
				// mostramos el dia
				if($day==$diaActual)
					echo "<div class='date' >$day</div><div class='event all-day end bg-success'>Apartado</div>"
                                        . "";
				else
					echo "<div class='date'>$day</div>";
				
                           
                            
                            }}
                            $day++;
                            
                            echo "</li></a>";
			}
			/* cuando llega al final de la semana, iniciamos una columna nueva
			if($i%7==0)
			{
				echo "</tr><tr>\n";
			} */
		}
	?>
    </ol>
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
	            <a href="" title="Comuniquese al: 312-194-4293"><i id="social-tw" class="fa fa-whatsapp fa-2x social"></i></a>	            
</div>          
          </div>
    </footer>
    <!-- Modal de Agendar Evento-->
    
    <div class="modal left fade in" role="dialog" tabindex="-1" id="modalAgendarE" aria-labelledby="modalChatLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="col-12 col-lg-12 col-xl-12 padMar text-right">
                            <h5 class="text-primary padMar margenesCajas pointer" data-dismiss="modal"><i class="icon ion-android-arrow-dropleft"></i>&nbsp; Ocultar</h5>
                        </div><button type="button" class="close d-none" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                    <div class="modal-body">
                        <form id="crearExamen" method="post" action="?operaciones=eliminarCU">



                                        
                                        <p>
                                        <div class="form-group">
                                            <label>Luagar:</label>
                                            <input type="Text" class="form-control" id="6xtLugar" name="txtLugar" placeholder="Zaragoza sur N&#176; 033">
                                            </div>
                                        <div class="form-group">
                                            <label>Hora del evento:</label>
                                            <input type="time" class="form-control" id="txtHora" name="txtHora" >
                                            </div>
                                        <div  style="width: 100%">
                                    <label for="descripcionTarea">Descripci&#243;n:</label>
                                    <textarea type="text" class="form-control" id="txtDescripcion"  name="txtDescripcion"  placeholder="Para el evento necesitar&#233; los soguientes productos: ..."  required></textarea>
                                    <p> </div>

                                        <div class="modal-footer" style="float: right">
                                            <button class="btn btn-danger   icon mdi mdi-close-circle" > Cancelar</button>  
                                            <button type="button" class="btn btn-primary mdi mdi-content-save" data-dismiss="modal" > Registrar</button>
                                        </div>
                                    </form>
                </div>
            </div>
        </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/current-day.js"></script>
    <script src="assets/js/HMY-Responsive-nav-menu-V1.js"></script>
</body>

</html>