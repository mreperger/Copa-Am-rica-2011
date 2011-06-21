<?php
	$conn_host = "localhost";
	$conn_user = "root";
	$conn_pass = "";
	$conn_bd = "copa_america_2011";
	
	function Conectarse($servidor, $usuario, $pwd, $db)
	{
	   if (!($link=mysql_connect($servidor,$usuario,$pwd)))
	   {
		  echo "Error conectando a la base de datos.";
		  exit();
	   }
	   if (!mysql_select_db($db,$link))
	   {
		  echo "Error seleccionando la base de datos.";
		  exit();
	   }
	   return $link;
	}
	
	function getNombreEquipo($id,$conn){
		$sql_equipos = "SELECT nombre FROM equipos WHERE id = '".$id."';";
		$rsEquipos = mysql_query($sql_equipos,$conn) or die(mysql_error());
		if($rowEquipos = mysql_fetch_assoc($rsEquipos)){
			return $rowEquipos["nombre"];
		}else{
			return "ERROR!";
		}
	}
	
	$conn = Conectarse($conn_host,$conn_user,$conn_pass,$conn_bd);
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
            <a class="boton_selec" href="clasificacion_grupos.php">GRUPOS</a>
            <a href="log_in.php">PENCA</a>
    	</div>
    </div>
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
                    <tr>
                        <td>Argentina</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                    </tr>
                    <tr>
                        <td>Bolivia</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                    </tr>
                    <tr>
                        <td>Colombia</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                    </tr>
                    <tr>
                        <td>Costa Rica</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                    </tr>
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
                    <tr>
                        <td>Brasil</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                    </tr>
                    <tr>
                        <td>Ecuador</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                    </tr>
                    <tr>
                        <td>Paraguay</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                    </tr>
                    <tr>
                        <td>Venezuela</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                    </tr>
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
                    <tr>
                        <td>Chile</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                    </tr>
                    <tr>
                        <td>México</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                    </tr>
                    <tr>
                        <td>Perú</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                    </tr>
                    <tr>
                        <td>Uruguay</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                    </tr>
            </table>
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