<?php session_start(); ?>
<?php require_once("includes/ini.php"); ?>
<?php require_once("classes/equipo.class.php"); ?>
<?php require_once("classes/puntos_usuario.class.php"); ?>
<?php require_once("classes/usuarios.class.php"); ?>
<?php

	if(!isset($_SESSION["id_usuario"])){
		$_SESSION["url_back"] = "ranking.php";
		$_SESSION["log_message"] = "Para ver el Ranking debe de ingresar";
		header("Location: log_in.php");
		exit();
	}else{
		$usuarios_ranking = new Usuarios($conn,2,1);
	}
?>
<?php include("templates/html_head.tpl.php"); ?>
<?php include("templates/menu.tpl.php"); ?>

<?php include("templates/ranking.tpl.php"); ?>

<?php include("templates/footer_logos.tpl.php"); ?>
<?php include("templates/html_footer.tpl.php"); ?>
<?php require_once("includes/conn_close.php"); ?>
