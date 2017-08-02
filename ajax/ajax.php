<?php

include ('../includes/funcionesUsuarios.php');
include ('../includes/funciones.php');
include ('../includes/funcionesHTML.php');
include ('../includes/funcionesReferencias.php');


$serviciosUsuarios  		= new ServiciosUsuarios();
$serviciosFunciones 		= new Servicios();
$serviciosHTML				= new ServiciosHTML();
$serviciosReferencias		= new ServiciosReferencias();


$accion = $_POST['accion'];


switch ($accion) {
    case 'login':
        enviarMail($serviciosUsuarios);
        break;
	case 'entrar':
		entrar($serviciosUsuarios);
		break;
	case 'insertarUsuario':
        insertarUsuario($serviciosUsuarios);
        break;
	case 'modificarUsuario':
        modificarUsuario($serviciosUsuarios);
        break;
	case 'registrar':
		registrar($serviciosUsuarios);
        break;

case 'insertarConfiguracion':
insertarConfiguracion($serviciosReferencias);
break;
case 'modificarConfiguracion':
modificarConfiguracion($serviciosReferencias);
break;
case 'eliminarConfiguracion':
eliminarConfiguracion($serviciosReferencias);
break; 

case 'insertarCajadiaria':
insertarCajadiaria($serviciosReferencias);
break;
case 'modificarCajadiaria':
modificarCajadiaria($serviciosReferencias);
break;
case 'eliminarCajadiaria':
eliminarCajadiaria($serviciosReferencias);
break; 
case 'traerCajadiariaPorFecha':
traerCajadiariaPorFecha($serviciosReferencias);
break;

case 'insertarClientes': 
insertarClientes($serviciosReferencias); 
break; 
case 'modificarClientes': 
modificarClientes($serviciosReferencias); 
break; 
case 'eliminarClientes': 
eliminarClientes($serviciosReferencias); 
break; 

case 'insertarLibros':
insertarLibros($serviciosReferencias);
break;
case 'modificarLibros':
modificarLibros($serviciosReferencias);
break;
case 'eliminarLibros':
eliminarLibros($serviciosReferencias);
break; 

case 'traerPagosPorCliente':
	traerPagosPorCliente($serviciosReferencias);
	break;
case 'traerVentasPorCliente':
	traerVentasPorCliente($serviciosReferencias);
	break;
case 'traerVentasPorClienteACuenta':
	traerVentasPorClienteACuenta($serviciosReferencias);
	break;
case 'traerDetallePagosPorCliente':
	traerDetallePagosPorCliente($serviciosReferencias);
	break;


case 'insertarCompras': 
insertarCompras($serviciosReferencias); 
break; 
case 'modificarCompras': 
modificarCompras($serviciosReferencias); 
break; 
case 'eliminarCompras': 
eliminarCompras($serviciosReferencias); 
break; 
case 'insertarEmpleados': 
insertarEmpleados($serviciosReferencias); 
break; 
case 'modificarEmpleados': 
modificarEmpleados($serviciosReferencias); 
break; 
case 'eliminarEmpleados': 
eliminarEmpleados($serviciosReferencias); 
break; 
case 'insertarProductos': 
insertarProductos($serviciosReferencias); 
break; 
case 'modificarProductos': 
modificarProductos($serviciosReferencias); 
break; 
case 'eliminarProductos': 
eliminarProductos($serviciosReferencias); 
break;

case 'buscarProductos':
		buscarProductos($serviciosReferencias);
		break;
case 'eliminarMasivo':
	borrarMasivo($serviciosReferencias);
	break;

	
case 'eliminarFoto':
	eliminarFoto($serviciosReferencias);
	break;
	
case 'eliminarLibro':
	eliminarLibro($serviciosReferencias);
	break;
	
case 'traerProductoPorCodigo':
	traerProductoPorCodigo($serviciosReferencias);
	break;
case 'traerProductoPorCodigoBarra':
	traerProductoPorCodigoBarra($serviciosReferencias);
	break;
case 'traerProductosPorId':
	traerProductosPorId($serviciosReferencias);
	break;
	
case 'modificarprecios':
	modificarprecios($serviciosReferencias);
	break;
			
case 'insertarProveedores': 
insertarProveedores($serviciosReferencias); 
break; 
case 'modificarProveedores': 
modificarProveedores($serviciosReferencias); 
break; 
case 'eliminarProveedores': 
eliminarProveedores($serviciosReferencias); 
break; 
case 'insertarUsuarios': 
insertarUsuarios($serviciosReferencias); 
break; 
case 'modificarUsuarios': 
modificarUsuarios($serviciosReferencias); 
break; 
case 'eliminarUsuarios': 
eliminarUsuarios($serviciosReferencias); 
break; 
case 'insertarDetallecompra': 
insertarDetallecompra($serviciosReferencias); 
break; 
case 'modificarDetallecompra': 
modificarDetallecompra($serviciosReferencias); 
break; 
case 'eliminarDetallecompra': 
eliminarDetallecompra($serviciosReferencias); 
break; 
case 'insertarDetallepedido': 
insertarDetallepedido($serviciosReferencias); 
break; 
case 'modificarDetallepedido': 
modificarDetallepedido($serviciosReferencias); 
break; 
case 'eliminarDetallepedido': 
eliminarDetallepedido($serviciosReferencias); 
break; 

case 'traerDetallepedidoPorPedido':
	traerDetallepedidoPorPedido($serviciosReferencias);
	break;

case 'insertarDetallepedidoaux':
insertarDetallepedidoaux($serviciosReferencias);
break;
case 'modificarDetallepedidoaux':
modificarDetallepedidoaux($serviciosReferencias);
break;
case 'eliminarDetallepedidoaux':
eliminarDetallepedidoaux($serviciosReferencias);
break; 

case 'insertarDetalleventa': 
insertarDetalleventa($serviciosReferencias); 
break; 
case 'modificarDetalleventa': 
modificarDetalleventa($serviciosReferencias); 
break; 
case 'eliminarDetalleventa': 
eliminarDetalleventa($serviciosReferencias); 
break; 
case 'insertarPedidos':
insertarPedidos($serviciosReferencias);
break;
case 'modificarPedidos':
modificarPedidos($serviciosReferencias);
break;
case 'eliminarPedidos':
eliminarPedidos($serviciosReferencias);
break;

case 'finalizarPedido':
	finalizarPedido($serviciosReferencias);
	break;
 
case 'insertarPredio_menu': 
insertarPredio_menu($serviciosReferencias); 
break; 
case 'modificarPredio_menu': 
modificarPredio_menu($serviciosReferencias); 
break; 
case 'eliminarPredio_menu': 
eliminarPredio_menu($serviciosReferencias); 
break; 
case 'insertarCategorias': 
insertarCategorias($serviciosReferencias); 
break; 
case 'modificarCategorias': 
modificarCategorias($serviciosReferencias); 
break; 
case 'eliminarCategorias': 
eliminarCategorias($serviciosReferencias); 
break; 

case 'borrarMasivoCategorias':
	borrarMasivoCategorias($serviciosReferencias);
	break;

case 'insertarEstados': 
insertarEstados($serviciosReferencias); 
break; 
case 'modificarEstados': 
modificarEstados($serviciosReferencias); 
break; 
case 'eliminarEstados': 
eliminarEstados($serviciosReferencias); 
break; 
case 'insertarRoles': 
insertarRoles($serviciosReferencias); 
break; 
case 'modificarRoles': 
modificarRoles($serviciosReferencias); 
break; 
case 'eliminarRoles': 
eliminarRoles($serviciosReferencias); 
break; 
case 'insertarTipopago': 
insertarTipopago($serviciosReferencias); 
break; 
case 'modificarTipopago': 
modificarTipopago($serviciosReferencias); 
break; 
case 'eliminarTipopago': 
eliminarTipopago($serviciosReferencias); 
break; 
case 'insertarVenta': 
insertarVenta($serviciosReferencias); 
break; 
case 'modificarVenta': 
modificarVenta($serviciosReferencias); 
break; 
case 'eliminarVenta': 
eliminarVenta($serviciosReferencias); 
break; 

case 'insertarVentas':
insertarVentas($serviciosReferencias);
break;
case 'insertarVentasPrecioDescuento':
insertarVentasPrecioDescuento($serviciosReferencias);
break;
case 'insertarVentasAux':
	insertarVentasAux($serviciosReferencias);
	break;
case 'modificarVentas':
modificarVentas($serviciosReferencias);
break;
case 'eliminarVentas':
eliminarVentas($serviciosReferencias);
break; 

case 'traerDetalleVentaPorCliente':
	traerDetalleVentaPorCliente($serviciosReferencias);
	break;

case 'insertarPagos':
insertarPagos($serviciosReferencias);
break;
case 'modificarPagos':
modificarPagos($serviciosReferencias);
break;
case 'eliminarPagos':
eliminarPagos($serviciosReferencias);
break; 


case 'insertarAdministrativo': 
insertarAdministrativo($serviciosReferencias); 
break; 
case 'modificarAdministrativo': 
modificarAdministrativo($serviciosReferencias); 
break; 
case 'eliminarAdministrativo': 
eliminarAdministrativo($serviciosReferencias); 
break; 
case 'insertarPromodetalle': 
insertarPromodetalle($serviciosReferencias); 
break; 
case 'modificarPromodetalle': 
modificarPromodetalle($serviciosReferencias); 
break; 
case 'eliminarPromodetalle': 
eliminarPromodetalle($serviciosReferencias); 
break; 
case 'insertarPromos': 
insertarPromos($serviciosReferencias); 
break; 
case 'modificarPromos': 
modificarPromos($serviciosReferencias); 
break; 
case 'eliminarPromos': 
eliminarPromos($serviciosReferencias); 
break; 

/*****************			ESTADISTICAS           *****************************/
case 'traerVentasPorAno':
	traerVentasPorAno($serviciosReferencias);
	break;
case 'graficosProductosConsumo':
	graficosProductosConsumo($serviciosReferencias);
	break;


/*****************			FIN						****************************/

}

