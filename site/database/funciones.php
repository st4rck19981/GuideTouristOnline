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
	function mostrarmegusta($indice,$indicecomend)
	{
		global $base;
		$rpta=$base->query("SELECT Valoracion FROM comentarios WHERE Lugar_idLugar='$indice' AND idComentario='$indicecomend'")->fetchAll(PDO::FETCH_OBJ);
		if (!$rpta)    return 0;
		return $rpta[0]->Valoracion;
	}

?>


 <?php
	function mostrarContenido($indice)
	{
		global $base;
		$categoria=$base->query("SELECT * FROM lugar_has_categoria lc INNER JOIN categoria c ON c.idCategoria=lc.Categoria_idCategoria WHERE lc.Lugar_idLugar='$indice' ORDER BY c.idCategoria ASC" )->fetchAll(PDO::FETCH_OBJ);

?>
		<table border="1">
		<?php	foreach($categoria as $categoria1):?>
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
		<?php	foreach($comentario as $comentario1):   ?>
			
			<div class="" style="margin-bottom: -16px ">
                  <p class="border border-dark rounded text-justify" style="padding: 8px 15px">
                    <span class="font-weight-bold">Usuario Anonimo:</span><br>
                     <?php echo $comentario1->Comentario ?>
                  </p>
            </div>
            <?php
            	$megusta=mostrarmegusta($indice,$comentario1->idComentario);
            ?>
            <div class="float-right" style="margin-bottom: -10px ">
                <a href="database//darmeGusta.php?idl='<?php echo $indice; ?>' & idc='<?php echo $comentario1->idComentario; ?>'">Me gusta</a>
                <i class="far fa-thumbs-up fa-1x"></i>
                <span><?php echo $megusta; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
            <br><br>
		<?php   endforeach;   ?>
<?php
	return true;
	}
?>


			<div >
                <!-- CONTENIDO COMENTARIO -->
                <div class="" style="margin-bottom: -16px ">
                  <p class="border border-dark rounded text-justify" style="padding: 8px 15px">
                    <span class="font-weight-bold">Usuario Anonimo:</span><br>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                      proident, sunt in culpa qui officia deserunt mollit anim id est laborum..
                  </p>
                </div>

                <!-- ME GUSTA -->
                <div class="float-right" style="margin-bottom: 10px ">
                  <a href="">Me gusta</a>
                  <i class="far fa-thumbs-up fa-1x"></i>
                  <span>15</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                <br><br>
            </div>










<?php
	function insertarComentario($idLugar,$texto)
	{
		global $base;
		if ($texto=="")
			echo "El comentario esta vacio.";
		else
		$base->query("INSERT INTO comentarios (Lugar_idLugar,Comentario,Fecha) VALUES ('$idLugar','$texto',NOW())");
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