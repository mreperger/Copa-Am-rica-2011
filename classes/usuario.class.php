<?php
	class Usuario{
		
		private $id = null;
		private $usuario = null;
		private $pass = null;
		private $activo = null;
		private $tipo = null;
		private $puntos = null;
		private $nombre = null;
		
		public function Usuario($id, $conn){
			$sql_usuario_glob = "SELECT * from usuarios WHERE id = '$id'";
			$rsUsuarioLoc = mysql_query($sql_usuario_glob, $conn) or die(mysql_error());
			if($rowUsuarioLoc = mysql_fetch_assoc($rsUsuarioLoc)){
				$this->id = $rowUsuarioLoc["id"];
				$this->usuario = $rowUsuarioLoc["usuario"];
				$this->nombre = $rowUsuarioLoc["nombre"];
				$this->tipo = $rowUsuarioLoc["tipo"];
				$this->pass = $rowUsuarioLoc["pass"];
				$this->activo = $rowUsuarioLoc["activo"];
			}
		}
		
		public function getUsuario(){
			return $this->usuario;
		}
		
		public function getNombre(){
			return $this->nombre;
		}
		
		public function setPuntos($puntos){
			$this->puntos = $puntos;
		}
		
		public function getId(){
			return $this->id;
		}
		
		public function getPuntos(){
			return $this->puntos;
		}
		
		public static function getNombreUsuario($id, $conn){
			$sql_nom = "SELECT nombre FROM usuarios WHERE id = '$id'";
			$rsUs = mysql_query($sql_nom, $conn);
			$rowUs = mysql_fetch_assoc($rsUs);
			return $rowUs["nombre"];
		}
	}
?>