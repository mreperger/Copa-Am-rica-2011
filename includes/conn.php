<?php
	$conn_host = "localhost";
	$conn_user = "root";
	$conn_pass = "";
	$conn_bd = "copa_america_2011";
	/*$conn_host = "mysql02.factor1a.com";
	$conn_user = "factor1_cpAm1r1";
	$conn_pass = "copa1COP";
	$conn_bd = "factor1_copaamerica";*/
	
	function Conectarse($servidor, $usuario, $pwd, $db)
	{
	   if (!($link=mysql_connect($servidor,$usuario,$pwd)))
	   {
		  echo "Error conectando a la base de datos.";
		  exit();
	   }
	   if (!mysql_select_db($db,$link))
	   {
		  echo "Error seleccionando la base de datos.";
		  exit();
	   }
	   return $link;
	}
	
	$conn = Conectarse($conn_host,$conn_user,$conn_pass,$conn_bd);
?>