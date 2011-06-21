<?php

	require_once(dirname(__FILE__)."/equipo.class.php");
	
	class Grupo{
		
		private $equipos=null;
		
		public function Grupo($cod_grupo, $conn){
			
			$equipos = Array();
			
			$sql_equipos = "SELECT * FROM equipos WHERE grupo = '".$cod_grupo."';";
			$rsEquipos = mysql_query($sql_equipos, $conn);
			while($rowEquipos = mysql_fetch_assoc($rsEquipos)){
				$equipo = new Equipo($rowEquipos["id"],$conn);
				$equipo->calcResultados($conn);
				$this->equipos[] = $equipo;
			}
			
			//Ordeno array segun reglas de puntos
		}
	}
	
?>