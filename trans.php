<?php session_start(); ?>
<?php require_once("includes/ini.php"); ?>


<?php include("templates/html_head.tpl.php"); ?>
<?php include("templates/menu.tpl.php"); ?>

<h2>REGLAS</h2>
<p>Cuando est&eacute; ingsando sus resultados usted deber&aacute; calcular los puntos de cada equipo para luego poner los clasificados y armar sus partidos de Cuartos de Final.
 Luego los partidos de Semifinal, Tercer Puesto y Final los tendr&aacute; que armar seg&uacute;n lo elegido y seg&uacute;n los resultados en los partidos de Cuartos de Final. 
 Una vez que ingrese sus resultados no podr&aacute; modificarlos, as&iacute; que verifiquelos bien antes de ingresarlos.</p>
<p><em>PUNTOS</em></p>
<p>Los jugadores recibiran puntos a medida que acierten sus resultados con los resultados de la copa una vez que se termine el partido o termine el alargue, si el partido se define por penales el resultado es el empate antes de la ejecuciones de los penales pero pasa el ganador de ellos. &Eacute;ste se sabr&aacute; una vez finalizado el partido.</p>
<p>FASE DE GRUPOS: Si acierta el ganador del partido o el empate ganar&aacute; 3 puntos y si a su vez acierta el resultado ganar&aacute; un punto extra.</p>

<p>CUARTOS: Si acierta uno de los dos equipos que van a disputar uno de estos partidos ganar&aacute; 1 punto, si acierta los 2 equipos ganar&aacute; 2 puntos y adem&aacute;s podr&aacute; competir por 1 punto bonus si acierta el ganador o el empate (en caso que se defina por penales).</p>

<p>SEMIFINAL: Si acierta uno de los dos equipos que van a disputar uno de estos partidos ganar&aacute; 2 puntos, si acierta los 2 equipos ganar&aacute; 4 puntos y adem&aacute;s podr&aacute; competir por 2 puntos bonus si acierta el ganador o el empate (en caso que se defina por penales).</p>

<p>TERCER PUESTO: Si acierta uno de los dos equipos que van a disputar uno de estos partidos ganar&aacute; 3 puntos, si acierta los 2 equipos ganar&aacute; 6 puntos y adem&aacute;s podr&aacute; competir por 4 puntos bonus si acierta el ganador o el empate (en caso que se defina por penales).</p>

<p>FINAL: Si acierta uno de los dos equipos que van a disputar uno de estos partidos ganar&aacute; 4 puntos, si acierta los 2 equipos ganar&aacute; 8 puntos y adem&aacute;s podr&aacute; competir por 6 puntos bonus si acierta el ganador o el empate (en caso que se defina por penales).</p>

<p><em>GANADOR</em></p>
<p>El ganador se sabr&aacute; una vez que termine el partido final del dia 24 de julio de 2011.
Si hay m&aacute;s de un ganador se repartir&aacute; el premio entre todos los ganadoress en partes iguales.</p>

<?php include("templates/footer_logos.tpl.php"); ?>
<?php include("templates/html_footer.tpl.php"); ?>
<?php require_once("includes/conn_close.php"); ?>