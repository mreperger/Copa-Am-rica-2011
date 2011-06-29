<?php 
//Hay que sacar los estadios y poner los codigos de los partidos de las semifinales, tambien hay que achicar el tamaño de los select.
?>
<?php $i = 1 ?>
<div id="fixture_menu_usuario">
	<div class="titulo_resultados"><h2>INGRESE SUS RESULTADOS</h2></div>
	<div class="fixture_resultados">
        <form name="frm_resultados_usuario" action="" method="post">
    	    <h2>Grupo A</h2>

        <table width="500">
            <?php while($rowPartidosA = mysql_fetch_assoc($rsPartidosA)){ ?>
            <tr>
              <td width="86" align="center"><?php echo convertString2Date($rowPartidosA["fecha"],$conn); ?></td>
              <?php 
              	$equipo_locatario = new Equipo($rowPartidosA["equipo_locatario"], $conn);
				$equipo_visitante = new Equipo($rowPartidosA["equipo_visitante"], $conn);
				$estadio = new Estadio($rowPartidosA["id_estadio"], $conn);
              ?>
              <td width="70">
              	<input type="hidden" name="id_partido_<?php echo $i; ?>" value="<?php echo $rowPartidosA["id"]; ?>" />
              	<input type="hidden" name="id_equipo_locatario_<?php echo $i; ?>" value="<?php echo $equipo_locatario->getId(); ?>" />
              	<input type="hidden" name="id_equipo_visitante_<?php echo $i; ?>" value="<?php echo $equipo_visitante->getId(); ?>" />
              	<?php echo $equipo_locatario->getNombre(); ?>
              </td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_locatario_<?php echo $i; ?>" ></td>
          	  <td width="17" align="center">vs</td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_visitante_<?php echo $i; ?>" ></td>
              <td width="74"><?php echo $equipo_visitante->getNombre(); ?></td>
              <td width="141" class="letra_cursiva"><?php echo $estadio->getNombreEstadio(); ?></td>
            </tr>
            <?php $i = $i + 1; ?>
            <?php } ?>
        </table>
        
          <h2>Grupo B</h2>
          
        <table width="500">
            <?php while($rowPartidosB = mysql_fetch_assoc($rsPartidosB)){ ?>
            <tr>
              <td width="86" align="center"><?php echo convertString2Date($rowPartidosB["fecha"],$conn); ?></td>
              <?php 
              	$equipo_locatario = new Equipo($rowPartidosB["equipo_locatario"], $conn);
				$equipo_visitante = new Equipo($rowPartidosB["equipo_visitante"], $conn);
				$estadio = new Estadio($rowPartidosB["id_estadio"], $conn);
              ?>
              <td width="70">
              	<input type="hidden" name="id_partido_<?php echo $i; ?>" value="<?php echo $rowPartidosB["id"]; ?>" />
              	<input type="hidden" name="id_equipo_locatario_<?php echo $i; ?>" value="<?php echo $equipo_locatario->getId(); ?>" />
              	<input type="hidden" name="id_equipo_visitante_<?php echo $i; ?>" value="<?php echo $equipo_visitante->getId(); ?>" />
              	<?php echo $equipo_locatario->getNombre(); ?>
              </td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_locatario_<?php echo $i; ?>" ></td>
          	  <td width="17" align="center">vs</td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_visitante_<?php echo $i; ?>" ></td>
              <td width="74"><?php echo $equipo_visitante->getNombre(); ?></td>
              <td width="141" class="letra_cursiva"><?php echo $estadio->getNombreEstadio(); ?></td>
            </tr>
            <?php $i = $i + 1; ?>
            <?php } ?>
        </table>
        
            <h2>Grupo C</h2>
        
        <table width="500">
            <?php while($rowPartidosC = mysql_fetch_assoc($rsPartidosC)){ ?>
            <tr>
              <td width="86" align="center"><?php echo convertString2Date($rowPartidosC["fecha"],$conn); ?></td>
              <?php 
              	$equipo_locatario = new Equipo($rowPartidosC["equipo_locatario"], $conn);
				$equipo_visitante = new Equipo($rowPartidosC["equipo_visitante"], $conn);
				$estadio = new Estadio($rowPartidosC["id_estadio"], $conn);
              ?>
              <td width="70">
              	<input type="hidden" name="id_partido_<?php echo $i; ?>" value="<?php echo $rowPartidosC["id"]; ?>" />
              	<input type="hidden" name="id_equipo_locatario_<?php echo $i; ?>" value="<?php echo $equipo_locatario->getId(); ?>" />
              	<input type="hidden" name="id_equipo_visitante_<?php echo $i; ?>" value="<?php echo $equipo_visitante->getId(); ?>" />
              	<?php echo $equipo_locatario->getNombre(); ?>
              </td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_locatario_<?php echo $i; ?>" ></td>
          	  <td width="17" align="center">vs</td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_visitante_<?php echo $i; ?>" ></td>
              <td width="74"><?php echo $equipo_visitante->getNombre(); ?></td>
              <td width="141" class="letra_cursiva"><?php echo $estadio->getNombreEstadio(); ?></td>
            </tr>
            <?php $i = $i + 1; ?>
            <?php } ?>
        </table>
	</div>
        
	<div class="fixture_finales_resultados">
            <h2>Cuartos de Finales</h2>
            
		<table width="500">
            <tr>
              <td width="86" align="center">16:00 - 16/07</td>
              <td width="70">
              	<input type="hidden" name="id_partido_<?php echo $i; ?>" value="<?php echo $rowPartidoS1["id"]; ?>" />
              	
              	
              	<input type="hidden" name="id_equipo_locatario_<?php echo $i; ?>" value="<?php echo $equipo_locatario->getId(); ?>" />
              	<input type="hidden" name="id_equipo_visitante_<?php echo $i; ?>" value="<?php echo $equipo_visitante->getId(); ?>" />
              	
              	
              	<?php
              		$sql_equiposA = "SELECT * FROM equipos WHERE grupo = 'A'";
					$rs_equiposA = mysql_query($sql_equiposA) or die(mysql_error());
					
					$sql_equipos = "SELECT * FROM equipos";
					$rs_equipos = mysql_query($sql_equipos) or die(mysql_error());
              	?>
              	<select name="equipo_locatario_<?php echo $i; ?>">
              		<option value="0" selected="selected">- Seleccione un equipo -</option>
      				<?php while ($row_equiposA = mysql_fetch_assoc($rs_equiposA)){?>
              		<option value="<?php echo $row_equiposA["id"] ?>"><?php echo $row_equiposA["nombre"] ?></option>
              		<?php } ?>
              	</select>
              </td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_locatario_<?php echo $i; ?>" ></td>
          	  <td width="17" align="center">vs</td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_visitante_<?php echo $i; ?>" ></td>
              <td width="74">
              	<select name="equipo_visitante_<?php echo $i; ?>">
              		<option value="0" selected="selected">- Seleccione un equipo -</option>
      				<?php while ($row_equipos = mysql_fetch_assoc($rs_equipos)){?>
              		<option value="<?php echo $row_equipos["id"] ?>"><?php echo $row_equipos["nombre"] ?></option>
              		<?php } ?></td>
             	</select>
            </tr>
            <?php $i = $i + 1; ?>
        </table>
        <table width="500">
            <?php while($rowPartidoS2 = mysql_fetch_assoc($rsPartidoS2)){ ?>
            <tr>
              <td width="86" align="center"><?php echo convertString2Date($rowPartidoS2["fecha"],$conn); ?></td>
     		  <?php
				$estadio = new Estadio($rowPartidoS2["id_estadio"], $conn);
              ?>
              <td width="70">
              	<input type="hidden" name="id_partido_<?php echo $i; ?>" value="<?php echo $rowPartidoS2["id"]; ?>" />
              	<input type="hidden" name="id_equipo_locatario_<?php echo $i; ?>" value="<?php echo $equipo_locatario->getId(); ?>" />
              	<input type="hidden" name="id_equipo_visitante_<?php echo $i; ?>" value="<?php echo $equipo_visitante->getId(); ?>" />
              	<?php echo $equipo_locatario->getNombre(); ?>
              </td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_locatario_<?php echo $i; ?>" ></td>
          	  <td width="17" align="center">vs</td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_visitante_<?php echo $i; ?>" ></td>
              <td width="74"><?php echo $equipo_visitante->getNombre(); ?></td>
              <td width="141" class="letra_cursiva"><?php echo $estadio->getNombreEstadio(); ?></td>
            </tr>
            <?php $i = $i + 1; ?>
            <?php } ?>
        </table>
        <table width="500">
            <?php while($rowPartidoS3 = mysql_fetch_assoc($rsPartidoS3)){ ?>
            <tr>
              <td width="86" align="center"><?php echo convertString2Date($rowPartidoS3["fecha"],$conn); ?></td>
              <?php
				$estadio = new Estadio($rowPartidoS3["id_estadio"], $conn);
              ?>
              <td width="70">
              	<input type="hidden" name="id_partido_<?php echo $i; ?>" value="<?php echo $rowPartidoS3["id"]; ?>" />
              	<input type="hidden" name="id_equipo_locatario_<?php echo $i; ?>" value="<?php echo $equipo_locatario->getId(); ?>" />
              	<input type="hidden" name="id_equipo_visitante_<?php echo $i; ?>" value="<?php echo $equipo_visitante->getId(); ?>" />
              	<?php echo $equipo_locatario->getNombre(); ?>
              </td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_locatario_<?php echo $i; ?>" ></td>
          	  <td width="17" align="center">vs</td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_visitante_<?php echo $i; ?>" ></td>
              <td width="74"><?php echo $equipo_visitante->getNombre(); ?></td>
              <td width="141" class="letra_cursiva"><?php echo $estadio->getNombreEstadio(); ?></td>
            </tr>
            <?php $i = $i + 1; ?>
            <?php } ?>
        </table>
        <table width="500">
            <?php while($rowPartidoS4 = mysql_fetch_assoc($rsPartidoS4)){ ?>
            <tr>
              <td width="86" align="center"><?php echo convertString2Date($rowPartidoS4["fecha"],$conn); ?></td>
              <?php
              	$estadio = new Estadio($rowPartidoS4["id_estadio"], $conn);
              ?>
              <td width="70">
              	<input type="hidden" name="id_partido_<?php echo $i; ?>" value="<?php echo $rowPartidoS4["id"]; ?>" />
              	<input type="hidden" name="id_equipo_locatario_<?php echo $i; ?>" value="<?php echo $equipo_locatario->getId(); ?>" />
              	<input type="hidden" name="id_equipo_visitante_<?php echo $i; ?>" value="<?php echo $equipo_visitante->getId(); ?>" />
              	<?php echo $equipo_locatario->getNombre(); ?>
              </td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_locatario_<?php echo $i; ?>" ></td>
          	  <td width="17" align="center">vs</td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_visitante_<?php echo $i; ?>" ></td>
              <td width="74"><?php echo $equipo_visitante->getNombre(); ?></td>
              <td width="141" class="letra_cursiva"><?php echo $estadio->getNombreEstadio(); ?></td>
              <td>S4</td>
            </tr>
            <?php $i = $i + 1; ?>
            <?php } ?>
        </table>
        
            <h2>Semifinales</h2>
            <table width="500">
            <?php while($rowPartidoG1 = mysql_fetch_assoc($rsPartidoG1)){ ?>
            <tr>
              <td width="86" align="center"><?php echo convertString2Date($rowPartidoG1["fecha"],$conn); ?></td>
              <?php
              	$estadio = new Estadio($rowPartidoG1["id_estadio"], $conn);
              ?>
              <td width="70">
              	<input type="hidden" name="id_partido_<?php echo $i; ?>" value="<?php echo $rowPartidoG1["id"]; ?>" />
              	<input type="hidden" name="id_equipo_locatario_<?php echo $i; ?>" value="<?php echo $equipo_locatario->getId(); ?>" />
              	<input type="hidden" name="id_equipo_visitante_<?php echo $i; ?>" value="<?php echo $equipo_visitante->getId(); ?>" />
              	<?php echo $equipo_locatario->getNombre(); ?>
              </td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_locatario_<?php echo $i; ?>" ></td>
          	  <td width="17" align="center">vs</td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_visitante_<?php echo $i; ?>" ></td>
              <td width="74"><?php echo $equipo_visitante->getNombre(); ?></td>
              <td width="141" class="letra_cursiva"><?php echo $estadio->getNombreEstadio(); ?></td>
              <td>G1</td>
            </tr>
            <?php $i = $i + 1; ?>
            <?php } ?>
        </table>
        <table width="500">
            <?php while($rowPartidoG2 = mysql_fetch_assoc($rsPartidoG2)){ ?>
            <tr>
              <td width="86" align="center"><?php echo convertString2Date($rowPartidoG2["fecha"],$conn); ?></td>
              <?php
              	$estadio = new Estadio($rowPartidoG2["id_estadio"], $conn);
              ?>
              <td width="70">
              	<input type="hidden" name="id_partido_<?php echo $i; ?>" value="<?php echo $rowPartidoG2["id"]; ?>" />
              	<input type="hidden" name="id_equipo_locatario_<?php echo $i; ?>" value="<?php echo $equipo_locatario->getId(); ?>" />
              	<input type="hidden" name="id_equipo_visitante_<?php echo $i; ?>" value="<?php echo $equipo_visitante->getId(); ?>" />
              	<?php echo $equipo_locatario->getNombre(); ?>
              </td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_locatario_<?php echo $i; ?>" ></td>
          	  <td width="17" align="center">vs</td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_visitante_<?php echo $i; ?>" ></td>
              <td width="74"><?php echo $equipo_visitante->getNombre(); ?></td>
              <td width="141" class="letra_cursiva"><?php echo $estadio->getNombreEstadio(); ?></td>
              <td>G2</td>
            </tr>
            <?php $i = $i + 1; ?>
            <?php } ?>
        </table>
            
            <h2>Tercer Puesto</h2>
            <table width="500">
            <?php while($rowPartidoTERCER = mysql_fetch_assoc($rsPartidoTERCER)){ ?>
            <tr>
              <td width="86" align="center"><?php echo convertString2Date($rowPartidoTERCER["fecha"],$conn); ?></td>
              <?php
              	$estadio = new Estadio($rowPartidoTERCER["id_estadio"], $conn);
              ?>
              <td width="70">
              	<input type="hidden" name="id_partido_<?php echo $i; ?>" value="<?php echo $rowPartidoTERCER["id"]; ?>" />
              	<input type="hidden" name="id_equipo_locatario_<?php echo $i; ?>" value="<?php echo $equipo_locatario->getId(); ?>" />
              	<input type="hidden" name="id_equipo_visitante_<?php echo $i; ?>" value="<?php echo $equipo_visitante->getId(); ?>" />
              	<?php echo $equipo_locatario->getNombre(); ?>
              </td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_locatario_<?php echo $i; ?>" ></td>
          	  <td width="17" align="center">vs</td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_visitante_<?php echo $i; ?>" ></td>
              <td width="74"><?php echo $equipo_visitante->getNombre(); ?></td>
              <td width="141" class="letra_cursiva"><?php echo $estadio->getNombreEstadio(); ?></td>
              <td></td>
            </tr>
            <?php $i = $i + 1; ?>
            <?php } ?>
        </table>
            
            <h2>Final</h2>
            <table width="500">
	            <?php while($rowPartidoFINAL = mysql_fetch_assoc($rsPartidoFINAL)){ ?>
	            <tr>
	              <td width="86" align="center"><?php echo convertString2Date($rowPartidoFINAL["fecha"],$conn); ?></td>
	              <?php
	              $estadio = new Estadio($rowPartidoFINAL["id_estadio"], $conn);
	              ?>
	              <td width="70">
              		<input type="hidden" name="id_partido_<?php echo $i; ?>" value="<?php echo $rowPartidoFINAL["id"]; ?>" />
              		<input type="hidden" name="id_equipo_locatario_<?php echo $i; ?>" value="<?php echo $equipo_locatario->getId(); ?>" />
              		<input type="hidden" name="id_equipo_visitante_<?php echo $i; ?>" value="<?php echo $equipo_visitante->getId(); ?>" />
              		<?php echo $equipo_locatario->getNombre(); ?>
              	  </td>
	              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_locatario_<?php echo $i; ?>" ></td>
          	  	  <td width="17" align="center">vs</td>
                  <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_visitante_<?php echo $i; ?>" ></td>
                  <td width="74"><?php echo $equipo_visitante->getNombre(); ?></td>
                  <td width="141" class="letra_cursiva"><?php echo $estadio->getNombreEstadio(); ?></td>
	              <td></td>
	            </tr>
	            <?php $i = $i + 1; ?>
	            <?php } ?>
         	</table>
         	<table>
              	<tr>
              		<td width="86" align="center"></td>
	                <td width="89"></td>
	                <td width="15" align="center"></td>
	                <td width="17" align="center"></td>
	                <td width="15" align="center"></td>
	                <td width="114"></td>
	                <td width="84"><input class="btn_resultados" type="submit" value="Ingresar Resultados" name="btn_resultado_usuario" ></td>
	                
              	</tr>
            </table>
      	</form>
    </div>
</div>