<?php

date_default_timezone_set('America/Buenos_Aires');

include ('../includes/funcionesUsuarios.php');
include ('../includes/funciones.php');
include ('../includes/funcionesHTML.php');
include ('../includes/funcionesReferencias.php');


$serviciosUsuarios  		= new ServiciosUsuarios();
$serviciosFunciones 		= new Servicios();
$serviciosHTML				= new ServiciosHTML();
$serviciosReferencias 		= new ServiciosReferencias();
//$serviciosReportes			= new ServiciosReportes();

$fecha = date('Y-m-d');

require('fpdf.php');

//$header = array("Hora", "Cancha 1", "Cancha 2", "Cancha 3");

$id				=	$_GET['id'];

$resEmpresa		=	$serviciosReferencias->traerConfiguracionUltima();

$resFactura		=	$serviciosReferencias->traerVentasPorId($id);

if (mysql_num_rows($resEmpresa)>0) {
	$empresa		=	mysql_result($resEmpresa,0,1);
	$cuit			=	mysql_result($resEmpresa,0,2);
	$direccion		=	mysql_result($resEmpresa,0,3);
	$telefono		=	mysql_result($resEmpresa,0,4);
	$email			=	mysql_result($resEmpresa,0,5);
	$ciudad			=	mysql_result($resEmpresa,0,6);
	$codpostal		=	mysql_result($resEmpresa,0,7);
} else {
	$empresa		=	'';
	$cuit			=	'';
	$direccion		=	'';
	$telefono		=	'';
	$email			=	'';
	$ciudad			=	'';
	$codpostal		=	'';
}

$datos			=	$serviciosReferencias->traerDetalleventasPorVenta($id);

$TotalIngresos = 0;
$TotalEgresos = 0;
$Totales = 0;
$Caja = 0;



class PDF extends FPDF
{
// Cargar los datos




// Tabla coloreada
function ingresosFacturacion($header, $data, &$TotalIngresos)
{
	$this->SetFont('Arial','',12);
	$this->Ln();
	$this->Ln();
	$this->Cell(60,7,'Facturación General',0,0,'L',false);
	$this->SetFont('Arial','',11);
    // Colores, ancho de línea y fuente en negrita
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
	$this->Ln();
	
	
    // Cabecera
    $w = array(80,30,30,30);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],6,$header[$i],1,0,'C',true);
    $this->Ln();
    // Restauración de colores y fuentes
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Datos
    $fill = false;
	
	$total = 0;
	$totalcant = 0;
	$sumSaldos = 0;
	$sumAbonos = 0;
	
	$this->SetFont('Arial','',9);
    while ($row = mysql_fetch_array($data))
    {
		$sumSaldos = $sumSaldos + $row['total'];
		$total = $total + $row['total'];
		$totalcant = $totalcant + 1;
		
        $this->Cell($w[0],5,$row['nombre'],'LR',0,'L',$fill);
		$this->Cell($w[1],5,number_format($row['cantidad'],0,',','.'),'LR',0,'C',$fill);
		$this->Cell($w[2],5,number_format($row['precio'],2,',','.'),'LR',0,'R',$fill);
		$this->Cell($w[3],5,number_format($row['total'],2,',','.'),'LR',0,'R',$fill);
        $this->Ln();
        
		
		if ($totalcant == 25) {
			$this->AddPage();
			$this->SetFont('Arial','',11);
			// Colores, ancho de línea y fuente en negrita
			$this->SetFillColor(255,0,0);
			$this->SetTextColor(255);
			$this->SetDrawColor(128,0,0);
			$this->SetLineWidth(.3);
			for($i=0;$i<count($header);$i++)
				$this->Cell($w[$i],6,$header[$i],1,0,'C',true);
			$this->Ln();
			$this->SetFillColor(224,235,255);
			$this->SetTextColor(0);
			$this->SetFont('');
			// Datos
			$fill = false;
			$this->SetFont('Arial','',9);
		}
    }
	
	$this->Cell($w[0]+$w[1]+$w[2],5,'Totales:','LRT',0,'L',$fill);
	$this->Cell($w[3],5,number_format($total,2,',','.'),'LRT',0,'R',$fill);

	$fill = !$fill;
	$this->Ln();
    // Línea de cierre
    $this->Cell(array_sum($w),0,'','T');
	$this->SetFont('Arial','',12);
	$this->Ln();
	$this->Ln();
	$this->Cell(60,7,'Cantidad de items: '.$totalcant,0,0,'L',false);
	$this->Ln();
	$this->Cell(60,7,'Total: $'.number_format($sumSaldos, 2, '.', ','),0,0,'L',false);
	
	$TotalIngresos = $TotalIngresos + $total;
}

//Pie de página
function Footer()
{

$this->SetY(-10);

$this->SetFont('Arial','I',8);

$this->Cell(0,10,'Pagina '.$this->PageNo()." - Fecha: ".date('Y-m-d')." ** No válido como factura",0,0,'C');
}

}






$pdf = new PDF();


// Títulos de las columnas

$headerFacturacion = array("Detalle", "Cantidad", "Precio","SubTotal");
// Carga de datos

$pdf->AddPage();

$pdf->Image('../imagenes/login-1.png',2,2,40);

$pdf->SetFont('Arial','',14);
$pdf->SetXY(42,3);
$pdf->Cell(32,5,'Razon Social: ',0,0,'L',false);
$pdf->SetXY(74,3);
$pdf->Cell(58,5,strtoupper($empresa),0,0,'L',false);

$pdf->SetFont('Arial','',11);

$pdf->SetXY(42,9);
$pdf->Cell(24,5,"CUIT: ",0,0,'L',false);
$pdf->SetXY(66,9);
$pdf->Cell(90,5,$cuit,0,0,'L',false);

$pdf->SetXY(42,14);
$pdf->Cell(24,5,"Dirección: ",0,0,'L',false);
$pdf->SetXY(66,14);
$pdf->Cell(90,5,$direccion,0,0,'L',false);

$pdf->SetXY(42,19);
$pdf->Cell(24,5,"Teléfono: ",0,0,'L',false);
$pdf->SetXY(66,19);
$pdf->Cell(90,5,$telefono,0,0,'L',false);

$pdf->SetXY(42,24);
$pdf->Cell(24,5,"Ciudad: ",0,0,'L',false);
$pdf->SetXY(66,24);
$pdf->Cell(90,5,$ciudad,0,0,'L',false);

$pdf->SetXY(42,29);
$pdf->Cell(24,5,"Cod.Postal: ",0,0,'L',false);
$pdf->SetXY(66,29);
$pdf->Cell(90,5,$codpostal,0,0,'L',false);

$pdf->SetXY(42,34);
$pdf->Cell(24,5,"Email: ",0,0,'L',false);
$pdf->SetXY(66,34);
$pdf->Cell(90,5,$email,0,0,'L',false);


$pdf->SetXY(158,4);
$pdf->Cell(50,5,'Fecha: '.mysql_result($resFactura,0,'fecha'),1,0,'L',false);

$pdf->SetXY(158,11);
$pdf->Cell(50,5,'NºFactura: '.mysql_result($resFactura,0,'numero'),1,0,'L',false);

$pdf->SetFont('Arial','',10);

$pdf->SetXY(2,36);

$pdf->ingresosFacturacion($headerFacturacion,$datos,$TotalFacturacion);



$pdf->Ln();

$pdf->SetFont('Arial','',13);

$nombreTurno = "rptFacturacionGeneral-".$fecha.".pdf";

$pdf->Output($nombreTurno,'D');

/*
require('fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'¡Hola, Mundo!');
$pdf->Output();
*/
?>

