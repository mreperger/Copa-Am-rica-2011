<?php session_start(); ?>
<?php require_once("includes/ini.php"); ?>
<?php require_once("classes/equipo.class.php"); ?>

<?php
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


<?php include("templates/html_head.tpl.php"); ?>
<?php include("templates/menu.tpl.php"); ?>
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
              <?php 
              	$equipo_locatario = new Equipo($rowPartidosA["equipo_locatario"], $conn);
				$equipo_visitante = new Equipo($rowPartidosA["equipo_visitante"], $conn);
              ?>
          	  <td width="70"><?php echo $equipo_locatario->getNombre(); ?></td>
              <td width="15" align="center"><div class="resultado"><?php echo $rowPartidosA["goles_equipo_locatario"]; ?></div></td>
              <td width="15" align="center">vs</td>
              <td width="15" align="center"><div class="resultado"><?php echo $rowPartidosA["goles_equipo_visitante"]; ?></div></td>
              <td width="74"><?php echo $equipo_visitante->getNombre(); ?></td>
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
              <?php 
              	$equipo_locatario = new Equipo($rowPartidosB["equipo_locatario"], $conn);
				$equipo_visitante = new Equipo($rowPartidosB["equipo_visitante"], $conn);
              ?>
              <td width="70"><?php echo $equipo_locatario->getNombre(); ?></td>
              <td width="15" align="center"><div class="resultado"><?php echo $rowPartidosB["goles_equipo_locatario"]; ?></div></td>
              <td width="15" align="center">vs</td>
              <td width="15" align="center"><div class="resultado"><?php echo $rowPartidosB["goles_equipo_visitante"]; ?></div></td>
              <td width="74"><?php echo $equipo_visitante->getNombre(); ?></td>
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
              <?php 
              	$equipo_locatario = new Equipo($rowPartidosC["equipo_locatario"], $conn);
				$equipo_visitante = new Equipo($rowPartidosC["equipo_visitante"], $conn);
              ?>
              <td width="70"><?php echo $equipo_locatario->getNombre(); ?></td>
              <td width="15" align="center"><div class="resultado"><?php echo $rowPartidosC["goles_equipo_locatario"]; ?></div></td>
              <td width="15" align="center">vs</td>
              <td width="15" align="center"><div class="resultado"><?php echo $rowPartidosC["goles_equipo_visitante"]; ?></div></td>
              <td width="74"><?php echo $equipo_visitante->getNombre(); ?></td>
              <td><a href="actualizar_resultado.php?id=<?php echo $rowPartidosC["id"]; ?>"><p1>Ingresar resultado<p1></a></td>
            </tr>
            <?php } ?>
        </table>
        </div>
	</div>        

<?php include("templates/footer_logos.tpl.php"); ?>
<?php include("templates/html_footer.tpl.php"); ?>
<?php require_once("includes/conn_close.php"); ?>
