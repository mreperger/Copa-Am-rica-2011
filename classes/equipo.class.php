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
				echo "Ha ocurrido un error";
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
			$this->calcPG($conn);
			$this->calcPE($conn);
			$this->calcPP($conn);
			$this->calcGC($conn);
			$this->calcGE($conn);
			$this->calcGA($conn);
			$this->calcPTS($conn);
		}
		
		private function calcPJ($conn){
			$sql_pj = "SELECT * FROM partidos WHERE (equipo_locatario = ".$this->id." OR equipo_visitante = ".$this->id.") AND estado_partido = 1;";
			$rsPJ = mysql_query($sql_pj, $conn) or die(mysql_error());
			$num_rowsPJ = mysql_num_rows($rsPJ);
			if($num_rowsPJ){
				$this->pj = $num_rowsPJ;
			}else{
				$this->pj = 0;
			}
		}
		
		private function calcPG($conn){
			$sql_pg = "SELECT * FROM partidos WHERE (equipo_locatario = ".$this->id." AND goles_equipo_locatario > goles_equipo_visitante AND estado_partido = 1) OR (equipo_visitante =".$this->id." AND goles_equipo_visitante > goles_equipo_locatario AND estado_partido = 1);";
			$rsPG = mysql_query($sql_pg, $conn) or die(mysql_error());
			$num_rowsPG = mysql_num_rows($rsPG);
			if($num_rowsPG){
				$this->pg = $num_rowsPG;
			}else{
				$this->pg = 0;
			}
		}
		
		private function calcPE($conn){
			$sql_pe = "SELECT * FROM partidos WHERE (equipo_locatario = ".$this->id." OR equipo_visitante = ".$this->id.") AND (goles_equipo_locatario = goles_equipo_visitante) AND (estado_partido = 1);";
			$rsPE = mysql_query($sql_pe, $conn) or die(mysql_error());
			$num_rowsPE = mysql_num_rows($rsPE);
			if($num_rowsPE){
				$this->pe = $num_rowsPE;
			}else{
				$this->pe = 0;
			}
		}
		
		private function calcPP($conn){
			$sql_pp = "SELECT * FROM partidos WHERE (equipo_locatario = ".$this->id." AND goles_equipo_locatario < goles_equipo_visitante AND estado_partido = 1) OR (equipo_visitante =".$this->id." AND goles_equipo_visitante < goles_equipo_locatario AND estado_partido = 1)";
			$rsPP = mysql_query($sql_pp, $conn) or die(mysql_error());
			$num_rowsPP = mysql_num_rows($rsPP);
			if($num_rowsPP){
				$this->pp = $num_rowsPP;
			}else{
				$this->pp = 0;
			}
		}
		
		private function calcGC($conn){
			$sql_gc = "(SELECT * FROM partidos WHERE (equipo_locatario = ".$this->id." OR equipo_visitante = ".$this->id.") AND estado_partido = 1);";
			$rsGC = mysql_query($sql_gc, $conn) or die(mysql_error());
			$total = 0;
			while($row_GC = mysql_fetch_array($rsGC)){
				if($row_GC["equipo_locatario"] == $this->id){
					$total = $total + $row_GC["goles_equipo_locatario"];
				}elseif($row_GC["equipo_visitante"] == $this->id){
					$total = $total + $row_GC["goles_equipo_visitante"];
				}
			}
			if($total){
				$this->gc = $total;
			}else{
				$this->gc = 0;
			}
		}
		
		private function calcGE($conn){
			$sql_ge = "(SELECT * FROM partidos WHERE (equipo_locatario = ".$this->id." OR equipo_visitante = ".$this->id.") AND estado_partido = 1);";
			$rsGE = mysql_query($sql_ge, $conn) or die(mysql_error());
			$total = 0;
			while($row_GE = mysql_fetch_array($rsGE)){
				if($row_GE["equipo_locatario"] == $this->id){
					$total = $total + $row_GE["goles_equipo_visitante"];
				}elseif($row_GE["equipo_visitante"] == $this->id){
					$total = $total + $row_GE["goles_equipo_locatario"];
				}
			}
			if($total){
				$this->ge = $total;
			}else{
				$this->ge = 0;
			}
		}
		
		private function calcGA($conn){
			$sql_ga = "(SELECT * FROM partidos WHERE (equipo_locatario = ".$this->id." OR equipo_visitante = ".$this->id.") AND estado_partido = 1);";
			$rsGA = mysql_query($sql_ga, $conn) or die(mysql_error());
			$total = 0;
			while($row_GA = mysql_fetch_array($rsGA)){
				if($row_GA["equipo_locatario"] == $this->id){
					$total = $total + $row_GA["goles_equipo_locatario"] - $row_GA["goles_equipo_visitante"];
				}elseif($row_GA["equipo_visitante"] == $this->id){
					$total = $total + $row_GA["goles_equipo_visitante"] - $row_GA["goles_equipo_locatario"];
				}
			}
			if($total){
				$this->ga = $total;
			}else{
				$this->ga = 0;
			}
		}
		
		private function calcPTS($conn){
			$this->pts = $this->pg * 3 + $this->pe * 1;
		}	
		
		public function getPJ(){
			return $this->pj;
		}
		
		public function getPG(){
			return $this->pg;
		}
		
		public function getPE(){
			return $this->pe;
		}
		
		public function getPP(){
			return $this->pp;
		}
		
		public function getGC(){
			return $this->gc;
		}
		
		public function getGE(){
			return $this->ge;
		}
		
		public function getGA(){
			return $this->ga;
		}
		
		public function getPTS(){
			return $this->pts;
		}
	}
?>