/* Fin */
/* nuevo */


function insertarAdministrativo($serviciosReferencias) { 
$importesueldos = $_POST['importesueldos']; 
$importegastosvarios = $_POST['importegastosvarios']; 
$importemercaderia = $_POST['importemercaderia']; 
$importegas = $_POST['importegas']; 
$importeluz = $_POST['importeluz']; 
$importetelefono = $_POST['importetelefono']; 
$importeagua = $_POST['importeagua']; 
$importeinmobiliario = $_POST['importeinmobiliario']; 
$importeimpuestos = $_POST['importeimpuestos']; 
$importeautonomos = $_POST['importeautonomos']; 
$importeingresosbrutos = $_POST['importeingresosbrutos']; 
$importeaportes = $_POST['importeaportes']; 
$importesmunicipal = $_POST['importesmunicipal']; 
$importefiestas = $_POST['importefiestas']; 
$anio = $_POST['anio']; 
$mes = $_POST['mes']; 
$res = $serviciosReferencias->insertarAdministrativo($importesueldos,$importegastosvarios,$importemercaderia,$importegas,$importeluz,$importetelefono,$importeagua,$importeinmobiliario,$importeimpuestos,$importeautonomos,$importeingresosbrutos,$importeaportes,$importesmunicipal,$importefiestas,$anio,$mes); 
	
	if ((integer)$res > 0) { 
		echo ''; 
	} else { 
		echo $res;	 
	} 
} 
function modificarAdministrativo($serviciosReferencias) { 
$id = $_POST['id']; 
$importesueldos = $_POST['importesueldos']; 
$importegastosvarios = $_POST['importegastosvarios']; 
$importemercaderia = $_POST['importemercaderia']; 
$importegas = $_POST['importegas']; 
$importeluz = $_POST['importeluz']; 
$importetelefono = $_POST['importetelefono']; 
$importeagua = $_POST['importeagua']; 
$importeinmobiliario = $_POST['importeinmobiliario']; 
$importeimpuestos = $_POST['importeimpuestos']; 
$importeautonomos = $_POST['importeautonomos']; 
$importeingresosbrutos = $_POST['importeingresosbrutos']; 
$importeaportes = $_POST['importeaportes']; 
$importesmunicipal = $_POST['importesmunicipal']; 
$importefiestas = $_POST['importefiestas']; 
$anio = $_POST['anio']; 
$mes = $_POST['mes']; 
$res = $serviciosReferencias->modificarAdministrativo($id,$importesueldos,$importegastosvarios,$importemercaderia,$importegas,$importeluz,$importetelefono,$importeagua,$importeinmobiliario,$importeimpuestos,$importeautonomos,$importeingresosbrutos,$importeaportes,$importesmunicipal,$importefiestas,$anio,$mes); 
if ($res == true) { 
echo ''; 
} else { 
echo 'Huvo un error al modificar datos'; 
} 
} 
function eliminarAdministrativo($serviciosReferencias) { 
$id = $_POST['id']; 
$res = $serviciosReferencias->eliminarAdministrativo($id); 
echo $res; 
} 



function insertarPromodetalle($serviciosReferencias) { 
$refpromos = $_POST['refpromos']; 
$refproductos = $_POST['refproductos']; 
$cantidad = $_POST['cantidad']; 
$res = $serviciosReferencias->insertarPromodetalle($refpromos,$refproductos,$cantidad); 
if ((integer)$res > 0) { 
echo ''; 
} else { 
echo 'Huvo un error al insertar datos';	 
} 
} 
function modificarPromodetalle($serviciosReferencias) { 
$id = $_POST['id']; 
$refpromos = $_POST['refpromos']; 
$refproductos = $_POST['refproductos']; 
$cantidad = $_POST['cantidad']; 
$res = $serviciosReferencias->modificarPromodetalle($id,$refpromos,$refproductos,$cantidad); 
if ($res == true) { 
echo ''; 
} else { 
echo 'Huvo un error al modificar datos'; 
} 
} 
function eliminarPromodetalle($serviciosReferencias) { 
$id = $_POST['id']; 
$res = $serviciosReferencias->eliminarPromodetalle($id); 
echo $res; 
} 
function insertarPromos($serviciosReferencias) { 
$nombre = $_POST['nombre']; 
$descripcion = $_POST['descripcion']; 
$vigenciadesde = $_POST['vigenciadesde']; 
$vigenciahasta = $_POST['vigenciahasta']; 
$descuento = $_POST['descuento']; 
$res = $serviciosReferencias->insertarPromos($nombre,$descripcion,$vigenciadesde,$vigenciahasta,$descuento); 
if ((integer)$res > 0) { 
echo ''; 
} else { 
echo 'Huvo un error al insertar datos';	 
} 
} 
function modificarPromos($serviciosReferencias) { 
$id = $_POST['id']; 
$nombre = $_POST['nombre']; 
$descripcion = $_POST['descripcion']; 
$vigenciadesde = $_POST['vigenciadesde']; 
$vigenciahasta = $_POST['vigenciahasta']; 
$descuento = $_POST['descuento']; 
$res = $serviciosReferencias->modificarPromos($id,$nombre,$descripcion,$vigenciadesde,$vigenciahasta,$descuento); 
if ($res == true) { 
echo ''; 
} else { 
echo 'Huvo un error al modificar datos'; 
} 
} 
function eliminarPromos($serviciosReferencias) { 
$id = $_POST['id']; 
$res = $serviciosReferencias->eliminarPromos($id); 
echo $res; 
}  


/* fin de lo nuevo */
/* PARA Venta */

function traerProductosPorId($serviciosReferencias) {
	$id	=	$_POST['id'];
	$res	=	$serviciosReferencias->traerProductoPorCodigoBarra($id);
	
	$cad3 = '';
	//////////////////////////////////////////////////////busquedajugadores/////////////////////
	$cad3 = $cad3.'
				<div class="col-md-12">
				<div class="panel panel-info">
                                <div class="panel-heading">
                                	<h3 class="panel-title">Resultado de la Busqueda</h3>
                                	
                                </div>
                                <div class="panel-body-predio" style="padding:5px 20px;">
                                	';
	$cad3 = $cad3.'
	<div class="row">
                	<table id="example" class="table table-responsive table-striped" style="font-size:0.8em; padding:2px;">
						<thead>
                        <tr>
                        	<th align="left">Producto</th>
							<th align="left">Codigo Barra</th>
                            <th align="left">Precio</th>
                            <th align="center">Stock</th>
                        </tr>
						</thead>
						<tbody id="resultadosProd">';
	while ($rowJ = mysql_fetch_array($res)) {
		$cad3 .= '<tr>
					<td>'.utf8_encode($rowJ['nombre']).'</td>
					<td>'.($rowJ['codigobarra']).'</td>
					<td>'.$rowJ['precioventa'].'</td>
					<td>'.($rowJ['stock']).'</td>
				 </tr>';
	}
	
	$cad3 = $cad3.'</tbody>
                                </table></div>
                            </div>
						</div>';
						
	echo $cad3;
}

function insertarVentas($serviciosReferencias) {
	$reftipopago = $_POST['reftipopago'];
	$numero = $serviciosReferencias->generarNroVenta();
	$fecha = date('Y-m-d');
	$total = $_POST['totaldescuento'];
	$usuario = $_POST['usuario'];
	$descuento = $_POST['descuento'];

	$cancelado = 0;
	
	//$aux	=	$_POST['aux'];
	
	$refclientes = $_POST['refclientes'];
	
	$res = $serviciosReferencias->insertarVentas($reftipopago,$numero,$fecha,$total,$usuario,$cancelado,$refclientes,$descuento);
	
	$numero = count($_POST);
	$tags = array_keys($_POST);// obtiene los nombres de las varibles
	$valores = array_values($_POST);// obtiene los valores de las varibles
	$cantEncontrados = 0;
	$cantidad = 1;
	$idProducto = 0;
	
	if ((integer)$res > 0) {
		
		for($i=0;$i<$numero;$i++){
			if (strpos($tags[$i],"prod") !== false) {
				if (isset($valores[$i])) {
					$idProducto = str_replace("prod","",$tags[$i]);
					$cantidad	= $_POST['cant'.$idProducto];
					$precio		= $_POST['precio'.$idProducto];
					$nombre		= $_POST['nombre'.$idProducto];
					$total		= $cantidad * $precio;
					$nombreProducto = $serviciosReferencias->descontarStock($idProducto, $cantidad);
					$serviciosReferencias->insertarDetalleventas($res,$idProducto,$cantidad,0,$precio,$total,$nombreProducto);
					
				}
			}
		}
		
		//$serviciosReferencias->eliminarDetallepreventasPorVenta($aux);
		//$serviciosReferencias->eliminarVentasaux($aux);
		echo '';
	} else {
		echo 'Huvo un error al insertar datos';
	}
}



