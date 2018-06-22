<?php
	include ("conexion.php");
	include ("funciones.php");
	$idl=$_GET["idl"];
	$idc=$_GET["idc"];
	echo $idl;
	echo $idc;
	sumarvaloracionComentario($idl,$idc);
	header("Location:../../api.php");

?>