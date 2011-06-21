<?php
	
	require_once("includes/conn.php");
	require_once("classes/equipo.class.php");

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
        	<a class="boton_selec" href="index.php">FIXTURE</a>
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
              <td width="70"><?php echo (getNombreEquipo($rowPartidosA["equipo_visitante"],$conn)); ?></td>
              <td width="141"><p1><?php echo (getNombreEstadio($rowPartidosA["id_estadio"],$conn)); ?></p1></td>
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
              <td width="70"><?php echo (getNombreEquipo($rowPartidosB["equipo_visitante"],$conn)); ?></td>
              <td width="141"><p1><?php echo (getNombreEstadio($rowPartidosB["id_estadio"],$conn)); ?></p1></td>
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
              <td width="70"><?php echo (getNombreEquipo($rowPartidosC["equipo_visitante"],$conn)); ?></td>
              <td width="141"><p1><?php echo (getNombreEstadio($rowPartidosC["id_estadio"],$conn)); ?></p1></td>
            </tr>
            <?php } ?>
        </table>
        </div>
        
        <div class="fixture_finales">
            <h2>Cuartos de Finales</h2>
            <table>
              <tr>
                <td width="86" align="center">16:00 - 16/07</td>
                <td width="89">1ºGrupo A</td>
                <td width="17" align="center"></td>
                <td width="17" align="center">vs</td>
                <td width="17"></td>
                <td width="114">Mejor Tercero</td>
                <td width="69"><p1>Cordoba</p1></td>
                <td width="17">S1</td>
              </tr>
              <tr>
                <td width="86" align="center">19:15 - 16/07</td>
                <td width="89">2ºGrupo A</td>
                <td width="17" align="center"></td>
                <td width="17" align="center">vs</td>
                <td width="17"></td>
                <td width="114">2ºGrupo C</td>
                <td width="69"><p1>Santa Fé</p1></td>
                <td>S2</td>
              </tr>
              <tr>
                <td width="86" align="center">16:00 - 17/07</td>
                <td width="89">1ºGrupo B</td>
                <td width="17" align="center"></td>
                <td width="17" align="center">vs</td>
                <td width="17" align="center"></td>
                <td width="114">2ºMejor Tercero</td>
                <td width="69"><p1>La Plata</p1></td>
                <td>S3</td>
              </tr>
              <tr>
                <td width="86" align="center">19:15 - 17/07</td>
                <td width="89">1ºGrupo C</td>
                <td width="17" align="center"></td>
                <td width="17" align="center">vs</td>
                <td width="17" align="center"></td>
                <td width="114">2ºGrupo B</td>
                <td width="69"><p1>San Juan</p1></td>
                <td>S4</td>
              </tr>
            </table>
            <h2>Semifinales</h2>
            <table>
              <tr>
                <td width="86" align="center">21:45 - 19/07</td>
                <td width="89">Ganador S1</td>
                <td width="17" align="center"></td>
                <td width="17" align="center">vs</td>
                <td width="17" align="center"></td>
                <td width="114">Ganador S2</td>
                <td width="69"><p1>La Plata</p1></td>
                <td>G1</td>
              </tr>
              <tr>
                <td width="86" align="center">21:45 - 20/07</td>
                <td width="89">Ganador S3</td>
                <td width="17" align="center"></td>
                <td width="17" align="center">vs</td>
                <td width="17" align="center"></td>
                <td width="114">Ganador S4</td>
                <td width="69"><p1>Mendoza</p1></td>
                <td>G2</td>
              </tr>
            </table>
            <h2>Tercer Puesto</h2>
            <table>
              <tr>
                <td width="86" align="center">16:00 - 23/07</td>
                <td width="89">Perdedor G1</td>
                <td width="17" align="center"></td>
                <td width="17" align="center">vs</td>
                <td width="17" align="center"></td>
                <td width="114">Perdedor G2</td>
                <td width="69"><p1>La Plata</p1></td>
              </tr>
            </table>
            <h2>Final</h2>
            <table>
              <tr>
                <td width="86" align="center">16:00 - 24/07</td>
                <td width="89">Ganador G1</td>
                <td width="17" align="center"></td>
                <td width="17" align="center">vs</td>
                <td width="17" align="center"></td>
                <td width="114">Ganador G2</td>
                <td width="84"><p1>Buenos Aires</p1></td>
              </tr>
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