function insertarVentasPrecioDescuento($serviciosReferencias) {
	$reftipopago = $_POST['reftipopago'];
	$numero = $serviciosReferencias->generarNroVenta();
	$fecha = date('Y-m-d');
	$total = $_POST['totaldescdescuento'];
	$usuario = $_POST['usuario'];
	$descuento = $_POST['descuento'];

	$cancelado = 0;
	
	//$aux	=	$_POST['aux'];
	
	$refclientes = $_POST['refclientes'];
	
	$res = $serviciosReferencias->insertarVentas($reftipopago,$numero,$fecha,$total,$usuario,$cancelado,$refclientes,$descuento);
	
	$numero = count($_POST);
	$tags = array_keys($_POST);// obtiene los nombres de las varibles
	$valores = array_values($_POST);// obtiene los valores de las varibles
	$cantEncontrados = 0;
	$cantidad = 1;
	$idProducto = 0;
	
	if ((integer)$res > 0) {
		
		for($i=0;$i<$numero;$i++){
			if (strpos($tags[$i],"prod") !== false) {
				if (isset($valores[$i])) {
					$idProducto = str_replace("prod","",$tags[$i]);
					$cantidad	= $_POST['cant'.$idProducto];
					$precio		= $_POST['preciodescuento'.$idProducto];
					$nombre		= $_POST['nombre'.$idProducto];
					$total		= $cantidad * $precio;
					$nombreProducto = $serviciosReferencias->descontarStock($idProducto, $cantidad);
					$serviciosReferencias->insertarDetalleventas($res,$idProducto,$cantidad,0,$precio,$total,$nombreProducto);
					
				}
			}
		}
		
		//$serviciosReferencias->eliminarDetallepreventasPorVenta($aux);
		//$serviciosReferencias->eliminarVentasaux($aux);
		echo '';
	} else {
		echo 'Huvo un error al insertar datos';
	}
}



function insertarVentasAux($serviciosReferencias) {
	$reftipopago = $_POST['reftipopago'];
	$numero = $serviciosReferencias->generarNroVenta();
	$fecha = date('Y-m-d');
	$total = $_POST['total'];
	$usuario = $_POST['usuario'];
	$descuento = $_POST['descuento'];

	$cancelado = 0;

	$refclientes = $_POST['refclientes'];
	
	$res = $serviciosReferencias->insertarVentasaux($reftipopago,$numero,$fecha,$total,$usuario,$cancelado,$refclientes,$descuento);
	
	$numero = count($_POST);
	$tags = array_keys($_POST);// obtiene los nombres de las varibles
	$valores = array_values($_POST);// obtiene los valores de las varibles
	$cantEncontrados = 0;
	$cantidad = 1;
	$idProducto = 0;
	
	if ((integer)$res > 0) {
		
		for($i=0;$i<$numero;$i++){
			if (strpos($tags[$i],"prod") !== false) {
				if (isset($valores[$i])) {
					$idProducto = str_replace("prod","",$tags[$i]);
					$cantidad	= $_POST['cant'.$idProducto];
					$precio		= $_POST['precio'.$idProducto];
					$nombre		= $_POST['nombre'.$idProducto];
					$total		= $cantidad * $precio;
					//$nombreProducto = $serviciosReferencias->descontarStock($idProducto, $cantidad);
					$serviciosReferencias->insertarDetallepreventas($res,$idProducto,$cantidad,0,$precio,$total,$nombre);
					
				}
			}
		}
		
		echo $res;
	} else {
		echo 'Huvo un error al insertar datos';
	}
}

function modificarVentas($serviciosReferencias) {
	$id = $_POST['id'];
	$reftipopago = $_POST['reftipopago'];
	$numero = $_POST['numero'];
	$fecha = $_POST['fecha'];
	$total = $_POST['total'];
	$usuario = $_POST['usuario'];
	if (isset($_POST['cancelado'])) {
	$cancelado = 1;
	} else {
	$cancelado = 0;
	}
	$refclientes = $_POST['refclientes'];

	$res = $serviciosReferencias->modificarVentas($id,$reftipopago,$numero,$fecha,$total,$usuario,$cancelado,$refclientes);
	if ($res == true) {
		echo '';
	} else {
		echo 'Huvo un error al modificar datos';
	}
}


function eliminarVentas($serviciosReferencias) {
	$id = $_POST['id'];
	$res = $serviciosReferencias->eliminarVentas($id);
	echo $res;
}


function traerDetalleVentaPorCliente($serviciosReferencias) {
	$id	=	$_POST['id'];
	$res	=	$serviciosReferencias->traerDetalleventasPorVenta($id);
	
	$total = 0;
	$cad3 = '';
	//////////////////////////////////////////////////////busquedajugadores/////////////////////
	$cad3 = $cad3.'
				<div class="col-md-12">
				<div class="panel panel-info">
                                <div class="panel-heading">
                                	<h3 class="panel-title">Resultado de la Busqueda</h3>
                                	
                                </div>
                                <div class="panel-body-predio" style="padding:5px 20px;">
                                	';
	$cad3 = $cad3.'
	<div class="row">
                	<table id="example" class="table table-responsive table-striped" style="padding:2px;">
						<thead>
                        <tr>
                        	<th align="left">Producto</th>
							<th align="left">Cantidad</th>
                            <th align="left">Precio</th>
                            <th align="center">SubTotal</th>
                        </tr>
						</thead>
						<tbody id="resultadosProd">';
	while ($rowJ = mysql_fetch_array($res)) {
		$total += $rowJ['total'];
		$cad3 .= '<tr>
					<td>'.utf8_encode($rowJ['producto']).'</td>
					<td>'.($rowJ['cantidad']).'</td>
					<td>'.$rowJ['precio'].'</td>
					<td>'.($rowJ['total']).'</td>
				 </tr>';
	}
	
	$cad3 = $cad3.'</tbody>
				   <tfoot>
				   	  <td colspan="3">Total: </td>
					  <td>$ '.$total.'</td>
				   </tfoot>
                                </table></div>
                            </div>
						</div>';
						
	echo $cad3;
}





function insertarClientes($serviciosReferencias) { 
$nombrecompleto = $_POST['nombrecompleto']; 
$cuil = $_POST['cuil']; 
$dni = $_POST['dni']; 
$direccion = $_POST['direccion']; 
$telefono = $_POST['telefono']; 
$email = $_POST['email']; 
$observaciones = $_POST['observaciones']; 
$res = $serviciosReferencias->insertarClientes($nombrecompleto,$cuil,$dni,$direccion,$telefono,$email,$observaciones); 
if ((integer)$res > 0) { 
echo ''; 
} else { 
echo 'Huvo un error al insertar datos';	
} 
} 
function modificarClientes($serviciosReferencias) { 
$id = $_POST['id']; 
$nombrecompleto = $_POST['nombrecompleto']; 
$cuil = $_POST['cuil']; 
$dni = $_POST['dni']; 
$direccion = $_POST['direccion']; 
$telefono = $_POST['telefono']; 
$email = $_POST['email']; 
$observaciones = $_POST['observaciones']; 
$res = $serviciosReferencias->modificarClientes($id,$nombrecompleto,$cuil,$dni,$direccion,$telefono,$email,$observaciones); 
if ($res == true) { 
echo ''; 
} else { 
echo 'Huvo un error al modificar datos'; 
} 
} 
function eliminarClientes($serviciosReferencias) { 
$id = $_POST['id']; 
$res = $serviciosReferencias->eliminarClientes($id); 
echo $res; 
}

function traerPagosPorCliente($serviciosReferencias) {
	$id = $_POST['id'];
	
	$res = $serviciosReferencias->traerPagosPorCliente($id);
	
	echo $res;
	
}

