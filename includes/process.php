<?php
 	$hostname = "185.28.21.241"; //para conexiones remotas
		
	//$hostname = "localhost";
	$database = "u235498999_libre";
	$username = "u235498999_libre";
	$password = "rhcp7575";
	error_reporting(0);	
	$idconnect = mysql_connect($hostname,$username,$password);
	
	if ($idconnect==0) {
		echo " Off-Line ";
	}else {
		echo " On-Line ";
	}
?>