 <?php  
 set_time_limit(3000000);

      require 'C:\Users\HP\vendor\autoload.php';
      use Google\Cloud\Vision\V1\ImageAnnotatorClient;  
      use Google\Cloud\Translate\TranslateClient;
    ?>


    <?php
    //print_r($_POST); die; 
      $imagen_content_fullAndEncoded = $_POST['codificado'];//es el string de src de <img>, al hacer upload ya no es "", sino "data:image/jpeg;base64,/sda....sdf/Z"
        //lo que está luego de "base64," es base64_encode(file_get_contents($path)), 
          //el api nescesita solo file_get_contents($path)
          //por ello decodificamos lo codificado: base64_decode(base64_encode(file_get_contents($path))) para tener solo file_get_contents($path)

      if(empty($imagen_content_fullAndEncoded)){
        header("Location: http://localhost/guidetourist/site/ejecutar.php?mensaje="."No ha subido ninguna imagen.");
      }
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
       $todo='';
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
            //  print("&emsp; &#9745; $result[text] <br>");    
              $todo .= $result['text']." ||| "; 
            }
   

             
                echo $todo;  
                  header("Location: http://localhost/guidetourist/site/ejecutar.php?mensaje=No encontramos sitios sugeridos para esta imagen, pero se puede referir a ".$todo);
                  exit;
                
             
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
              //print("&#9745; "."$result[text]"."<br>");//DEBE ESTAR CON CHECKBOX, SE SELECCIONA SOLO UN CHECKBOX Y SE ASIGNA A $sitio
              break;
            }
            //$sitio tiene el landmark adecuado
            //mostrar descripción de ese sitio



            //print("<br>Acá iría el resultado de wikipedia o de base de datos.<br><br>");
        include("database/conexion.php");
        include("database/funciones.php");
        include("api-wiki.php");

        $nombre="$result[text]";  //SI FUERA CATEDRAL TU ESCOJES CATEDRAL DE ROMA O DE AREQUIPA Y $nombre DEBE GUARDARLO
        $indice=indiceLugar($nombre);

            

        session_start();
        $_SESSION['indice_final'] = $indice;


            //mostrar latitud y longitud
            $latitude = ($landmark->getlocations())[0]->getlatLng()->getlatitude();
            $longitude = ($landmark->getlocations())[0]->getlatLng()->getlongitude();
            ?>

          

          
            
            <?php
            //subir a base de datos puntuacion y comentario del sitio

          }
        }
    
      }
    