function traerVentasPorCliente($serviciosReferencias) {
	$id = $_POST['id'];
	
	$res = $serviciosReferencias->traerVentasPorClientes($id);
	
	$cad3 = '';
	//////////////////////////////////////////////////////busquedajugadores/////////////////////
	$cad3 = $cad3.'
				<div class="col-md-12">
				<div class="panel panel-info">
                                <div class="panel-heading">
                                	<h3 class="panel-title">Resultado de la Busqueda</h3>
                                	
                                </div>
                                <div class="panel-body-predio" style="padding:5px 20px;">
                                	';
	$cad3 = $cad3.'
	<div class="row">
                	<table id="example" class="table table-responsive table-striped" style=" padding:2px;">
						<thead>
                        <tr>
                        	<th align="left">NºFactura</th>
							<th align="left">Fecha</th>
                            <th align="left">Total</th>
							<th align="center">Detalle</th>
							<th align="center">Factura</th>
                        </tr>
						</thead>
						<tbody id="resultadosProd">';
	while ($rowJ = mysql_fetch_array($res)) {
		$cad3 .= '<tr>
					<td>'.utf8_encode($rowJ['numero']).'</td>
					<td>'.($rowJ['fecha']).'</td>
					<td>'.$rowJ['total'].'</td>
					<td><img src="../imagenes/verIco.png" style="cursor:pointer;" id="'.$rowJ[0].'" data-toggle="modal" data-target="#myModal" class="varVerDetalle"></td>
					<td><img src="../imagenes/pdf.png" style="cursor:pointer;" id="'.$rowJ[0].'" class="varGenerarFactura"></td>
				 </tr>';
	}
	
	$cad3 = $cad3.'</tbody>
                                </table></div>
                            </div>
						</div>';
						
	echo $cad3;
}


function traerVentasPorClienteACuenta($serviciosReferencias) {
	$id = $_POST['id'];
	
	$res = $serviciosReferencias->traerVentasPorClientesACuenta($id);
	
	$cad3 = '';
	//////////////////////////////////////////////////////busquedajugadores/////////////////////
	$cad3 = $cad3.'
				<div class="col-md-12">
				<div class="panel panel-info">
                                <div class="panel-heading">
                                	<h3 class="panel-title">Resultado de la Busqueda</h3>
                                	
                                </div>
                                <div class="panel-body-predio" style="padding:5px 20px;">
                                	';
	$cad3 = $cad3.'
	<div class="row">
                	<table id="example" class="table table-responsive table-striped" style=" padding:2px;">
						<thead>
                        <tr>
                        	<th align="left">NºFactura</th>
							<th align="left">Fecha</th>
                            <th align="left">Total</th>
							<th align="center">Detalle</th>
							<th align="center">Factura</th>
                        </tr>
						</thead>
						<tbody id="resultadosProd">';
	while ($rowJ = mysql_fetch_array($res)) {
		$cad3 .= '<tr>
					<td>'.utf8_encode($rowJ['numero']).'</td>
					<td>'.($rowJ['fecha']).'</td>
					<td>'.$rowJ['total'].'</td>
					<td><img src="../imagenes/verIco.png" style="cursor:pointer;" id="'.$rowJ[0].'" data-toggle="modal" data-target="#myModal" class="varVerDetalle"></td>
					<td><img src="../imagenes/pdf.png" style="cursor:pointer;" id="'.$rowJ[0].'" class="varGenerarFactura"></td>
				 </tr>';
	}
	
	$cad3 = $cad3.'</tbody>
                                </table></div>
                            </div>
						</div>';
						
	echo $cad3;
}



function traerDetallePagosPorCliente($serviciosReferencias) {
	$id = $_POST['id'];
	
	$res = $serviciosReferencias->traerDetallePagosPorCliente($id);
	
	$cad3 = '';
	//////////////////////////////////////////////////////busquedajugadores/////////////////////
	$cad3 = $cad3.'
				<div class="col-md-12">
				<div class="panel panel-info">
                                <div class="panel-heading">
                                	<h3 class="panel-title">Resultado de la Busqueda</h3>
                                	
                                </div>
                                <div class="panel-body-predio" style="padding:5px 20px;">
                                	';
	$cad3 = $cad3.'
	<div class="row">
                	<table id="example" class="table table-responsive table-striped" style=" padding:2px;">
						<thead>
                        <tr>
                        	<th align="left">Fecha Pago</th>
							<th align="left">Pago</th>
                            <th align="left">Observaciones</th>
                        </tr>
						</thead>
						<tbody id="resultadosProd">';
	while ($rowJ = mysql_fetch_array($res)) {
		$cad3 .= '<tr>
					<td>'.$rowJ['fechapago'].'</td>
					<td>'.$rowJ['pago'].'</td>
					<td>'.utf8_encode($rowJ['observaciones']).'</td>
				 </tr>';
	}
	
	$cad3 = $cad3.'</tbody>
                                </table></div>
                            </div>
						</div>';
						
	echo $cad3;
}


 
function insertarCompras($serviciosReferencias) { 
$reftipopago = $_POST['reftipopago']; 
$refproveedores = $_POST['refproveedores']; 
$refempleados = $_POST['refempleados']; 
$numero = $_POST['numero']; 
$fecha = $_POST['fecha']; 
$subtotal = $_POST['subtotal']; 
$iva = $_POST['iva']; 
$total = $_POST['total']; 
$estado = $_POST['estado']; 
$res = $serviciosReferencias->insertarCompras($reftipopago,$refproveedores,$refempleados,$numero,$fecha,$subtotal,$iva,$total,$estado); 
if ((integer)$res > 0) { 
echo ''; 
} else { 
echo 'Huvo un error al insertar datos';	
} 
} 
function modificarCompras($serviciosReferencias) { 
$id = $_POST['id']; 
$reftipopago = $_POST['reftipopago']; 
$refproveedores = $_POST['refproveedores']; 
$refempleados = $_POST['refempleados']; 
$numero = $_POST['numero']; 
$fecha = $_POST['fecha']; 
$subtotal = $_POST['subtotal']; 
$iva = $_POST['iva']; 
$total = $_POST['total']; 
$estado = $_POST['estado']; 
$res = $serviciosReferencias->modificarCompras($id,$reftipopago,$refproveedores,$refempleados,$numero,$fecha,$subtotal,$iva,$total,$estado); 
if ($res == true) { 
echo ''; 
} else { 
echo 'Huvo un error al modificar datos'; 
} 
} 
function eliminarCompras($serviciosReferencias) { 
$id = $_POST['id']; 
$res = $serviciosReferencias->eliminarCompras($id); 
echo $res; 
} 
function insertarEmpleados($serviciosReferencias) { 
$nombre = $_POST['nombre']; 
$apellido = $_POST['apellido']; 
$sexo = $_POST['sexo']; 
$fechanac = $_POST['fechanac']; 
$direccion = $_POST['direccion']; 
$telefono = $_POST['telefono']; 
$celular = $_POST['celular']; 
$email = $_POST['email']; 
$dni = $_POST['dni']; 
$fechaing = $_POST['fechaing']; 
$sueldo = $_POST['sueldo']; 
$estado = $_POST['estado']; 
$res = $serviciosReferencias->insertarEmpleados($nombre,$apellido,$sexo,$fechanac,$direccion,$telefono,$celular,$email,$dni,$fechaing,$sueldo,$estado); 
if ((integer)$res > 0) { 
echo ''; 
} else { 
echo 'Huvo un error al insertar datos';	
} 
} 
function modificarEmpleados($serviciosReferencias) { 
$id = $_POST['id']; 
$nombre = $_POST['nombre']; 
$apellido = $_POST['apellido']; 
$sexo = $_POST['sexo']; 
$fechanac = $_POST['fechanac']; 
$direccion = $_POST['direccion']; 
$telefono = $_POST['telefono']; 
$celular = $_POST['celular']; 
$email = $_POST['email']; 
$dni = $_POST['dni']; 
$fechaing = $_POST['fechaing']; 
$sueldo = $_POST['sueldo']; 
$estado = $_POST['estado']; 
$res = $serviciosReferencias->modificarEmpleados($id,$nombre,$apellido,$sexo,$fechanac,$direccion,$telefono,$celular,$email,$dni,$fechaing,$sueldo,$estado); 
if ($res == true) { 
echo ''; 
} else { 
echo 'Huvo un error al modificar datos'; 
} 
} 
function eliminarEmpleados($serviciosReferencias) { 
$id = $_POST['id']; 
$res = $serviciosReferencias->eliminarEmpleados($id); 
echo $res; 
} 



function traerProductoPorCodigo($servicios) {
	$codigo		= $_POST['idproducto'];
	
	$res = $servicios->traerProductosPorId($codigo);
	
	echo json_encode(toArray($res));
}

function traerProductoPorCodigoBarra($servicios) {
	$codigo		= $_POST['idproducto'];
	
	$res = $servicios->traerProductoPorCodigoBarra($codigo);
	
	echo json_encode(toArray($res));
}


