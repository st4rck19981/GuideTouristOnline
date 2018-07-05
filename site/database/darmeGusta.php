<?php
	include ("conexion.php");
	include ("funciones.php");
	$idl=$_POST["idl"];
	$idc=$_POST["idc"];

	sumarvaloracionComentario($idl,$idc);
	mostrarComentarios($idl);



?>