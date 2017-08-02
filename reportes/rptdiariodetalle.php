<?php

date_default_timezone_set('America/Buenos_Aires');

include ('../includes/funcionesUsuarios.php');
include ('../includes/funciones.php');
include ('../includes/funcionesHTML.php');
include ('../includes/funcionesReferencias.php');


$serviciosUsuarios  		= new ServiciosUsuarios();
$serviciosFunciones 		= new Servicios();
$serviciosHTML				= new ServiciosHTML();
$serviciosReferancias 		= new ServiciosReferencias();

$fecha = date('Y-m-d');

require('fpdf.php');

//$header = array("Hora", "Cancha 1", "Cancha 2", "Cancha 3");

$fechaPost		= 	$_GET['fecha'];

$resEmpresa		= $serviciosReferancias->traerConfiguracionUltima();

if (mysql_num_rows($resEmpresa)>0) {
	$empresa = mysql_result($resEmpresa,0,'empresa');	
} else {
	$empresa = '';	
}


$res1	= $serviciosReferancias->traerVentasPorDiaPorTipoTotales($fechaPost, 1);
$res2	= $serviciosReferancias->traerVentasPorDiaPorTipoTotales($fechaPost, 2);
$res3	= $serviciosReferancias->traerVentasPorDiaPorTipoTotales($fechaPost, 3);

$res1d	= $serviciosReferancias->traerVentasPorDiaPorTipo($fechaPost, 1);
$res2d	= $serviciosReferancias->traerVentasPorDiaPorTipo($fechaPost, 2);
$res3d	= $serviciosReferancias->traerVentasPorDiaPorTipo($fechaPost, 3);


$cajaInicio = $serviciosReferancias->traerCajadiariaPorFecha($fecha);

if (mysql_num_rows($cajaInicio)>0) {
	$caja = mysql_result($cajaInicio,0,'inicio');	
} else {
	$caja = 0;
}

$TotalIngresos = 0;
$TotalEgresos = 0;
$Totales = 0;
$Caja = 0;