function buscarProductos($serviciosReferencias) {
	$tipobusqueda	= $_POST['tipobusqueda'];
	$busqueda		= $_POST['busqueda'];
	$tipo			= $_POST['tipo'];
	
	$res = $serviciosReferencias->buscarProductos($tipobusqueda,$busqueda);
	
	$cad3 = '';
	//////////////////////////////////////////////////////busquedajugadores/////////////////////
	$cad3 = $cad3.'
				<div class="col-md-12">
				<div class="panel panel-info">
                                <div class="panel-heading">
                                	<h3 class="panel-title">Resultado de la Busqueda</h3>
                                	
                                </div>
                                <div class="panel-body-predio" style="padding:5px 20px;">
                                	';
	$cad3 = $cad3.'
	<div class="row">
                	<table id="example" class="table table-responsive table-striped" style="font-size:0.8em; padding:2px;">
						<thead>
                        <tr>
							<th></th>
                        	<th align="left">Nombre</th>
							<th align="left">Cod.Barra</th>
                            <th align="left">Precio</th>
                            <th align="center">Stock</th>
							<th align="center">StockMin</th>
							<th>Acciones</th>
                        </tr>
						</thead>
						<tbody id="resultadosProd">';
	while ($rowJ = mysql_fetch_array($res)) {
		$cad3 .= '<tr>
					<td><input type="checkbox" class="form-control" name="produ'.$rowJ[0].'" id="produ'.$rowJ[0].'" /></td>
					<td>'.utf8_encode($rowJ[1]).'</td>
					<td>'.($rowJ['codigobarra']).'</td>
					<td>'.($tipo == 'Pedido' ? $rowJ['preciocosto'] : $rowJ['precioventa']).'</td>
					<td>'.($rowJ['stock']).'</td>
					<td>'.($rowJ['stockmin']).'</td>
					<td>
								
							<div class="btn-group">
								<button class="btn btn-default" type="button">Acciones</button>
								
								<button class="btn btn-success dropdown-toggle" data-toggle="dropdown" type="button">
								<span class="caret"></span>
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								
								<ul class="dropdown-menu" role="menu">
									<li>
									<a href="../productos/modificar.php?id='.$rowJ[0].'" class="varmodificar" id="'.$rowJ[0].'">Modificar</a>
									</li>
									<li>
									<a href="javascript:void(0);" class="agregarProd" id="'.$rowJ[0].'"><span class="glyphicon glyphicon-plus"></span> Agregar</a>
									</li>
									
								</ul>
							</div>
							<button id="'.$rowJ[0].'" class="btn btn-success agregarProd" style="margin-left:0px;" type="button">Agregar</button>
							
						</td>
					</tr>';
	}
	
	$cad3 = $cad3.'</tbody>
                                </table>
								<input type="button" id="borrarMasivo" class="btn btn-danger" value="Borrar Masivo" />
								</div>
                            </div>
						</div>';
						
	echo $cad3;
}

function borrarMasivo($serviciosReferencias) {
	$numero = count($_POST);
	$tags = array_keys($_POST);// obtiene los nombres de las varibles
	$valores = array_values($_POST);// obtiene los valores de las varibles
	$cantEncontrados = 0;
	$cantidad = 1;
	$idProducto = 0;
	
	$cad = '';
	
	for($i=0;$i<$numero;$i++){
		
		if (strpos($tags[$i],"produ") !== false) {
			
			if (isset($valores[$i])) {
				
				$idProducto = str_replace("produ","",$tags[$i]);
				
				$res = $serviciosReferencias->eliminarProductos($idProducto); 
			}
		}
	}
	
	echo '';

}

function modificarprecios($serviciosReferencias) {
	
	$idCategoria	=	$_POST['idcategoria'];
	$porcentaje		=	$_POST['porcentaje'];
	$precio		=	$_POST['precio'];
	
	$resCategorias = $serviciosReferencias->traerProductosPorCategoria($idCategoria);
	
	$cad = 'produ';
	
	while ($rowFS = mysql_fetch_array($resCategorias)) {
		if (isset($_POST[$cad.$rowFS[0]])) {
			$serviciosReferencias->modificarprecios($rowFS[0], $precio, $porcentaje);
		}
	}
	
	echo '';	
}


function insertarProductos($serviciosReferencias) { 
$codigo = $_POST['codigo']; 
$codigobarra = $_POST['codigobarra']; 
$nombre = $_POST['nombre']; 
$descripcion = $_POST['descripcion']; 
$stock = $_POST['stock']; 
$stockmin = $_POST['stockmin']; 
$preciocosto = $_POST['preciocosto']; 
$precioventa = $_POST['precioventa']; 
$utilidad = $precioventa - $preciocosto; 
$preciodescuento = $_POST['preciodescuento']; 
$imagen = ''; 
$refcategorias = $_POST['refcategorias']; 
$tipoimagen = ''; 
$unidades = $_POST['unidades']; 
$refproveedores = $_POST['refproveedores']; 
$deposito = $_POST['deposito'];	

	$existeCodigo = $serviciosReferencias->existeCodigo($codigo);
	
	if ($existeCodigo == 1) {
		$codigo = $serviciosReferencias->generarCodigo();	
	}
	
	$res = $serviciosReferencias->insertarProductos($codigo,$codigobarra,$nombre,$descripcion,$stock,$stockmin,$preciocosto,$precioventa,$preciodescuento,$utilidad,$imagen,$refcategorias,$tipoimagen,$unidades,$refproveedores,$deposito); 
	
	if ((integer)$res > 0) { 
		$imagenes = array("imagen" => 'imagen');
	
		foreach ($imagenes as $valor) {
			$serviciosReferencias->subirArchivo($valor,'galeria',$res);
		}
		echo ''; 
	} else { 
		echo 'Huvo un error al insertar datos';	
	} 
} 
function modificarProductos($serviciosReferencias) { 
$id = $_POST['id']; 
$codigo = $_POST['codigo']; 
$codigobarra = $_POST['codigobarra']; 
$nombre = $_POST['nombre']; 
$descripcion = $_POST['descripcion']; 
$stock = $_POST['stock']; 
$stockmin = $_POST['stockmin']; 
$preciocosto = $_POST['preciocosto']; 
$precioventa = $_POST['precioventa']; 
$utilidad = $precioventa - $preciocosto; 
$preciodescuento = $_POST['preciodescuento'];
$imagen = ''; 
$refcategorias = $_POST['refcategorias']; 
$tipoimagen = ''; 
$unidades = $_POST['unidades'];
$refproveedores = $_POST['refproveedores']; 
$deposito = $_POST['deposito'];	

if (isset($_POST['activo'])) {
$activo = 1;
} else {
$activo = 0;
} 
	
	$res = $serviciosReferencias->modificarProductos($id,$codigo,$codigobarra,$nombre,$descripcion,$stock,$stockmin,$preciocosto,$precioventa,$preciodescuento,$utilidad,$imagen,$refcategorias,$tipoimagen,$unidades,$activo,$refproveedores,$deposito); 
	
	if ($res == true) { 
		$imagenes = array("imagen" => 'imagen');
	
		foreach ($imagenes as $valor) {
			$serviciosReferencias->subirArchivo($valor,'galeria',$id);
		}
		echo ''; 
	} else { 
		echo 'Huvo un error al modificar datos'; 
	} 
} 
function eliminarProductos($serviciosReferencias) { 
$id = $_POST['id']; 
$res = $serviciosReferencias->eliminarProductos($id); 
echo $res; 
} 

function eliminarFoto($serviciosReferencias) {
	$id			=	$_POST['id'];
	echo $serviciosReferencias->eliminarFoto($id);
}

function eliminarLibro($serviciosReferencias) {
	$id			=	$_POST['id'];
	echo $serviciosReferencias->eliminarLibro($id);
}




