<?php
	class PuntosUsuario{
		public static function getGanadorPerdedorEmpate($local, $visita){
			if($local > $visita){
				return 1;
			}else{
				if($visita > $local){
					return 2;
				}else{
					return 3;
				}
			}
		}
		
		public static function CalcularPuntos($id_usuario, $conn){
			$sql_partidos = "SELECT * FROM partidos WHERE estado_partido = '1'";
			$rsPatidos = mysql_query($sql_partidos,$conn) or die (mysql_error());
			$puntos = 0;
			while($rowPartidos = mysql_fetch_assoc($rsPatidos)){
				$sql_partidos_usuario = "SELECT * FROM partidos_usuarios WHERE id_partido = ".$rowPartidos["id"]." AND id_usuario = ".$id_usuario;
				$rsPartidosUsuario = mysql_query($sql_partidos_usuario,$conn) or die(mysql_error());
				if($rowPartidosUsuario = mysql_fetch_assoc($rsPartidosUsuario)){
					
					$gpe = PuntosUsuario::getGanadorPerdedorEmpate($rowPartidosUsuario["goles_equipo_locatario"],$rowPartidosUsuario["goles_equipo_visitante"]);
					$gpePartidoReal = PuntosUsuario::getGanadorPerdedorEmpate($rowPartidos["goles_equipo_locatario"],$rowPartidos["goles_equipo_visitante"]);
					
					$equipo_local_acierto = 0;
					$equipo_visitante_acierto = 0;
					
					if($rowPartidos["grupo"] == "A" || $rowPartidos["grupo"] == "C" || $rowPartidos["grupo"] == "B"){
						//calculo puntos GRUPOS
						//Averiguo quien puso ganador usuario					
						if($gpe == $gpePartidoReal){
							$puntos = $puntos + 3;
							
							if($rowPartidosUsuario["goles_equipo_locatario"] == $rowPartidos["goles_equipo_locatario"] && $rowPartidosUsuario["goles_equipo_visitante"] == $rowPartidos["goles_equipo_visitante"]){
								$puntos = $puntos + 1;
							}
						}
						
					}else{
						if($rowPartidos["grupo"] == "4"){
							//calculo puntos GRUPOS
							//Averiguo quien puso ganador usuario
							if($rowPartidosUsuario["id_equipo_locatario"] == $rowPartidos["equipo_locatario"] || $rowPartidosUsuario["id_equipo_locatario"] == $rowPartidos["equipo_visitante"]){
								$puntos = $puntos + 1;
								$equipo_local_acierto = 1;
							}
							if($rowPartidosUsuario["id_equipo_visitante"] == $rowPartidos["equipo_visitante"] || $rowPartidosUsuario["id_equipo_visitante"] == $rowPartidos["equipo_locatario"]){
								$puntos = $puntos + 1;
								$equipo_visitante_acierto = 1;
							}
							
							if($equipo_local_acierto == 1 && $equipo_visitante_acierto == 1 && $gpe == $gpePartidoReal){
								$puntos = $puntos + 1;
							}
						}else{
							if($rowPartidos["grupo"] == "3"){
								if($rowPartidosUsuario["id_equipo_locatario"] == $rowPartidos["equipo_locatario"] || $rowPartidosUsuario["id_equipo_locatario"] == $rowPartidos["equipo_visitante"]){
									$puntos = $puntos + 2;
									$equipo_local_acierto = 1;
								}
								if($rowPartidosUsuario["id_equipo_visitante"] == $rowPartidos["equipo_visitante"] || $rowPartidosUsuario["id_equipo_visitante"] == $rowPartidos["equipo_locatario"]){
									$puntos = $puntos + 2;
									$equipo_visitante_acierto = 1;
								}
								
								if($equipo_local_acierto == 1 && $equipo_visitante_acierto == 1 && $gpe == $gpePartidoReal){
									$puntos = $puntos + 2;
								}
							}else{
								if($rowPartidos["grupo"] == "2"){
									if($rowPartidosUsuario["id_equipo_locatario"] == $rowPartidos["equipo_locatario"] || $rowPartidosUsuario["id_equipo_locatario"] == $rowPartidos["equipo_visitante"]){
										$puntos = $puntos + 3;
										$equipo_local_acierto = 1;
									}
									if($rowPartidosUsuario["id_equipo_visitante"] == $rowPartidos["equipo_visitante"] || $rowPartidosUsuario["id_equipo_visitante"] == $rowPartidos["equipo_locatario"]){
										$puntos = $puntos + 3;
										$equipo_visitante_acierto = 1;
									}
									
									if($equipo_local_acierto == 1 && $equipo_visitante_acierto == 1 && $gpe == $gpePartidoReal){
										$puntos = $puntos + 4;
									}
								}else{
									if($rowPartidos["grupo"] == "1"){
										if($rowPartidosUsuario["id_equipo_locatario"] == $rowPartidos["equipo_locatario"] || $rowPartidosUsuario["id_equipo_locatario"] == $rowPartidos["equipo_visitante"]){
											$puntos = $puntos + 4;
											$equipo_local_acierto = 1;
										}
										if($rowPartidosUsuario["id_equipo_visitante"] == $rowPartidos["equipo_visitante"] || $rowPartidosUsuario["id_equipo_visitante"] == $rowPartidos["equipo_locatario"]){
											$puntos = $puntos + 4;
											$equipo_visitante_acierto = 1;
										}
										
										if($equipo_local_acierto == 1 && $equipo_visitante_acierto == 1 && $gpe == $gpePartidoReal){
											$puntos = $puntos + 6;
										}
									}
								}
							}
						}
					}
				}
			}
			
			return $puntos;
		}
	}
?>