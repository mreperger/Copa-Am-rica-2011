<?php session_start(); ?>
<?php require_once("includes/ini.php"); ?>
<?php require_once("classes/equipo.class.php"); ?>
<?php
	//SACAR ESTO
	function getNombreEstadio($id,$conn){
		$sql_equipos = "SELECT nombre FROM estadios WHERE id = '".$id."';";
		$rsEquipos = mysql_query($sql_equipos,$conn) or die(mysql_error());
		if($rowEquipos = mysql_fetch_assoc($rsEquipos)){
			return $rowEquipos["nombre"];
		}else{
			return "ERROR!";
		}
	}

?>
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
		}
	}else{
		//cargo partidos genericos
        $sql_partidosA = "SELECT * FROM partidos WHERE grupo = 'A' ORDER BY fecha ASC";        
		$sql_partidosB = "SELECT * FROM partidos WHERE grupo = 'B' ORDER BY fecha ASC";
		$sql_partidosC = "SELECT * FROM partidos WHERE grupo = 'C' ORDER BY fecha ASC";			
	}
	
	$rsPartidosA = mysql_query($sql_partidosA,$conn) or die(mysql_error());
	$rsPartidosB = mysql_query($sql_partidosB,$conn) or die(mysql_error());
	$rsPartidosC = mysql_query($sql_partidosC,$conn) or die(mysql_error());
?>

<?php require_once("includes/conversion.php"); ?>

<?php include("templates/html_head.tpl.php"); ?>
<?php include("templates/menu.tpl.php"); ?>

<?php include("templates/fixture.tpl.php"); ?>

<?php include("templates/footer_logos.tpl.php"); ?>
<?php include("templates/html_footer.tpl.php"); ?>
<?php require_once("includes/conn_close.php"); ?>
