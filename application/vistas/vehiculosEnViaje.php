<?php
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
/*require_once $_SERVER["DOCUMENT_ROOT"]. "/application/helpers/clases/includes.php";*/
require_once $SESION_IN_DIR;
require_once $SESION_ADMIN;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once $HEADER_DIR; ?>
</head>

<body>



  <?php require_once $NAVBAR_DIR; ?>

  <div class="container-fluid">
    <div class="row">


      <?php require_once $PANEL_LATERAL_PERFIL_DIR; ?>



 <!-- aca empieza el contenido de lo fuera de la barra lateral-->
 <div class="col-md-10">

  <div class="panel panel-default">
 <div class="panel-heading">Vehículos en viaje</div>
 <div class="container-fluid">
  <div class="row">
    <div class="table-responsive" id="tabla">
      <table class="table table-hover">
        <thead>
          <tr>
            <th class="text-center">Choferes</th>
            <th class="text-center">Marca / Modelo</th>
            <th class="text-center">Patente</th>
            <th class="text-center">Acoplado</th>
            <th class="text-center">Origen</th>
            <th class="text-center">Destino</th>
            <th class="text-center">Ultima posición</th>
            <th class="text-center">Fecha de salida</th>
            <th class="text-center">Llegada estimada</th>
          </tr>
        </thead>
        <tbody  class="text-center">
          <?php
          for( $i= 0 ; $i <= 10 ; $i++ )
          {
            echo '
            <tr>
              <td>Ver choferes</td>
              <td>Iveco / Hi-Way 440</td>
              <td>AB 530 GR</td>
              <td>No</td>
              <td>CABA, Buenos Aires</td>
              <td>Rosario, Santa Fe</td>
               <td>Ver posición</td>
              <td>10-05 - 15:00hs</td>
              <td>10-05 - 23:30hs </td>
            </tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>

</div>


</div>

</body>

<footer>
  <?php require_once '../helpers/inc/footer.php'; ?>
</footer>
</html>
