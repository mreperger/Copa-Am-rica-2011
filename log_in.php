<?php
	
	require_once("includes/conn.php");
	
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
	}else{
	}
?>
	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Copa America 2011</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="pagina">
    <div id="zona_cabezal">
    	<div class="img_cabezal">
      		<img src="logos/ca2011.png" />
        </div>
        <h1>PENCA ONLINE <strong>COPA AMERICA ARGENTTINA</strong> 2011</h1>
        <div id="menu">
        	<a href="index.php">FIXTURE</a>
            <a href="clasificacion_grupos.php">GRUPOS</a>
            <a class="boton_selec" href="log_in.php">PENCA</a>
    	</div>
    </div>
    <div id="log_in">
    	<h2>Ingresar</h2>
		<div class="menu_usuario">    	
            <form name="frm_log_in" action="" method="post">
                <table width="286">
<tr>
                        <td align="right" width="20px">Usuario:</td>
                        <td><input type="text" name="log_usuario" /></td>
                    </tr>
                    <tr>
                        <td align="right">Contrase&ntilde;a:</td>
                        <td><input type="password" name="log_pass" /></td>
                    </tr>
                    <tr>
                        <td align="right"><input type="checkbox" name="no_cerrar_sesion" value="yes" /></td>
                        <td>No cerrar sesi&oacute;n</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Acceder" name="btn_log_in" /></td>
                    </tr>
                    <tr>
                    	<td></td>
                        <td><a href=""><p1>Has olvidado tu contrase&ntilde;a?</p1></a></td>
                    </tr>
                </table>
                
            </form>
    	</div>
    </div>
    <div id="sign_in">
    	<h2>Registrarse</h2>
		<div class="menu_usuario">    	
            <form name="frm_sign_in" action="" method="post">
                <table width="420">
<tr>
                        <td align="right" width="200">Correo Electronico:</td>
            <td width="198"><input type="text" name="sign_usuario" /></td>
                  </tr>
                    <tr>
                        <td align="right">Contrase&ntilde;a:</td>
                        <td><input type="password" name="sign_pass" /></td>
                    </tr>
                    <tr>
                        <td align="right">Volver a escribir contrase&ntilde;a:</td>
                        <td><input type="password" name="sign_pass_verificar" /></td>
                    </tr>
                    <tr>
                        <td align="right">C&oacute;digo:</td>
                        <td><input type="text" name="sign_codigo" /></td>
                    </tr>
                    <tr>
                    	<td align="right"><a href=""><p1>He leido y acepto los t&eacute;rminos.</p1></a></td>
                    	<td align="left"><input type="checkbox" name="aceptar_terminos" value="yes" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Registrarse" name="btn_sign_in" /></td>
                    </tr>
                </table>
            </form>
    	</div>
    </div>
	<div id="pie_pagina">
    	<a href="http://www.conmebol.com"><img src="logos/conmebol.png" width="71" height="71" /></a>
        <a href="http://www.afa.org.ar"><img src="logos/argentina.png" width="53" height="71" /></a>
        <a href="http://www.fbf.com.bo"><img src="logos/bolivia.png" width="61" height="71" /></a>
        <a href="http://www.cbf.com.br"><img src="logos/brasil.png" width="58" height="78" /></a>
        <a href="http://www.anfp.cl"><img src="logos/chile.png" width="71" height="71" /></a>
        <a href="http://www.colfutbol.org"><img src="logos/colombia.png" width="71" height="71" /></a>
        <a href="http://www.fedefutbol.org"><img src="logos/costa_rica.png" width="75" height="75" /></a>
        <a href="http://www.ecuafutbol.org"><img src="logos/ecuador.png" width="79" height="77" /></a>
        <a href="http://www.femexfut.org.mx"><img src="logos/mexico.png" width="61" height="80" /></a>
        <a href="http://www.apf.org.py"><img src="logos/paraguay.png" width="71" height="71" /></a>
        <a href="http://www.fpf.com.pe"><img src="logos/peru.png" width="60" height="70" /></a>
        <a href="http://www.auf.org.uy"><img src="logos/uruguay.png" width="55" height="85" /></a>
        <a href="http://www.auf.org.uy"><img src="logos/venezuela.png" width="55" height="71" /></a>    
     </div>
</div>
</body>
</html>

<?php

	mysql_close($conn); //cierra la conexion

?>
