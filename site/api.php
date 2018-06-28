<?php
    include ("database//conexion.php");
    include ("database//funciones.php");
    //NOMBRE LUGAR, kevin
    $nombrelug="no";
    $indice=indiceLugar($nombrelug);
    if ($indice==0)    $nombrelug="No se encuentra el sitio. Lo sentimos";

    //$vallugar es la valoracion de la pag
    $vallugar=mostrarvaloracionLugar($indice);

    //funcion para darle una valoracion a la pag de 1 a 5 
    //darvaloracionLugar($indice,$puntaje);

    //funcion para darle me gusta al comentario
    //sugiero que lo hagas con un hred y un boton que parezca un like de facebook
    //sumarvaloracionComentario($indice,$idcomentario);

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
          $(".estrella").click(function(){               
                valor =$(this).attr('data');
                indice = "<?php echo $indice; ?>";
            
                $.post("database/funcion_valoracion.php", { id: indice, puntuacion: valor }, function (data) { // data es el resultado de api_work.php
                  alert("Gracias por su puntuacion");
                      
                });
            });


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
              <a class="nav-link" href="api.html">API</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Proyecto</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Servicios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Team</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="row">

      <br><br><br>
    </div>

    <!-- ICONO-->
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
    
    <br>

    <div class="container-item">
      
      <div class="container">
        <div class="row justify-content-center">
          
        <div class="col-5">
            <button type="button" id="ejecutar_api" class="btn btn-outline-info btn-block">EJECUTAR API</button><br>
            <input type="hidden" id="codi" name="codificado" />
            <p><input type="file" id="myfile" name="myfilepe" size="40" onchange="doTest()"></p>
            <img id="imagen" src="" width="440px" name="imagen" style="display:none" />
        </div>

         <div class="col-7">
                  <div class="jumbotron resultado" style="overflow-y:scroll; height:400px;">
                      <h2 class="display-6 text-center"><span class="bug-4x"></span>Suba una imagen</h2>
                      <p class="lead text-justify">Por favor</p>
                      <hr class="my-4">
                      <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
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
    <?php
        if (isset($_POST["enviar"]) && $indice!==0)
        {
            $textocomend=$_POST["comend"];
            insertarComentario($indice,$textocomend);
        }
    ?>


    <div class="container">
      <div class="row">
        <div class="col-12">
            <div class="jumbotron">
              <h1 class="display-7">COMENTARIOS</h1>

              <?php mostrarComentarios($indice);

              ?>

              <hr class="my-4">
              <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
              <div class="container border">
                <form name="micomend" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                      <label >Escribir Comentario</label>
                      <textarea class="form-control" name="comend" id="comend" placeholder="Escribir"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="enviar" id="enviar">Enviar</button>
                </form>
              </div>
            </div>
        </div>
      </div>
    </div>

  
    

    <br><br><br><br>
    <!-- Footer -->
    <footer class="py-3 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    

    <!-- Bootstrap core JavaScript 
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    -->
  </body>

</html>
