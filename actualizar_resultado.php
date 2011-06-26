<?php session_start(); ?>
<?php require_once("includes/ini.php"); ?>
<?php require_once("classes/equipo.class.php"); ?>

<?php
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
	}
?>
	

<?php include("templates/html_head.tpl.php"); ?>
<?php include("templates/menu.tpl.php"); ?>
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
                            <?php 
                            	$equipo_locatario = new Equipo($rowPartidos["equipo_locatario"], $conn);
								$equipo_visitante = new Equipo($rowPartidos["equipo_visitante"], $conn);
                            ?>
                            <td align="center"><?php echo strtoupper($equipo_locatario->getNombre()); ?></td>
                            <td align="center"><input type="text" name="goles_equipo_locatario"></td>
                            <td>vs</td>
                            <td align="center"><input type="text" name="goles_equipo_visitante"></td>
                            <td align="center"><?php echo strtoupper($equipo_visitante->getNombre()); ?></td>
                            <td align="center"><input type="checkbox" name="estado_partido" value="1"></td>
                            <td align="center"><input type="submit" value="Actualizar" name="btn_actualizar"></td>
                        </tr>
                    <?php } ?>
                    </table>
                </form>
        	</div>
        </div>
<?php include("templates/footer_logos.tpl.php"); ?>
<?php include("templates/html_footer.tpl.php"); ?>
<?php require_once("includes/conn_close.php"); ?>
