<?php

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