class PDF extends FPDF
{
// Cargar los datos



	
	// Tabla coloreada
	function detalleCaja($header, $data, &$Totales)
	{
		$this->SetFont('Arial','',12);
		$this->Ln();
		$this->Ln();
		$this->Cell(60,7,'Ingresos de Caja',0,0,'L',false);
		$this->SetFont('Arial','',10);
		// Colores, ancho de línea y fuente en negrita
		$this->SetFillColor(255,0,0);
		$this->SetTextColor(255);
		$this->SetDrawColor(128,0,0);
		$this->SetLineWidth(.3);
		$this->Ln();
		
		
		// Cabecera
		$w = array(25, 50,50,22,22,22);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
		$this->Ln();
		// Restauración de colores y fuentes
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		$this->SetFont('');
		// Datos
		$fill = false;
		
		$total = 0;
		$totalcant = 0;
		while ($row = mysql_fetch_array($data))
		{
			$total = $total + $row['subtotal'];
			$totalcant = $totalcant + 1;
			
			$this->Cell($w[0],6,$row['numero'],'LR',0,'C',$fill);
			$this->Cell($w[1],6,$row['nombrecompleto'],'LR',0,'L',$fill);
			$this->Cell($w[2],6,substr($row['nombre'],0,22),'LR',0,'L',$fill);
			$this->Cell($w[3],6,$row['cantidad'],'LR',0,'C',$fill);
			$this->Cell($w[4],6,$row['precio'],'LR',0,'R',$fill);
			$this->Cell($w[3],6,$row['subtotal'],'LR',0,'R',$fill);
			$this->Ln();
			$fill = !$fill;
		}
		
		// Línea de cierre
		$this->Cell(array_sum($w),0,'','T');
		$this->SetFont('Arial','',12);
		$this->Ln();
		$this->Ln();
		$this->Cell(60,7,'Cantidad:'.number_format($totalcant, 2, '.', ','),0,0,'L',false);
		$this->Ln();
		$this->Cell(60,7,'Total: $'.number_format($total, 2, '.', ','),0,0,'L',false);
		
		$Totales = $Totales + $total;
	}
	
	
	// Tabla coloreada
	function detalleCreditos($header, $data, &$TotalIngresos)
	{
		$this->SetFont('Arial','',12);
		$this->Ln();
		$this->Ln();
		$this->Cell(60,7,'Ingresos de Caja a Credito',0,0,'L',false);
		$this->SetFont('Arial','',10);
		// Colores, ancho de línea y fuente en negrita
		$this->SetFillColor(255,0,0);
		$this->SetTextColor(255);
		$this->SetDrawColor(128,0,0);
		$this->SetLineWidth(.3);
		$this->Ln();
		
		
		// Cabecera
		$w = array(25, 50,50,22,22,22);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
		$this->Ln();
		// Restauración de colores y fuentes
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		$this->SetFont('');
		// Datos
		$fill = false;
		
		$total = 0;
		$totalcant = 0;
		while ($row = mysql_fetch_array($data))
		{
			$total = $total + $row['subtotal'];
			$totalcant = $totalcant + 1;
			
			$this->Cell($w[0],6,$row['numero'],'LR',0,'C',$fill);
			$this->Cell($w[1],6,$row['nombrecompleto'],'LR',0,'L',$fill);
			$this->Cell($w[2],6,substr($row['nombre'],0,22),'LR',0,'L',$fill);
			$this->Cell($w[3],6,$row['cantidad'],'LR',0,'C',$fill);
			$this->Cell($w[4],6,$row['precio'],'LR',0,'R',$fill);
			$this->Cell($w[3],6,$row['subtotal'],'LR',0,'R',$fill);
			$this->Ln();
			$fill = !$fill;
		}
		
		// Línea de cierre
		$this->Cell(array_sum($w),0,'','T');
		$this->SetFont('Arial','',12);
		$this->Ln();
		$this->Ln();
		$this->Cell(60,7,'Cantidad:'.number_format($totalcant, 2, '.', ','),0,0,'L',false);
		$this->Ln();
		$this->Cell(60,7,'Total: $'.number_format($total, 2, '.', ','),0,0,'L',false);
		
		$TotalIngresos = $TotalIngresos + $total;
	}


	
	// Tabla coloreada
	function detalleEgresos($header, $data, &$TotalEgresos)
	{
		$this->SetFont('Arial','',12);
		$this->Ln();
		$this->Ln();
		$this->Cell(60,7,'Egresos',0,0,'L',false);
		$this->SetFont('Arial','',10);
		// Colores, ancho de línea y fuente en negrita
		$this->SetFillColor(255,0,0);
		$this->SetTextColor(255);
		$this->SetDrawColor(128,0,0);
		$this->SetLineWidth(.3);
		$this->Ln();
		
		
		// Cabecera
		$w = array(25, 50,50,22,22,22);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
		$this->Ln();
		// Restauración de colores y fuentes
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		$this->SetFont('');
		// Datos
		$fill = false;
		
		$total = 0;
		$totalcant = 0;
		while ($row = mysql_fetch_array($data))
		{
			$total = $total + $row['subtotal'];
			$totalcant = $totalcant + 1;
			
			$this->Cell($w[0],6,$row['numero'],'LR',0,'C',$fill);
			$this->Cell($w[1],6,$row['nombrecompleto'],'LR',0,'L',$fill);
			$this->Cell($w[2],6,substr($row['nombre'],0,22),'LR',0,'L',$fill);
			$this->Cell($w[3],6,$row['cantidad'],'LR',0,'C',$fill);
			$this->Cell($w[4],6,$row['precio'],'LR',0,'R',$fill);
			$this->Cell($w[3],6,$row['subtotal'],'LR',0,'R',$fill);
			$this->Ln();
			$fill = !$fill;
		}
		
		// Línea de cierre
		$this->Cell(array_sum($w),0,'','T');
		$this->SetFont('Arial','',12);
		$this->Ln();
		$this->Ln();
		$this->Cell(60,7,'Cantidad:'.number_format($totalcant, 2, '.', ','),0,0,'L',false);
		$this->Ln();
		$this->Cell(60,7,'Total: $'.number_format($total, 2, '.', ','),0,0,'L',false);
		
		$TotalEgresos = $TotalEgresos + $total;
	}


}

$pdf = new PDF();

$pdf->AddPage();

$pdf->SetFont('Arial','U',17);
$pdf->Cell(180,7,'Reporte Detalle Caja Diaria Totales',0,0,'C',false);
$pdf->Ln();
$pdf->SetFont('Arial','U',14);
$pdf->Cell(180,7,"Empresa: ".strtoupper($empresa),0,0,'C',false);
$pdf->Ln();
$pdf->Cell(180,7,'Fecha: '.date('Y-m-d'),0,0,'C',false);
$pdf->SetFont('Arial','',10);

