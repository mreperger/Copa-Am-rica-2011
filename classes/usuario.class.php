<?php
	class Usuario{
		
		private $id = null;
		private $usuario = null;
		private $password = null;
		private $activo = null;
		
		public function Usuario($id, $conn){
			$sql_usuario_glob = "SELECT * from usuarios WHERE id = '$id'";
			$rsUsuarioLoc = mysql_query($sql_usuario_glob, $conn) or die(mysql_error());
			if($rowUsuarioLoc = mysql_fetch_assoc($rsUsuarioLoc)){
				$this->id = $rowUsuarioLoc["id"];
				$this->usuario = $rowUsuarioLoc["usuario"];
				/*$this->id = $rowUsuario["id"];
				$this->id = $rowUsuario["id"];
				$this->id = $rowUsuario["id"];*/ 
			}
		}
		
		public function getUsuario(){
			return $this->usuario;
		}
	}
?>