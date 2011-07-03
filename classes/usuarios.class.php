<?php
	require_once("classes/usuario.class.php");
	
	class Usuarios{
		
		private $usuarios_list = null;
		
		public function Usuarios($conn, $tipo, $activo){
			$this->usuarios_list = Array();
			
			$sql_usuarios = "SELECT * FROM usuarios WHERE activo = '$activo' AND tipo='$tipo';";
			$rsUsuariosList = mysql_query($sql_usuarios, $conn) or die(mysql_error());
			while($rowUsuariosList = mysql_fetch_assoc($rsUsuariosList)){
				$usuarioPos = new Usuario($rowUsuariosList["id"],$conn);
				$usuarioPos->setPuntos(PuntosUsuario:: CalcularPuntos($usuarioPos->getId(), $conn));
				$this->addUsuario($usuarioPos);
			}
			
			$this->orderPoints();
		}
		
		private function orderPoints(){
			$n = count($this->usuarios_list);
			do{
				$newn = 0;
				for($i = 0; $i < $n-1; $i++){
					$us1 = $this->usuarios_list[$i];
					$us2 = $this->usuarios_list[$i+1];
					if($us1->getPuntos() < $us2->getPuntos()){
						//CAMBIO POS
						$this->usuarios_list[$i] = $us2;
						$this->usuarios_list[$i + 1] = $us1;
						$newn = $i + 1;
					}
				}
				$n = $newn;
			}while($n > 1);
		
		}
				
		public function getUsuarios(){
			return $this->usuarios_list;
		}
		
		public function addUsuario($usuario){
			$this->usuarios_list[] = $usuario;
		}
	}
?>