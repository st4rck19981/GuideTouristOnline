<?php	
	require 'C:\Users\vlue\vendor\autoload.php';
	use Google\Cloud\Vision\V1\ImageAnnotatorClient;	
?>

<?php
	$imagen_content_fullAndEncoded = $_POST['imagen_src_full_and_encoded'];//es el string de src de <img>, al hacer upload ya no es "", sino "data:image/jpeg;base64,/sda....sdf/Z"
		//lo que está luego de "base64," es base64_encode(file_get_contents($path)), 
			//el api nescesita solo file_get_contents($path)
			//por ello decodificamos lo codificado: base64_decode(base64_encode(file_get_contents($path))) para tener solo file_get_contents($path)

	if(!empty($imagen_content_fullAndEncoded)){
					
		//se trabaja sobre array, no sobre string
		$imagen_content_fullAndEncoded_array =str_split($imagen_content_fullAndEncoded);

		//eliminamos "data:image/jpeg;base64," (la pate full) pues se usa lo siguiente a eso			
		$contador=0;
		foreach ($imagen_content_fullAndEncoded_array as $char) {
			if($char != ",")
			$contador = $contador + 1;
			else
				break;
		}
		$contador = $contador + 1;
		for($i=1;$i<=$contador;$i++){
			array_shift($imagen_content_fullAndEncoded_array);
		}//$imagen_content_fullAndEncoded_array ya no tiene la parte full
		//el array listo se convierte a string
		$imagen_content_encoded =implode($imagen_content_fullAndEncoded_array);

		//decodificar el encoded					
		$image_contents = base64_decode($imagen_content_encoded);//es el decode del encode					

		# prepare the image to be annotated					
		$image = $image_contents;//original fue: $image = file_get_contents('cualquierimagen.jpg');

		# instantiates a client
		$imageAnnotator = new ImageAnnotatorClient();

		# performs label detection on the image file
		$response = $imageAnnotator->labelDetection($image);
		$labels = $response->getLabelAnnotations();

		if ($labels){
			echo("Labels:" . "<br>");
			foreach ($labels as $label) {
				echo("&emsp;".$label->getDescription() . "<br>");
				echo("&emsp;".$label->getDescription() . "<br>");
				echo("&emsp;".$label->getDescription() . "<br>");
			}
		}else
			echo('No label found' . "<br>");	
					
	}
?>