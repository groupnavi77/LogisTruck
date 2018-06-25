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


    <!-- aca empieza el contenido de lo fuera de la barra lateral-->
    <div class="col-md-10 main">

      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="panelControlAdmin.php">Inicio</a></li>
        <li class="breadcrumb-item active">Administrar vehículos</li>
      </ol>

      <div class="alert alert-danger page-alert" id="alert-11">
        <button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
        <strong>¡Realizado!</strong> El vehículo seleccionado se ha eliminado de la flota.
      </div>

      <div class="alert alert-warning page-alert" id="alert-2">
        <button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
        <strong>¡Realizado!</strong> El vehículo seleccionado se ha enviado a mantenimiento.
      </div>

  <form role="form" action="<?php echo $ABM_VEHICULO_DEL_BAJ_HOST ?>" method="post">
      <div class="form-group">
       <a href="listaVehiculos.php" class="btn btn-default active">Listado</a>
       <a href="addVehiculo.php" class="btn btn-success">Añadir vehículo</a>
       <div class="pull-right"><a href="<?php echo $GENERAR_PDF_VEHICULOS_HOST ?>" id="botonImprimir" class="btn btn-default"><span class="glyphicon glyphicon-file"></span> Generar PDF</a></div>
     </div>

     <div class="panel panel-default">
       <div class="panel-heading">Listado de vehículos</div>
       <div class="container-fluid" id="tabla">
        <div class="row">
          <div class="table-responsive" id="tabla">


            <table class="table table-hover">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th class="text-center">ID</th>
                  <th class="text-center">Patente</th>
                  <th class="text-center">Marca</th>
                  <th class="text-center">Modelo</th>
                  <th class="text-center">Tipo</th>
                  <th class="text-center">Año</th>
                  <th class="text-center">Nº Chasis</th>
                  <th class="text-center">Nº Motor</th>
                  <th class="text-center">Kilometraje</th>
                  <th class="text-center">Capacidad</th>
                  <th class="text-center">Precio</th>
                  <th class="text-center">Estado</th>
                </tr>
              </thead>
              <tbody class="text-center"

              <?php
              $conexion = new conexion;
              $sql = "SELECT * FROM vehiculo v 
              INNER JOIN tipoVehiculo tv ON v.idTipoVehiculo = tv.idTipoVehiculo ORDER BY v.idVehiculo ASC";
              $resultado= $conexion -> query($sql);

              while ($fila = $resultado->fetch_assoc()) {
                echo "<tr>";

                echo "<td>";
                echo "<input type='checkbox' name='vehiculoSeleccionado[]' value='".$fila['idVehiculo']."'  ";
                echo "</td>";

                echo "<td>";
                echo $fila['idVehiculo'];
                echo "</td>";

                echo "<td>";
                echo $fila['patente'];
                echo "</td>";

                echo "<td>";
                echo $fila['marca'];
                echo "</td>";

                echo "<td>";
                echo $fila['modelo'];
                echo "</td>";

                echo "<td>";
                echo $fila['tipoVehiculo'];
                echo "</td>";

                echo "<td>";
                echo $fila['anioDeFabricacion'];
                echo "</td>";

                echo "<td>";
                echo $fila['numeroDeChasis'];
                echo "</td>";

                echo "<td>";
                echo $fila['numeroDeMotor'];
                echo "</td>";

                echo "<td>";
                echo $fila['kmVehiculo'] . "Km";
                echo "</td>";

                echo "<td>";
                echo $fila['capacidadCarga'] . "Kg";
                echo "</td>";

                echo "<td>";
                echo "$" . $fila['costo'];
                echo "</td>";

                echo "<td>";
                echo $fila['estadoVehiculo'];
                echo "</td>";
              }
              ?>

            </tbody>
          </table>
        </div>
      </div>

      <div class="form-group">
       <a data-toggle="modal" data-target="#eliminarDeFlota" class="btn btn-danger">Eliminado definitivo</a>
       <a data-toggle="modal"  data-target="#bajaPorMantenimiento" class="btn btn-warning">Baja por mantenimiento</a>
     </div>


   </div>
 </div>


<!-- Modal -->
<div class="container">
  <div class="row">

    <div id="eliminarDeFlota"  class="modal fade in" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <a class="btn pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
            <h3 class="modal-title">Eliminación de vehículos:</h3>
          </div>
          <div class="modal-body">
            <h4>¿Está seguro que desea eliminar el vehículo seleccionado de la flota? Se perderán todos los datos.</h4>
          </div>
          <div class="modal-footer">
            <div class="form-group text-center">
              <!--         data-toggle="page-alert" data-delay="9000" data-toggle-id="11"  -->
              <button class="btn btn-danger" name="abmVehiculo" value="borrar" type="submit" ><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
            </div>
          </div>

        </div><!-- /.modal-content -->
      </div><!-- /.modal-dalog -->
    </div><!-- /.modal -->
</form>


  <!-- solucionar para poder confirmar baja por mantenimiento por el modal, el problema es que el id del modal lo tengo que usar para confirmar los datos, y aca se usa para diferenciar al modal-->
    <div id="bajaPorMantenimiento" class="modal fade in">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <a class="btn pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
            <h3 class="modal-title">Baja de vehículos por mantenimiento:</h3>
          </div>
          <div class="modal-body">
            <h4>¿Está seguro que sea cambiar el estado del vehiculo seleccionado a "Fuera de servicio"?</h4>
          </div>
          <div class="modal-footer">
            <div class="form-group text-center">
              <!--  data-toggle="page-alert" data-delay="9000" data-toggle-id="2" -->
              <button class="btn btn-warning" name="abmVehiculo" value="bajaPorMantenimiento" type="submit"><span class="glyphicon glyphicon-ok"></span> Aceptar</button>

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
