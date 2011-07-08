<?php
	
	if(isset($_SESSION["id_usuario"])){
		$cod_usuario_fixture = $_SESSION["id_usuario"];
	}else{
		$cod_usuario_fixture = 0;
	}
?>

<div id="zona_cabezal">
	<div class="img_cabezal">
		<img src="logos/ca2011.png" />
	</div>
	<h1><strong>COPA AMERICA ARGENTINA</strong> 2011</h1>
	<div class="small_res"><?php if(isset($_SESSION["id_usuario"]) && $_SESSION["tipo"] == 1){ ?><a href="fixture_admin.php">ACUTALIZAR RESULTADOS</a><?php } ?></div>
	<div id="menu">
		<a href="index.php">FIXTURE</a>
		<a href="clasificacion_grupos.php">GRUPOS</a>
		<a href="index.php?res=<?php echo $cod_usuario_fixture;  ?>">MIS PARTIDOS</a>
		<a href="trans.php">REGLAS</a>
		<a href="ranking.php">RANKING</a>
		<?php if(isset($_SESSION["id_usuario"])){ ?><a href="logout.php" class="small_menu"><?php echo strtoupper($usuario_global->getNombre()); ?> [CERRAR SESI&Oacute;N]</a><?php } ?>
	</div>
</div>