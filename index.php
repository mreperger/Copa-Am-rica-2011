<?php session_start(); ?>
<?php require_once("includes/ini.php"); ?>
<?php require_once("classes/equipo.class.php"); ?>
<?php require_once("classes/estadio.class.php"); ?>
<?php
	if(isset($_GET["res"])){
		if($_GET["res"] == 0){
			$_SESSION["url_back"] = "index.php";
			$_SESSION["param_back"] = "res";
			header("Location: log_in.php");
			exit();
		}else{
			//cargo partidos del usuario
			$sql_partidosA = "SELECT P.fecha, P.grupo, P.id_estadio, P.estado_partido, P.id, U.id_equipo_locatario, U.goles_equipo_locatario, U.id_equipo_visitante, U.goles_equipo_visitante FROM partidos as P, partidos_usuarios as U WHERE P.grupo = 'A' AND U.id_usuario = ".$_GET["res"]." AND P.id = U.id_partido ORDER BY P.fecha ASC";
			$sql_partidosB = "SELECT P.fecha, P.grupo, P.id_estadio, P.estado_partido, P.id, U.id_equipo_locatario, U.goles_equipo_locatario, U.id_equipo_visitante, U.goles_equipo_visitante FROM partidos as P, partidos_usuarios as U WHERE P.grupo = 'B' AND U.id_usuario = ".$_GET["res"]." AND P.id = U.id_partido ORDER BY P.fecha ASC";
			$sql_partidosC = "SELECT P.fecha, P.grupo, P.id_estadio, P.estado_partido, P.id, U.id_equipo_locatario, U.goles_equipo_locatario, U.id_equipo_visitante, U.goles_equipo_visitante FROM partidos as P, partidos_usuarios as U WHERE P.grupo = 'C' AND U.id_usuario = ".$_GET["res"]." AND P.id = U.id_partido ORDER BY P.fecha ASC";
			$sql_partidoS1 = "SELECT P.fecha, P.grupo, P.id_estadio, P.estado_partido, P.id, U.id_equipo_locatario, U.goles_equipo_locatario, U.id_equipo_visitante, U.goles_equipo_visitante FROM partidos as P, partidos_usuarios as U WHERE P.id = '51' AND U.id_usuario = ".$_GET["res"]." AND P.id = U.id_partido ORDER BY P.fecha ASC";
			$sql_partidoS2 = "SELECT P.fecha, P.grupo, P.id_estadio, P.estado_partido, P.id, U.id_equipo_locatario, U.goles_equipo_locatario, U.id_equipo_visitante, U.goles_equipo_visitante FROM partidos as P, partidos_usuarios as U WHERE P.id = '52' AND U.id_usuario = ".$_GET["res"]." AND P.id = U.id_partido ORDER BY P.fecha ASC";
			$sql_partidoS3 = "SELECT P.fecha, P.grupo, P.id_estadio, P.estado_partido, P.id, U.id_equipo_locatario, U.goles_equipo_locatario, U.id_equipo_visitante, U.goles_equipo_visitante FROM partidos as P, partidos_usuarios as U WHERE P.id = '53' AND U.id_usuario = ".$_GET["res"]." AND P.id = U.id_partido ORDER BY P.fecha ASC";
			$sql_partidoS4 = "SELECT P.fecha, P.grupo, P.id_estadio, P.estado_partido, P.id, U.id_equipo_locatario, U.goles_equipo_locatario, U.id_equipo_visitante, U.goles_equipo_visitante FROM partidos as P, partidos_usuarios as U WHERE P.id = '54' AND U.id_usuario = ".$_GET["res"]." AND P.id = U.id_partido ORDER BY P.fecha ASC";
			$sql_partidoG1 = "SELECT P.fecha, P.grupo, P.id_estadio, P.estado_partido, P.id, U.id_equipo_locatario, U.goles_equipo_locatario, U.id_equipo_visitante, U.goles_equipo_visitante FROM partidos as P, partidos_usuarios as U WHERE P.id = '55' AND U.id_usuario = ".$_GET["res"]." AND P.id = U.id_partido ORDER BY P.fecha ASC";
			$sql_partidoG2 = "SELECT P.fecha, P.grupo, P.id_estadio, P.estado_partido, P.id, U.id_equipo_locatario, U.goles_equipo_locatario, U.id_equipo_visitante, U.goles_equipo_visitante FROM partidos as P, partidos_usuarios as U WHERE P.id = '56' AND U.id_usuario = ".$_GET["res"]." AND P.id = U.id_partido ORDER BY P.fecha ASC";
			$sql_partidoTERCER = "SELECT P.fecha, P.grupo, P.id_estadio, P.estado_partido, P.id, U.id_equipo_locatario, U.goles_equipo_locatario, U.id_equipo_visitante, U.goles_equipo_visitante FROM partidos as P, partidos_usuarios as U WHERE P.id = '57' AND U.id_usuario = ".$_GET["res"]." AND P.id = U.id_partido ORDER BY P.fecha ASC";
			$sql_partidoFINAL = "SELECT P.fecha, P.grupo, P.id_estadio, P.estado_partido, P.id, U.id_equipo_locatario, U.goles_equipo_locatario, U.id_equipo_visitante, U.goles_equipo_visitante FROM partidos as P, partidos_usuarios as U WHERE P.id = '58' AND U.id_usuario = ".$_GET["res"]." AND P.id = U.id_partido ORDER BY P.fecha ASC";
		}
	}else{
		//cargo partidos genericos
        $sql_partidosA = "SELECT * FROM partidos WHERE grupo = 'A' ORDER BY fecha ASC";
		$sql_partidosB = "SELECT * FROM partidos WHERE grupo = 'B' ORDER BY fecha ASC";
		$sql_partidosC = "SELECT * FROM partidos WHERE grupo = 'C' ORDER BY fecha ASC";
		$sql_partidoS1 = "SELECT * FROM partidos WHERE id = 51";
		$sql_partidoS2 = "SELECT * FROM partidos WHERE id = 52";
		$sql_partidoS3 = "SELECT * FROM partidos WHERE id = 53";
		$sql_partidoS4 = "SELECT * FROM partidos WHERE id = 54";
		$sql_partidoG1 = "SELECT * FROM partidos WHERE id = 55";
		$sql_partidoG2 = "SELECT * FROM partidos WHERE id = 55";
		$sql_partidoTERCER = "SELECT * FROM partidos WHERE id = 56";
		$sql_partidoFINAL = "SELECT * FROM partidos WHERE id = 57";
	}
	
	$rsPartidosA = mysql_query($sql_partidosA,$conn) or die(mysql_error());
	$rsPartidosB = mysql_query($sql_partidosB,$conn) or die(mysql_error());
	$rsPartidosC = mysql_query($sql_partidosC,$conn) or die(mysql_error());
	$rsPartidoS1 = mysql_query($sql_partidoS1,$conn) or die(mysql_error());
	$rsPartidoS2 = mysql_query($sql_partidoS2,$conn) or die(mysql_error());
	$rsPartidoS3 = mysql_query($sql_partidoS3,$conn) or die(mysql_error());
	$rsPartidoG1 = mysql_query($sql_partidoG1,$conn) or die(mysql_error());
	$rsPartidoG2 = mysql_query($sql_partidoG2,$conn) or die(mysql_error());
	$rsPartidoTERCER = mysql_query($sql_partidoTERCER,$conn) or die(mysql_error());
	$rsPartidoFINAL = mysql_query($sql_partidoFINAL,$conn) or die(mysql_error());
?>

<?php require_once("includes/conversion.php"); ?>

<?php include("templates/html_head.tpl.php"); ?>
<?php include("templates/menu.tpl.php"); ?>

<?php include("templates/fixture.tpl.php"); ?>

<?php include("templates/footer_logos.tpl.php"); ?>
<?php include("templates/html_footer.tpl.php"); ?>
<?php require_once("includes/conn_close.php"); ?>
