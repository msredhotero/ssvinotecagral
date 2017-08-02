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
$resMenu = $serviciosHTML->menu(utf8_encode($_SESSION['nombre_predio']),"Ventas",$_SESSION['refroll_predio'],'');


/////////////////////// Opciones pagina ///////////////////////////////////////////////
$singular = "Ventas";

$plural = "Ventas";

$eliminar = "eliminarVentas";

$insertar = "insertarVentasAux";

$tituloWeb = "Gestión: Vinoteca";
//////////////////////// Fin opciones ////////////////////////////////////////////////


/////////////////////// Opciones para la creacion del formulario  /////////////////////
$tabla 			= "dbventas";

$lblCambio	 	= array();
$lblreemplazo	= array();


$cadRef 	= '';

$refdescripcion = array();
$refCampo 	=  array();
//////////////////////////////////////////////  FIN de los opciones //////////////////////////




/////////////////////// Opciones para la creacion del view  patente,refmodelo,reftipovehiculo,anio/////////////////////
$cabeceras 		= "	<th>Referencia</th>
                    <th>Fecha Pedido</th>
                    <th>Fecha Entrega</th>
					<th>Total</th>
					<th>Estado</th>
                    <th>Obserbaciones</th>";

$cabecerasProductos 		= "<th>Prdoucto</th>
                    <th>Cantidad</th>
					<th>Stock</th>
					<th>Stock Min.</th>
					<th>Precio</th>";

$cabeceras2 		= "	<th>Numero</th>
                    <th>Fecha</th>
                    <th>Tipo Pago</th>
					<th>Total</th>
					<th>Cliente</th>
                    <th>Cancelada</th>";				
//////////////////////////////////////////////  FIN de los opciones //////////////////////////

$lstVentas	= $serviciosFunciones->camposTablaView($cabeceras2, $serviciosReferencias->traerVentasPorDia(date('Y-m-d')),96);


//$formulario 	= $serviciosFunciones->camposTabla($insertar ,$tabla,$lblCambio,$lblreemplazo,$refdescripcion,$refCampo);

$lstClientes = $serviciosFunciones->devolverSelectBox( $serviciosReferencias->traerClientes(),array(1),'');

$lstTipoPago = $serviciosFunciones->devolverSelectBox( $serviciosReferencias->traerTipopago(),array(1),'');

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
    <script src="../../js/jquery.number.min.js"></script>
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css"/>
	<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" href="../../css/chosen.css">
	<style type="text/css">
		#table-6 {
			border:2px solid #C0C0C0;
		}
		
		#table-6 thead {
		text-align: left;
		}
		#table-6 thead th {
		background: -moz-linear-gradient(top, #F0F0F0 0, #DBDBDB 100%);
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #F0F0F0), color-stop(100%, #DBDBDB));
		filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#F0F0F0', endColorstr='#DBDBDB', GradientType=0);
		border: 1px solid #C0C0C0;
		color: #444;
		font-size: 16px;
		font-weight: bold;
		padding: 3px 10px;
		}
		
		#table-6 tbody td .cent {
			text-align:center;	
		}
  
		
	</style>
    
   <script>
	$(document).ready(function(){

		
		$('#cantidadbuscar').each(function(intIndex){
			$(this).number( true, 0,'','' );
			$(this).focusout( function() {
				if ($(this).val() == '') {
					$(this).val(1);
				}
			});
		});
		
	});
	</script>

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