?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>GTO</title>

    <!-- Bootstrap core CSS -->
    
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/open-iconic/font/css/open-iconic.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    
    
    <!--Google Maps -->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.gomap-1.3.3.min.js"></script>

    <!-- Custom styles for this template 
    <link href="css/half-slider.css" rel="stylesheet">
    -->
    <script language="javascript">  
    $(document).ready(function(){ // cuando las imagenes estan cargadas.. se trabaja el button y el input para el método post
        bandera=true;
          $(".estrella").click(function(){               
                valor =$(this).attr('data');
                indice = "<?php echo $indice; ?>";
                if( bandera )
                {
                  $.post("database/funcion_valoracion.php", { id: indice, puntuacion: valor }, function (data) { // data es el resultado de api_work.php
                  alert("Gracias por su puntuacion");
                  bandera=false;
                  });
                }
                else
                  alert("Ya has dado una puntuacion");
            });

        if( bandera )
        {
                    $( "#e_1" ).mouseover(function() {
                   $( "#e_1" ).removeClass( "pintado" );
                   $( "#e_2" ).removeClass( "pintado" );   
                   $( "#e_3" ).removeClass( "pintado" );
                   $( "#e_4" ).removeClass( "pintado" );
                   $( "#e_5" ).removeClass( "pintado" );


                 $( "#e_1" ).addClass( "pintado" );
               
            });

               $( "#e_2" ).mouseover(function() {
                   $( "#e_1" ).removeClass( "pintado" );
                   $( "#e_2" ).removeClass( "pintado" );   
                   $( "#e_3" ).removeClass( "pintado" );
                   $( "#e_4" ).removeClass( "pintado" );
                   $( "#e_5" ).removeClass( "pintado" );

                 $( "#e_1" ).addClass( "pintado" );
                 $( "#e_2" ).addClass( "pintado" );
               
            });

                  $( "#e_3" ).mouseover(function() {
                       $( "#e_1" ).removeClass( "pintado" );
                       $( "#e_2" ).removeClass( "pintado" );   
                       $( "#e_3" ).removeClass( "pintado" );
                       $( "#e_4" ).removeClass( "pintado" );
                       $( "#e_5" ).removeClass( "pintado" );

                     $( "#e_1" ).addClass( "pintado" );
                     $( "#e_2" ).addClass( "pintado" );
                     $( "#e_3" ).addClass( "pintado" );
               
            });

                     $( "#e_4" ).mouseover(function() {
                           $( "#e_1" ).removeClass( "pintado" );
                           $( "#e_2" ).removeClass( "pintado" );   
                           $( "#e_3" ).removeClass( "pintado" );
                           $( "#e_4" ).removeClass( "pintado" );
                           $( "#e_5" ).removeClass( "pintado" );

                           $( "#e_1" ).addClass( "pintado" );
                           $( "#e_2" ).addClass( "pintado" );
                           $( "#e_3" ).addClass( "pintado" );
                           $( "#e_4" ).addClass( "pintado" );
               
            });


                     $( "#e_5" ).mouseover(function() {
                          $( "#e_1" ).removeClass( "pintado" );
                          $( "#e_2" ).removeClass( "pintado" );   
                          $( "#e_3" ).removeClass( "pintado" );
                          $( "#e_4" ).removeClass( "pintado" );
                          $( "#e_5" ).removeClass( "pintado" );

                          $( "#e_1" ).addClass( "pintado" );
                          $( "#e_2" ).addClass( "pintado" );
                          $( "#e_3" ).addClass( "pintado" );
                          $( "#e_4" ).addClass( "pintado" );
                          $( "#e_5" ).addClass( "pintado" );
               
            });
        }

        });
  </script>
  
	<script type="text/javascript">
        if (window.FileReader) {
            var reader = new FileReader(), rFilter = /^(image\/bmp|image\/cis-cod|image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/pipeg|image\/png|image\/svg\+xml|image\/tiff|image\/x-cmu-raster|image\/x-cmx|image\/x-icon|image\/x-portable-anymap|image\/x-portable-bitmap|image\/x-portable-graymap|image\/x-portable-pixmap|image\/x-rgb|image\/x-xbitmap|image\/x-xpixmap|image\/x-xwindowdump)$/i;
            function doTest() { // de <input type="file" id="myfile" name="myfilepe" size="40" onchange="doTest()">
                if (document.getElementById("myfile").files.length === 0) { return; }
                var file = document.getElementById("myfile").files[0];
                if (!rFilter.test(file.type)) { alert("You must select a valid image file!"); return; }
                reader.readAsDataURL(file); //reader contiene la imagen codificada, base64_encode(file_get_contents($path))
            }
            reader.onload = function (f) { //apenas se carga la imagen
                preview = document.getElementById("imagen")//de <img id="imagen" src="ya hay algo" width="440px" name="imagen" style="display:block" />
                preview.src = f.target.result;
                preview.style.display = "block";
                input_hidden_codi = document.getElementById("codi");// de <input type="hidden" id="codi"  name="codificado"  />
                input_hidden_codi.value = f.target.result; // a la caja de texto oculta le da el valor de src
            };
            // al subirse el archivo ya tengo el string base64 en el id codi
        } else
            alert("FileReader object not found :( \nTry using Chrome, Firefox or WebKit");
    </script>

	<script language="javascript">
        $(document).ready(function () { // cuando las imagenes estan cargadas.. se trabaja el button y el input para el método post
            $("#ejecutar_api").click(function () {  // de <button type="button"  id="ejecutar_api" class="btn btn-outline-info btn-block">
                codigo = $("#codi").val(); // de <input type="hidden" id="codi"  name="codificado"  />.....los id para javascript, los name para php
                $.post("api_work.php", { imagen_src_full_and_encoded: codigo }, function (data) { // data es el resultado de api_work.php
                    $(".resultado").html(data); // de <div class="jumbotron resultado"  style="overflow-y:scroll; height:400px;">, alli coloca data como su html
                });
            });
        });
    </script>

    <style>
    #mapa12345 h2 {
      color: black;
    }
    i.pintado {
      color: Gold;
    }
    #mapa12345 p {
      color: black; 
    }

    #mapa12345 {
      height:480px;
      width:550px;
      border: 2px solid black;
      border-radius: 8px;
    }
    </style>


  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.html">Guide Tourist Online</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="../site">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://github.com/st4rck19981/GuideTouristOnline">Proyecto</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://github.com/st4rck19981/GuideTouristOnline/graphs/contributors">Team</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="row">

      <br><br><br>
    </div>

    <!-- ICONO-->
