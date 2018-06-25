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
          <li class="active">Reportes Empleados</li>
        </ol>

          <!-- <div class="row">

        <div class="col-md-4" >
         <div class="panel panel-primary">
           <div class="panel-heading text-center">Reportes</div>

           <div class="panel-body text-center">
            <a href="reportesAdmin.php" class="btn btn-default">
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
     <div class="panel-heading">Ultimos Reportes Empleados</div>
     <div class="container-fluid">
      <div class="row">
        <div class="table-responsive" id="tabla">
          <table class="table table-hover">
            <thead>
              <tr>
                <th class="text-center">Empleado</th>
                <th class="text-center">Día/Hora</th>
                <th class="text-center">Tipo de reporte</th>
                <th class="text-center">Vehículo/Patente</th>
                <th class="text-center">Descripción</th>
                <th class="text-center">Combustible</th>
                <th class="text-center">Kilometraje</th>
                <th class="text-center">ID Viaje</th>
              </tr>
            </thead>
            <tbody  class="text-center">
              <?php


              $fechaDesde = $_POST['fechaDesde'];
              $fechaHasta = $_POST['fechaHasta'];

              $conexion = new conexion;
              $idEmpleado= $_SESSION['id'];
              $sql = "SELECT * FROM reporte
              INNER JOIN tipoReporte ON reporte.idTipoReporte = tipoReporte.idTipoReporte
              INNER JOIN viaje ON viaje.idViaje = reporte.idViaje
              INNER JOIN VehiculosDelViaje ON vehiculosDelViaje.idViaje = viaje.idViaje
              INNER JOIN vehiculo ON vehiculo.idVehiculo = VehiculosDelViaje.idVehiculo
              INNER JOIN tipoVehiculo ON tipoVehiculo.idTipoVehiculo = vehiculo.idTipoVehiculo
              INNER JOIN empleado ON empleado.idEmpleado = reporte.idEmpleado
              WHERE reporte.hora BETWEEN '$fechaDesde' AND '$fechaHasta'
              GROUP BY idReporte ORDER BY reporte.hora ASC" ;

              $resultado= $conexion -> query($sql);

              while ($fila = $resultado->fetch_assoc()) {

                   echo "<tr>";

                   echo "<td>";
                   echo $fila['nombresEmpleado'], "  " .$fila['apellidosEmpleado'];
                   echo "</td>";

                   echo "<td>";
                   echo $fila['hora'];
                   echo "</td>";

                   echo "<td>";
                   echo $fila['tipoReporte'];
                   echo "</td>";

                   echo "<td>";
                   echo $fila['marca'], "  " .$fila['modelo'], " - " .$fila['patente'];
                   echo "</td>";

                   echo "<td>";
                   echo $fila['detalle'];
                   echo "</td>";

                   echo "<td>";
                   echo $fila['cantidadCombustible'], "Lts" . " - $" .$fila['importeCombustible'];
                   echo "</td>";

                   echo "<td>";
                   echo $fila['kilometrajeVehiculo'] . " Km";
                   echo "</td>";

                   echo "<td>";
                   echo $fila['idViaje'];
                   echo "</td>";

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
