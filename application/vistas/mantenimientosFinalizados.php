<?php
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;
require_once $SESION_IN_DIR;
require_once $SESION_MECANICO;
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
        <li><a href="panelControlMecanico.php">Inicio</a></li>
        <li class="active">Mantenimientos finalizados</li>
      </ol>

        <div class="panel panel-primary">
         <div class="panel-heading">Mantenimientos finalizados</div>
         <div class="container-fluid">
          <div class="row">
            <div class="table-responsive" id="tabla">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Fecha de reparación</th>
                    <th class="text-center">Tipo vehículo</th>
                    <th class="text-center">ID - Marca Modelo - Patente</th>
                    <th class="text-center">Desripción</th>
                    <th class="text-center">¿Service Obligatorio?</th>
                    <th class="text-center">Tipo</th>
                    <th class="text-center">Costo</th>
                  </tr>
                </thead>
                <tbody  class="text-center">
                  <?php

                    $idEmpleado = $_SESSION['id']; 

                    $conexion = new Conexion();

                    $sql = "SELECT * FROM servicio s
                    INNER JOIN vehiculo v ON v.idVehiculo = s.idVehiculo
                    INNER JOIN tipoVehiculo tv ON tv.idTipoVehiculo = v.idTipoVehiculo
                    WHERE s.idEmpleado = $idEmpleado ORDER BY s.idReparacion ASC
                    ";

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

                      echo '<td>' .$fila['idReparacion']. '</td>';
                      echo '<td>' .$fila['fechaReparacion']. '</td>';
                      echo '<td>' .$fila['tipoVehiculo']. '</td>';
                      echo '<td>' .$fila['idVehiculo'], " - " .$fila['marca'], "  " .$fila['modelo'], " - " .$fila['patente']. '</td>';
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

<footer>
  <?php require_once $FOOTER_DIR; ?>
</footer>
</html>
