<?php session_start(); ?>
<?php require_once("includes/ini.php"); ?>
<?php require_once("classes/equipo.class.php"); ?>
<?php require_once("classes/grupo.class.php"); ?>

<?php
	//Cargar equipos con sus datos
	$grupoA = new Grupo("A",$conn);
	$grupoB = new Grupo("B",$conn);
	$grupoC = new Grupo("C",$conn);
	//Ordenar equipos por grupos
?>


<?php include("templates/html_head.tpl.php"); ?>
<?php include("templates/menu.tpl.php"); ?>
    <?php if($DEBUG == 1){ echo "<pre>"; var_dump($grupoA); echo "</pre>"; } ?>
    <div id="grupos_menu">
     		<h2>Grupo A</h2>
    	<div class="grupo">    	
            <table>
                    <tr>
                        <td>NOMBRE</td>
                        <td align="center">PJ</td>
                        <td align="center">PG</td>
                        <td align="center">PE</td>
                        <td align="center">PP</td>
                        <td align="center">GC</td>
                        <td align="center">GE</td>
                        <td align="center">GA</td>
                        <td align="center">PTS</td>
                    </tr>
                    <?php
                    foreach($grupoA->getEquipos() as $equipo){
                    	?>
                    	<tr>
	                        <td><?php echo $equipo->getNombre(); ?></td>
	                        <td align="center"><?php echo $equipo->getPJ(); ?></td>
	                        <td align="center"><?php echo $equipo->getPG(); ?></td>
	                        <td align="center"><?php echo $equipo->getPE(); ?></td>
	                        <td align="center"><?php echo $equipo->getPP(); ?></td>
	                        <td align="center"><?php echo $equipo->getGC(); ?></td>
	                        <td align="center"><?php echo $equipo->getGE(); ?></td>
	                        <td align="center"><?php echo $equipo->getGA(); ?></td>
	                        <td align="center"><?php echo $equipo->getPTS(); ?></td>
                    	</tr>
                    	<?php
                    }
                    ?>
            </table>
		</div>            
            <h2>Grupo B</h2>
      	<div class="grupo">    	
            <table>
                    <tr>
                        <td>NOMBRE</td>
                        <td align="center">PJ</td>
                        <td align="center">PG</td>
                        <td align="center">PE</td>
                        <td align="center">PP</td>
                        <td align="center">GC</td>
                        <td align="center">GE</td>
                        <td align="center">GA</td>
                        <td align="center">PTS</td>
                    </tr>
                    <?php
                    foreach($grupoB->getEquipos() as $equipo){
                    	?>
                    	<tr>
	                        <td><?php echo $equipo->getNombre(); ?></td>
	                        <td align="center"><?php echo $equipo->getPJ(); ?></td>
	                        <td align="center"><?php echo $equipo->getPG(); ?></td>
	                        <td align="center"><?php echo $equipo->getPE(); ?></td>
	                        <td align="center"><?php echo $equipo->getPP(); ?></td>
	                        <td align="center"><?php echo $equipo->getGC(); ?></td>
	                        <td align="center"><?php echo $equipo->getGE(); ?></td>
	                        <td align="center"><?php echo $equipo->getGA(); ?></td>
	                        <td align="center"><?php echo $equipo->getPTS(); ?></td>
                    	</tr>
                    	<?php
                    }
                    ?>
            </table>
      	</div>
            <h2>Grupo C</h2>
      	<div class="grupo">    	
            <table>
                    <tr>
                        <td>NOMBRE</td>
                        <td align="center">PJ</td>
                        <td align="center">PG</td>
                        <td align="center">PE</td>
                        <td align="center">PP</td>
                        <td align="center">GC</td>
                        <td align="center">GE</td>
                        <td align="center">GA</td>
                        <td align="center">PTS</td>
                    </tr>
                    <?php
                    foreach($grupoC->getEquipos() as $equipo){
                    	?>
                    	<tr>
	                        <td><?php echo $equipo->getNombre(); ?></td>
	                        <td align="center"><?php echo $equipo->getPJ(); ?></td>
	                        <td align="center"><?php echo $equipo->getPG(); ?></td>
	                        <td align="center"><?php echo $equipo->getPE(); ?></td>
	                        <td align="center"><?php echo $equipo->getPP(); ?></td>
	                        <td align="center"><?php echo $equipo->getGC(); ?></td>
	                        <td align="center"><?php echo $equipo->getGE(); ?></td>
	                        <td align="center"><?php echo $equipo->getGA(); ?></td>
	                        <td align="center"><?php echo $equipo->getPTS(); ?></td>
                    	</tr>
                    	<?php
                    }
                    ?>
            </table>         
  		</div>
 	</div>

<?php include("templates/footer_logos.tpl.php"); ?>
<?php include("templates/html_footer.tpl.php"); ?>
<?php require_once("includes/conn_close.php"); ?>