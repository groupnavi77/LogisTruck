<?php
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;
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

      <div class="col-sm-10 main">

        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Inicio</li>
        </ol>


        <div class="row">


          <div class="col-md-3" >
           <div class="panel panel-primary">
            <div class="panel-heading text-center">Administrar</div>

            <div class="panel-body text-center">
             <a href="planillaDeEmpleados.php" class="btn btn-default">
              <span class="glyphicon glyphicon-wrench"></span> Personal
            </a>
          </div>

        </div>
      </div>


      <div class="col-md-3" >
       <div class="panel panel-primary">
         <div class="panel-heading text-center">Administrar</div>

         <div class="panel-body text-center">
          <a href="listaVehiculos.php" class="btn btn-default">
            <span class="glyphicon glyphicon-wrench"></span> Vehículos
          </a>
        </div>

      </div>
    </div>



  <div class="col-md-3">
   <div class="panel panel-primary">
    <div class="panel-heading text-center">Visualizar</div>
    <div class="panel-body text-center">
      <a href="estadisticas.php" class="btn btn-default">
        <span class="glyphicon glyphicon-stats"></span> Estadísticas
      </a>
    </div>
  </div>
</div>

<div class="col-md-3">
 <div class="panel panel-primary">
  <div class="panel-heading text-center">Visualizar</div>
  <div class="panel-body text-center">
    <a href="reportesAdmin.php" class="btn btn-default">
      <span class="glyphicon glyphicon-exclamation-sign"></span> Reportes
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
           WHERE viaje.idEstadoViaje = 2  /* que solo me traiga los viajes con estado(2) en curso. */
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
