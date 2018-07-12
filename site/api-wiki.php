<?php
	function mostrarWikipedia($texto){
		$busqueda=$texto; // asignar a esa variable el indice para que sea buscado en wikipedia
		$api_url="https://es.wikipedia.org/";
		$api_url2="w/api.php?format=json&action=query&prop=extracts&exintro=&explaintext=&titles=".$busqueda;
		$enlace=$api_url."wiki/".$busqueda;
		$api_url= str_replace(' ','%20',$api_url.$api_url2);
		$enlace= str_replace(' ','_',$enlace);
		if($data=@json_decode(file_get_contents($api_url))){
			foreach ($data->query->pages as $key => $value) {
				$pageID= $key;
				break;
			}
		$title= $data->query->pages->$pageID->title;
		if($pageID<>"-1")
		{
			$content= $data->query->pages->$pageID->extract;
			if($content=='')
			{
				$content="Encontramos <br><br>&#9745 $texto <br><br>
				Lo sentimos, Wikipedia no tiene  nada que mostrar respecto a lo encontrado. ";
				echo $content; //
				return false;
			}


		}
		else{
			$content="Encontramos <br><br>&#9745 $texto <br><br>
				Lo sentimos, Wikipedia no tiene  nada que mostrar respecto a lo encontrado. ";
			echo $content; //
			return false;
		}
?>		

		<h1><strong><center> <?php echo $texto; ?> </center></strong></h1>
		<p> <?php echo $content; ?> </p>
<?php
		insertarLugar($texto);
		$idLugar=indiceLugar($texto);
		insertarContenido($idLugar,$content,$enlace);


?>
		<br>
		<a href="<?php echo $enlace ?>" class="btn btn-outline-success btn-lg btn-block" role="button" aria-pressed="true">Mas informacion</a>

<?php
		
		return true;
		}
		else{

		echo "Encontramos <br><br>&#9745 $texto <br><br>";
		echo "No se han encontrado resultados en wikipedia :( ";
		return false;
		}
	


	}
	
?>