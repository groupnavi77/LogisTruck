<?php
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;
require_once $SESION_IN_DIR;
require_once $SESION_SUPER;
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


      <div class="col-sm-10 main">

        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Inicio</li>
        </ol>

        <div class="row">


          <div class="col-md-4" >
           <div class="panel panel-primary">
            <div class="panel-heading text-center">Administrar</div>

            <div class="panel-body text-center">
              <a href="listaViajes.php" class="btn btn-default">
                <span class="glyphicon glyphicon-wrench"></span> Viajes
              </a>
            </div>

          </div>
        </div>


        <div class="col-md-4" >
         <div class="panel panel-primary">
          <div class="panel-heading text-center">Buscar</div>

          <div class="panel-body text-center">
            <a href="buscarViajes.php" class="btn btn-default">
              <span class="glyphicon glyphicon-search"></span> Viajes
            </a>
          </div>

        </div>
      </div>

<!--       <div class="col-md-3">
       <div class="panel panel-primary">
        <div class="panel-heading text-center">Realizar</div>

        <div class="panel-body text-center">
          <a href="estadisticasSupervisor.php" class="btn btn-default disabled">
            <span class="glyphicon glyphicon-stats"></span> Estadísticas
          </a>
        </div>

      </div>
    </div>
 -->
    <div class="col-md-4">
     <div class="panel panel-primary">
      <div class="panel-heading text-center">Mostrar</div>

      <div class="panel-body text-center">
        <a href="ubicacionesSupervisor.php" class="btn btn-default">
          <span class="glyphicon glyphicon-map-marker"></span> Ubicaciones
        </a>
      </div>

    </div>
  </div>

  </div>

  <div class="panel panel-primary hidden-xs">
   <div class="panel-heading">Viajes en Curso</div>
   <div class="container-fluid">
    <div class="row">
      <div class="table-responsive" id="tabla">
        <table class="table table-hover">
          <thead>
            <tr>
              <th class="text-center">ID Viaje</th>
              <th class="text-center">Chofer Principal</th>
              <th class="text-center">Vehículo Principal</th>
              <th class="text-center">Patente</th>
              <th class="text-center">Salida</th>
              <th class="text-center">Destino</th>
              <th class="text-center">Fecha de salida</th>
              <th class="text-center">Distancia aprox.</th>
            </tr>
          </thead>
          <tbody  class="text-center">
           <?php
           $conexion = new conexion;

           $sql = "SELECT * FROM viaje
           INNER JOIN ChoferesDelViaje cv ON cv.idViaje = viaje.idViaje
           INNER JOIN VehiculosDelViaje vv ON vv.idViaje = viaje.idViaje
           INNER JOIN vehiculo ON vehiculo.idVehiculo = vv.idVehiculo
           INNER JOIN tipoVehiculo ON tipoVehiculo.idTipoVehiculo = vehiculo.idTipoVehiculo
           INNER JOIN empleado ON empleado.idEmpleado = cv.idEmpleado
           WHERE viaje.idEstadoViaje = 2 && vehiculo.idTipoVehiculo = 1 /* que solo me traiga los viajes con estado(2) en curso. */
           GROUP BY viaje.idViaje
           ORDER BY viaje.idViaje ASC
           ";

           $resultado= $conexion -> query($sql);

           while ($fila = $resultado->fetch_assoc()) {

                echo "<tr>";

                echo "<td>";
                echo $fila['idViaje'];
                echo "</td>";

                echo "<td>";
                echo "(".$fila['idEmpleado'].") ", $fila['nombresEmpleado'], ", " . $fila['apellidosEmpleado'];
                echo "</td>";


                echo "<td>";
                echo $fila['marca'], " - " . $fila['modelo'];
                echo "</td>";

                echo "<td>";
                echo $fila['patente'];
                echo "</td>";


                echo "<td>";
                echo $fila['origenViaje'];
                echo "</td>";

                echo "<td>";
                echo $fila['destinoViaje'];
                echo "</td>";

                echo "<td>";
                echo $fila['fechaViaje'];
                echo "</td>";

                echo "<td>";
                echo $fila['kmRecorridoPrevisto'] . "Km";
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

</body>

<footer>
  <?php require_once $FOOTER_DIR; ?>
</footer>
</html>
