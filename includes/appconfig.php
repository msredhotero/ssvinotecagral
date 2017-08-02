<?php

date_default_timezone_set('America/Buenos_Aires');

class appconfig {

function conexion() {
		/*
		$hostname = "localhost";
		$database = "vinoteca";
		$username = "root";
		$password = "";
		*/
		
		//$hostname = "185.28.21.241"; //para conexiones remotas
		
		$hostname = "localhost";
		$database = "u235498999_gvino";
		$username = "u235498999_gvino";
		$password = "rhcp7575";
		//u235498999_kike usuario
		
		
		$conexion = array("hostname" => $hostname,
						  "database" => $database,
						  "username" => $username,
						  "password" => $password);
						  
		return $conexion;
}

}




?>