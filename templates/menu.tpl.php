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
	<div id="menu">
		<a href="index.php">FIXTURE</a>
		<a href="clasificacion_grupos.php">GRUPOS</a>
		<a href="index.php?res=<?php echo $cod_usuario_fixture;  ?>">MIS PARTIDOS</a>
		<a href="trans.php">REGLAS</a>
		<?php if(isset($_SESSION["id_usuario"])){ ?><a href="logout.php" class="small_menu"><?php echo $usuario_global->getUsuario(); ?> [CERRAR SESI&Oacute;N]</a><?php } ?>
	</div>
</div>