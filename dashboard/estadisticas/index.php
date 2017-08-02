<?php


session_start();


if (!isset($_SESSION['usua_predio']))
{
	header('Location: ../error.php');
} else {


include ('../../includes/funcionesUsuarios.php');
include ('../../includes/funcionesHTML.php');
include ('../../includes/funciones.php');
include ('../../includes/funcionesReferencias.php');

$serviciosUsuario = new ServiciosUsuarios();
$serviciosHTML = new ServiciosHTML();
$serviciosFunciones = new Servicios();
$serviciosReferencias 	= new ServiciosReferencias();

$fecha = date('Y-m-d');

//$resProductos = $serviciosProductos->traerProductosLimite(6);
$resMenu = $serviciosHTML->menu(utf8_encode($_SESSION['nombre_predio']),"Reportes",$_SESSION['refroll_predio'],'');


?>

<!DOCTYPE HTML>
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">



<title>Gesti&oacute;n: Vinoteca</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<link href="../../css/estiloDash.css" rel="stylesheet" type="text/css">
    

    
    <script type="text/javascript" src="../../js/jquery-1.8.3.min.js"></script>
    <link rel="stylesheet" href="../../css/jquery-ui.css">

    <script src="../../js/jquery-ui.js"></script>
    
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../../css/bootstrap-datetimepicker.min.css">
	<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	<script src="http://cdn.oesmith.co.uk/morris-0.4.1.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">
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

<h3>Reportes</h3>

    <div class="boxInfoLargo tile-stats stat-til tile-white">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Estadisticas</p>
        	
        </div>
    	<div class="cuerpoBox">
        	<form class="form-inline formulario" role="form">
        	<div class="row">
            	<div class="form-group col-md-4 col-xs-6" style="display:'.$lblOculta.'">
                    <label for="fecha1" class="control-label" style="text-align:left">Seleccione el Año</label>
                    <div class="input-group col-md-6 col-xs-12">
                    <select class="form-control" id="anio" name="anio">
                    	<?php 
                        	for ($i=2017;$i<=(integer)date('Y');$i++) {
                        ?>
                    	<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php
							}
						?>
                    </select>
                    </div>
                </div>
                
                
                <div class="form-group col-md-6">
                    <label class="control-label" style="text-align:left" for="refcliente">Acción</label>

                    	<ul class="list-inline">
                        	<li>
                    			<button type="button" class="btn btn-info" id="rptCajaDiaria" style="margin-left:0px;">Caja Mensual</button>
                            </li>
                            <li>
                    			<button type="button" class="btn btn-info" id="rptCajaDiariaDetalle" style="margin-left:0px;">Consumo de Uvas</button>
                            </li>
                            <!--<li>
                        		<button type="button" class="btn btn-default" id="rptCJExcel" style="margin-left:0px;">Generar Excel</button>
                            </li>-->
                        </ul>

                </div>
                
                <div class="form-group col-md-12">
                	
                    <h3>Caja Mensual por Año: <span class="lblAnio"></span></h3>
                    <hr>
                	<div align="center">
                    <div id="graph"></div>
                    
                    </div>
                </div>
                
                <div class="form-group col-md-12">
                    
                    <h3>Consumo Uvas por Año: <span class="lblAnio2"></span></h3>
                    <hr>
                    <div align="center">
                    
                    <div id="graph2"></div>
                    <pre id="code2" class="prettyprint linenums" style="display:none;">
        
                    </pre>
                    </div>
                </div>
                

            </div>
            
            
            <div class='row' style="margin-left:25px; margin-right:25px;">
                <div class='alert'>
                
                </div>
                <div id='load'>
                
                </div>
            </div>

            </form>
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
	
	
	function GraficosAnual() {
		$.ajax({
				data:  {anio : $('#anio').val(),
						accion: 'traerVentasPorAno'},
				url:   '../../ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
					$('#graph').html('');
				},
				success:  function (response) {
						json = $.parseJSON(response);
						
						var myarray = [];
						$('.lblAnio').html($('#anio').val());
						$.each(json, function(i, item) {
							
								myarray.push({
									y: item.nombremes, 
									a: item.total
								});	
							
						});

						Morris.Bar({
								  element: 'graph',
								  data: myarray,
							  xkey: 'y',
							  ykeys: ['a'],
							  labels: ['Totales'],
							  xLabelMargin: 10,
							  resize: true
							});

				}
		});
	}
	
	//Morris.Bar({ element: 'graficoAnual', data: [ { y: '3', a: 153.00 },{ y: '2', a: 6.00 },{ y: '1', a: 1084.00 }], xkey: 'y', ykeys: ['a'], labels: ['Totales'] });


	$("#rptCajaDiaria").click(function(event) {
        GraficosAnual();
						
    });
	
	
	$("#rptCajaDiariaDetalle").click(function(event) {
        graficosProductosConsumo();
						
    });
	
	function graficosProductosConsumo2() {
	  $('.lblAnio2').html($('#anio').val());	
	  eval($('#code2').text());
	  prettyPrint();
	}
	
	
	function graficosProductosConsumo() {
		$.ajax({
				data:  {anio : $('#anio').val(),
						accion: 'graficosProductosConsumo'},
				url:   '../../ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
						
				},
				success:  function (response) {
						$('#code2').html(response);
						graficosProductosConsumo2();
						
				}
		});
	}
	
	
	/*
	var chart = Morris.Bar({
    // ID of the element in which to draw the chart.
		element: 'graficoAnual',
		data: [0, 0], // Set initial data (ideally you would provide an array of default data)
		xkey: 'date', // Set the key for X-axis
		ykeys: ['value'], // Set the key for Y-axis
		labels: ['Totales'] // Set the label when bar is rolled over
	  });
	  */
	//Morris.Bar({ element: 'graficoAnual', data: [ { y: '3', a: 153.00 },{ y: '2', a: 6.00 },{ y: '1', a: 1084.00 }], xkey: 'y', ykeys: ['a'], labels: ['Totales'] });
	
	

});
</script>
<script type="text/javascript">
/*
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
*/
</script>

<script>
  $(function() {
	  $.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '<Ant',
 nextText: 'Sig>',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'dd/mm/yy',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);
 
    $( "#fecha1" ).datepicker();
    $( "#fecha1" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	
	$( "#fechadesde2" ).datepicker();
    $( "#fechadesde2" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	
	$( "#fechadesde3" ).datepicker();
    $( "#fechadesde3" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	
	$( "#fechadesde4" ).datepicker();
    $( "#fechadesde4" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	
	$( "#fechadesde5" ).datepicker();
    $( "#fechadesde5" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	
	
	$( "#fechahasta1" ).datepicker();
    $( "#fechahasta1" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	
	$( "#fechahasta2" ).datepicker();
    $( "#fechahasta2" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	
	$( "#fechahasta3" ).datepicker();
    $( "#fechahasta3" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	
	$( "#fechahasta4" ).datepicker();
    $( "#fechahasta4" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	
	$( "#fechahasta5" ).datepicker();
    $( "#fechahasta5" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	
  });
  </script>
<?php } ?>
</body>
</html>
