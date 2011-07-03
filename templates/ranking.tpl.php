<h2 style="margin-bottom:5px;">Ranking</h2>
<table cellpadding="2" cellspacing="0" borde="0">
	<tr>
		<td width="15">&nbsp;</td>
		<td width="300">Nombre</td>
		<td>Puntos</td>
	</tr>

	<?php
		$iteracion = 1;
		$pos = 1;
		$row = 1;
		foreach($usuarios_ranking->getUsuarios() as $usuario_ranking){ 
	?>
	
	<tr <?php if($row == 1){ ?>style="background-color:#243361"<?php $row = 2; }else{ $row = 1; } ?>>
		<td><?php echo $pos; $pos = $pos + 1; ?>.</td>
		<td><a href='index.php?res=<?php echo $usuario_ranking->getId(); ?>'><?php echo $usuario_ranking->getNombre(); ?></a></td>
		<td><strong><?php echo $usuario_ranking->getPuntos(); ?></strong></td>
	</tr>
	
	<?php } ?>
</table>