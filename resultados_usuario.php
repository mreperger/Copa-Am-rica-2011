<?php @session_start(); ?>
<?php require_once("includes/ini.php"); ?>
<?php require_once("classes/equipo.class.php"); ?>
<?php require_once("classes/estadio.class.php"); ?>
<?php if(!isset($_SESSION["id_usuario"])){
			header("Location: log_in.php");
			exit();
	  }else{
	  	if($_SESSION["activo"] == 1){
	  		header("Location: index.php");
			exit();
	  	}
	  }
?>
<?php

	if(isset($_POST["btn_resultado_usuario"])){
		$error = 0;
		
		for($i=1;$i<=26;$i++){
			$resultados[$i]["id_partido"] = $_POST["id_partido_".$i];
			$resultados[$i]["id_equipo_locatario"] = $_POST["id_equipo_locatario_".$i];
			$resultados[$i]["goles_equipo_locatario"] = $_POST["goles_equipo_locatario_".$i];
			$resultados[$i]["id_equipo_visitante"] = $_POST["id_equipo_visitante_".$i];
			$resultados[$i]["goles_equipo_visitante"] = $_POST["goles_equipo_visitante_".$i];
			
			if($resultados[$i]["id_partido"] <= 0 || $resultados[$i]["id_equipo_locatario"] <= 0 || $resultados[$i]["goles_equipo_locatario"] < 0 || $resultados[$i]["id_equipo_visitante"] <= 0 || $resultados[$i]["goles_equipo_visitante"] < 0 || !is_numeric($resultados[$i]["goles_equipo_visitante"]) || !is_numeric($resultados[$i]["goles_equipo_locatario"])){
				$error = 1;
				$msg_err = "Ha ocurrido un error. Verifique los datos y vuelva a intentarlo.";
			}
		}
		$id_usuario_post = $_SESSION["id_usuario"];
		
		if($error == 0){
			for($i=1;$i<=26;$i++){
				$sql = "INSERT INTO `partidos_usuarios` (`id`, `id_usuario`, `id_partido`, `id_equipo_locatario`, `goles_equipo_locatario`, `id_equipo_visitante`, `goles_equipo_visitante`) " .
				" VALUES (NULL, '".$id_usuario_post."', '".$resultados[$i]["id_partido"]."', '".$resultados[$i]["id_equipo_locatario"]."', '".$resultados[$i]["goles_equipo_locatario"]."', '".$resultados[$i]["id_equipo_visitante"]."', '".$resultados[$i]["goles_equipo_visitante"]."');";
				mysql_query($sql,$conn) or die("Error al insertar");
			}
			//Activo usuario
			$sql_update = "UPDATE usuarios SET activo = '1' WHERE id = '".$id_usuario_post."'";
			mysql_query($sql_update, $conn) or die("Error al actualizar");
			
			header("Location: index.php?res=".$id_usuario_post);
				
		}
	}

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
		$sql_partidoS1 = "SELECT * FROM partidos WHERE id = '51'";
		$sql_partidoS2 = "SELECT * FROM partidos WHERE id = '52'";
		$sql_partidoS3 = "SELECT * FROM partidos WHERE id = '53'";
		$sql_partidoS4 = "SELECT * FROM partidos WHERE id = '54'";
		$sql_partidoG1 = "SELECT * FROM partidos WHERE id = '55'";
		$sql_partidoG2 = "SELECT * FROM partidos WHERE id = '56'";
		$sql_partidoTERCER = "SELECT * FROM partidos WHERE id = '57'";
		$sql_partidoFINAL = "SELECT * FROM partidos WHERE id = '58'";
	}
	
	$rsPartidosA = mysql_query($sql_partidosA,$conn) or die(mysql_error());
	$rsPartidosB = mysql_query($sql_partidosB,$conn) or die(mysql_error());
	$rsPartidosC = mysql_query($sql_partidosC,$conn) or die(mysql_error());
	
	$rsPartidoS1 = mysql_query($sql_partidoS1,$conn) or die(mysql_error());
	$rowPartidoS1 = mysql_fetch_assoc($rsPartidoS1) or die(mysql_error());
	
	$rsPartidoS2 = mysql_query($sql_partidoS2,$conn) or die(mysql_error());
	$rowPartidoS2 = mysql_fetch_assoc($rsPartidoS2) or die(mysql_error());
	
	$rsPartidoS3 = mysql_query($sql_partidoS3,$conn) or die(mysql_error());
	$rowPartidoS3 = mysql_fetch_assoc($rsPartidoS3) or die(mysql_error());
	
	$rsPartidoS4 = mysql_query($sql_partidoS4,$conn) or die(mysql_error());
	$rowPartidoS4 = mysql_fetch_assoc($rsPartidoS4) or die(mysql_error());
	
	$rsPartidoG1 = mysql_query($sql_partidoG1,$conn) or die(mysql_error());
	$rowPartidoG1 = mysql_fetch_assoc($rsPartidoG1) or die(mysql_error());
	
	$rsPartidoG2 = mysql_query($sql_partidoG2,$conn) or die(mysql_error());
	$rowPartidoG2 = mysql_fetch_assoc($rsPartidoG2) or die(mysql_error());
	
	$rsPartidoTERCER = mysql_query($sql_partidoTERCER,$conn) or die(mysql_error());
	$rowPartidoTERCER = mysql_fetch_assoc($rsPartidoTERCER) or die(mysql_error());
	
	$rsPartidoFINAL = mysql_query($sql_partidoFINAL,$conn) or die(mysql_error());
	$rowPartidoFINAL = mysql_fetch_assoc($rsPartidoFINAL) or die(mysql_error());
?>
<?php require_once("includes/conversion.php"); ?>
<?php include("templates/html_head.tpl.php"); ?>
<?php include("templates/menu.tpl.php"); ?>

<?php include("templates/mis_partidos.tpl.php"); ?>

<?php include("templates/footer_logos.tpl.php"); ?>
<?php include("templates/html_footer.tpl.php"); ?>
<?php require_once("includes/conn_close.php"); ?>