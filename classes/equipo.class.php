<?php
	class Equipo{
		
		private $id = null;
		private $nombre = null;
		private $grupo = null;
		private $estado_clasificacion = null;
		
		private $pj=null;
		private $pg=null;
		private $pe=null;
		private $pp=null;
		private $gc=null;
		private $ge=null;
		private $ga=null;
		private $pts=null;
		
		public function Equipo($id, $conn){
			$sql_equipo = "SELECT * FROM equipos WHERE id = '$id';";
			$rsEquipo = mysql_query($sql_equipo, $conn);
			if($rowEquipo = mysql_fetch_assoc($rsEquipo)){
				//cargo datos en el equipo
				$this->id = $rowEquipo["id"];
				$this->nombre = $rowEquipo["nombre"];
				$this->grupo = $rowEquipo["grupo"];
				$this->estado_clasificacion = $rowEquipo["estado_clasificacion"];
			}else{
				echo "Ha ocurrido un error terrible e inexplicable, dios salvanos.";
			}
		}
		
		public function getNombre(){
			return $this->nombre;
		}
		
		public function getId(){
			return $this->id;
		}
		
		public function getGrupo(){
			return $this->grupo;
		}
		
		public function getEstadoClasificacion(){
			return $this->estado_clasificacion;
		}
		
		public function calcResultados($conn){
			//Calcular partidos ganados, partidos perdidos, etc
			$this->calcPJ($conn);
			$this->calcPG();
			//Hacer todas las otras
		}
		
		private function calcPJ($conn){
			$sql_pj = "SELECT * FROM partidos WHERE (equipo_locatario = ".$this->id." OR equipo_visitante = ".$this->id.") AND estado_partido = 1;";
			$rsPJ = mysql_query($sql_pj, $conn) or die(mysql_error());
			$num_rows = mysql_num_rows($rsPJ);
			if($num_rows){
				$this->pj = $num_rows;
			}else{
				$this->pj = 0;
			}
		}
		
		private function calcPG($conn){
			//Seguir aca
		}
		
		/*function getNombreEquipo($id,$conn){
			$sql_equipos = "SELECT nombre FROM equipos WHERE id = '".$id."';";
			$rsEquipos = mysql_query($sql_equipos,$conn) or die(mysql_error());
			if($rowEquipos = mysql_fetch_assoc($rsEquipos)){
				return $rowEquipos["nombre"];
			}else{
				return "ERROR!";
			}
		}*/
		
	}
?>