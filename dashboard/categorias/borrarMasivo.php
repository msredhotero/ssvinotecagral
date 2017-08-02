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

$serviciosFunciones 	= new Servicios();
$serviciosUsuario 		= new ServiciosUsuarios();
$serviciosHTML 			= new ServiciosHTML();
$serviciosReferencias 	= new ServiciosReferencias();

$fecha = date('Y-m-d');

//$resProductos = $serviciosProductos->traerProductosLimite(6);
$resMenu = $serviciosHTML->menu(utf8_encode($_SESSION['nombre_predio']),"Categorias",$_SESSION['refroll_predio'],'');


/////////////////////// Opciones pagina ///////////////////////////////////////////////
$singular = "Categoria";

$plural = "Categorias";

$eliminar = "eliminarCategorias";

$insertar = "insertarCategorias";

$tituloWeb = "Gestión: Vinoteca";
//////////////////////// Fin opciones ////////////////////////////////////////////////


/////////////////////// Opciones para la creacion del formulario  /////////////////////
$tabla 			= 	"tbcategorias";

//////////////////////////////////////////////  FIN de los opciones //////////////////////////




/////////////////////// Opciones para la creacion del view  patente,refmodelo,reftipovehiculo,anio/////////////////////
$cabeceras 		= "	<th>Codigo</th>
                    <th>Cod.Barra</th>
                    <th>Nombre</th>
					<th>Descripción</th>
					<th>Stock</th>
                    <th>Stock Min.</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Categoria</th>
                    <th>Unidades</th>";

//////////////////////////////////////////////  FIN de los opciones //////////////////////////


$resResult = $serviciosReferencias->traerCategorias();
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

    <div class="boxInfoLargo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Modificar precios de forma masiva</p>
        	
        </div>
    	<div class="cuerpoBox">
        	<form class="form-inline formulario" role="form">
        	<div class='row' style="margin-left:25px; margin-right:25px;">
            	<h4>Seleccione las categorias para eliminar</h4>
            </div>
            
            <div class='row' style="margin-left:25px; margin-right:25px;">
            	<ul class="list-inline">
                	<li>
                    	<button type="button" class="btn btn-default" id="seleccionartodos" style="margin-left:0px;">Seleccionar Todos</button>
                    </li>
                    <li>
                    	<button type="button" class="btn btn-default" id="destildar" style="margin-left:0px;">Destildar Todos</button>
                    </li>
                </ul>
            </div>

            	<div class="col-md-12">
				<table class="table table-bordered table-responsive table-striped">
                <thead>
                	<th style="text-align:center">Seleccionar</th>
                    <th>Categoria</th>
                    <th>Es Egreso</th>
                    <th>Activo</th>
                    
                </thead>
                <tbody>
				<?php
					$cantidad = 0;
					while ($row = mysql_fetch_array($resResult)) {
						$cantidad += 1;
				?>
                	<tr>
                	<td align="center"><input class="form-control tildar" type="checkbox" name="produ<?php echo $row[0]; ?>" id="prod<?php echo $row[0]; ?>"/></td>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[2]; ?></td>
                    <td><?php echo $row[3]; ?></td>
                    </tr>
                <?php
					}
				?>
                </tbody>
                <tfoot>
                	<td colspan="6">Cantidad para modificar: <?php echo $cantidad; ?></td>
                </tfoot>
                </table>
                </div>
            </div>

            
            <div class='row' style="margin-left:25px; margin-right:25px;">
                <div class='alert'>
                
                </div>
                <div id='load'>
                
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                <ul class="list-inline" style="margin-left:15px;">
                    <li>
                        <button type="button" class="btn btn-primary" id="cargar" style="margin-left:0px;">Modificar</button>
                    </li>
                    <li>
                    	<input type="button" id="borrarMasivo" class="btn btn-danger" value="Borrar Masivo" />
                    </li>
                    <li>
                        <button type="button" class="btn btn-default" id="volver" style="margin-left:0px;">Volver</button>
                    </li>
                </ul>
                </div>
            </div>
            <input type="hidden" name="accion" id="accion" value="borrarMasivoCategorias"/>
            </form>
    	</div>
    </div>

</div>


</div>

<script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script>
<script src="../../bootstrap/js/dataTables.bootstrap.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	


	
	$('#example').dataTable({
		"order": [[ 0, "asc" ]],
		"language": {
			"emptyTable":     "No hay datos cargados",
			"info":           "Mostrar _START_ hasta _END_ del total de _TOTAL_ filas",
			"infoEmpty":      "Mostrar 0 hasta 0 del total de 0 filas",
			"infoFiltered":   "(filtrados del total de _MAX_ filas)",
			"infoPostFix":    "",
			"thousands":      ",",
			"lengthMenu":     "Mostrar _MENU_ filas",
			"loadingRecords": "Cargando...",
			"processing":     "Procesando...",
			"search":         "Buscar:",
			"zeroRecords":    "No se encontraron resultados",
			"paginate": {
				"first":      "Primero",
				"last":       "Ultimo",
				"next":       "Siguiente",
				"previous":   "Anterior"
			},
			"aria": {
				"sortAscending":  ": activate to sort column ascending",
				"sortDescending": ": activate to sort column descending"
			}
		  }
	} );
	
	$("#seleccionartodos").click(function () {

		$("input[type=checkbox]").prop('checked', true); //todos los check

	});
	
	$("#destildar").click(function () {

		$("input[type=checkbox]").prop('checked', false); //todos los check

	});
	
	
	$('#borrarMasivo').click( function(){
		
		//información del formulario
		var formData = new FormData($(".formulario")[0]);
		var message = "";
		//hacemos la petición ajax  
		$.ajax({
			url: '../../ajax/ajax.php',  
			type: 'POST',
			// Form data
			//datos del formulario
			data: formData,
			//necesario para subir archivos via ajax
			cache: false,
			contentType: false,
			processData: false,
			//mientras enviamos el archivo
			beforeSend: function(){
				$("#load").html('<img src="../../imagenes/load13.gif" width="50" height="50" />');       
			},
			//una vez finalizado correctamente
			success: function(data){

				if (data == '') {
					$("#errorBusqueda").removeClass("alert-danger");
					$("#errorBusqueda").removeClass("alert-info");
					$("#errorBusqueda").addClass("alert-success");
					$("#errorBusqueda").html('<strong>Ok!</strong> Se eliminaron todos los productos cargados. ');
					url = "borrarMasivo.php";
					$("#load").html('');
					$(location).attr('href',url);
					
					
				} else {
					$("#errorBusqueda").removeClass("alert-danger");
					$("#errorBusqueda").addClass("alert-danger");
					$("#errorBusqueda").html('<strong>Error!</strong> '+data);
					$("#load").html('');
				}
			},
			//si ha ocurrido un error
			error: function(){
				$("#errorBusqueda").html('<strong>Error!</strong> Actualice la pagina');
				$("#load").html('');
			}
		});
	});
    


});
</script>
<?php } ?>
</body>
</html>