<?php if ($indice<>0) {?>
    <div class="container" >
      <div class="row border border-dark rounded" style="padding-top:10px;padding-bottom:10px">
         <div class="col-9 ">
          <span class="font-italic"">Valoracion: &nbsp;</span>
          <?php     
              $cont=1;   
              $estrellas=mostrarvaloracionLugar($indice);
              while ($cont<=5){ 
                  if ($cont<=$estrellas){
          ?>
                      <i class="fas fa-star fa-1x " style="color:Gold"></i>
          <?php
                  }
                  else{
          ?>
                      <i class="fas fa-star fa-1x "></i>
          <?php
                  }
              $cont=$cont+1;
              }
          ?>
        
        </div>
        

        <div class="col-3 " style="color:Silver">
          <span class="font-italic"  style="color:Black">Pulsa para valorar: &nbsp;</span>
          <i id="e_1" data="1" class="ex1 fas fa-star fa-1x estrella"></i>
          <i id="e_2" data="2" class="ex2 fas fa-star fa-1x estrella"></i>
          <i id="e_3" data="3" class="ex3 fas fa-star fa-1x estrella"></i>
          <i id="e_4" data="4" class="ex4 fas fa-star fa-1x estrella"></i>
          <i id="e_5" data="5" class="ex5 fas fa-star fa-1x estrella"></i>
        </div>
      </div>
    </div>
<?php } ?>
    
    <br>

    <div class="container-item">
      
      <div class="container">
        <div class="row justify-content-center">
          
        <div class="col-5">
          <a href="http://localhost/guidetourist/site/ejecutar.php" id="regresar_api" class="btn btn-outline-info btn-block">REGRESAR</a><br>
              <div class="jumbotron resultado_mapa" >

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
                    //  var lon= -71.536864;
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
           
              </div>
           <!-- <button type="button" id="ejecutar_api" class="btn btn-outline-info btn-block">EJECUTAR API</button><br>
            <input type="hidden" id="codi" name="codificado" />
            <p><input type="file" id="myfile" name="myfilepe" size="40" onchange="doTest()"></p>
            <img id="imagen" src="" width="440px" name="imagen" style="display:none" />-->
        </div>


         <div class="col-7">
                  <div class="jumbotron resultado" style="overflow-y:scroll; height:400px;">
                    <?php
            if ($indice!=0){
            ?>
                  <h1><strong><center> <?php echo $nombre; ?> </center></strong></h1>    
            <?php
                  mostrarContenido($indice);

            }else{
                  if (mostrarWikipedia($nombre)==true){
                      $indice=indiceLugar($nombre);
                  }
            }

                    ?>
                      
                  </div>
              </div>
          </div>

        </div>
      </div>
    </div>
    <div class="container">
      <hr class="my-4">
    </div>

    




 
    <!-- COMENTARIOS -->
    <script language="javascript">  
    $(document).ready(function(){
          $("#add_comentario").click(function(){  
                 // comentpe =  $( "#comentario_lugar" ).val();
                  coment = $( "#comentario_lugar" ).val();
                  indice = "<?php echo $indice; ?>";       
                  if (coment===''){    
                    alert("El comentario esta vacio");    
                  }
                  else{
                      $.post("database/insertarComentario.php", { id: indice, comentario: coment }, function (data) { // data es el resultado de api_work.php
                     $("#lista_comentarios").html(data);
                      alert("Gracias por su comentario");

                      
                });
              }
            });
                  
      
    });
  </script>

<!--  COMENTARIOS...  -->
<?php if($indice<>0){  ?>
    <div class="container">
      <div class="row">
        <div class="col-12">
            <div class="jumbotron">
              <h1 class="display-7">COMENTARIOS</h1>
              <p>Solo puede dar mejor comentario 1 vez.</p>
              <div id="lista_comentarios">
              <?php mostrarComentarios($indice);  ?>
              </div>

              <hr class="my-4">
              <div class="container border comentario">
               <!-- <form name="micomend" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">-->
                    <div class="form-group ">
                      <label >Escribir Comentario</label>
                      <textarea class="form-control" name="comentario" id="comentario_lugar" placeholder="Escribir"></textarea>
                    </div>
                    <button class="btn btn-primary" name="enviar" id="add_comentario">Enviar</button>
               <!-- </form>-->
              </div>
            </div>
        </div>
      </div>
    </div>
<?php } ?>

  
    

    <br><br><br><br>
    <!-- Footer -->
    <footer class="py-3 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">by OUTSIDE</p>
      </div>
      <!-- /.container -->
    </footer>

    

    <!-- Bootstrap core JavaScript 
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    -->
  </body>

</html>
