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
          <li class="breadcrumb-item active">Inicio</li>
        </ol>


        <div class="row">

          <div class="col-md-4" >
           <div class="panel panel-primary">
            <div class="panel-heading text-center">Reportar</div>
            <div class="panel-body text-center">

             <a href="reportesDeMantenimiento.php" class="btn btn-default">
              <span class="glyphicon glyphicon-wrench"></span> Mantenimientos
            </a>

        </div>
      </div>
    </div>


    <div class="col-md-4" >
     <div class="panel panel-primary">
      <div class="panel-heading text-center">Mantenimientos</div>
      <div class="panel-body text-center">

       <a href="mantenimientosFinalizados.php" class="btn btn-default">
        <span class="glyphicon glyphicon-ok"></span> Finalizados
      </a>

    </div>
  </div>
</div>

<div class="col-md-4" >
 <div class="panel panel-primary">
  <div class="panel-heading text-center">Vehículos</div>
  <div class="panel-body text-center">

    <a href="vehiculosFueraDeServicio.php" class="btn btn-default">
      <span class="glyphicon glyphicon-warning-sign"></span> Fuera de servicio
    </a>

  </div>
</div>
</div>

</div>

        <div class="panel panel-primary hidden-xs">
         <div class="panel-heading">Últimos reportes</div>
         <div class="container-fluid">
          <div class="row">
            <div class="table-responsive" id="tabla">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="text-center">ID</th>
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

                    $idEmpleado = $_SESSION['id']; 

                    $conexion = new Conexion();

                    $sql = "SELECT * FROM servicio s
                    INNER JOIN vehiculo v ON v.idVehiculo = s.idVehiculo
                    INNER JOIN tipoVehiculo tv ON tv.idTipoVehiculo = v.idTipoVehiculo
                    WHERE s.idEmpleado = $idEmpleado
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
</div>

</body>

<footer>
  <?php require_once $FOOTER_DIR; ?>
</footer>
</html>