function insertarProveedores($serviciosReferencias) { 
$nombre = $_POST['nombre']; 
$cuit = $_POST['cuit']; 
$dni = $_POST['dni']; 
$direccion = $_POST['direccion']; 
$telefono = $_POST['telefono']; 
$celular = $_POST['celular']; 
$email = $_POST['email']; 
$observacionces = $_POST['observacionces']; 
$res = $serviciosReferencias->insertarProveedores($nombre,$cuit,$dni,$direccion,$telefono,$celular,$email,$observacionces); 
if ((integer)$res > 0) { 
echo ''; 
} else { 
echo 'Huvo un error al insertar datos';	
} 
} 
function modificarProveedores($serviciosReferencias) { 
$id = $_POST['id']; 
$nombre = $_POST['nombre']; 
$cuit = $_POST['cuit']; 
$dni = $_POST['dni']; 
$direccion = $_POST['direccion']; 
$telefono = $_POST['telefono']; 
$celular = $_POST['celular']; 
$email = $_POST['email']; 
$observacionces = $_POST['observacionces']; 
$res = $serviciosReferencias->modificarProveedores($id,$nombre,$cuit,$dni,$direccion,$telefono,$celular,$email,$observacionces); 
if ($res == true) { 
echo ''; 
} else { 
echo 'Huvo un error al modificar datos'; 
} 
} 
function eliminarProveedores($serviciosReferencias) { 
$id = $_POST['id']; 
$res = $serviciosReferencias->eliminarProveedores($id); 
echo $res; 
} 
function insertarUsuarios($serviciosReferencias) { 
$usuario = $_POST['usuario']; 
$password = $_POST['password']; 
$refroles = $_POST['refroles']; 
$email = $_POST['email']; 
$nombrecompleto = $_POST['nombrecompleto']; 
$res = $serviciosReferencias->insertarUsuarios($usuario,$password,$refroles,$email,$nombrecompleto); 
if ((integer)$res > 0) { 
echo ''; 
} else { 
echo 'Huvo un error al insertar datos';	
} 
} 
function modificarUsuarios($serviciosReferencias) { 
$id = $_POST['id']; 
$usuario = $_POST['usuario']; 
$password = $_POST['password']; 
$refroles = $_POST['refroles']; 
$email = $_POST['email']; 
$nombrecompleto = $_POST['nombrecompleto']; 
$res = $serviciosReferencias->modificarUsuarios($id,$usuario,$password,$refroles,$email,$nombrecompleto); 
if ($res == true) { 
echo ''; 
} else { 
echo 'Huvo un error al modificar datos'; 
} 
} 
function eliminarUsuarios($serviciosReferencias) { 
$id = $_POST['id']; 
$res = $serviciosReferencias->eliminarUsuarios($id); 
echo $res; 
} 
function insertarDetallecompra($serviciosReferencias) { 
$idcompra = $_POST['idcompra']; 
$idproducto = $_POST['idproducto']; 
$cantidad = $_POST['cantidad']; 
$precio = $_POST['precio']; 
$total = $_POST['total']; 
$res = $serviciosReferencias->insertarDetallecompra($idcompra,$idproducto,$cantidad,$precio,$total); 
if ((integer)$res > 0) { 
echo ''; 
} else { 
echo 'Huvo un error al insertar datos';	
} 
} 
function modificarDetallecompra($serviciosReferencias) { 
$id = $_POST['id']; 
$idcompra = $_POST['idcompra']; 
$idproducto = $_POST['idproducto']; 
$cantidad = $_POST['cantidad']; 
$precio = $_POST['precio']; 
$total = $_POST['total']; 
$res = $serviciosReferencias->modificarDetallecompra($id,$idcompra,$idproducto,$cantidad,$precio,$total); 
if ($res == true) { 
echo ''; 
} else { 
echo 'Huvo un error al modificar datos'; 
} 
} 
function eliminarDetallecompra($serviciosReferencias) { 
$id = $_POST['id']; 
$res = $serviciosReferencias->eliminarDetallecompra($id); 
echo $res; 
} 
function insertarDetallepedido($serviciosReferencias) { 
$idpedido = $_POST['idpedido']; 
$idproducto = $_POST['idproducto']; 
$cantidad = $_POST['cantidad']; 
$precio = $_POST['precio']; 
$total = $_POST['total']; 
$res = $serviciosReferencias->insertarDetallepedido($idpedido,$idproducto,$cantidad,$precio,$total); 
if ((integer)$res > 0) { 
echo ''; 
} else { 
echo 'Huvo un error al insertar datos';	
} 
} 
function modificarDetallepedido($serviciosReferencias) { 
$id = $_POST['id']; 
$idpedido = $_POST['idpedido']; 
$idproducto = $_POST['idproducto']; 
$cantidad = $_POST['cantidad']; 
$precio = $_POST['precio']; 
$total = $_POST['total']; 
$res = $serviciosReferencias->modificarDetallepedido($id,$idpedido,$idproducto,$cantidad,$precio,$total); 
if ($res == true) { 
echo ''; 
} else { 
echo 'Huvo un error al modificar datos'; 
} 
} 
function eliminarDetallepedido($serviciosReferencias) { 
$id = $_POST['id']; 
$res = $serviciosReferencias->eliminarDetallepedido($id); 
echo $res; 
} 


function traerDetallepedidoPorPedido($serviciosReferencias) {
	$id		=	$_POST['id'];
	
	$res	= $serviciosReferencias->traerDetallepedidoPorPedido($id);
	$cadRows='';
	$total = 0;
	
	while ($row = mysql_fetch_array($res)) {
		$total += $row['total'];
			$cadsubRows = '';
			$cadRows = $cadRows.'
			
					<tr class="'.$row[0].'">
                        	';
			
			
			for ($i=1;$i<=4;$i++) {
				
				$cadsubRows = $cadsubRows.'<td><div style="height:20px;overflow:auto;">'.$row[$i].'</div></td>';	
			}
			
			$cadRows = $cadRows.'
								'.$cadsubRows.'</tr>';
			
	}
			
	
	$cad	= '';
	$cad = $cad.'
			<table class="table table-striped table-responsive">
            	<thead>
                	<tr>
                        <th>Producto</th>
						<th>Cantidad</th>
						<th>Precio</th>
						<th>Sub-Total</th>
                    </tr>
                </thead>
                <tbody>

                	'.($cadRows).'
                </tbody>
				<tfoot>
					<tr>
						<td align="right" style="font-size:14px; font-weight: bold;" colspan="4">Total: <span style="color:red;">$'.number_format($total,2,',','.').'</span></td>
					</tr>
				</tfoot>
            </table>
			<div style="margin-bottom:85px; margin-right:60px;"></div>
		
		';	
	echo $cad;
}


function insertarDetallepedidoaux($serviciosReferencias) {
$refproductos = $_POST['refproductos'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];
$total = $_POST['total'];
$res = $serviciosReferencias->insertarDetallepedidoaux($refproductos,$cantidad,$precio,$total);
if ((integer)$res > 0) {
echo $res;
} else {
echo 'Huvo un error al insertar datos';
}
}
function modificarDetallepedidoaux($serviciosReferencias) {
$id = $_POST['id'];
$refproductos = $_POST['refproductos'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];
$total = $_POST['total'];
$res = $serviciosReferencias->modificarDetallepedidoaux($id,$refproductos,$cantidad,$precio,$total);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}
function eliminarDetallepedidoaux($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarDetallepedidoaux($id);
echo $res;
} 


function insertarDetalleventa($serviciosReferencias) { 
$idventa = $_POST['idventa']; 
$idproducto = $_POST['idproducto']; 
$cantidad = $_POST['cantidad']; 
$costo = $_POST['costo']; 
$precio = $_POST['precio']; 
$total = $_POST['total']; 
$res = $serviciosReferencias->insertarDetalleventa($idventa,$idproducto,$cantidad,$costo,$precio,$total); 
if ((integer)$res > 0) { 
echo ''; 
} else { 
echo 'Huvo un error al insertar datos';	
} 
} 
function modificarDetalleventa($serviciosReferencias) { 
$id = $_POST['id']; 
$idventa = $_POST['idventa']; 
$idproducto = $_POST['idproducto']; 
$cantidad = $_POST['cantidad']; 
$costo = $_POST['costo']; 
$precio = $_POST['precio']; 
$total = $_POST['total']; 
$res = $serviciosReferencias->modificarDetalleventa($id,$idventa,$idproducto,$cantidad,$costo,$precio,$total); 
if ($res == true) { 
echo ''; 
} else { 
echo 'Huvo un error al modificar datos'; 
} 
} 
function eliminarDetalleventa($serviciosReferencias) { 
$id = $_POST['id']; 
$res = $serviciosReferencias->eliminarDetalleventa($id); 
echo $res; 
} 

function finalizarPedido($serviciosReferencias) {
	$id = $_POST['id'];
	$res = $serviciosReferencias->finalizarPedido($id);
	echo $res;	
}

function insertarPedidos($serviciosReferencias) {
	
	$fechasolicitud = date('Y-m-d');
	$fechaentrega = $_POST['fechaentrega'];
	
	$refestados = 1;
	$referencia = $_POST['referencia'];
	$observacion = $_POST['observaciones'];

	$res = $serviciosReferencias->insertarPedidos($fechasolicitud,$fechaentrega,0,$refestados,$referencia,$observacion);

	if ((integer)$res > 0) {
		$serviciosReferencias->insertarDetallepedidoDesdeTemporal($res);
		$serviciosReferencias->vaciarDetallepedidoaux();
		echo '';
	} else {
		echo 'Huvo un error al insertar datos';
	}
}
function modificarPedidos($serviciosReferencias) {
$id = $_POST['id'];
$fechasolicitud = $_POST['fechasolicitud'];
$fechaentrega = $_POST['fechaentrega'];
$total = $_POST['total'];
$refestados = $_POST['refestados'];
$referencia = $_POST['referencia'];
$observacion = $_POST['observacion'];
$res = $serviciosReferencias->modificarPedidos($id,$fechasolicitud,$fechaentrega,$total,$refestados,$referencia,$observacion);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}
function eliminarPedidos($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarPedidos($id);
echo $res;
} 
function insertarPredio_menu($serviciosReferencias) { 
$url = $_POST['url']; 
$icono = $_POST['icono']; 
$nombre = $_POST['nombre']; 
$Orden = $_POST['Orden']; 
$hover = $_POST['hover']; 
$permiso = $_POST['permiso']; 
$res = $serviciosReferencias->insertarPredio_menu($url,$icono,$nombre,$Orden,$hover,$permiso); 
if ((integer)$res > 0) { 
echo ''; 
} else { 
echo 'Huvo un error al insertar datos';	
} 
} 
function modificarPredio_menu($serviciosReferencias) { 
$id = $_POST['id']; 
$url = $_POST['url']; 
$icono = $_POST['icono']; 
$nombre = $_POST['nombre']; 
$Orden = $_POST['Orden']; 
$hover = $_POST['hover']; 
$permiso = $_POST['permiso']; 
$res = $serviciosReferencias->modificarPredio_menu($id,$url,$icono,$nombre,$Orden,$hover,$permiso); 
if ($res == true) { 
echo ''; 
} else { 
echo 'Huvo un error al modificar datos'; 
} 
} 
function eliminarPredio_menu($serviciosReferencias) { 
$id = $_POST['id']; 
$res = $serviciosReferencias->eliminarPredio_menu($id); 
echo $res; 
} 


