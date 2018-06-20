<?php
	include("conexion.php");
?>

<?php
	$lugar=$base->query("SELECT * FROM lugar")->fetchAll(PDO::FETCH_OBJ);

	$idlug=1;
	$comentario=$base->query("SELECT * FROM comentarios WHERE Lugar_idLugar='$idlug'")->fetchAll(PDO::FETCH_OBJ);


?>
<!DOCTYPE html>
<html>
<head>
	<h1>FUNCIONES</h1>
</head>
<body>

    <h2>Lista de Lugares</h2>
	<table border="1">
			<tr>
				<td><b><center>Codigo</center></b></td>
				<td><b><center>Nombre</center></b></td>
			</tr>
			<?php	foreach($lugar as $lugar1):   ?>
			<tr>
					<td><?php echo $lugar1->idLugar ?></td>
					<td><?php echo $lugar1->nombre ?></td>
			</tr>
			<?php   endforeach;   ?>
	</table>


    <h2>Comentarios</h2>
	<table border="1">
			<tr>
				<td><b><center>Comentario</center></b></td>
				<td><b><center>Valoracion</center></b></td>
			</tr>
			<?php	foreach($comentario as $comentario1):   ?>
			<tr>
					<td><?php echo $comentario1->Comentario ?></td>
					<td><?php echo $comentario1->Valoracion ?></td>
			</tr>
			<?php   endforeach;   ?>
	</table>
	
</body>
</html>
