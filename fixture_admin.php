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
	
	function getNombreEstadio($id,$conn){
		$sql_equipos = "SELECT nombre FROM estadios WHERE id = '".$id."';";
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
        	<a href="index.php">FIXTURE</a>
            <a href="clasificacion_grupos.php">GRUPOS</a>
            <a href="log_in.php">PENCA</a>
    	</div>
    </div>
    <div id="fixture_menu">
        <div class="fixture">	
            <h2>Grupo A</h2>
        
        <?php
            $sql_partidosA = "SELECT * FROM partidos WHERE grupo = 'A' ORDER BY fecha ASC";
            $rsPartidosA = mysql_query($sql_partidosA,$conn) or die(mysql_error());
        ?>
        
        <table width="500">
            <?php while($rowPartidosA = mysql_fetch_assoc($rsPartidosA)){ ?>
            <tr>
              <td width="86" align="center"><?php echo convertString2Date($rowPartidosA["fecha"],$conn); ?></td>
              <td width="70"><?php echo (getNombreEquipo($rowPartidosA["equipo_locatario"],$conn)); ?></td>
              <td width="15" align="center"><div class="resultado"><?php echo $rowPartidosA["goles_equipo_locatario"]; ?></div></td>
              <td width="15" align="center">vs</td>
              <td width="15" align="center"><div class="resultado"><?php echo $rowPartidosA["goles_equipo_visitante"]; ?></div></td>
              <td width="80"><?php echo (getNombreEquipo($rowPartidosA["equipo_visitante"],$conn)); ?></td>
              <td><a href="actualizar_resultado.php?id=<?php echo $rowPartidosA["id"]; ?>"><p1>Ingresar resultado<p1></a></td>
            </tr>
            <?php } ?>
        </table>
        
          <h2>Grupo B</h2>
        <?php
            $sql_partidosB = "SELECT * FROM partidos WHERE grupo = 'B' ORDER BY fecha ASC";
            $rsPartidosB = mysql_query($sql_partidosB,$conn) or die(mysql_error());
        ?>
        
        <table width="500">
            <?php while($rowPartidosB = mysql_fetch_assoc($rsPartidosB)){ ?>
            <tr>
              <td width="86" align="center"><?php echo convertString2Date($rowPartidosB["fecha"],$conn); ?></td>
              <td width="70"><?php echo (getNombreEquipo($rowPartidosB["equipo_locatario"],$conn)); ?></td>
              <td width="15" align="center"><div class="resultado"><?php echo $rowPartidosB["goles_equipo_locatario"]; ?></div></td>
              <td width="15" align="center">vs</td>
              <td width="15" align="center"><div class="resultado"><?php echo $rowPartidosB["goles_equipo_visitante"]; ?></div></td>
              <td width="74"><?php echo (getNombreEquipo($rowPartidosB["equipo_visitante"],$conn)); ?></td>
              <td><a href="actualizar_resultado.php?id=<?php echo $rowPartidosB["id"]; ?>"><p1>Ingresar resultado<p1></a></td>
            </tr>
            <?php } ?>
        </table>
        
            <h2>Grupo C</h2>
        <?php
            $sql_partidosC = "SELECT * FROM partidos WHERE grupo = 'C' ORDER BY fecha ASC";
            $rsPartidosC = mysql_query($sql_partidosC,$conn) or die(mysql_error());
        ?>
        
        <table width="500">
            <?php while($rowPartidosC = mysql_fetch_assoc($rsPartidosC)){ ?>
            <tr>
              <td width="86" align="center"><?php echo convertString2Date($rowPartidosC["fecha"],$conn); ?></td>
              <td width="70"><?php echo (getNombreEquipo($rowPartidosC["equipo_locatario"],$conn)); ?></td>
              <td width="15" align="center"><div class="resultado"><?php echo $rowPartidosC["goles_equipo_locatario"]; ?></div></td>
              <td width="15" align="center">vs</td>
              <td width="15" align="center"><div class="resultado"><?php echo $rowPartidosC["goles_equipo_visitante"]; ?></div></td>
              <td width="74"><?php echo (getNombreEquipo($rowPartidosC["equipo_visitante"],$conn)); ?></td>
              <td><a href="actualizar_resultado.php?id=<?php echo $rowPartidosC["id"]; ?>"><p1>Ingresar resultado<p1></a></td>
            </tr>
            <?php } ?>
        </table>
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
