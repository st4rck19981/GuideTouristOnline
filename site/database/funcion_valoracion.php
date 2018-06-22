<?php
	include ("conexion.php");
	include ("funciones.php");
	   $idLugar = $_POST['id'];
	   $val = $_POST['puntuacion'];
	
	darvaloracionLugar($idLugar,$val);
	
?>
