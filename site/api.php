<?php
    include ("database//conexion.php");
    include ("database//funciones.php");
    //NOMBRE LUGAR, kevin
    $nombrelug="Plaza de Armas";
    $indice=indiceLugar($nombrelug);
    if ($indice==0)    $nombrelug="No se encuentra el sitio. Lo sentimos";

    //$vallugar es la valoracion de la pag
    $vallugar=mostrarvaloracionLugar($indice);
    $latitud=latitud($indice);
    $longitud=longitud($indice);

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

    <script type="text/javascript">
    if (window.FileReader) {
    
      var reader = new FileReader(), rFilter = /^(image\/bmp|image\/cis-cod|image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/pipeg|image\/png|image\/svg\+xml|image\/tiff|image\/x-cmu-raster|image\/x-cmx|image\/x-icon|image\/x-portable-anymap|image\/x-portable-bitmap|image\/x-portable-graymap|image\/x-portable-pixmap|image\/x-rgb|image\/x-xbitmap|image\/x-xpixmap|image\/x-xwindowdump)$/i; 
      
      reader.onload = function (oFREvent) { 
        preview = document.getElementById("uploadPreview")
        preview.src = oFREvent.target.result;  
        preview.style.display = "block";
      };  
  
      function doTest() {
        
        if (document.getElementById("myfile").files.length === 0) { return; }  
        var file = document.getElementById("myfile").files[0];  
        if (!rFilter.test(file.type)) { alert("You must select a valid image file!"); return; }  
        reader.readAsDataURL(file); 
      }
        
    } else {
      alert("FileReader object not found :( \nTry using Chrome, Firefox or WebKit");
    }
    </script>

    <style>
    #mapa12345 h2 {
      color: black;
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

    <script>
      $(document).ready(function() {
        $("#mapa12345").goMap({
          latitude:-16.3586470,
          longitude:-71.5433610,
          zoom:18,
          //maptype:"TERRAIN",
          scaleControl:true
        });
        $.goMap.createMarker({
          latitude:-16.3586470,
          longitude:-71.5433610

        });
      });
    </script>

    

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
        <style>
          i.ex1:hover {color:Gold;}
          i.ex2:hover {color:Gold;}
          i.ex3:hover {color:Gold;}
          i.ex4:hover {color:Gold;}
          i.ex5:hover {color:Gold;}
        </style>

        <div class="col-9 ">
          <span class="font-italic"">Valoracion: &nbsp;</span>
          <i class="fas fa-star fa-1x " style="color:Gold"></i>
          <i class="fas fa-star fa-1x " style="color:Gold"></i>
          <i class="fas fa-star fa-1x " style="color:Gold"></i>
          <i class="fas fa-star fa-1x "></i>
          <i class="fas fa-star fa-1x "></i>
        </div>
        <div class="col-3 " style="color:Silver">
          <span class="font-italic"  style="color:Black">Pulsa para valorar: &nbsp;</span>
          <i class="ex1 fas fa-star fa-1x "></i>
          <i class="ex2 fas fa-star fa-1x "></i>
          <i class="ex3 fas fa-star fa-1x "></i>
          <i class="ex4 fas fa-star fa-1x "></i>
          <i class="ex5 fas fa-star fa-1x "></i>
        </div>
      </div>
    </div>
    
    <br>

    <div class="container-item">
      
      <div class="container">
        <div class="row justify-content-center">
          
          <div class="col-5">
            <button type="button" class="btn btn-outline-info btn-block">EJECUTAR API</button>
            <br>
            <p><input type="file" id="myfile" name="myfile" size="40" onchange="doTest()"></p>
            <img id="uploadPreview" src="" width="450" style="display:none" />
          </div>

          <div class="col-7">
            <div class="jumbotron">
              <h2 class="display-6 text-center"><span class="bug-4x"></span><?php echo $nombrelug ?></h2>
              <p class="lead text-justify">
                  <?php  mostrarContenido($indice);  ?>

              </p>
              <hr class="my-4">
              <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="container">
      <hr class="my-4">
    </div>

    

    <!-- GOOGLE MAPS -->
    <div class="container ">
      <div class="row">
        <div class="col-6">
          <div>
            <h1 class="text-center">Google Maps</h1>  
            <div id="mapa12345"></div>
          </div>          
        </div>
        <div class="col-6 border border-dark rounded">
        </div>
      </div>
    </div>
    <br>



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