function insertarCategorias($serviciosReferencias) {
$descripcion = $_POST['descripcion'];
if (isset($_POST['esegreso'])) {
$esegreso = 1;
} else {
$esegreso = 0;
}

$activo = 1;

$res = $serviciosReferencias->insertarCategorias($descripcion,$esegreso,$activo);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
}

function modificarCategorias($serviciosReferencias) {
$id = $_POST['id'];
$descripcion = $_POST['descripcion'];
if (isset($_POST['esegreso'])) {
$esegreso = 1;
} else {
$esegreso = 0;
}

if (isset($_POST['activo'])) {
	$activo = 1;
} else {
	$activo = 0;
}

$res = $serviciosReferencias->modificarCategorias($id,$descripcion,$esegreso,$activo);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
} 


function eliminarCategorias($serviciosReferencias) { 
	$id = $_POST['id']; 
	
	$resR = $serviciosReferencias->traerProductosPorCategoria($id);
	
	$res = $serviciosReferencias->eliminarCategorias($id); 

	// doy de baja a todos los productos correspondientes a esta categoria
	while ($row = mysql_fetch_array($resR)) {
		$serviciosReferencias->eliminarProductos($row[0]);		
	}
	echo $res; 
} 

function borrarMasivoCategorias($serviciosReferencias) {
	$numero = count($_POST);
	$tags = array_keys($_POST);// obtiene los nombres de las varibles
	$valores = array_values($_POST);// obtiene los valores de las varibles
	$cantEncontrados = 0;
	$cantidad = 1;
	$idProducto = 0;
	
	$cad = '';
	
	for($i=0;$i<$numero;$i++){
		
		if (strpos($tags[$i],"produ") !== false) {
			
			if (isset($valores[$i])) {
				
				$idProducto = str_replace("produ","",$tags[$i]);

				$resR = $serviciosReferencias->traerProductosPorCategoria($idProducto);
				
				$res = $serviciosReferencias->eliminarCategorias($idProducto); 
				// doy de baja a todos los productos correspondientes a esta categoria
				while ($row = mysql_fetch_array($resR)) {
					$serviciosReferencias->eliminarProductos($row[0]);		
				}
			}
		}
	}
	
	echo '';	
}


function insertarEstados($serviciosReferencias) { 
$estado = $_POST['estado']; 
$icono = $_POST['icono']; 
$res = $serviciosReferencias->insertarEstados($estado,$icono); 
if ((integer)$res > 0) { 
echo ''; 
} else { 
echo 'Huvo un error al insertar datos';	
} 
} 
function modificarEstados($serviciosReferencias) { 
$id = $_POST['id']; 
$estado = $_POST['estado']; 
$icono = $_POST['icono']; 
$res = $serviciosReferencias->modificarEstados($id,$estado,$icono); 
if ($res == true) { 
echo ''; 
} else { 
echo 'Huvo un error al modificar datos'; 
} 
} 
function eliminarEstados($serviciosReferencias) { 
$id = $_POST['id']; 
$res = $serviciosReferencias->eliminarEstados($id); 
echo $res; 
} 
function insertarRoles($serviciosReferencias) { 
$descripcion = $_POST['descripcion']; 
if (isset($_POST['activo'])) { 
$activo	= 1; 
} else { 
$activo = 0; 
} 
$res = $serviciosReferencias->insertarRoles($descripcion,$activo); 
if ((integer)$res > 0) { 
echo ''; 
} else { 
echo 'Huvo un error al insertar datos';	
} 
} 
function modificarRoles($serviciosReferencias) { 
$id = $_POST['id']; 
$descripcion = $_POST['descripcion']; 
if (isset($_POST['activo'])) { 
$activo	= 1; 
} else { 
$activo = 0; 
} 
$res = $serviciosReferencias->modificarRoles($id,$descripcion,$activo); 
if ($res == true) { 
echo ''; 
} else { 
echo 'Huvo un error al modificar datos'; 
} 
} 
function eliminarRoles($serviciosReferencias) { 
$id = $_POST['id']; 
$res = $serviciosReferencias->eliminarRoles($id); 
echo $res; 
} 
function insertarTipopago($serviciosReferencias) { 
$descripcion = $_POST['descripcion']; 
$res = $serviciosReferencias->insertarTipopago($descripcion); 
if ((integer)$res > 0) { 
echo ''; 
} else { 
echo 'Huvo un error al insertar datos';	
} 
} 
function modificarTipopago($serviciosReferencias) { 
$id = $_POST['id']; 
$descripcion = $_POST['descripcion']; 
$res = $serviciosReferencias->modificarTipopago($id,$descripcion); 
if ($res == true) { 
echo ''; 
} else { 
echo 'Huvo un error al modificar datos'; 
} 
} 
function eliminarTipopago($serviciosReferencias) { 
$id = $_POST['id']; 
$res = $serviciosReferencias->eliminarTipopago($id); 
echo $res; 
} 
function insertarVenta($serviciosReferencias) { 
$idtipodocumento = $_POST['idtipodocumento']; 
$idusuario = $_POST['idusuario']; 
$idempleado = $_POST['idempleado']; 
$serie = $_POST['serie']; 
$numero = $_POST['numero']; 
$fecha = $_POST['fecha']; 
$totalventa = $_POST['totalventa']; 
$igv = $_POST['igv']; 
$totalpagar = $_POST['totalpagar']; 
$estado = $_POST['estado']; 
$res = $serviciosReferencias->insertarVenta($idtipodocumento,$idusuario,$idempleado,$serie,$numero,$fecha,$totalventa,$igv,$totalpagar,$estado); 
if ((integer)$res > 0) { 
echo ''; 
} else { 
echo 'Huvo un error al insertar datos';	
} 
} 
function modificarVenta($serviciosReferencias) { 
$id = $_POST['id']; 
$idtipodocumento = $_POST['idtipodocumento']; 
$idusuario = $_POST['idusuario']; 
$idempleado = $_POST['idempleado']; 
$serie = $_POST['serie']; 
$numero = $_POST['numero']; 
$fecha = $_POST['fecha']; 
$totalventa = $_POST['totalventa']; 
$igv = $_POST['igv']; 
$totalpagar = $_POST['totalpagar']; 
$estado = $_POST['estado']; 
$res = $serviciosReferencias->modificarVenta($id,$idtipodocumento,$idusuario,$idempleado,$serie,$numero,$fecha,$totalventa,$igv,$totalpagar,$estado); 
if ($res == true) { 
echo ''; 
} else { 
echo 'Huvo un error al modificar datos'; 
} 
} 
function eliminarVenta($serviciosReferencias) { 
$id = $_POST['id']; 
$res = $serviciosReferencias->eliminarVenta($id); 
echo $res; 
} 

/* Fin */

function insertarPagos($serviciosReferencias) {
$refclientes = $_POST['refclientes'];
$pago = $_POST['pago'];
$fechapago = $_POST['fechapago'];
$observaciones = $_POST['observaciones'];
$res = $serviciosReferencias->insertarPagos($refclientes,$pago,$fechapago,$observaciones);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
}
function modificarPagos($serviciosReferencias) {
$id = $_POST['id'];
$refclientes = $_POST['refclientes'];
$pago = $_POST['pago'];
$fechapago = $_POST['fechapago'];
$observaciones = $_POST['observaciones'];
$res = $serviciosReferencias->modificarPagos($id,$refclientes,$pago,$fechapago,$observaciones);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}
function eliminarPagos($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarPagos($id);
echo $res;
} 


function insertarCajadiaria($serviciosReferencias) {
	$fecha = $_POST['fecha'];
	$inicio = $_POST['inicio'];
	$fin = 0;
	
	$existe = $serviciosReferencias->traerCajadiariaPorFecha($fecha);
	
	if (mysql_num_rows($existe)>0) {
		$res = $serviciosReferencias->modificarCajadiaria(mysql_result($existe,0,0),$fecha,$inicio,$fin);
	} else {
		$res = $serviciosReferencias->insertarCajadiaria($fecha,$inicio,$fin);
	}
	
	if ((integer)$res > 0) {
		echo '';
	} else {
		echo 'Huvo un error al insertar datos';
	}
}

function traerCajadiariaPorFecha($serviciosReferencias) {
	$fecha = $_POST['fecha'];	
	
	$res = $serviciosReferencias->traerCajadiariaPorFecha($fecha);
	
	if (mysql_num_rows($res)>0) {
		echo mysql_result($res,0,'inicio');	
	} else {
		echo 0;
	}
}

function modificarCajadiaria($serviciosReferencias) {
$id = $_POST['id'];
$fecha = $_POST['fecha'];
$inicio = $_POST['inicio'];
$fin = $_POST['fin'];
$res = $serviciosReferencias->modificarCajadiaria($id,$fecha,$inicio,$fin);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}
function eliminarCajadiaria($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarCajadiaria($id);
echo $res;
} 








