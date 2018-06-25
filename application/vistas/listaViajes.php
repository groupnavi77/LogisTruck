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

      <!-- aca empieza el contenido de lo fuera de la barra lateral-->
      <div class="col-sm-10 main">

        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="panelControlSupervisor.php">Inicio</a></li>
          <li class="breadcrumb-item active">Administrar viajes</li>
        </ol>

        <div class="alert alert-danger page-alert" id="alert-1">
          <button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
          <strong>¡Realizado!</strong> El viaje planificado se ha cancelado.
        </div>

        <form role="form" action="<?php echo $ABM_VIAJES_DEL_HOST ?>" method="post">
          <div class="form-group">
           <a href="listaViajes.php" class="btn btn-default active">Ver listado</a>
           <a href="armarViaje.php" class="btn btn-success">Planificar viaje</a>
           <a href="modViaje.php" class="btn btn-warning ">Modificar viaje</a>
           <div class="pull-right"><a href="<?php echo $GENERAR_PDF_VIAJES_HOST ?>" id="botonImprimir" class="btn btn-default"><span class="glyphicon glyphicon-file"></span> Generar PDF</a></div>

         </div>

         <div class="panel panel-default">
           <div class="panel-heading">Listado de viajes</div>
           <div class="container-fluid" id="tabla">
            <div class="row">
              <div class="table-responsive" id="tabla">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th class="text-center">ID Viaje</th>
                      <th class="text-center">Chofer Principal</th>
                      <th class="text-center">Vehículo Principal</th>
                      <th class="text-center">Patente</th>
                      <th class="text-center">Salida</th>
                      <th class="text-center">Destino</th>
                      <th class="text-center">Fecha de Salida</th>
                      <th class="text-center">Distancia aproximada</th>
                      <th class="text-center">Estado</th>
                      <th class="text-center"><span class="glyphicon glyphicon-qrcode"></span> Generar QR</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                    <?php

                    $conexion = new conexion;

                    $sql = "SELECT * FROM viaje
                    INNER JOIN estadoViaje ON viaje.idEstadoViaje = estadoViaje.idEstadoViaje
                    INNER JOIN ChoferesDelViaje cv ON cv.idViaje = viaje.idViaje
                    INNER JOIN VehiculosDelViaje vv ON vv.idViaje = viaje.idViaje
                    INNER JOIN vehiculo ON vehiculo.idVehiculo = vv.idVehiculo
                    INNER JOIN tipoVehiculo ON tipoVehiculo.idTipoVehiculo = vehiculo.idTipoVehiculo
                    INNER JOIN empleado ON empleado.idEmpleado = cv.idEmpleado
                    WHERE vehiculo.idTipoVehiculo = 1
                    GROUP BY viaje.idViaje
                    ORDER BY viaje.idViaje ASC
                    ";

                    $resultado= $conexion -> query($sql);

                    while ($fila = $resultado->fetch_assoc()) {

                      echo "<tr>";

                      echo "<td>";
                      echo "<input type='checkbox' name='viajeSeleccionado[]' value='".$fila['idViaje']."'  ";
                      echo "</td>";

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

                      echo "<td>";
                      echo $fila['tipoEstadoViaje'];
                      echo "</td>";

                      echo "<td>";
                      echo "<button type='submit' name='boton' value='".$fila['idViaje']."' formaction='$QR_GENERADOR_HOST' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-qrcode'></span></button>";
                      echo "</td>";

                      echo "</tr>";

                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="form-group">
             <a data-toggle="modal" data-target="#eliminarViaje" class="btn btn-danger">Cancelar viajes seleccionados</a>
           </div>
         </div>
       </div>

     </div>

     <div id="eliminarViaje" class="modal fade in">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <a class="btn pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
            <h3 class="modal-title">Cancelar viaje planificado:</h3>
          </div>
          <div class="modal-body">
            <h4>¿Está seguro que desea cancelar un viaje planificado?. Se perderán todos los datos del mismo.</h4>
          </div>
          <div class="modal-footer">
            <div class="form-group text-center">
              <!-- data-toggle="page-alert" data-delay="9000" data-toggle-id="1"-->
              <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></span> Confirmar</button>
            </div>
          </div>

        </div><!-- /.modal-content -->
      </div><!-- /.modal-dalog -->
    </div><!-- /.modal -->
  </form>

</div>

</body>

<footer>
  <?php require_once $FOOTER_DIR; ?>
</footer>
</html>
