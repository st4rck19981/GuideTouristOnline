<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
	</head>
	<body>
		<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
		<?php	
			require 'C:\Users\HP\vendor\autoload.php';
			use Google\Cloud\Vision\V1\ImageAnnotatorClient;	
			use Google\Cloud\Translate\TranslateClient;
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

				//IMAGEN LISTA

				//LANDMARK

				$response_landmark = $imageAnnotator->landmarkDetection($image);
				$landmarks = $response_landmark->getLandmarkAnnotations();
				$num_sitios = count($landmarks);
				printf('Ok, %d lugar(es) encontrado(s), ', $num_sitios);

				if($num_sitios == 0){
					print("Este lugar no lo encontramos ni en wikipedia ni en nuestra base de datos.<br><br>");
					//LABELS				
					$response_labels = $imageAnnotator->labelDetection($image);
					$labels = $response_labels->getLabelAnnotations();
					if ($labels){
						print("¿Qué encontramos en la imagen? <br><br>");
						$translate = new TranslateClient();
						$targetLanguage = 'es'; // a qué lenguaje traducir
						foreach ($labels as $label) {				
							$result = $translate->translate($label->getDescription(), [
								'target' => $targetLanguage,
							]);
							print("&emsp;	&#9745; $result[text] <br>");
						}
					}else
						print("No encontramos sugerencias para el contenido de la imagen. <br>");	
				}
				else{
					if($num_sitios >= 1){
						print("eliga uno para mostrar la información:<br><br>");
						$translate = new TranslateClient();
						$targetLanguage = 'es'; // a qué lenguaje traducir
						foreach ($landmarks as $landmark) {
							$sitio = $landmark;					
							$result = $translate->translate($landmark->getDescription(), [
								'target' => $targetLanguage,
							]);
							print("&#9745; "."$result[text]"."<br>");//DEBE ESTAR CON CHECKBOX, SE SELECCIONA SOLO UN CHECKBOX Y SE ASIGNA A $sitio
						}
						//$sitio tiene el landmark adecuado
						//mostrar descripción de ese sitio



						//print("<br>Acá iría el resultado de wikipedia o de base de datos.<br><br>");
						include("database/conexion.php");
						include("database/funciones.php");
						$nombre=print("$result[text]");
						$indice=indiceLugar($nombre);
						if (!$indice)    echo "<br>En nuestra base de datos no encontramos información.";
						echo "Pronto usaremos la base de datos de wikipedia para ampliarla";
						mostrarContenido($indice);




						//mostrar latitud y longitud
						$latitude = ($landmark->getlocations())[0]->getlatLng()->getlatitude();
						$longitude = ($landmark->getlocations())[0]->getlatLng()->getlongitude();

						print("Latitud: $latitude<br>");
						print("Longitud: $longitude<br>");
						?>

						<!--  *************************************************    -->
						

															                 <style>
									       /* Set the size of the div element that contains the map */
									      #map {
									        height: 400px;  /* The height is 400 pixels */
									        width: 400px;  /* The width is the width of the web page */
									       }
									    </style>

									    <div id="map"></div>
									    <script>
									// Initialize and add the map
									function initMap() {
										var lat= parseFloat('<?php echo $latitude; ?>');
										var lon =  parseFloat('<?php echo $longitude; ?>');
									   //  var   lat= -16.398697;
										//	var lon= -71.536864;
									//  var uluru = {lat: '<?php echo $latitude; ?>', lng: '<?php echo $longitude; ?>'};
									  var uluru = {lat: lat, lng: lon };
									  // The map, centered at Uluru
									  var map = new google.maps.Map(
									      document.getElementById('map'), {zoom: 14, center: uluru});
									  // The marker, positioned at Uluru
									  var marker = new google.maps.Marker({position: uluru, map: map});
									}
									    </script>
									    <!--Load the API from the specified URL
									    * The async attribute allows the browser to render the page while the API loads
									    * The key parameter will contain your own API key (which is not needed for this tutorial)
									    * The callback parameter executes the initMap() function
									    -->
									    <script async defer
									    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEbVXJr3XoP--wAR-3HB2zSaxClRu8ZYk&callback=initMap">
									    </script>


						<!--  *************************************************    -->
						
						<?php
						//subir a base de datos puntuacion y comentario del sitio

					}
				}
		
			}
		?>
	</body>
</html>