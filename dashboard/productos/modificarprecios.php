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
$resMenu = $serviciosHTML->menu(utf8_encode($_SESSION['nombre_predio']),"Productos",$_SESSION['refroll_predio'],'');


/////////////////////// Opciones pagina ///////////////////////////////////////////////
$singular = "Producto";

$plural = "Productos";

$eliminar = "eliminarProductos";

$insertar = "insertarProductos";

$tituloWeb = "Gestión: Vinoteca";
//////////////////////// Fin opciones ////////////////////////////////////////////////


/////////////////////// Opciones para la creacion del formulario  /////////////////////
$tabla 			= 	"dbproductos";

$id				= 	$_GET['idcategoria'];

$resResult		=	$serviciosReferencias->traerProductosPorCategoria($id);
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
            	<h4>Seleccione los productos para aplicarles el porcentaje de precio</h4>
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
        	<div class='row' style="margin-left:25px; margin-right:25px;">
            	<div class="col-md-6" style="margin-bottom:15px;">
                	<h4>Ingrese el nuevo Precio</h4>
                    <input type="number" class="form-control" id="precio" name="precio" value="0">
                </div>
                <div class="col-md-6" style="margin-bottom:15px;">
                	<h4>Ingrese el porcentaje a aplicar a la Venta</h4>
                    <input type="number" class="form-control" id="porcentaje" name="porcentaje" value="0">
                </div>
            	<div class="col-md-12">
				<table class="table table-bordered table-responsive table-striped">
                <thead>
                	<th style="text-align:center">Seleccionar</th>
                    <th>Nombre</th>
                    <th>Codigo</th>
                    <th>Codigo Barra</th>
                    <th>Precio</th>
                    <th>Precio Venta</th>
                </thead>
                <tbody>
				<?php
					$cantidad = 0;
					while ($row = mysql_fetch_array($resResult)) {
						$cantidad += 1;
				?>
                	<tr>
                	<td align="center"><input class="form-control tildar" type="checkbox" name="produ<?php echo $row[0]; ?>" id="prod<?php echo $row[0]; ?>"/></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['codigo']; ?></td>
                    <td><?php echo $row['codigobarra']; ?></td>
                    <td align="right"><?php echo $row['preciocosto']; ?></td>
                    <td align="right"><?php echo $row['precioventa']; ?></td>
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
            <input type="hidden" name="accion" id="accion" value="modificarprecios"/>
            <input type="hidden" name="idcategoria" id="idcategoria" value="<?php echo $id; ?>"/>
            </form>
    	</div>
    </div>

</div>


</div>

<script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script>
<script src="../../bootstrap/js/dataTables.bootstrap.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	
	$('#buscar').click(function(e) {
        $.ajax({
				data:  {busqueda: $('#busqueda').val(),
						tipobusqueda: $('#tipobusqueda').val(),
						accion: 'buscarProductos'},
				url:   '../../ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
						
				},
				success:  function (response) {
						$('#resultados').html(response);	
				}
		});
		
	});

	
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

	$("#example").on("click",'.varborrar', function(){
		  usersid =  $(this).attr("id");
		  if (!isNaN(usersid)) {
			$("#idEliminar").val(usersid);
			$("#dialog2").dialog("open");

			
			//url = "../clienteseleccionado/index.php?idcliente=" + usersid;
			//$(location).attr('href',url);
		  } else {
			alert("Error, vuelva a realizar la acción.");	
		  }
	});//fin del boton eliminar
	
	$("#example").on("click",'.varmodificar', function(){
		  usersid =  $(this).attr("id");
		  if (!isNaN(usersid)) {
			
			url = "modificar.php?id=" + usersid;
			$(location).attr('href',url);
		  } else {
			alert("Error, vuelva a realizar la acción.");	
		  }
	});//fin del boton modificar

	
	
	
	//al enviar el formulario
    $('#cargar').click(function(){
		
			$('#accion').val('modificarprecios');
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
						
						$(".alert").removeClass("alert-danger");
						$(".alert").removeClass("alert-info");
						$(".alert").addClass("alert-success");
						$(".alert").html('<strong>Ok!</strong> Se modifico exitosamente los precios de los <strong><?php echo $singular; ?></strong>. ');
						$("#load").html('');
						
						url = "modificarprecios.php?idcategoria=" + <?php echo $id; ?>;
						$(location).attr('href',url);
						
						
					} else {
						
						$(".alert").removeClass("alert-danger");
						$(".alert").addClass("alert-danger");
						$(".alert").html('<strong>Error!</strong> '+ data);
						$("#load").html('');
					}
				},
				//si ha ocurrido un error
				error: function(){
					$(".alert").html('<strong>Error!</strong> Actualice la pagina');
                    $("#load").html('');
				}
			});
		
    });
	
	
	$('#borrarMasivo').click( function(){
		
		$('#accion').val('eliminarMasivo');
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
					url = "modificarprecios.php?idcategoria=" + <?php echo $id; ?>;
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
    
    $('#imagen1').on('change', function(e) {
	  var Lector,
		  oFileInput = this;
	 
	  if (oFileInput.files.length === 0) {
		return;
	  };
	 
	  Lector = new FileReader();
	  Lector.onloadend = function(e) {
		$('#vistaPrevia1').attr('src', e.target.result);         
	  };
	  Lector.readAsDataURL(oFileInput.files[0]);
	 
	});

});
</script>
<?php } ?>
</body>
</html>
