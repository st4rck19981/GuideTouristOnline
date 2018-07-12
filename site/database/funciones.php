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
			<td><a href="<?php echo $categoria1->referenciaCategoria ?>" class="btn btn-outline-success btn-lg btn-block" role="button" aria-pressed="true">Mas informacion</a></td>

		<?php   endforeach;   ?>
		</table>
<?php
	}
?>



<?php
	function mostrarComentarios($indice)

	{
		//session_start();
		global $base;
		$comentario=$base->query("SELECT * FROM comentarios WHERE Lugar_idLugar='$indice' ORDER BY Valoracion DESC")->fetchAll(PDO::FETCH_OBJ);
		if (!$comentario)    return false;
		

?>



		<?php	foreach($comentario as $comentario1):   ?>
			
			<div class="" style="margin-bottom: -16px ">
                  <p class="border border-dark rounded text-justify" style="padding: 8px 15px">
                    <span  class="font-weight-bold">Usuario Anonimo:</span><br>
                     <?php echo $comentario1->Comentario ?>
                  </p>
            </div>
            <?php
            	$megusta=mostrarmegusta($indice,$comentario1->idComentario);
            ?>
            <div class="float-right" style="margin-bottom: -10px ">
                <button class="dar_megusta"   data="<?php echo $comentario1->idComentario; ?>" >Mejor Comentario</button>
                <i class="far fa-thumbs-up fa-1x"></i>
                <span class="cantidad_megusta" ><?php echo $megusta; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
            <br><br>
		<?php   endforeach;   ?>
        <script>
        $(document).ready(function(){

		$(".dar_megusta").click(function(){  
                  indice_lugar='<?php echo $indice; ?>';
                  indice_session= '<?php echo $_SESSION['indice_final']; ?>';
                  indice_comentario =$(this).attr('data');
            
                $.post("database/darmeGusta.php", {idl: indice_lugar, idc:indice_comentario}, function (data)
                 {   // data es el resultado de api_work.php
                     $("#lista_comentarios").html(data);
                      alert("Gracias por su me gusta");
                      
                });

               /*  $.post("database/mostrarComentario.php", { id: indice_session }, function (data) { // data es el resultado de api_work.php
                    $("#lista_comentarios").html(data);
                     alert("Gracias por su sssssssssssssssssssss");
                      
                });*/

            });
		});
	</script>





<?php
	return true;
	}
?>



<?php
	function insertarComentario($idLugar,$texto)
	{
		global $base;
		if ($texto=="")
			echo "No ha realizado ningun comentario.";
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


<?php
	function insertarLugar($nombreLugar)
	{
		global $base;
		$base->query("INSERT INTO lugar VALUES ('','$nombreLugar')");
	}

?>


<?php
	function insertarContenido($idLugar,$contenido,$referencia)
	{
		global $base;
		$base->query("INSERT INTO lugar_has_categoria VALUES ('$idLugar',1,'$contenido','$referencia')");
	}

?>
