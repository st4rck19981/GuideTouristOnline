<?php
				
				
				$codigo = $_POST['codigo'];
				//echo $codigo;
				 
				
				
				
				
				
				
				
				
				
				
				
				# includes the autoloader for libraries installed with composer
				require 'C:\Users\vlue\vendor\autoload.php';
				# imports the Google Cloud client library
				use Google\Cloud\Vision\V1\ImageAnnotatorClient;			
				//echo "Si"."<br>"."<br>"."<br>"."<br>"."<br>";
				//$tmp = "<script> document.write(imagen_src); </script>";// imprime image_src, pero como estructuras es todo lo del ""
				if(!empty($codigo)){
					//echo "NO"."<br>"."<br>"."<br>"."<br>"."<br>";
					//obtenemos el string de src de <img>, al hacer upload ya no es ""
					//$lo_de_src = str_split($codigo);

					//preg_match( '@src="([^"]+)"@' , $tag_imagen, $lo_de_src);

					//al ya subir una imagen src cambia a "data:image/jpeg;base64,/sda....sdf/Z"
					//lo que está luego de "base64," es base64_encode(file_get_contents($path))
					//por lo tanto se se hace decode a eso se encuentra el file_get_contents($path) que se pasa a la api

					$image_encoded_string = $codigo;//array_pop($lo_de_src); 
					$image_encoded_array =str_split($image_encoded_string);//se trabaja sobre array, no sobre string

					//eliminamos "data:image/jpeg;base64," pues se usa lo siguiente
					if(count($image_encoded_array)>1){//aseguramos que src ya tiene el string encoded
						$contador=0;
						foreach ($image_encoded_array as $char) {
							if($char != ",")
							$contador = $contador + 1;
							else
								break;
						}
						$contador = $contador + 1;
						for($i=1;$i<=$contador;$i++){
							array_shift($image_encoded_array);
						}

						//decodificar el encoded pues $image_encoded = base64_encode(file_get_contents($path));
						//el decodificado equivale a file_get_contents($path)
						$image_encoded_string =implode($image_encoded_array);//el array listo se convierte a string, para el api
						$image_de_path = base64_decode($image_encoded_string);//es el decode del encode

						# instantiates a client
						$imageAnnotator = new ImageAnnotatorClient();

						# prepare the image to be annotated					
						$image = $image_de_path;//$image = file_get_contents('cualquierimagen.jpg');

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
				}
        ?>