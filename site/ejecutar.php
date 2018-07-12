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

	<script type="text/javascript">



        if (window.FileReader) {
            var reader = new FileReader(), rFilter = /^(image\/bmp|image\/cis-cod|image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/pipeg|image\/png|image\/svg\+xml|image\/tiff|image\/x-cmu-raster|image\/x-cmx|image\/x-icon|image\/x-portable-anymap|image\/x-portable-bitmap|image\/x-portable-graymap|image\/x-portable-pixmap|image\/x-rgb|image\/x-xbitmap|image\/x-xpixmap|image\/x-xwindowdump)$/i;
            function doTest() { // de <input type="file" id="myfile" name="myfilepe" size="40" onchange="doTest()">
                if (document.getElementById("myfile").files.length === 0) 
                  { return; 

                  }
                var file = document.getElementById("myfile").files[0];
                if (!rFilter.test(file.type)) { alert("Selecciona un archivo de imagen valido"); return; }
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
    <br>

    <div class="container-item">
      
      <div class="container">
        <div class="row justify-content-center">
          <form method="post" action="api.php">
        <div class="col-5">
            <button type="submit" id="ejecutar_api" class="btn btn-outline-info btn-block">EJECUTAR API</button><br>
            <input type="hidden" id="codi" name="codificado" />
            <p><input type="file" id="myfile" name="myfilepe" size="40" onchange="doTest()"></p>
            <img id="imagen" src="" width="440px" name="imagen" style="display:none" />
        </div>
      </form>
          </div>

        </div>
      </div>
    </div>
    <div class="container">
      <hr class="my-4">
    </div>
    <?php 
    if(isset($_GET['mensaje'])){ ?>

          <div id="mensaje_error" style="display: none;"><?php echo $_GET['mensaje']; ?></div>
<?php  
    }
?>
<?php
    if(isset($_POST['Submit'])){
        echo 'se envio el formulario';
    }
?>


    <!-- COMENTARIOS -->
    <script language="javascript">  
    $(document).ready(function(){

        $( "#mensaje_error" ).on( "click", function() {
            alert( "<?php echo $_GET['mensaje']; ?>");
          });
          $( "#mensaje_error" ).trigger( "click" );


          $(".comentario").click(function(){               
                valor =$(this).attr('');
                indice = "<?php echo $indice; ?>";
            
                $.post("database/funcion_valoracion.php", { id: indice, puntuacion: valor }, function (data) { // data es el resultado de api_work.php
                  alert("Gracias por su puntuacion");
                      
                });
            });
    });

  </script>
    <?php
        if (isset($_POST["enviar"]) && $indice!==0)
        {
            $textocomend=$_POST["comend"];
            insertarComentario($indice,$textocomend);
        }
    ?>

    <br><br><br><br>
    <br><br><br><br>

    <!-- Footer -->
    <footer class="py-3 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">by OUTSIDE</p>
      </div>
    </footer>
  </body>
</html>
