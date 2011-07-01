<?php 
//Hay que sacar los estadios y poner los codigos de los partidos de las semifinales, tambien hay que achicar el tamaño de los select.
?>
<?php $i = 1 ?><form name="frm_resultados_usuario" action="resultados_usuario.php" method="post">
<div id="fixture_menu_usuario">
	<div class="titulo_resultados">
		<h2>INGRESE SUS RESULTADOS</h2>
		<?php if(isset($msg_err)){ echo "<div class='err_msg'>".$msg_err."</div>"; } ?>
	</div>
	<div class="fixture_resultados">
        
    	    <h2>Grupo A</h2>

        <table width="395">
            <?php while($rowPartidosA = mysql_fetch_assoc($rsPartidosA)){ ?>
            <tr>
              <td width="86" align="center"><?php echo convertString2Date($rowPartidosA["fecha"],$conn); ?></td>
              <?php 
              	$equipo_locatario = new Equipo($rowPartidosA["equipo_locatario"], $conn);
				$equipo_visitante = new Equipo($rowPartidosA["equipo_visitante"], $conn);
				$estadio = new Estadio($rowPartidosA["id_estadio"], $conn);
              ?>
              <td width="50">
              	<input type="hidden" name="id_partido_<?php echo $i; ?>" value="<?php echo $rowPartidosA["id"]; ?>" />
              	<input type="hidden" name="id_equipo_locatario_<?php echo $i; ?>" value="<?php echo $equipo_locatario->getId(); ?>" />
              	<input type="hidden" name="id_equipo_visitante_<?php echo $i; ?>" value="<?php echo $equipo_visitante->getId(); ?>" />
              	<?php echo $equipo_locatario->getNombre(); ?>
              </td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_locatario_<?php echo $i; ?>" value="<?php echo $resultados[$i]["goles_equipo_locatario"] ?>" ></td>
          	  <td width="17" align="center">vs</td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_visitante_<?php echo $i; ?>" value="<?php echo $resultados[$i]["goles_equipo_visitante"] ?>"></td>
              <td width="50"><?php echo $equipo_visitante->getNombre(); ?></td>
            </tr>
            <?php $i = $i + 1; ?>
            <?php } ?>
        </table>
        
          <h2>Grupo B</h2>
          
        <table width="395">
            <?php while($rowPartidosB = mysql_fetch_assoc($rsPartidosB)){ ?>
            <tr>
              <td width="86" align="center"><?php echo convertString2Date($rowPartidosB["fecha"],$conn); ?></td>
              <?php 
              	$equipo_locatario = new Equipo($rowPartidosB["equipo_locatario"], $conn);
				$equipo_visitante = new Equipo($rowPartidosB["equipo_visitante"], $conn);
				$estadio = new Estadio($rowPartidosB["id_estadio"], $conn);
              ?>
              <td width="50">
              	<input type="hidden" name="id_partido_<?php echo $i; ?>" value="<?php echo $rowPartidosB["id"]; ?>" />
              	<input type="hidden" name="id_equipo_locatario_<?php echo $i; ?>" value="<?php echo $equipo_locatario->getId(); ?>" />
              	<input type="hidden" name="id_equipo_visitante_<?php echo $i; ?>" value="<?php echo $equipo_visitante->getId(); ?>" />
              	<?php echo $equipo_locatario->getNombre(); ?>
              </td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_locatario_<?php echo $i; ?>" value="<?php echo $resultados[$i]["goles_equipo_locatario"] ?>" ></td>
          	  <td width="17" align="center">vs</td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_visitante_<?php echo $i; ?>" value="<?php echo $resultados[$i]["goles_equipo_visitante"] ?>"></td>
              <td width="50"><?php echo $equipo_visitante->getNombre(); ?></td>
            </tr>
            <?php $i = $i + 1; ?>
            <?php } ?>
        </table>
        
            <h2>Grupo C</h2>
        
        <table width="395">
            <?php while($rowPartidosC = mysql_fetch_assoc($rsPartidosC)){ ?>
            <tr>
              <td width="86" align="center"><?php echo convertString2Date($rowPartidosC["fecha"],$conn); ?></td>
              <?php 
              	$equipo_locatario = new Equipo($rowPartidosC["equipo_locatario"], $conn);
				$equipo_visitante = new Equipo($rowPartidosC["equipo_visitante"], $conn);
				$estadio = new Estadio($rowPartidosC["id_estadio"], $conn);
              ?>
              <td width="50">
              	<input type="hidden" name="id_partido_<?php echo $i; ?>" value="<?php echo $rowPartidosC["id"]; ?>" />
              	<input type="hidden" name="id_equipo_locatario_<?php echo $i; ?>" value="<?php echo $equipo_locatario->getId(); ?>" />
              	<input type="hidden" name="id_equipo_visitante_<?php echo $i; ?>" value="<?php echo $equipo_visitante->getId(); ?>" />
              	<?php echo $equipo_locatario->getNombre(); ?>
              </td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_locatario_<?php echo $i; ?>" value="<?php echo $resultados[$i]["goles_equipo_locatario"] ?>" ></td>
          	  <td width="17" align="center">vs</td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_visitante_<?php echo $i; ?>" value="<?php echo $resultados[$i]["goles_equipo_visitante"] ?>"></td>
              <td width="50"><?php echo $equipo_visitante->getNombre(); ?></td>
            </tr>
            <?php $i = $i + 1; ?>
            <?php } ?>
        </table>
	</div>
        
	<div class="fixture_finales_resultados">
            <h2>Cuartos de Finales</h2>
            
		<!-- Fila partido -->
		<table width="580">
            <tr>
              <td align="center">16:00 - 16/07 <em>S1</em></td>
              <td style="width:155px">
              	<input type="hidden" name="id_partido_<?php echo $i; ?>" value="<?php echo $rowPartidoS1["id"]; ?>" />              	
              	<?php
              		$sql_equiposA = "SELECT * FROM equipos WHERE grupo = 'A'";
					$rs_equiposA = mysql_query($sql_equiposA) or die(mysql_error());
					
					$sql_equipos = "SELECT * FROM equipos";
					$rs_equipos = mysql_query($sql_equipos) or die(mysql_error());
              	?>
              	<select name="id_equipo_locatario_<?php echo $i; ?>">
              		<option value="0" selected="selected">- Primero Grupo A -</option>
      				<?php while ($row_equiposA = mysql_fetch_assoc($rs_equiposA)){?>
              		<option <?php if($resultados[$i]["id_equipo_locatario"] == $row_equiposA["id"]){ echo "selected='selected'"; } ?> value="<?php echo $row_equiposA["id"] ?>"><?php echo $row_equiposA["nombre"] ?></option>
              		<?php } ?>
              	</select>
              </td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_locatario_<?php echo $i; ?>" value="<?php echo $resultados[$i]["goles_equipo_locatario"] ?>" ></td>
          	  <td width="17" align="center">vs</td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_visitante_<?php echo $i; ?>" value="<?php echo $resultados[$i]["goles_equipo_visitante"] ?>"></td>
              <td style="width:155px">
              	<select name="id_equipo_visitante_<?php echo $i; ?>">
              		<option value="0" selected="selected">- Mejor Tercero -</option>
      				<?php while ($row_equipos = mysql_fetch_assoc($rs_equipos)){?>
              		<option <?php if($resultados[$i]["id_equipo_visitante"] == $row_equipos["id"]){ echo "selected='selected'"; } ?> value="<?php echo $row_equipos["id"] ?>"><?php echo $row_equipos["nombre"] ?></option>
              		<?php } ?></td>
             	</select>
            </tr>
            <?php $i = $i + 1; ?>
        </table>
        <!-- FIN: Fila partido -->
        
       
        
        <!-- Fila partido -->
		<table width="580">
            <tr>
              <td align="center">16:00 - 16/07 <em>S2</em></td>
              <td style="width:155px">
              	<input type="hidden" name="id_partido_<?php echo $i; ?>" value="<?php echo $rowPartidoS2["id"]; ?>" />              	
              	<?php
              		$sql_equiposA = "SELECT * FROM equipos WHERE grupo = 'A'";
					$rs_equiposA = mysql_query($sql_equiposA) or die(mysql_error());
					
					$sql_equipos = "SELECT * FROM equipos WHERE grupo = 'C'";
					$rs_equipos = mysql_query($sql_equipos) or die(mysql_error());
              	?>
              	<select name="id_equipo_locatario_<?php echo $i; ?>">
              		<option value="0" selected="selected">- Segundo Grupo A -</option>
      				<?php while ($row_equiposA = mysql_fetch_assoc($rs_equiposA)){?>
              		<option <?php if($resultados[$i]["id_equipo_locatario"] == $row_equiposA["id"]){ echo "selected='selected'"; } ?> value="<?php echo $row_equiposA["id"] ?>"><?php echo $row_equiposA["nombre"] ?></option>
              		<?php } ?>
              	</select>
              </td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_locatario_<?php echo $i; ?>" value="<?php echo $resultados[$i]["goles_equipo_locatario"] ?>" ></td>
          	  <td width="17" align="center">vs</td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_visitante_<?php echo $i; ?>" value="<?php echo $resultados[$i]["goles_equipo_visitante"] ?>"></td>
              <td style="width:155px">
              	<select name="id_equipo_visitante_<?php echo $i; ?>">
              		<option value="0" selected="selected">- Segundo Grupo C -</option>
      				<?php while ($row_equipos = mysql_fetch_assoc($rs_equipos)){?>
              		<option <?php if($resultados[$i]["id_equipo_visitante"] == $row_equipos["id"]){ echo "selected='selected'"; } ?> value="<?php echo $row_equipos["id"] ?>"><?php echo $row_equipos["nombre"] ?></option>
              		<?php } ?></td>
             	</select>
            </tr>
            <?php $i = $i + 1; ?>
        </table>
        <!-- FIN: Fila partido -->
        
        <!-- Fila partido -->
		<table width="580">
            <tr>
              <td align="center">16:00 - 16/07 <em>S3</em></td>
              <td style="width:155px">
              	<input type="hidden" name="id_partido_<?php echo $i; ?>" value="<?php echo $rowPartidoS3["id"]; ?>" />              	
              	<?php
              		$sql_equiposA = "SELECT * FROM equipos WHERE grupo = 'B'";
					$rs_equiposA = mysql_query($sql_equiposA) or die(mysql_error());
					
					$sql_equipos = "SELECT * FROM equipos";
					$rs_equipos = mysql_query($sql_equipos) or die(mysql_error());
              	?>
              	<select name="id_equipo_locatario_<?php echo $i; ?>">
              		<option value="0" selected="selected">- Primero Grupo B -</option>
      				<?php while ($row_equiposA = mysql_fetch_assoc($rs_equiposA)){?>
              		<option <?php if($resultados[$i]["id_equipo_locatario"] == $row_equiposA["id"]){ echo "selected='selected'"; } ?> value="<?php echo $row_equiposA["id"] ?>"><?php echo $row_equiposA["nombre"] ?></option>
              		<?php } ?>
              	</select>
              </td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_locatario_<?php echo $i; ?>" value="<?php echo $resultados[$i]["goles_equipo_locatario"] ?>" ></td>
          	  <td width="17" align="center">vs</td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_visitante_<?php echo $i; ?>" value="<?php echo $resultados[$i]["goles_equipo_visitante"] ?>"></td>
              <td style="width:155px">
              	<select name="id_equipo_visitante_<?php echo $i; ?>">
              		<option value="0" selected="selected">- Segundo Tercero -</option>
      				<?php while ($row_equipos = mysql_fetch_assoc($rs_equipos)){?>
              		<option <?php if($resultados[$i]["id_equipo_visitante"] == $row_equipos["id"]){ echo "selected='selected'"; } ?> value="<?php echo $row_equipos["id"] ?>"><?php echo $row_equipos["nombre"] ?></option>
              		<?php } ?></td>
             	</select>
            </tr>
            <?php $i = $i + 1; ?>
        </table>
        <!-- FIN: Fila partido -->
       
        <!-- Fila partido -->
		<table width="580">
            <tr>
              <td align="center">16:00 - 16/07 <em>S4</em></td>
              <td style="width:155px">
              	<input type="hidden" name="id_partido_<?php echo $i; ?>" value="<?php echo $rowPartidoS4["id"]; ?>" />              	
              	<?php
              		$sql_equiposA = "SELECT * FROM equipos WHERE grupo = 'C'";
					$rs_equiposA = mysql_query($sql_equiposA) or die(mysql_error());
					
					$sql_equipos = "SELECT * FROM equipos WHERE grupo = 'B'";
					$rs_equipos = mysql_query($sql_equipos) or die(mysql_error());
              	?>
              	<select name="id_equipo_locatario_<?php echo $i; ?>">
              		<option value="0" selected="selected">- Primero Grupo C -</option>
      				<?php while ($row_equiposA = mysql_fetch_assoc($rs_equiposA)){?>
              		<option <?php if($resultados[$i]["id_equipo_locatario"] == $row_equiposA["id"]){ echo "selected='selected'"; } ?> value="<?php echo $row_equiposA["id"] ?>"><?php echo $row_equiposA["nombre"] ?></option>
              		<?php } ?>
              	</select>
              </td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_locatario_<?php echo $i; ?>" value="<?php echo $resultados[$i]["goles_equipo_locatario"] ?>" ></td>
          	  <td width="17" align="center">vs</td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_visitante_<?php echo $i; ?>" value="<?php echo $resultados[$i]["goles_equipo_visitante"] ?>"></td>
              <td style="width:155px">
              	<select name="id_equipo_visitante_<?php echo $i; ?>">
              		<option value="0" selected="selected">- Segundo Grupo B -</option>
      				<?php while ($row_equipos = mysql_fetch_assoc($rs_equipos)){?>
              		<option <?php if($resultados[$i]["id_equipo_visitante"] == $row_equipos["id"]){ echo "selected='selected'"; } ?> value="<?php echo $row_equipos["id"] ?>"><?php echo $row_equipos["nombre"] ?></option>
              		<?php } ?></td>
             	</select>
            </tr>
            <?php $i = $i + 1; ?>
        </table>
        <!-- FIN: Fila partido -->
       
         <h2>Semifinales</h2>
            
		<!-- Fila partido -->
		<table width="580">
            <tr>
              <td align="center">16:00 - 16/07  <em>G1</em></td>
              <td style="width:155px">
              	<input type="hidden" name="id_partido_<?php echo $i; ?>" value="<?php echo $rowPartidoG1["id"]; ?>" />              	
              	<?php
              		$sql_equiposA = "SELECT * FROM equipos";
					$rs_equiposA = mysql_query($sql_equiposA) or die(mysql_error());
					
					$sql_equipos = "SELECT * FROM equipos";
					$rs_equipos = mysql_query($sql_equipos) or die(mysql_error());
              	?>
              	<select name="id_equipo_locatario_<?php echo $i; ?>">
              		<option value="0" selected="selected">- Ganador <strong>S1</strong> -</option>
      				<?php while ($row_equiposA = mysql_fetch_assoc($rs_equiposA)){?>
              		<option <?php if($resultados[$i]["id_equipo_locatario"] == $row_equiposA["id"]){ echo "selected='selected'"; } ?> value="<?php echo $row_equiposA["id"] ?>"><?php echo $row_equiposA["nombre"] ?></option>
              		<?php } ?>
              	</select>
              </td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_locatario_<?php echo $i; ?>" value="<?php echo $resultados[$i]["goles_equipo_locatario"] ?>" ></td>
          	  <td width="17" align="center">vs</td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_visitante_<?php echo $i; ?>" value="<?php echo $resultados[$i]["goles_equipo_visitante"] ?>"></td>
              <td style="width:155px">
              	<select name="id_equipo_visitante_<?php echo $i; ?>">
              		<option value="0" selected="selected">- Ganador <strong>S2</strong> -</option>
      				<?php while ($row_equipos = mysql_fetch_assoc($rs_equipos)){?>
              		<option <?php if($resultados[$i]["id_equipo_visitante"] == $row_equipos["id"]){ echo "selected='selected'"; } ?> value="<?php echo $row_equipos["id"] ?>"><?php echo $row_equipos["nombre"] ?></option>
              		<?php } ?></td>
             	</select>
            </tr>
            <?php $i = $i + 1; ?>
        </table>
        <!-- FIN: Fila partido -->
        
       
        
        <!-- Fila partido -->
		<table width="580">
            <tr>
              <td align="center">16:00 - 16/07  <em>G2</em></td>
              <td style="width:155px">
              	<input type="hidden" name="id_partido_<?php echo $i; ?>" value="<?php echo $rowPartidoG2["id"]; ?>" />              	
              	<?php
              		$sql_equiposA = "SELECT * FROM equipos";
					$rs_equiposA = mysql_query($sql_equiposA) or die(mysql_error());
					
					$sql_equipos = "SELECT * FROM equipos";
					$rs_equipos = mysql_query($sql_equipos) or die(mysql_error());
              	?>
              	<select name="id_equipo_locatario_<?php echo $i; ?>">
              		<option value="0" selected="selected">- Ganador <strong>S3</strong> -</option>
      				<?php while ($row_equiposA = mysql_fetch_assoc($rs_equiposA)){?>
              		<option <?php if($resultados[$i]["id_equipo_locatario"] == $row_equiposA["id"]){ echo "selected='selected'"; } ?> value="<?php echo $row_equiposA["id"] ?>"><?php echo $row_equiposA["nombre"] ?></option>
              		<?php } ?>
              	</select>
              </td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_locatario_<?php echo $i; ?>" value="<?php echo $resultados[$i]["goles_equipo_locatario"] ?>" ></td>
          	  <td width="17" align="center">vs</td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_visitante_<?php echo $i; ?>" value="<?php echo $resultados[$i]["goles_equipo_visitante"] ?>"></td>
              <td style="width:155px">
              	<select name="id_equipo_visitante_<?php echo $i; ?>">
              		<option value="0" selected="selected">- Ganador <strong>S4</strong> -</option>
      				<?php while ($row_equipos = mysql_fetch_assoc($rs_equipos)){?>
              		<option <?php if($resultados[$i]["id_equipo_visitante"] == $row_equipos["id"]){ echo "selected='selected'"; } ?> value="<?php echo $row_equipos["id"] ?>"><?php echo $row_equipos["nombre"] ?></option>
              		<?php } ?></td>
             	</select>
            </tr>
            <?php $i = $i + 1; ?>
        </table>
        <!-- FIN: Fila partido -->
       
       
       <h2>Tercer Puesto</h2>
            
		<!-- Fila partido -->
		<table width="580">
            <tr>
              <td align="center">16:00 - 16/07 </td>
              <td style="width:155px">
              	<input type="hidden" name="id_partido_<?php echo $i; ?>" value="<?php echo $rowPartidoTERCER["id"]; ?>" />              	
              	<?php
              		$sql_equiposA = "SELECT * FROM equipos";
					$rs_equiposA = mysql_query($sql_equiposA) or die(mysql_error());
					
					$sql_equipos = "SELECT * FROM equipos";
					$rs_equipos = mysql_query($sql_equipos) or die(mysql_error());
              	?>
              	<select name="id_equipo_locatario_<?php echo $i; ?>">
              		<option value="0" selected="selected">- Perdedor <strong>G1</strong> -</option>
      				<?php while ($row_equiposA = mysql_fetch_assoc($rs_equiposA)){?>
              		<option <?php if($resultados[$i]["id_equipo_locatario"] == $row_equiposA["id"]){ echo "selected='selected'"; } ?> value="<?php echo $row_equiposA["id"] ?>"><?php echo $row_equiposA["nombre"] ?></option>
              		<?php } ?>
              	</select>
              </td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_locatario_<?php echo $i; ?>" value="<?php echo $resultados[$i]["goles_equipo_locatario"] ?>" ></td>
          	  <td width="17" align="center">vs</td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_visitante_<?php echo $i; ?>" value="<?php echo $resultados[$i]["goles_equipo_visitante"] ?>"></td>
              <td style="width:155px">
              	<select name="id_equipo_visitante_<?php echo $i; ?>">
              		<option value="0" selected="selected">- Perdedor <strong>G2</strong> -</option>
      				<?php while ($row_equipos = mysql_fetch_assoc($rs_equipos)){?>
              		<option <?php if($resultados[$i]["id_equipo_visitante"] == $row_equipos["id"]){ echo "selected='selected'"; } ?> value="<?php echo $row_equipos["id"] ?>"><?php echo $row_equipos["nombre"] ?></option>
              		<?php } ?></td>
             	</select>
            </tr>
            <?php $i = $i + 1; ?>
        </table>
        <!-- FIN: Fila partido -->
       
       <h2>Final</h2>
            
		<!-- Fila partido -->
		<table width="580">
            <tr>
              <td align="center">16:00 - 16/07</td>
              <td style="width:155px">
              	<input type="hidden" name="id_partido_<?php echo $i; ?>" value="<?php echo $rowPartidoFINAL["id"]; ?>" />              	
              	<?php
              		$sql_equiposA = "SELECT * FROM equipos";
					$rs_equiposA = mysql_query($sql_equiposA) or die(mysql_error());
					
					$sql_equipos = "SELECT * FROM equipos";
					$rs_equipos = mysql_query($sql_equipos) or die(mysql_error());
              	?>
              	<select name="id_equipo_locatario_<?php echo $i; ?>">
              		<option value="0" selected="selected">- Ganador <strong>G1</strong> -</option>
      				<?php while ($row_equiposA = mysql_fetch_assoc($rs_equiposA)){?>
              		<option <?php if($resultados[$i]["id_equipo_locatario"] == $row_equiposA["id"]){ echo "selected='selected'"; } ?> value="<?php echo $row_equiposA["id"] ?>"><?php echo $row_equiposA["nombre"] ?></option>
              		<?php } ?>
              	</select>
              </td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_locatario_<?php echo $i; ?>" value="<?php echo $resultados[$i]["goles_equipo_locatario"] ?>" ></td>
          	  <td width="17" align="center">vs</td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" name="goles_equipo_visitante_<?php echo $i; ?>" value="<?php echo $resultados[$i]["goles_equipo_visitante"] ?>"></td>
              <td style="width:155px">
              	<select name="id_equipo_visitante_<?php echo $i; ?>">
              		<option value="0" selected="selected">- Ganador <strong>G2</strong> -</option>
      				<?php while ($row_equipos = mysql_fetch_assoc($rs_equipos)){?>
              		<option <?php if($resultados[$i]["id_equipo_visitante"] == $row_equipos["id"]){ echo "selected='selected'"; } ?> value="<?php echo $row_equipos["id"] ?>"><?php echo $row_equipos["nombre"] ?></option>
              		<?php } ?></td>
             	</select>
            </tr>
            <?php $i = $i + 1; ?>
        </table>
        <!-- FIN: Fila partido -->
       
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
      	
      	</div>
</div></form>