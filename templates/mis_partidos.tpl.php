<div id="fixture_menu_usuario">
		<div class="titulo_resultados"><h2>INGRESE SUS RESULTADOS</h2></div>
        <div class="fixture_resultados">
        <form name="frm_resultados_usuario" action="" method="post">
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
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" ></td>
              <td width="15" align="center">vs</td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" ></td>
              <td width="74"><?php echo $equipo_visitante->getNombre(); ?></td>
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
              <?php 
              	$equipo_locatario = new Equipo($rowPartidosB["equipo_locatario"], $conn);
				$equipo_visitante = new Equipo($rowPartidosB["equipo_visitante"], $conn);
              ?>
              <td width="70"><?php echo $equipo_locatario->getNombre(); ?></td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" ></td>
              <td width="15" align="center">vs</td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" ></td>
              <td width="74"><?php echo $equipo_visitante->getNombre(); ?></td>
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
              <?php 
              	$equipo_locatario = new Equipo($rowPartidosC["equipo_locatario"], $conn);
				$equipo_visitante = new Equipo($rowPartidosC["equipo_visitante"], $conn);
              ?>
              <td width="70"><?php echo $equipo_locatario->getNombre(); ?></td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" ></td>
              <td width="15" align="center">vs</td>
              <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" ></td>
              <td width="74"><?php echo $equipo_visitante->getNombre(); ?></td>
              <td width="141"><p1><?php echo (getNombreEstadio($rowPartidosC["id_estadio"],$conn)); ?></p1></td>
            </tr>
            <?php } ?>
        </table>
        </div>
        
        <div class="fixture_finales_resultados">
            <h2>Cuartos de Finales</h2>
            <table>
              <tr>
                <td width="86" align="center">16:00 - 16/07</td>
                <td width="89">1ro Grupo A</td>
                <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" ></td>
                <td width="17" align="center">vs</td>
                <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" ></td>
                <td width="114">Mejor Tercero</td>
                <td width="69"><p1>Cordoba</p1></td>
                <td width="17">S1</td>
              </tr>
              <tr>
                <td width="86" align="center">19:15 - 16/07</td>
                <td width="89">2do Grupo A</td>
                <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" ></td>
                <td width="17" align="center">vs</td>
                <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" ></td>
                <td width="114">2do Grupo C</td>
                <td width="69"><p1>Santa F&eacute;</p1></td>
                <td>S2</td>
              </tr>
              <tr>
                <td width="86" align="center">16:00 - 17/07</td>
                <td width="89">1ro Grupo B</td>
                <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" ></td>
                <td width="17" align="center">vs</td>
                <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" ></td>
                <td width="114">2do Mejor Tercero</td>
                <td width="69"><p1>La Plata</p1></td>
                <td>S3</td>
              </tr>
              <tr>
                <td width="86" align="center">19:15 - 17/07</td>
                <td width="89">1ro Grupo C</td>
                <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" ></td>
                <td width="17" align="center">vs</td>
                <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" ></td>
                <td width="114">2do Grupo B</td>
                <td width="69"><p1>San Juan</p1></td>
                <td>S4</td>
              </tr>
            </table>
            <h2>Semifinales</h2>
            <table>
              <tr>
                <td width="86" align="center">21:45 - 19/07</td>
                <td width="89">Ganador S1</td>
                <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" ></td>
                <td width="17" align="center">vs</td>
                <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" ></td>
                <td width="114">Ganador S2</td>
                <td width="69"><p1>La Plata</p1></td>
                <td>G1</td>
              </tr>
              <tr>
                <td width="86" align="center">21:45 - 20/07</td>
                <td width="89">Ganador S3</td>
                <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" ></td>
                <td width="17" align="center">vs</td>
                <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" ></td>
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
                <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" ></td>
                <td width="17" align="center">vs</td>
                <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" ></td>
                <td width="114">Perdedor G2</td>
                <td width="69"><p1>La Plata</p1></td>
              </tr>
            </table>
            <h2>Final</h2>
            <table>
              	<tr>
	                <td width="86" align="center">16:00 - 24/07</td>
	                <td width="89">Ganador G1</td>
	                <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" ></td>
	                <td width="17" align="center">vs</td>
	                <td width="15" align="center"><input class="tamano_resultado" type="text" action="" method="post" ></td>
	                <td width="114">Ganador G2</td>
	                <td width="84"><p1>Buenos Aires</p1></td>
          		</tr>
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