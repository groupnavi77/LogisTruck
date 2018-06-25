<?php
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
/*require_once $_SERVER["DOCUMENT_ROOT"]. "/application/helpers/clases/includes.php";*/
require_once $SESION_IN_DIR;
require_once $SESION_CHOFER;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once $HEADER_DIR; ?>
  <script src="js/mapa.js" type="text/javascript"></script>
  <script src="https://maps.google.com/maps/api/js?key=AIzaSyAiq3xISXSZYgkd9GDAOdajy4NK2d3L7dY"></script>
</head>

<body>



  <?php require_once $NAVBAR_DIR; ?>

  <div class="container-fluid">
    <div class="row">


      <?php require_once $PANEL_LATERAL_PERFIL_DIR; ?>


<!-- aca empieza el contenido de lo fuera de la barra lateral-->
  <div class="col-sm-9 main">

  	  	  <ol class="breadcrumb">
        <li><a href="panelControlChofer.php">Inicio</a></li>
        <li class="active">Informar posición</li>
      </ol>

    <div class="hidden" id="mapa"></div>
    <div class="">
    </div>
   </div>

   </div>
    <form class="form" name="formMap" id="formMap" method="post" action="<?php echo $ADD_UBICACION_HOST ?>">


                  <input type="hidden" name="latitud" class="form-control" id="lat"  required>
                  <input type="hidden" name="longitud" class="form-control" id="lon"  required>

    </form>
</div>


 <script type="text/javascript">
   function formSubmit(){
          document.getElementById("formMap").submit();
    }

    window.onload=function(){
          window.setTimeout(formSubmit, 0005);
    };
    </script>



</body>

<footer>
  <?php require_once '../helpers/inc/footer.php'; ?>
</footer>
</html>
