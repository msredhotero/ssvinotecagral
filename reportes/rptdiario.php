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

$pdf = new FPDF();

$pdf->AddPage();

$pdf->SetFont('Arial','U',17);
$pdf->Cell(180,7,'Reporte Caja Diaria Totales',0,0,'C',false);
$pdf->Ln();
$pdf->SetFont('Arial','U',14);
$pdf->Cell(180,7,"Empresa: ".strtoupper($empresa),0,0,'C',false);
$pdf->Ln();
$pdf->Cell(180,7,'Fecha: '.date('Y-m-d'),0,0,'C',false);
$pdf->Ln();

$pdf->SetFont('Arial','',10);

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

$nombreTurno = "CajaDiaria-".$fecha.".pdf";

$pdf->Output($nombreTurno,'D');


?>

