<?php


session_start();

if (!isset($_SESSION['usua_predio']))
{
	header('Location: ../../error.php');
} else {


include ('../../includes/funciones.php');
include ('../../includes/funcionesUsuarios.php');
include ('../../includes/funcionesHTML.php');
include ('../../includes/funcionesReferencias.php');

$serviciosFunciones = new Servicios();
$serviciosUsuario 	= new ServiciosUsuarios();
$serviciosHTML 		= new ServiciosHTML();
$serviciosReferencias 	= new ServiciosReferencias();

$fecha = date('Y-m-d');

//$resProductos = $serviciosProductos->traerProductosLimite(6);
$resMenu = $serviciosHTML->menu(utf8_encode($_SESSION['nombre_predio']),"Libros",$_SESSION['refroll_predio'],'');


$id = $_GET['id'];
$token = $_GET['autorizacion'];

$resResultado = $serviciosReferencias->traerLibrosPorId($id);
$autorizacion = $serviciosReferencias->traerAutorizacionPorToken($token);


/////////////////////// Opciones pagina ///////////////////////////////////////////////
$singular = "Libro";

$plural = "Libros";

$tituloWeb = "Gestión: Libreria";
//////////////////////// Fin opciones ////////////////////////////////////////////////


if ($_SESSION['refroll_predio'] != 1) {

} else {

	
}


?>

<!DOCTYPE HTML>
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">



<title><?php echo $tituloWeb; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<link href="../../css/estiloDash.css" rel="stylesheet" type="text/css">
    

    
    <script type="text/javascript" src="../../js/jquery-1.8.3.min.js"></script>
    <link rel="stylesheet" href="../../css/jquery-ui.css">

    <script src="../../js/jquery-ui.js"></script>
    
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css"/>
	<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../../css/bootstrap-datetimepicker.min.css">
	<style type="text/css">
		
  
		
	</style>
    
   
   <link href="../../css/perfect-scrollbar.css" rel="stylesheet">
      <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
      <script src="../../js/jquery.mousewheel.js"></script>
      <script src="../../js/perfect-scrollbar.js"></script>
      <script>
      jQuery(document).ready(function ($) {
        "use strict";
        $('#navigation').perfectScrollbar();
      });
    </script>
</head>

<body>

 <?php echo $resMenu; ?>

<div id="content">

<h3><?php echo $plural; ?></h3>

    <div class="boxInfoLargo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Modificar <?php echo $singular; ?></p>
        	
        </div>
    	<div class="cuerpoBox">
        	<form class="form-inline formulario" role="form">
        	
			<div class='row' style="margin-left:25px; margin-right:25px;">
				<ul class="list-group">
                  <li class="list-group-item list-group-item-info"><span class="glyphicon glyphicon-book"></span> Libro</li>
                  <li class="list-group-item list-group-item-default">Titulo: <?php echo mysql_result($resResultado,0,'titulo'); ?></li>
                  <li class="list-group-item list-group-item-default">Autor: <?php echo mysql_result($resResultado,0,'autor'); ?></li>
                  <li class="list-group-item list-group-item-default">Paginas: <?php echo mysql_result($resResultado,0,'paginas'); ?></li>
                </ul>
                
                <?php
					if (mysql_num_rows($autorizacion)>0) {
				?>
                	<img src="../../imagenes/pdf_ico2.jpg" width="100" height="100"><a href="../<?php echo mysql_result($resResultado,0,'ruta'); ?>" target="_blank">Haga "Click" aqui para descargar.</a>
                <?php 
					$serviciosReferencias->eliminarAutorizacionPorToken($token);
					} else { ?>
                	<h4>No tiene permisos o debe generar una nueva autorizacion</h4>
                <?php
					}
				?>
            </div>
            
            

            
            <div class="row">
                <div class="col-md-12">
                <ul class="list-inline" style="margin-top:15px;">
                    <li>
                        <button type="button" class="btn btn-default volver" style="margin-left:0px;">Volver</button>
                    </li>
                </ul>
                </div>
            </div>
            </form>
    	</div>
    </div>
    
    
   
</div>


</div>



<script type="text/javascript">
$(document).ready(function(){

	$('.volver').click(function(event){
		 
		url = "index.php";
		$(location).attr('href',url);
	});//fin del boton modificar
	
	

});
</script>


<?php } ?>
</body>
</html>
