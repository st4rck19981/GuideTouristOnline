<?php
	include("conexion.php");
	include("funciones.php");

	$nombrelug="Plaza de Armas";
	$indice=indiceLugar($nombrelug);


	//mostrarContenido($nombrelug);

	//indiceLugar("Plaza de Armas");

	//insertarComentario(1,"No se");
	//sumarvaloracionComentario(1,1);
	//darvaloracionLugar(1,6);
	$estrellas=mostrarvaloracionLugar($indice);
	echo $estrellas;

?>


<html>
<body>
<h2>CONTENIDO:</h2>
	<h3><?php echo $nombrelug ?></h3>
	<?php mostrarContenido($indice) ?>

<h2>COMENTARIOS:</h2>
	<?php
	if(mostrarComentarios($indice)==false)
	{
		echo "Lista no cargada.";
	}
	?>


</body>
</html>
