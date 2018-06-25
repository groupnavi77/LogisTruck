<?php
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $SESION_IN_DIR;
require_once $CONEXION_DIR;
require_once $SESION_ADMIN;

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <?php require_once $HEADER_DIR; ?>
  <script src="js/mapaDesvio.js" type="text/javascript"></script>
  <script src="https://maps.google.com/maps/api/js?key=AIzaSyAiq3xISXSZYgkd9GDAOdajy4NK2d3L7dY"></script>
</head>

<body>



  <?php require_once $NAVBAR_DIR; ?>

  <div class="container-fluid">
    <div class="row">


      <?php require_once $PANEL_LATERAL_PERFIL_DIR; ?>



      <!-- aca empieza el contenido de lo fuera de la barra lateral-->
      <div class="col-md-10 main">

        <ol class="breadcrumb">
          <li><a href="reportesAdmin.php">Inicio</a></li>
          <li class="active">Ultimos Mantenimientos</li>
        </ol>




        <!-- <div class="row">

      <div class="col-md-4" >
       <div class="panel panel-primary">
         <div class="panel-heading text-center">Reportes</div>

         <div class="panel-body text-center">
          <a href="reportesEmpleadosAdmin.php" class="btn btn-default">
            <span class="glyphicon glyphicon-exclamation-sign"></span> Empleados
          </a>
        </div>

      </div>
    </div>



    <div class="col-md-4">
     <div class="panel panel-primary">
      <div class="panel-heading text-center">Visualizar</div>
      <div class="panel-body text-center">
        <a href="reportesMantenimientoAdmin.php" class="btn btn-default">
          <span class="glyphicon glyphicon-wrench"></span> Mantenimientos
        </a>
      </div>
    </div>
  </div>

    <div class="col-md-4">
     <div class="panel panel-primary">
      <div class="panel-heading text-center">Ultimas</div>
        <div class="panel-body text-center">
        <a href="reportesUbicacionesAdmin.php" class="btn btn-default">
          <span class="glyphicon glyphicon-map-marker"></span> Ubicaciones
        </a>
        </div>
      </div>
    </div>
</div> -->

  <div class="hidden-xs">
    <div class="panel panel-default">
     <div class="panel-heading">Ultimos mantenimientos</div>
     <div class="container-fluid">
      <div class="row">
        <div class="table-responsive" id="tabla">
          <table class="table table-hover">
            <thead>
              <tr>
                <th class="text-center">Empleado</th>
                <th class="text-center">Fecha de reparación</th>
                <th class="text-center">Tipo vehículo</th>
                <th class="text-center">Marca - Modelo</th>
                <th class="text-center">Patente</th>
                <th class="text-center">Desripción</th>
                <th class="text-center">Service Obligatorio</th>
                <th class="text-center">Tipo</th>
                <th class="text-center">Costo</th>
              </tr>
            </thead>
            <tbody  class="text-center">
              <?php

                $fechaDesde = $_POST['fechaDesde'];
                $fechaHasta = $_POST['fechaHasta'];
                $conexion = new Conexion();

                $sql = "SELECT * FROM servicio s
                INNER JOIN vehiculo v ON v.idVehiculo = s.idVehiculo
                INNER JOIN tipoVehiculo tv ON tv.idTipoVehiculo = v.idTipoVehiculo
                INNER JOIN empleado ON empleado.idEmpleado = s.idEmpleado
                WHERE s.fechaReparacion BETWEEN '$fechaDesde' AND '$fechaHasta'
                GROUP BY idReparacion ORDER BY s.fechaReparacion ASC";


                $resultado= $conexion -> query($sql);

                while ($fila = $resultado->fetch_assoc()) {

                  if ($fila['service'] == 1) {
                    $service = "Si";
                  }
                  else{
                    $service = "No";
                  }

                  if ($fila['arregloInternoReparacion'] == 1) {
                    $tipoMantenimiento = "Interno";
                  }
                  elseif ($fila['arregloExternoReparacion'] == 1) {
                    $tipoMantenimiento = "Externo";
                  }

                  echo "<tr>";

                  echo '<td>' .$fila['nombresEmpleado'], "  " .$fila['apellidosEmpleado']. '</td>';
                  echo '<td>' .$fila['fechaReparacion']. '</td>';
                  echo '<td>' .$fila['tipoVehiculo']. '</td>';
                  echo '<td>' .$fila['marca'], " - " .$fila['modelo']. '</td>';
                  echo '<td>' .$fila['patente']. '</td>';
                  echo '<td>' .$fila['descripcionReparacion']. '</td>';
                  echo '<td>' .$service. '</td>';
                  echo '<td>' .$tipoMantenimiento. '</td>';
                  echo '<td>' .$fila['costoReparacion']. '</td>';

                  echo "</tr>";
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
</div>
</div>
</div>



</div>

<div id="mapa" class="hidden"></div>

<footer>
  <?php require_once $FOOTER_DIR; ?>
</footer>

</body>


</html>
