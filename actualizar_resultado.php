<?php
	$conn_host = "localhost";
	$conn_user = "root";
	$conn_pass = "";
	$conn_bd = "copa_america_2011";

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

	function getNombreEquipo($id,$conn){
		$sql_equipos = "SELECT nombre FROM equipos WHERE id = '".$id."';";
		$rsEquipos = mysql_query($sql_equipos,$conn) or die(mysql_error());
		if($rowEquipos = mysql_fetch_assoc($rsEquipos)){
			return $rowEquipos["nombre"];
		}else{
			return "ERROR!";
		}
	}

	/****************************************************/
	/* convertString2Date                               */
	/* Convierte una fecha en el formato dd/mm/yy       */
	/****************************************************/
	function convertString2Date($variable){
		$fecha_formateada = $variable;
		$hora = substr($fecha_formateada, 11, 2);
		$minutos = substr($fecha_formateada, 14, 2);
		$dia = substr($fecha_formateada, 8, 2);
		$mes = substr($fecha_formateada, 5, 2);
		$fecha_formateada = $hora.":".$minutos." - ".$dia."/".$mes;
		return $fecha_formateada; 
	}

	$conn = Conectarse($conn_host,$conn_user,$conn_pass,$conn_bd);

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
	}else{
	}
?>
	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Copa America 2011</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="pagina">
    <div id="zona_cabezal">
    	<div class="img_cabezal">
      		<img src="logos/ca2011.png" />
        </div>
        <h1>PENCA ONLINE <strong>COPA AMERICA ARGENTTINA</strong> 2011</h1>
        <div id="menu">
        	<a href="fixture.php">FIXTURE</a>
            <a href="clasificacion_grupos.php">GRUPOS</a>
            <a href="log_in.php">PENCA</a>
    	</div>
    </div>
        <div id="actualizar">
            <h2>Actualizar partido</h2>
            <?php
                $sql_partidos = "SELECT * FROM partidos WHERE id =".$_REQUEST["id"]."";
                $rsPartidos = mysql_query($sql_partidos,$conn) or die(mysql_error());
            ?>
            <div class="frm_actualizar">
                <form name="frm_actualizar" action="actualizar_resultado.php?id=<?php echo $_REQUEST["id"];?>" method="post">
                    <table>
                    <?php while($rowPartidos = mysql_fetch_assoc($rsPartidos)){ ?>
                        <tr>
                            <td>Fecha</td>
                            <td align="center">Equipo locatario</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td align="center">Equipo visitante</td>
                            <td align="center">Estado de partido</td>
                        </tr>
                        <tr>
                            <td><?php echo convertString2Date($rowPartidos["fecha"],$conn); ?></td>
                            <td align="center"><?php echo strtoupper(getNombreEquipo($rowPartidos["equipo_locatario"],$conn)); ?></td>
                            <td align="center"><input type="text" name="goles_equipo_locatario"></td>
                            <td>vs</td>
                            <td align="center"><input type="text" name="goles_equipo_visitante"></td>
                            <td align="center"><?php echo strtoupper(getNombreEquipo($rowPartidos["equipo_visitante"],$conn)); ?></td>
                            <td align="center"><input type="checkbox" name="estado_partido" value="1"></td>
                            <td align="center"><input type="submit" value="Actualizar" name="btn_actualizar"></td>
                        </tr>
                    <?php } ?>
                    </table>
                </form>
        	</div>
        </div>
	<div id="pie_pagina">
    	<a href="http://www.conmebol.com"><img src="logos/conmebol.png" width="71" height="71" /></a>
        <a href="http://www.afa.org.ar"><img src="logos/argentina.png" width="53" height="71" /></a>
        <a href="http://www.fbf.com.bo"><img src="logos/bolivia.png" width="61" height="71" /></a>
        <a href="http://www.cbf.com.br"><img src="logos/brasil.png" width="58" height="78" /></a>
        <a href="http://www.anfp.cl"><img src="logos/chile.png" width="71" height="71" /></a>
        <a href="http://www.colfutbol.org"><img src="logos/colombia.png" width="71" height="71" /></a>
        <a href="http://www.fedefutbol.org"><img src="logos/costa_rica.png" width="75" height="75" /></a>
        <a href="http://www.ecuafutbol.org"><img src="logos/ecuador.png" width="79" height="77" /></a>
        <a href="http://www.femexfut.org.mx"><img src="logos/mexico.png" width="61" height="80" /></a>
        <a href="http://www.apf.org.py"><img src="logos/paraguay.png" width="71" height="71" /></a>
        <a href="http://www.fpf.com.pe"><img src="logos/peru.png" width="60" height="70" /></a>
        <a href="http://www.auf.org.uy"><img src="logos/uruguay.png" width="55" height="85" /></a>
        <a href="http://www.auf.org.uy"><img src="logos/venezuela.png" width="55" height="71" /></a>    
     </div>
</div>
</body>
</html>

<?php

	mysql_close($conn); //cierra la conexion

?>