<div id="content" align="center">
	
    <div class="boxInfoLargo tile-stats tile-white stat-tile" style="margin-bottom:-15px;">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Productos Cargados <span class="glyphicon glyphicon-minus abrir2" style="cursor:pointer; float:right; padding-right:12px;">(Cerrar)</span></p>
        	
        </div>
    	<div class="cuerpoBox filt2">
        	<!--<form class="form-inline formulario" role="form">-->
            	
                <div class="row">
                    
                    
                    <div class="form-group col-md-6">
                     <label class="control-label" style="text-align:left" for="torneo">Tipo de Busqueda</label>
                        <div class="input-group col-md-12">
                            <select id="tipobusqueda" class="form-control" name="tipobusqueda">
                                <option value="1">Nombre</option>
                                <option value="2">Codigo Barra</option>
                                <option value="3">Codigo</option>
                                
                            </select>
                        </div>
                        
                    </div>
                    
                    <div class="form-group col-md-6">
                     <label class="control-label" style="text-align:left" for="torneo">Busqueda</label>
                        <div class="input-group col-md-12">
                            <input type="text" name="busqueda" id="busqueda" class="form-control">
                        </div>

                    </div>
                    
                    <div class="form-group col-md-12">
                    	 <ul class="list-inline" style="margin-top:15px;">
                            <li>
                             <button id="buscar" class="btn btn-primary" style="margin-left:0px;" type="button">Buscar</button>
                            </li>
                        </ul>

                    </div>
                    
                    <div class="form-group col-md-12">
                    	<div class="cuerpoBox" id="resultados">
        
       		 			</div>
					</div>
                
                </div>
                
                <div class="row">
                    <div class="alert"> </div>
                    <div id="load"> </div>
                </div>

            
            <!--</form>-->
    	</div>
    </div>
    
    
    <div class="boxInfoLargo tile-stats tile-white stat-tile">
        <div id="headBoxInfo" style="background-color:#C30;">
        	<p style="color: #fff; font-size:18px; height:16px;">Carga de <?php echo $plural; ?></p>
        	
        </div>
    	<div class="cuerpoBox">
        	<form class="form-inline formulario" role="form">
        	<div class="row">
				
                <div class="form-group col-md-2" style="display:block">
                	<div class="input-group col-md-12">
                    	<ul class="list-inline">
                        <li>
	                    <input type="radio" class="form-control" name="reftipopago" id="contado" checked value="1"/>Contado
                        </li>
                        <li>
                        <input type="radio" class="form-control" name="reftipopago" id="credito" value="3"/>Credito
                        </li>
                        </ul>
                    </div>

                </div>
                
            	<div class="form-group col-md-2" style="display:block">
                	<label class="control-label" for="codigobarra" style="text-align:left">Cantidad</label>
                    <div class="input-group col-md-12">
	                    <input id="cantidadbuscar" maxlength="2" class="botonesVentas" name="cantidadbuscar" placeholder="Cantidad..." required type="text" value="1">
                    </div>
                </div>
                
                <div class="form-group col-md-5" style="display:block">
                	<label class="control-label" for="codigobarra" style="text-align:left">Codigo de Barras</label>
                    <div class="input-group col-md-12">
	                    <input id="codigobarrabuscar" class="botonesVentas" name="codigobarrabuscar" placeholder="Codigo de Barras..." type="text">
                    </div>
                </div>


                
                
                <div class="form-group col-md-3" style="display:none;">
                	<label class="control-label" for="codigobarra" style="text-align:left">Seleccione el Cliente</label>
                    <div class="input-group col-md-12">
	                    <select data-placeholder="selecione el Cliente..." id="refclientes" name="refclientes" class="chosen-select" tabindex="2" style="width:100%;">
                            
                            <?php echo $lstClientes; ?>
                        </select>
                    </div>
                </div>

                
                <div class="form-group col-md-3" style="display:block">
                	<label class="control-label" for="codigobarra" style="text-align:left">Descuento</label>
                    <div class="input-group col-md-12">
	                    <input id="descuento" class="botonesVentas" name="descuento" placeholder="Cantidad..." required type="number" value="0">
                    </div>
                </div>

            </div>
			<hr>
         <div class='row' style="margin-left:25px; margin-right:25px;" id="tabla">
            <div class="col-md-12">
            <table class="table table-striped" id="table-6">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th style="width:260px;" class="text-center">Producto</th>
                        <th style="width:60px;" class="text-center">Cantidad</th>
                        <th class="text-center">Precio</th>
                        <th class="text-center">Sub-Total</th>
                        <th class="text-center">Precio-Descuento</th>
                        <th class="text-center">Sub-Total-Desc.</th>
                        
                        <th style="width:120px;" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="detalle">
                	<tr>
                    	<td colspan="8"></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr style="background-color:#CCC; font-weight:bold; font-size:18px;">
                        <td colspan="3" align="right">
                            Sub-Total $
                        </td>
                        <td style="border-right:3px solid #333;">
                            <input type="text" readonly name="total" id="total" value="0" style="border:none; background-color:#CCC;"/>
                        </td>
                        <td colspan="3" align="right">
                            Sub-Total-Descuentos $
                        </td>
                        <td>
                            <input type="text" readonly name="totaldesc" id="totaldesc" value="0" style="border:none; background-color:#CCC;"/>
                        </td>
                    </tr>
                    <tr style="background-color:#DDD; font-weight:bold; font-size:18px;">
                        <td colspan="3" align="right" style="width:30%;">
                            Total - Descuento $
                        </td>
                        <td style="border-right:3px solid #333;">
                            <input type="text" readonly name="totaldescuento" id="totaldescuento" value="0" style="border:none; background-color:#DDD;"/>
                        </td>
                        <td colspan="3" align="right">
                            Total-Descuento - Descuento $
                        </td>
                        <td>
                            <input type="text" readonly name="totaldescdescuento" id="totaldescdescuento" value="0" style="border:none; background-color:#DDD;"/>
                        </td>
                    </tr>
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
                    	Paga con:
                    </li>
                    <li>
						<input id="paga" style="padding:16px; font-size:1.9em; width:150px;" name="paga" placeholder="Paga con..." required type="text" value="0">
                    </li>
                    <li>
                    	Su vuelto:
                    </li>
                    <li>
						<input id="vuelto" style="padding:16px; font-size:1.9em; width:150px;" name="vuelto" readonly placeholder="Su vuelto..." required type="text" value="0">
                    </li>
                    <li>
                        <button type="button" class="btn btn-info" id="cargarP" style="margin-left:0px;">Confirmar</button>
                    </li>
                    <li>
                    	Su vuelto Precio-Desc.:
                    </li>
                    <li>
						<input id="vueltodesc" style="padding:16px; font-size:1.9em; width:150px;" name="vueltodesc" readonly placeholder="Su vuelto..." required type="text" value="0">
                    </li>
                    <li>
                        <button type="button" class="btn btn-primary" id="cargarPD" style="margin-left:0px;">Confirmar</button>
                    </li>
                </ul>
                </div>
            </div>
            
            <input type="hidden" name="proNombre" id="proNombre" value="" />
            <input type="hidden" name="proPrecio" id="proPrecio" value="" />
            <input type="hidden" name="accion" id="accion" value="insertarVentas" />
            <input type="hidden" name="usuario" id="usuario" value="<?php echo utf8_encode($_SESSION['nombre_predio']); ?>" />
            
            </form>
    	</div>
    </div>
    
    <div class="boxInfoLargo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;"><?php echo $plural; ?> Cargadas</p>
        	
        </div>
    	<div class="cuerpoBox">
        	<?php echo $lstVentas; ?>
    	</div>
    </div>
    
    

    
    
   
