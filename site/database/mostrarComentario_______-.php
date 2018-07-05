<?php
session_start();
  
    
	function mostrarComentarios($indice)
	{
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
                <button class="dar_megusta"   data="<?php echo $comentario1->idComentario; ?>" >Me gusta</button>
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
                  //indice_comentario='5';
                  indice_comentario =$(this).attr('data');
            
                $.post("database/darmeGusta.php", {idl: indice_lugar, idc:indice_comentario}, function (data)
                 {   // data es el resultado de api_work.php
                     //$("#lista_comentarios").html(data);
                      alert("Gracias por su me gusta");
                      
                });

                  $.post("database/mostrarComentario.php", { id: indice_session }, function (data) { // data es el resultado de api_work.php
                    $("#lista_comentarios").html(data);
                      alert("llegoooo");
                      
                });

            });
		});
	</script>





<?php
	return true;
	}
?>