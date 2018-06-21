<?php
 	function indiceLugar($nombreLugar)
 	{
 		global $base;
 		$idlug=$base->query("SELECT idLugar FROM lugar WHERE nombre='$nombreLugar' LIMIT 1")->fetchAll(PDO::FETCH_OBJ);
		if (!$idlug){
			return 0;
		}
		return $idlug[0]->idLugar;

 	}
?>

 <?php
	function mostrarContenido($indice)
	{
		global $base;
		$categoria=$base->query("SELECT * FROM lugar_has_categoria lc INNER JOIN categoria c ON c.idCategoria=lc.Categoria_idCategoria WHERE lc.Lugar_idLugar='$indice' ORDER BY c.idCategoria ASC" )->fetchAll(PDO::FETCH_OBJ);

?>
		<table border="1">
		<?php	foreach($categoria as $categoria1):   ?>
			<tr>
				<td><b><center><?php echo $categoria1->nombreCategoria ?></center></b></td>
			</tr>
			<tr>
				<td><?php echo $categoria1->contenidoCategoria ?></td>
			</tr>
			<tr>
					<td>Referencias: </td>
			</tr>
			<tr>
					<td><?php echo $categoria1->referenciaCategoria ?></td>
			</tr>
		<?php   endforeach;   ?>
		</table>
<?php
	}
?>



<?php
	function mostrarComentarios($indice)
	{
		global $base;
		$comentario=$base->query("SELECT * FROM comentarios WHERE Lugar_idLugar='$indice' ORDER BY Valoracion DESC")->fetchAll(PDO::FETCH_OBJ);
		if (!$comentario)    return false;
?>
	<table border="1">
		<?php	foreach($comentario as $comentario1):   ?>
			
			<tr>
				<td><b>ID: <?php echo $comentario1->idComentario ?></b></td>
				<td>Fecha: <?php echo $comentario1->Fecha ?></td>
				<td>Valoracion: <?php echo $comentario1->Valoracion ?></td>
			</tr>
			<tr>
				<td><?php echo $comentario1->Comentario ?></td>
			</tr>
		<?php   endforeach;   ?>
		</table>
<?php
	return true;
	}
?>


<?php
	function insertarComentario($idLugar,$texto)
	{
		global $base;
		$errores="";
		if ($texto=="")
			$errores="El comentario esta vacio.";
		else
		$base->query("INSERT INTO comentarios (Lugar_idLugar,Comentario,Fecha) VALUES ('$idLugar','$texto',NOW())");
		return $errores;
	}
?>

<?php
	function sumarvaloracionComentario($idLugar,$idComentario)
	{
		global $base;
		$base->query("UPDATE comentarios SET Valoracion=Valoracion+1 WHERE idComentario='$idComentario' AND Lugar_idLugar='$idLugar'");
	}
?>

<?php
	function darvaloracionLugar($idLugar,$val)
	{
		global $base;
		$base->query("INSERT INTO valoracionlugar (Lugar_idLugar,punto) VALUES ('$idLugar','$val')");
	}

?>

<?php
	function mostrarvaloracionLugar($idLugar)
	{
		global $base;
		$puntos=$base->query("SELECT punto FROM valoracionlugar WHERE Lugar_idLugar='$idLugar'")->fetchAll(PDO::FETCH_OBJ);
		$puntuacion=0;
		$n=0;
		foreach ($puntos as $puntos1) {
			$puntuacion=$puntuacion + $puntos1->punto;
			$n=$n+1;
		}
		if ($puntuacion==0)    return 0;
		else	return $puntuacion/$n;
	}

?>

<?php
	function latitud($idLugar)
	{
		global $base;
		$lat=$base->query("SELECT contenidoCategoria FROM lugar_has_categoria WHERE Lugar_idLugar='$idLugar' AND Categoria_idCategoria=4 LIMIT 1")->fetchAll(PDO::FETCH_OBJ);
		if (!$lat)    return 0;
		return $lat[0]->contenidoCategoria;
	}

?>

<?php
	function longitud($idLugar)
	{
		global $base;
		$lon=$base->query("SELECT contenidoCategoria FROM lugar_has_categoria WHERE Lugar_idLugar='$idLugar' AND Categoria_idCategoria=5 LIMIT 1")->fetchAll(PDO::FETCH_OBJ);
		if (!$lon)    return 0;
		return $lon[0]->contenidoCategoria;
	}

?>