
<?php
		$busqueda="FIFA"; // asignar a esa variable el indice para que sea buscado en wikipedia
		$api_url="https://es.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&exintro=&explaintext=&titles=".$busqueda;
		$api_url= str_replace(' ','%20',$api_url);

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
				$content="Opss lo sentimos, Wikipedia no tiene  nada que mostrar respecto al sitio  ".$title;
			}


		}
		else
			$content="Opsss lo sentimos, no se ha encontrado nada en wikipedia respecto a ".$title;
		
			
		?>
		<h1> <?php echo $title; ?></h1>
<?php
		echo $content;
		}
		else{
		echo "No se han encontrado resultados en wikipedia :( ";
		}
	
?>