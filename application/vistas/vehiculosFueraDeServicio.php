<?php
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;
require_once $SESION_IN_DIR;
require_once $SESION_MECANICO;
?>
<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
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
        <li class="active">Vehículos fuera de servicio</li>
      </ol>

    <div class="alert alert-success page-alert" id="alert-2">
      <button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
      <strong>¡Buen trabajo!</strong> Se ha finalizado el mantenimiento de vehículo fuera de servicio.
      </div>

<form role="form" action="<?php echo $VEHICULO_FINALIZAR_MANTENIMIENTO_HOST ?>" method="post">
  <div class="panel panel-primary" id="tabla">
   <div class="panel-heading">Vehículos "Fuera de servicio"</div>
   <div class="container-fluid">
      <div class="row">
          <div class="table-responsive" id="tabla">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th class="text-center">ID</th>
                  <th class="text-center">Tipo vehículo</th>
                  <th class="text-center">Marca - Modelo</th>
                  <th class="text-center">Patente</th>
                  <th class="text-center">N° Chasis</th>
                  <th class="text-center">N° Motor</th>
                  <th class="text-center">Km</th>
                </tr>
              </thead>
              <tbody  class="text-center">
                <?php

                    $conexion = new conexion;
                    $sql = "SELECT * FROM vehiculo v INNER JOIN tipoVehiculo tv ON v.idTipoVehiculo = tv.idTipoVehiculo
                            WHERE estadoVehiculo = 'Fuera de servicio' ORDER BY v.idVehiculo ASC";
                    $resultado= $conexion -> query($sql);

                    while ($fila = $resultado->fetch_assoc()) {

                      echo "<tr>";

                      echo "<td>";
                      echo "<input type='checkbox' name='vehiculoSeleccionado[]' value='".$fila['idVehiculo']."'  ";
                      echo "</td>";

                       echo '<td>' .$fila['idVehiculo']. '</td>';
                       echo '<td>' .$fila['tipoVehiculo']. '</td>';
                       echo '<td>' .$fila['marca'], " - " .$fila['modelo']. '</td>';
                       echo '<td>' .$fila['patente']. '</td>';
                       echo '<td>' .$fila['numeroDeChasis']. '</td>';
                       echo '<td>' .$fila['numeroDeMotor']. '</td>';
                       echo '<td>' .$fila['kmVehiculo']. '</td>';

                      echo "</tr>";

                      }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="form-group">
          <a data-toggle="modal" data-target="#finalizarMantenimiento" class="btn btn-success">Finalizar mantenimiento</a>
       </div>
     </div>
    </div>

    <div id="finalizarMantenimiento" class="modal fade in" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <a class="btn pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
            <h3 class="modal-title">Finalizar mantenimiento:</h3>
          </div>
          <div class="modal-body">
            <h4>¿Está seguro que sea cambiar el estado del vehiculo seleccionado a "Disponible"?</h4>
            <small>Debe tener un reporte antes antes de poder cambiarle el estado a un vehiculo</small>

          </div>
          <div class="modal-footer">
            <div class="form-group text-center">

              <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span> Aceptar</button>
              <button class="btn btn-warning" type="submit" formaction="<?php echo $REPORTAR_MANTENIMIENTO_HOST ?>"><span class="glyphicon glyphicon-ok"></span> Reportar Mantenimiento</button>

            </div>
          </div>
        </div>
      </div>
    </div>


</form>



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
