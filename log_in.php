<?php @session_start(); ?>
<?php require_once("includes/ini.php"); ?>
<?php
	unset($_SESSION["id_usuario"]);
	
	if(isset($_POST["btn_sign_in"])){
		$mail = $_POST["sign_usuario"];
		$sign_pass = $_POST["sign_pass"];
		$sign_pass_verificar = $_POST["sign_pass_verificar"];
		$sign_codigo = $_POST["sign_codigo"];
		$aceptar_terminos = $_POST["aceptar_terminos"];
		
		if(isset($_POST["aceptar_terminos"])){
			if($mail != "" && $sign_pass != "" && $sign_pass == $sign_pass_verificar && $sign_codigo){
				//Controlo codigo
				$sign_codigo = rtrim($sign_codigo);
				$mail = rtrim($mail);
				$cod_magico = md5($mail."COD_AMERICA");
				
				if($cod_magico == $sign_codigo){
					
					//verifico mail repetido
					$sql_control = "SELECT * FROM usuarios WHERE usuario = '".$mail."'";
					$rsUsuarioRep = mysql_query($sql_control, $conn);
					if($rowUsuarioRep = mysql_fetch_assoc($rsUsuarioRep)){
						//usuario ya existe
						$msg_error = "El usuario ya existe";
					}else{
					
						//Inserto en db
						$sql_insert = "INSERT INTO `usuarios` (`id`, `usuario`, `pass`, `activo`, `tipo`) VALUES (NULL, '".$mail."', '".md5($sign_pass)."', '0', '2');";
						//echo $sql_insert;
						mysql_query($sql_insert, $conn) or die(mysql_error());
						$id_usr = mysql_insert_id();
						
						//Cargo var sesion
						$_SESSION["id_usuario"] = $id_usr;
						
						//Mando a ingresar resultados
						header("Location: resultados_usuario.php");
						exit();
					}
				}else{
					//Error en codigo
					$msg_error = "El codigo no es valido";
				}
			}else{
				//Mostrar mensaje de error
				$msg_error = "Faltan datos";
			}
		}else{
			$msg_error = "Debe aceptar los terminos y condiciones";
		}
	}
	
	if(isset($_POST["btn_log_in"])){
		$usuario = $_POST["log_usuario"];
		$pass = $_POST["log_pass"];
		
		if($usuario != "" && $pass != ""){
			$sql_usr = "SELECT * from usuarios WHERE usuario = '".$usuario."' AND pass = '".md5($pass)."';";
			$rsUsuario = mysql_query($sql_usr, $conn) or die(mysql_error());
			if($rowUsuario = mysql_fetch_assoc($rsUsuario)){
				$_SESSION["id_usuario"] = $rowUsuario["id"];
				$_SESSION["tipo"] = $rowUsuario["tipo"];
				if(isset($_SESSION["url_back"])){
					header("Location: ".$_SESSION["url_back"]);
				}else{
					header("Location: index.php?res=".$rowUsuario["id"]);
				}
				exit();
			}else{
				$msg_error_login = "Datos incorrectos";
			}
		}else{
			$msg_error_login = "Faltan Datos";
		}
	}
		
?>
<?php include("templates/html_head.tpl.php"); ?>
<?php include("templates/menu.tpl.php"); ?>
    <div id="log_in">
    	<?php
    		if(isset($_SESSION["log_message"])){
    			echo "<div>".$_SESSION["log_message"]."</div>";
    			unset($_SESSION["log_message"]);
    		}
    	?>
    	<h2>Ingresar</h2>
    	
		<div class="menu_usuario">    	
			<?php if(isset($msg_error_login )){ echo "<div>".$msg_error_login."</div>"; } ?>
            <form name="frm_log_in" action="log_in.php" method="post">
                <table width="305">
<tr>
                        <td align="right" width="173px">Correo Electr&oacute;nico:</td>
                        <td><input type="text" name="log_usuario" /></td>
                    </tr>
                    <tr>
                        <td align="right">Contrase&ntilde;a:</td>
                        <td><input type="password" name="log_pass" /></td>
                    </tr>
                    
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Acceder" name="btn_log_in" /></td>
                    </tr>
                    
                </table>
                
            </form>
    	</div>
    </div>
    <div id="sign_in" style="display:none;">
    	<h2>Registrarse</h2>
		<div class="menu_usuario">
			<?php if(isset($msg_error)){ echo "<div>".$msg_error."</div>"; } ?>
            <form name="frm_sign_in" action="log_in.php" method="post">
                <table width="420">
					<tr>
                        <td align="right" width="200">Correo Electr&oacute;nico:</td>
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
                    	<td align="right" class="letra_cursiva"><a href="trans.php" target="_blank"><p1>He leido y acepto los t&eacute;rminos.</p1></a></td>
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
<?php include("templates/footer_logos.tpl.php"); ?>
<?php include("templates/html_footer.tpl.php"); ?>
<?php require_once("includes/conn_close.php"); ?>