function insertarConfiguracion($serviciosReferencias) {
$empresa = $_POST['empresa'];
$cuit = $_POST['cuit'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$localidad = $_POST['localidad'];
$codigopostal = $_POST['codigopostal'];
$res = $serviciosReferencias->insertarConfiguracion($empresa,$cuit,$direccion,$telefono,$email,$localidad,$codigopostal);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
}
function modificarConfiguracion($serviciosReferencias) {
$id = $_POST['id'];
$empresa = $_POST['empresa'];
$cuit = $_POST['cuit'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$localidad = $_POST['localidad'];
$codigopostal = $_POST['codigopostal'];
$res = $serviciosReferencias->modificarConfiguracion($id,$empresa,$cuit,$direccion,$telefono,$email,$localidad,$codigopostal);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}
function eliminarConfiguracion($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarConfiguracion($id);
echo $res;
} 





function insertarLibros($serviciosReferencias) {
	$autor = $_POST['autor'];
	$titulo = $_POST['titulo'];
	$editorial = $_POST['editorial'];
	$genero = $_POST['genero'];
	$paginas = $_POST['paginas'];
	$edicion = $_POST['edicion'];
	$refclientes = $_POST['refclientes'];
	
	$res = $serviciosReferencias->insertarLibros($autor,$titulo,$editorial,$genero,$paginas,$edicion,$refclientes);
	
	if ((integer)$res > 0) {
		
		$serviciosReferencias->crearDirectorioPrincipal("./../archivos/libros/".$refclientes);
		
		$imagenes = array("imagen" => 'ruta');
	
		foreach ($imagenes as $valor) {
			$serviciosReferencias->subirArchivo($valor,'libros/'.$refclientes,$res);
			
		}
		echo '';
	} else {
		echo 'Huvo un error al insertar datos';
	}
}


function modificarLibros($serviciosReferencias) {
	$id = $_POST['id'];
	$autor = $_POST['autor'];
	$titulo = $_POST['titulo'];
	$editorial = $_POST['editorial'];
	$genero = $_POST['genero'];
	$paginas = $_POST['paginas'];
	$edicion = $_POST['edicion'];
	$refclientes = $_POST['refclientes'];
	
	$res = $serviciosReferencias->modificarLibros($id,$autor,$titulo,$editorial,$genero,$paginas,$edicion,$refclientes);
	
	if ($res == true) {
		
		$serviciosReferencias->borrarDirecctorio("./../archivos/libros/".$refclientes."/".$id);
		
		$serviciosReferencias->crearDirectorioPrincipal("./../archivos/libros/".$refclientes);
		
		$imagenes = array("imagen" => 'ruta');
	
		foreach ($imagenes as $valor) {
			$serviciosReferencias->subirArchivo($valor,'libros/'.$refclientes,$id);
		}
		echo '';
	} else {
		echo 'Huvo un error al modificar datos';
	}
}

function eliminarLibros($serviciosReferencias) {
	$id = $_POST['id'];
	$res = $serviciosReferencias->borrarDirecctorio("./../archivos/libros/".$refclientes."/".$id);
	$serviciosReferencias->eliminarLibro($id);
	echo $res;
} 



/*****************			ESTADISTICAS           *****************************/
function traerVentasPorAno($serviciosReferencias) {
	$anio = $_POST['anio'];
	
	$res = $serviciosReferencias->traerVentasPorAno($anio);

	echo json_encode(toArray($res));
}


function graficosProductosConsumo($serviciosReferencias) {
	$anio = $_POST['anio'];
	
	$res	=	$serviciosReferencias->graficosProductosConsumo($anio);
	
	echo $res;
}


/*****************			FIN						****************************/


////////////////////////// FIN DE TRAER DATOS ////////////////////////////////////////////////////////////

//////////////////////////  BASICO  /////////////////////////////////////////////////////////////////////////

function toArray($query)
{
    $res = array();
    while ($row = @mysql_fetch_array($query)) {
        $res[] = $row;
    }
    return $res;
}


function entrar($serviciosUsuarios) {
	$email		=	$_POST['email'];
	$pass		=	$_POST['pass'];
	echo $serviciosUsuarios->loginUsuario($email,$pass);
}


function registrar($serviciosUsuarios) {
	$usuario			=	$_POST['usuario'];
	$password			=	$_POST['password'];
	$refroll			=	$_POST['refroll'];
	$email				=	$_POST['email'];
	$nombre				=	$_POST['nombrecompleto'];
	
	$res = $serviciosUsuarios->insertarUsuario($usuario,$password,$refroll,$email,$nombre);
	if ((integer)$res > 0) {
		echo '';	
	} else {
		echo $res;	
	}
}


function insertarUsuario($serviciosUsuarios) {
	$usuario			=	$_POST['usuario'];
	$password			=	$_POST['password'];
	$refroll			=	$_POST['refroles'];
	$email				=	$_POST['email'];
	$nombre				=	$_POST['nombrecompleto'];
	
	$res = $serviciosUsuarios->insertarUsuario($usuario,$password,$refroll,$email,$nombre);
	if ((integer)$res > 0) {
		echo '';	
	} else {
		echo $res;	
	}
}


function modificarUsuario($serviciosUsuarios) {
	$id					=	$_POST['id'];
	$usuario			=	$_POST['usuario'];
	$password			=	$_POST['password'];
	$refroll			=	$_POST['refroles'];
	$email				=	$_POST['email'];
	$nombre				=	$_POST['nombrecompleto'];
	
	echo $serviciosUsuarios->modificarUsuario($id,$usuario,$password,$refroll,$email,$nombre);
}


function enviarMail($serviciosUsuarios) {
	$email		=	$_POST['email'];
	$pass		=	$_POST['pass'];
	//$idempresa  =	$_POST['idempresa'];
	
	echo $serviciosUsuarios->login($email,$pass);
}


function devolverImagen($nroInput) {
	
	if( $_FILES['archivo'.$nroInput]['name'] != null && $_FILES['archivo'.$nroInput]['size'] > 0 ){
	// Nivel de errores
	  error_reporting(E_ALL);
	  $altura = 100;
	  // Constantes
	  # Altura de el thumbnail en píxeles
	  //define("ALTURA", 100);
	  # Nombre del archivo temporal del thumbnail
	  //define("NAMETHUMB", "/tmp/thumbtemp"); //Esto en servidores Linux, en Windows podría ser:
	  //define("NAMETHUMB", "c:/windows/temp/thumbtemp"); //y te olvidas de los problemas de permisos
	  $NAMETHUMB = "c:/windows/temp/thumbtemp";
	  # Servidor de base de datos
	  //define("DBHOST", "localhost");
	  # nombre de la base de datos
	  //define("DBNAME", "portalinmobiliario");
	  # Usuario de base de datos
	  //define("DBUSER", "root");
	  # Password de base de datos
	  //define("DBPASSWORD", "");
	  // Mime types permitidos
	  $mimetypes = array("image/jpeg", "image/pjpeg", "image/gif", "image/png");
	  // Variables de la foto
	  $name = $_FILES["archivo".$nroInput]["name"];
	  $type = $_FILES["archivo".$nroInput]["type"];
	  $tmp_name = $_FILES["archivo".$nroInput]["tmp_name"];
	  $size = $_FILES["archivo".$nroInput]["size"];
	  // Verificamos si el archivo es una imagen válida
	  if(!in_array($type, $mimetypes))
		die("El archivo que subiste no es una imagen válida");
	  // Creando el thumbnail
	  switch($type) {
		case $mimetypes[0]:
		case $mimetypes[1]:
		  $img = imagecreatefromjpeg($tmp_name);
		  break;
		case $mimetypes[2]:
		  $img = imagecreatefromgif($tmp_name);
		  break;
		case $mimetypes[3]:
		  $img = imagecreatefrompng($tmp_name);
		  break;
	  }
	  
	  $datos = getimagesize($tmp_name);
	  
	  $ratio = ($datos[1]/$altura);
	  $ancho = round($datos[0]/$ratio);
	  $thumb = imagecreatetruecolor($ancho, $altura);
	  imagecopyresized($thumb, $img, 0, 0, 0, 0, $ancho, $altura, $datos[0], $datos[1]);
	  switch($type) {
		case $mimetypes[0]:
		case $mimetypes[1]:
		  imagejpeg($thumb, $NAMETHUMB);
			  break;
		case $mimetypes[2]:
		  imagegif($thumb, $NAMETHUMB);
		  break;
		case $mimetypes[3]:
		  imagepng($thumb, $NAMETHUMB);
		  break;
	  }
	  // Extrae los contenidos de las fotos
	  # contenido de la foto original
	  $fp = fopen($tmp_name, "rb");
	  $tfoto = fread($fp, filesize($tmp_name));
	  $tfoto = addslashes($tfoto);
	  fclose($fp);
	  # contenido del thumbnail
	  $fp = fopen($NAMETHUMB, "rb");
	  $tthumb = fread($fp, filesize($NAMETHUMB));
	  $tthumb = addslashes($tthumb);
	  fclose($fp);
	  // Borra archivos temporales si es que existen
	  //@unlink($tmp_name);
	  //@unlink(NAMETHUMB);
	} else {
		$tfoto = '';
		$type = '';
	}
	$tfoto = utf8_decode($tfoto);
	return array('tfoto' => $tfoto, 'type' => $type);	
}


?>