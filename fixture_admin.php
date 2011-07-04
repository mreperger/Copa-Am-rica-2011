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

<?php require_once("includes/conversion.php"); ?>

<?php include("templates/html_head.tpl.php"); ?>
<?php include("templates/menu.tpl.php"); ?>
<?php
	$sql_partidosA = "SELECT * FROM partidos WHERE grupo = 'A' ORDER BY fecha ASC";
	$sql_partidosB = "SELECT * FROM partidos WHERE grupo = 'B' ORDER BY fecha ASC";
	$sql_partidosC = "SELECT * FROM partidos WHERE grupo = 'C' ORDER BY fecha ASC";
	$sql_partidoS1 = "SELECT * FROM partidos WHERE id = 51";
	$sql_partidoS2 = "SELECT * FROM partidos WHERE id = 52";
	$sql_partidoS3 = "SELECT * FROM partidos WHERE id = 53";
	$sql_partidoS4 = "SELECT * FROM partidos WHERE id = 54";
	$sql_partidoG1 = "SELECT * FROM partidos WHERE id = 55";
	$sql_partidoG2 = "SELECT * FROM partidos WHERE id = 56";
	$sql_partidoTERCER = "SELECT * FROM partidos WHERE id = 57";
	$sql_partidoFINAL = "SELECT * FROM partidos WHERE id = 58";

	
	$rsPartidosA = mysql_query($sql_partidosA,$conn) or die(mysql_error());
	$rsPartidosB = mysql_query($sql_partidosB,$conn) or die(mysql_error());
	$rsPartidosC = mysql_query($sql_partidosC,$conn) or die(mysql_error());
	$rsPartidoS1 = mysql_query($sql_partidoS1,$conn) or die(mysql_error());
	$rsPartidoS2 = mysql_query($sql_partidoS2,$conn) or die(mysql_error());
	$rsPartidoS3 = mysql_query($sql_partidoS3,$conn) or die(mysql_error());
	$rsPartidoS4 = mysql_query($sql_partidoS4,$conn) or die(mysql_error());
	$rsPartidoG1 = mysql_query($sql_partidoG1,$conn) or die(mysql_error());
	$rsPartidoG2 = mysql_query($sql_partidoG2,$conn) or die(mysql_error());
	$rsPartidoTERCER = mysql_query($sql_partidoTERCER,$conn) or die(mysql_error());
	$rsPartidoFINAL = mysql_query($sql_partidoFINAL,$conn) or die(mysql_error());
?>
<?php include("templates/admin.tpl.php"); ?>

<?php include("templates/footer_logos.tpl.php"); ?>
<?php include("templates/html_footer.tpl.php"); ?>
<?php require_once("includes/conn_close.php"); ?>
