<?php
	include ("conexion.php");
	include ("funciones.php");
	   $idLugar = $_POST['id'];
	   $texto = $_POST['comentario'];	
	insertarComentario($idLugar,$texto);
	mostrarComentarios($idLugar);

	
?>
