<?php 
	require_once("includes/constants.php");
	require_once("includes/conn.php");
	require_once("classes/usuario.class.php");
	
	if(isset($_SESSION["id_usuario"])){
		$usuario_global = new Usuario($_SESSION["id_usuario"], $conn);
	}
?>