</div>


</div>
<div id="dialog2" title="Eliminar <?php echo $singular; ?>">
    	<p>
        	<span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>
            ¿Esta seguro que desea eliminar el <?php echo $singular; ?>?.<span id="proveedorEli"></span>
        </p>
        <p><strong>Importante: </strong>La venta no se eliminara, solo se cancelara y se reintegrara el stock y no se tendra en cuenta para las cuentas.</p>
        <input type="hidden" value="" id="idEliminar" name="idEliminar">
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detalle de la Venta</h4>
      </div>
      <div class="modal-body detallePedido">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>




<script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script>
<script src="../../bootstrap/js/dataTables.bootstrap.js"></script>
<script src="../../js/bootstrap-datetimepicker.min.js"></script>
<script src="../../js/bootstrap-datetimepicker.es.js"></script>

<script type="text/javascript">
$(document).ready(function(){

	
	$('#credito').click(function() {
		if ($(this).prop('checked') ) {
			$('#cargarPD').hide(200);
		} else {
			$('#cargarPD').show(200);
		}
	});
	
	$('#contado').click(function() {
		if ($(this).prop('checked') ) {
			$('#cargarPD').show(200);
		} else {
			$('#cargarPD').hide(200);
		}
	});
	
	
	
	$('#refproductobuscarbarra').focus();
	$('#colapsarMenu').click();
	$('#buscar').click(function(e) {
        $.ajax({
				data:  {busqueda: $('#busqueda').val(),
						tipobusqueda: $('#tipobusqueda').val(),
						tipo: 'Venta',
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
	
	$('#paga').change(function(e) {
        $('#vuelto').val($(this).val() - $('#totaldescuento').val());
		$('#vueltodesc').val($(this).val() - $('#totaldescdescuento').val());
    });
	

	
	$('.abrir').click(function() {
		
		if ($('.abrir').text() == '(Abrir)') {
			$('.filt').show( "slow" );
			$('.abrir').text('(Cerrar)');
			$('.abrir').removeClass('glyphicon glyphicon-plus');
			$('.abrir').addClass('glyphicon glyphicon-minus');
		} else {
			$('.filt').slideToggle( "slow" );
			$('.abrir').text('(Abrir)');
			$('.abrir').addClass('glyphicon glyphicon-plus');
			$('.abrir').removeClass('glyphicon glyphicon-minus');

		}
	});

	
	$('.abrir').click();
	
	$('.abrir').click(function() {
		$('.filt').show();
	});
	
	
	$('.abrir2').click(function() {
		
		if ($('.abrir2').text() == '(Abrir)') {
			$('.filt2').show( "slow" );
			$('.abrir2').text('(Cerrar)');
			$('.abrir2').removeClass('glyphicon glyphicon-plus');
			$('.abrir2').addClass('glyphicon glyphicon-minus');
		} else {
			$('.filt2').slideToggle( "slow" );
			$('.abrir2').text('(Abrir)');
			$('.abrir2').addClass('glyphicon glyphicon-plus');
			$('.abrir2').removeClass('glyphicon glyphicon-minus');

		}
	});
	
	$('.abrir2').click();
	
	$('.abrir2').click(function() {
		$('.filt2').show();
	});
	
	
	
	$('#codigobarrabuscar').keypress(function(e) {
		$('#paga').val(0);
		$('#vuelto').val(0);
		$('#vueltodesc').val(0);
		if(e.which == 13) {
			getProducto($('#codigobarrabuscar').val(), $('#cantidadbuscar').val(), 'traerProductoPorCodigoBarra');
			
		}
		setTimeout(function() {
			$(this).fadeOut(1500);
		},3000);
	});
	
	
	
	$(document).on("click",'.agregarProd', function(){
		usersid =  $(this).attr("id");
		getProducto(usersid, $('#cantidadbuscar').val(), 'traerProductoPorCodigo');
		$('.filt2').slideToggle();
		$('.abrir2').text('(Abrir)');
		$('.abrir2').addClass('glyphicon glyphicon-plus');
		$('.abrir2').removeClass('glyphicon glyphicon-minus');
		$('html, body').animate({
			scrollTop: '100px'
		},
		10);
	});
	
	$("table.table").on("click",'.varborrar', function(){
		  usersid =  $(this).attr("id");
		  
		  if (!isNaN(usersid)) {
			$("#idEliminar").val(usersid);
			$("#dialog2").dialog("open");

		  } else {
			alert("Error, vuelva a realizar la acción.");	
		  }
	});//fin del boton eliminar
	
	$("table.table").on("click",'.varmodificar', function(){
		  usersid =  $(this).attr("id");
		  
		  if (!isNaN(usersid)) {
			
			url = "modificar.php?id=" + usersid;
			$(location).attr('href',url);
		  } else {
			alert("Error, vuelva a realizar la acción.");	
		  }
	});//fin del boton modificar
	
	
	$("table.table").on("click",'.varpdf', function(){
		  usersid =  $(this).attr("id");
		  
		  if (!isNaN(usersid)) {
			
			url = "../../reportes/rptFactura.php?id=" + usersid;
			$(location).attr('href',url);
		  } else {
			alert("Error, vuelva a realizar la acción.");	
		  }
	});//fin del boton modificar
	


	 $( "#dialog2" ).dialog({
		 	
			    autoOpen: false,
			 	resizable: false,
				width:600,
				height:240,
				modal: true,
				buttons: {
				    "Eliminar": function() {
	
						$.ajax({
									data:  {id: $('#idEliminar').val(), accion: '<?php echo $eliminar; ?>'},
									url:   '../../ajax/ajax.php',
									type:  'post',
									beforeSend: function () {
											
									},
									success:  function (response) {
											url = "index.php";
											$(location).attr('href',url);
											
									}
							});
						$( this ).dialog( "close" );
						$( this ).dialog( "close" );
							$('html, body').animate({
	           					scrollTop: '1000px'
	       					},
	       					1500);
				    },
				    Cancelar: function() {
						$( this ).dialog( "close" );
				    }
				}
		 
		 
	 		}); //fin del dialogo para eliminar
			
	
	function insertarDetalleAux(idProducto, cantidad, precio, total, json) {
		var id = 0;
		$.ajax({
				data:  {refproductos: idProducto, 
						cantidad: cantidad, 
						precio: precio, 
						total: total, 
						accion: 'insertarDetallepedidoaux'},
				url:   '../../ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
						
				},
				success:  function (response) {
					setTimeout(function() {
						$("#aviso").fadeOut(1500);
					},3000);	
					
					$('#prodNombre').val(json[0].nombre);
					$('#prodPrecio').val(json[0].precioventa);
					
					$('.detalle').prepend('<tr><td align="center"><input type="checkbox" name="prod'+idProducto+'" id="prod'+idProducto+'" checked /></td><td>'+json[0].nombre+'</td><td align="center">'+cantidad+'</td><td align="right">'+json[0].precioventa+'</td><td align="right">'+monto.toFixed(2)+'</td><td class="text-center"><button type="button" class="btn btn-danger eliminarfila" id="'+response+'" style="margin-left:0px;">Eliminar</button></td></tr>');
					
					$('#cantidadbuscar').val(1);
							
					$("#aviso").show();
							
					$('#total').val(SumarTabla());
				}
		});
		
		return id;
	}
	
	function eliminarDetalleAux(idProducto) {
		$.ajax({
				data:  {id: idProducto, 
						accion: 'eliminarDetallepedidoaux'},
				url:   '../../ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
						
				},
				success:  function (response) {
					$('#total').val(SumarTabla());	
				}
		});
	}
	
	$("table.table").on("click",'.varfinalizar', function(){
		  
		  $('.finalizar').attr('id',$(this).attr("id"));
	});
	
	$('#finalizar').click(function(e) {
        $.ajax({
				data:  {id: $('.finalizar').attr("id"), 
						accion: 'finalizarPedido'},
				url:   '../../ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
						
				},
				success:  function (response) {
					url = "index.php";
					$(location).attr('href',url);	
				}
		});
    });
	
	$("#ver").click( function(){
		  
		  $.ajax({
				data:  {id: $('#codigobarrabuscar').val(), 
						accion: 'traerProductosPorId'},
				url:   '../../ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
						
				},
				success:  function (response) {
					$('.detallePedido').html(response);	
				}
		});
	});
	
	function isEmptyJSON(obj) {
	  for(var i in obj) { return false; }
	  return true;
	}
	

	function getProducto(idProd, cantidad, accion) {
		$.ajax({
					data:  {idproducto: idProd,
							accion: accion},
					url:   '../../ajax/ajax.php',
					type:  'post',
					beforeSend: function () {
						$('#agregar').hide();
						$('#agregarfila').hide();	
						$('#codigobarrabuscar').hide();
					},
					success:  function (response) {
						
						if ($.parseJSON(response).length != 0) {
							
							//idproducto,codigo,nombre,descripcion,stock,stockmin,preciocosto,precioventa,utilidad,estado,imagen,idcategoria,tipoimagen,nroserie,codigobarra
							
							json = $.parseJSON(response);
							
							monto = parseFloat(json[0].precioventa) * parseInt(cantidad);
							montoDesc = parseFloat(json[0].preciodescuento) * parseInt(cantidad);
							//var idRetornado = insertarDetalleAux(json[0].idproducto, cantidad, json[0].precioventa, monto, json);
							
							$('#prodNombre').val(json[0].nombre);
							$('#prodPrecio').val(json[0].precioventa);
							
							var agrega = 0;
							var cadAgrega = '';

							$("#tabla tbody tr").each(function (index) {
								cadAgrega = '';
								
								var cantidadNueva, subtotalNuevo, subtotalDescNuevo;
								
								if ($(this).find('td').eq(0).children("input").attr('id') == 'prod'+json[0].idproducto) {
									
									
									cantidadNueva = parseInt(cantidad) + parseInt($(this).find('td').eq(2).children("input").val());
									subtotalNuevo = parseFloat(monto) + parseFloat($(this).find('td').eq(4).text());
									
									subtotalDescNuevo = parseFloat(json[0].preciodescuento) * cantidadNueva;
									
									
									$(this).remove();
									
									cadAgrega = '<tr><td align="center"><input type="checkbox" name="prod'+json[0].idproducto+'" id="prod'+json[0].idproducto+'" checked  onclick="this.checked=!this.checked"/></td><td><input type="text" name="nombre'+json[0].idproducto+'" id="nombre'+json[0].idproducto+'" value="'+json[0].nombre+'" readonly style="background-color:transparent; border:none;cursor:default;text-align: center;" /></td><td align="center"><input type="text" name="cant'+json[0].idproducto+'" id="cant'+json[0].idproducto+'" value="'+cantidadNueva+'" readonly style="background-color:transparent; border:none;cursor:default;text-align: center;" /></td><td align="right"><input type="text" name="precio'+json[0].idproducto+'" id="precio'+json[0].idproducto+'" value="'+json[0].precioventa+'" readonly style="background-color:transparent; border:none;cursor:default;text-align: right; width:70px;" /></td><td align="right">'+subtotalNuevo.toFixed(2)+'</td></td><td align="right"><input type="text" name="preciodescuento'+json[0].idproducto+'" id="preciodescuento'+json[0].idproducto+'" value="'+json[0].preciodescuento+'" readonly style="background-color:transparent; border:none;cursor:default;text-align: right; width:70px;" /></td><td align="right">'+subtotalDescNuevo.toFixed(2)+'</td><td class="text-center"><button type="button" class="btn btn-danger eliminarfila" id="'+json[0].idproducto+'" style="margin-left:0px;">Eliminar</button></td></tr>';
									
									return false;
								} else {
									
									
									if (cantidad >= 0) {
										montoDesc			= json[0].preciodescuento;
										subtotalDescNuevo	= json[0].preciodescuento * cantidad;
									} else {
										montoDesc			= json[0].precioventa;
										subtotalDescNuevo	= monto;
									}
									
									cadAgrega = '<tr id="'+json[0].idproducto+'"><td align="center"><input type="checkbox" name="prod'+json[0].idproducto+'" id="prod'+json[0].idproducto+'" checked  onclick="this.checked=!this.checked"/></td><td><input type="text" name="nombre'+json[0].idproducto+'" id="nombre'+json[0].idproducto+'" value="'+json[0].nombre+'" readonly style="background-color:transparent; border:none;cursor:default;text-align: center;" /></td><td align="center"><input type="text" name="cant'+json[0].idproducto+'" id="cant'+json[0].idproducto+'" value="'+cantidad+'" readonly style="background-color:transparent; border:none;cursor:default;text-align: center;" /></td><td align="right"><input type="text" name="precio'+json[0].idproducto+'" id="precio'+json[0].idproducto+'" value="'+json[0].precioventa+'" readonly style="background-color:transparent; border:none;cursor:default;text-align: right; width:70px;" /></td><td align="right">'+monto.toFixed(2)+'</td></td><td align="right"><input type="text" name="preciodescuento'+json[0].idproducto+'" id="preciodescuento'+json[0].idproducto+'" value="'+montoDesc+'" readonly style="background-color:transparent; border:none;cursor:default;text-align: right; width:70px;" /></td><td align="right">'+subtotalDescNuevo.toFixed(2)+'</td><td class="text-center"><button type="button" class="btn btn-danger eliminarfila" id="'+json[0].idproducto+'" style="margin-left:0px;">Eliminar</button></td></tr>';
									
								}
								
								
								
							});
					
							
							$('.detalle').prepend(cadAgrega);
							
							
							$('#codigobarrabuscar').show();	
							$('#codigobarrabuscar').val('');
							$('#codigobarrabuscar').focus();
							
							$('#cantidadbuscar').val(1);
									
							$("#aviso").show();
								
							$('#total').val(SumarTabla());
						} else {
							//var producto = ['', 0];
							$('#prodNombre').val('');
							$('#prodPrecio').val(0);
							alert('No se encontro el producto con el codigo de barras: ' + idProd);
							$('#codigobarrabuscar').show();	
							$('#codigobarrabuscar').val('');
							$('#codigobarrabuscar').focus();
							
						}

						$('#agregar').show();
						$('#agregarfila').show();
						
					},
					//si ha ocurrido un error
					error: function(){
						
						$(".alert").html('<strong>Error!</strong> Actualice la pagina');
						$("#load").html('');
						
					}
			});	
	}
	
	
	$('.agregarfila').click(function(e) {
		id =  $(this).attr("id");
		//getProducto(id);
		var cantidad = 1;
		$('.detallefaltante tr').each(function(){
			
			if ($(this).find('td').eq(0).text() == id) {
				cantidad = $(this).find('td').eq(2).text();	
			}
			//suma += parseFloat($(this).find('td').eq(4).text()||0,10); //numero de la celda 3
		});
		
		getProducto(id, cantidad);
		
	});
	
	
	function SumarTabla() {
		var suma = 0;
		var sumadesc = 0;
		$('.detalle tr').each(function(){
			
			suma += parseFloat($(this).find('td').eq(4).text()||0,10); //numero de la celda 3
			sumadesc += parseFloat($(this).find('td').eq(6).text()||0,10); //numero de la celda 5
		})
		
		$('#totaldescuento').val((parseFloat(suma) - parseFloat($('#descuento').val())).toFixed(2));
		$('#totaldescdescuento').val((parseFloat(sumadesc) - parseFloat($('#descuento').val())).toFixed(2));
		$('#totaldesc').val((parseFloat(sumadesc)).toFixed(2));
		return suma.toFixed(2);

	  }
	  
	  $('#descuento').change(function() {
		  if ($(this).val() == '') {
			  $(this).val('0');
		  }
		  $('#totaldescuento').val((parseFloat(SumarTabla()) - parseFloat($('#descuento').val())).toFixed(2));
	  });
	  
	//elimina una fila
	  $(document).on("click",".eliminarfila",function(){
		var padre = $(this).parents().get(1);

		$(padre).remove();
		
		$('#total').val(SumarTabla());
		
	  });
	  
	//al enviar el formulario
    $('#cargarP').click(function(){
		$('#accion').val('insertarVentas');
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

					if (!isNaN(data)) {
						$(".alert").removeClass("alert-danger");
						$(".alert").removeClass("alert-info");
						$(".alert").addClass("alert-success");
						$(".alert").html('<strong>Ok!</strong> Se cargo exitosamente la <strong><?php echo $singular; ?></strong>. ');

						$("#load").html('');
						url = "index.php";
						$(location).attr('href',url);
						
						
					} else {
						$(".alert").removeClass("alert-danger");
						$(".alert").addClass("alert-danger");
						$(".alert").html('<strong>Error!</strong> '+data);
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
	
	
	//al enviar el formulario
    $('#cargarPD').click(function(){
		
		$('#accion').val('insertarVentasPrecioDescuento');
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

					if (!isNaN(data)) {
						$(".alert").removeClass("alert-danger");
						$(".alert").removeClass("alert-info");
						$(".alert").addClass("alert-success");
						$(".alert").html('<strong>Ok!</strong> Se cargo exitosamente la <strong><?php echo $singular; ?></strong>. ');

						$("#load").html('');
						url = "index.php";
						$(location).attr('href',url);
						
						
					} else {
						$(".alert").removeClass("alert-danger");
						$(".alert").addClass("alert-danger");
						$(".alert").html('<strong>Error!</strong> '+data);
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
    
	$('#codigobarrabuscar').focus();

});
</script>
<script type="text/javascript">
$('.form_date').datetimepicker({
	language:  'es',
	weekStart: 1,
	todayBtn:  1,
	autoclose: 1,
	todayHighlight: 1,
	startView: 2,
	minView: 2,
	forceParse: 0,
	format: 'dd/mm/yyyy'
});
</script>

<?php } ?>

</body>
</html>
