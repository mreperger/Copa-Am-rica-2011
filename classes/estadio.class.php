<?php
	class Estadio{
		private $id = null;
		private $nombre = null;
		
		public function Estadio($id,$conn){
			$sql_estadio = "SELECT * FROM estadios WHERE id = '$id';";
			$rsEstadio = mysql_query($sql_estadio, $conn);
			if($rowEstadio = mysql_fetch_assoc($rsEstadio)){
				//cargo datos en el estadio
				$this->id = $rowEstadio["id"];
				$this->nombre = $rowEstadio["nombre"];
			}else{
				echo "Ha ocurrido un error";
			}
		}
		
		public function getNombreEstadio(){
			return $this->nombre;
		}
			
	}
?>