// Títulos de las columnas
$headerFacturacion = array("Factura", "Cliente", "Producto","Cantidad", "Importe", "Total");
$pdf->detalleCaja($headerFacturacion,$res1d,$Totales);

$pdf->Ln();



$pdf->AddPage();

$pdf->SetFont('Arial','U',17);
$pdf->Cell(180,7,'Reporte Detalle Caja Diaria Totales',0,0,'C',false);
$pdf->Ln();
$pdf->SetFont('Arial','U',14);
$pdf->Cell(180,7,"Empresa: ".strtoupper($empresa),0,0,'C',false);
$pdf->Ln();
$pdf->Cell(180,7,'Fecha: '.date('Y-m-d'),0,0,'C',false);
// Títulos de las columnas
$headerFacturacion = array("Factura", "Cliente", "Producto","Cantidad", "Importe", "Total");
$pdf->detalleCreditos($headerFacturacion,$res2d,$TotalIngresos);

$pdf->Ln();



$pdf->AddPage();

$pdf->SetFont('Arial','U',17);
$pdf->Cell(180,7,'Reporte Detalle Caja Diaria Totales',0,0,'C',false);
$pdf->Ln();
$pdf->SetFont('Arial','U',14);
$pdf->Cell(180,7,"Empresa: ".strtoupper($empresa),0,0,'C',false);
$pdf->Ln();
$pdf->Cell(180,7,'Fecha: '.date('Y-m-d'),0,0,'C',false);

// Títulos de las columnas
$headerFacturacion = array("Factura", "Cliente", "Producto","Cantidad", "Importe", "Total");
$pdf->detalleEgresos($headerFacturacion,$res3d,$TotalEgresos);

$pdf->Ln();

$pdf->AddPage();
$pdf->SetFont('Arial','U',17);
$pdf->Cell(180,7,'Reporte Detalle Caja Diaria Totales',0,0,'C',false);
$pdf->Ln();
$pdf->SetFont('Arial','U',14);
$pdf->Cell(180,7,"Empresa: ".strtoupper($empresa),0,0,'C',false);
$pdf->Ln();
$pdf->Cell(180,7,'Fecha: '.date('Y-m-d'),0,0,'C',false);
$pdf->Ln();
$pdf->SetFont('Arial','',14);

if (mysql_num_rows($res1)>0) {
	$pdf->Ln();
	$pdf->Cell(60,7,'Caja Real: $ '.number_format(mysql_result($res1,0,0), 2, '.', ','),0,0,'L',false);
	$Totales = mysql_result($res1,0,0);
} else {
	$pdf->Ln();
	$pdf->Cell(60,7,'Caja Real: $ 0',0,0,'L',false);
}

if (mysql_num_rows($res2)>0) {
	$pdf->Ln();
	$pdf->Cell(60,7,'Creditos: $ '.number_format(mysql_result($res2,0,0), 2, '.', ','),0,0,'L',false);
	$TotalIngresos = mysql_result($res2,0,0);
} else {
	$pdf->Ln();
	$pdf->Cell(60,7,'Creditos: $ 0',0,0,'L',false);
} 

if (mysql_num_rows($res3)>0) {
	$pdf->Ln();
	$pdf->Cell(60,7,'Gastos: $ '.number_format(mysql_result($res3,0,0), 2, '.', ','),0,0,'L',false);
	$TotalEgresos = mysql_result($res3,0,0);
} else {
	$pdf->Ln();
	$pdf->Cell(60,7,'Gastos: $ 0',0,0,'L',false);
} 

$pdf->Ln();
$pdf->Cell(60,7,'Total Caja: $ '.number_format((float)$Totales - (float)$TotalEgresos, 2, '.', ','),0,0,'L',false);

$pdf->Ln();
$pdf->Cell(60,7,'Total Dia: $ '.number_format((float)$TotalIngresos + (float)$Totales, 2, '.', ','),0,0,'L',false);

$pdf->Ln();
$pdf->Cell(60,7,'Inicio Caja: $ '.number_format((float)$Caja, 2, '.', ','),0,0,'L',false);

$pdf->Ln();
$pdf->Cell(60,7,'Total Caja + Inicio de Caja: $ '.number_format((float)$Totales - (float)$TotalEgresos + (float)$Caja, 2, '.', ','),0,0,'L',false);

$nombreTurno = "CajaDiariaDetalle-".$fecha.".pdf";

$pdf->Output($nombreTurno,'D');


?>

