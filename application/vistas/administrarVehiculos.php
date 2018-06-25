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
    <div class="col-md-9">
      <div class="panel panel-default">
        <div class="panel-heading text-center">
          <h3 class="panel-title">Administración de Vehículos</h3>
        </div>
      </div>
    </div>


    <div class="col-md-9">

     <div class="row">

      <div class="col-md-2" >
    <div class="panel panel-default">
      <div class="panel-heading text-center">Listados</div>
      <div class="panel-body text-center">
       <p>Flota</p>

       <a href="listaCamiones.php" class="btn btn-default"><span class="glyphicon glyphicon-list-alt"></span> Camiones</a>
     </div>
        </a>
      </div>
    </div>


      <div class="col-md-2" >
        <div class="panel panel-default">
      <div class="panel-heading text-center">Listados</div>
      <div class="panel-body text-center">
       <p>Flota</p>

       <a href="listaAcoplados.php" class="btn btn-default"><span class="glyphicon glyphicon-list-alt"></span> Acoplados</a>
     </div>
      </div>
      </div>


      <div class="col-md-2" >
    <div class="panel panel-default">
      <div class="panel-heading text-center">Listados</div>
      <div class="panel-body text-center">
       <p>Vehículos</p>

       <a href="vehiculosEnViaje.php" class="btn btn-default"><span class="glyphicon glyphicon-list-alt"></span> En viaje</a>
     </div>
      </div>
     </a>
   </div>

   <div class="col-md-2" >
    <div class="panel panel-default">
      <div class="panel-heading text-center">Mantenimientos</div>
      <div class="panel-body text-center">
       <p>Vehículos</p>

       <a href="" class="btn btn-default disabled"><span class="glyphicon glyphicon-warning-sign"></span> Próximos</a>
     </div>
      </div>
  </div>

</div>

<div class="panel panel-default hidden-xs">
 <div class="panel-heading">Últimos reportes de posición</div>
 <div class="container-fluid">
  <div class="row">
    <div class="table-responsive" id="tabla">
      <table class="table table-hover">
        <thead>
          <tr>
            <th class="text-center">ID Chofer</th>
            <th class="text-center">ID Vehiculo</th>
            <th class="text-center">Origen</th>
            <th class="text-center">Destino</th>
            <th class="text-center">Salida</th>
            <th class="text-center">Ultima posición</th>
            <th class="text-center">Llegada estimada</th>
          </tr>
        </thead>
        <tbody  class="text-center">
          <?php
          for( $i= 0 ; $i <= 4 ; $i++ )
          {
            echo '
            <tr>
            <td>xxxx.xxxx</td>
            <td>xxxxx.xxxx</td>
            <td>CABA, Buenos Aires</td>
            <td>Rosario, Santa Fe</td>
            <td>10-05 - 15:00hs</td>
            <td>Ver posición</td>
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
  <?php require_once $FOOTER_DIR; ?>
</footer>
</html>
