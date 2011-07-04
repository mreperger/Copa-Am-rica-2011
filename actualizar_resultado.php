<?php session_start(); ?>
<?php require_once("includes/ini.php"); ?>
<?php require_once("classes/equipo.class.php"); ?>
<?php require_once("classes/estadio.class.php"); ?>
<?php
	$sql_usuario = "SELECT * FROM usuarios";
	$rsUsuario = mysql_query($sql_usuario,$conn) or die(mysql_error());
	$rowUsuario = mysql_fetch_assoc($rsUsuario);
	
	if(!isset($_SESSION["id_usuario"])){
		$_SESSION["url_back"] = "fixture_admin.php";
		$_SESSION["log_message"] = "Debe de ingrear usuario";
		header("Location: log_in.php");
		exit();
	}else{
		if($_SESSION["tipo"] != 1){
			$_SESSION["url_back"] = "fixture_admin.php";
			$_SESSION["log_message"] = "Error! Esta intentando ingresar en &aacute;rea restringida";
			header("Location: log_in.php");
			exit();
		}
	}
?>
<?php
	//Lógica del Programa
	if(isset($_POST["btn_actualizar"])){
		if($_POST["goles_equipo_locatario"] != "" && $_POST["goles_equipo_visitante"] != ""){
			$sql_update = "UPDATE partidos SET goles_equipo_locatario = ".$_POST["goles_equipo_locatario"].", 
				goles_equipo_visitante =".$_POST["goles_equipo_visitante"].", estado_partido ='".$_POST["estado_partido"]."' WHERE id =".$_REQUEST["id"]."";
			mysql_query($sql_update,$conn) or die(mysql_error());
			header("location:fixture_admin.php");
		}else{
			echo "ERROR!!!";
		}
	}
?>

<?php require_once("includes/conversion.php"); ?>

<?php include("templates/html_head.tpl.php"); ?>
<?php include("templates/menu.tpl.php"); ?>

<?php include("templates/actualizar_resultado.tpl.php"); ?>

<?php include("templates/footer_logos.tpl.php"); ?>
<?php include("templates/html_footer.tpl.php"); ?>
<?php require_once("includes/conn_close.php"); ?>
