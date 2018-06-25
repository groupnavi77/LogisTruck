<?php
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $SESION_IN_DIR;
require_once $CONEXION_DIR;
require_once $SESION_CHOFER;
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
          <li><a href="panelControlChofer.php">Inicio</a></li>
          <li class="active">Reportar incidentes</li>
        </ol>

        <div class="row">

          <!-- EMPIEZA REPORTAR DESVIO -->
          <form class="form" role="form" action="<?php echo $REPORTAR_DESVIO_HOST ?>" method="post">
           <!-- codigo del panel -->
           <div class="col-md-4">
             <div class="panel panel-primary">
              <div class="panel-heading text-center">Reportar incidente</div>
              <div class="panel-body text-center">
                <a class="btn btn-default" data-toggle="modal" data-target="#reportarDesvio"><span class="glyphicon glyphicon-road"></span> Desvío</a>
              </div>
            </div>
          </div>
          <!-- codigo del modal que guarda y confirma los datos -->
          <div id="reportarDesvio" class="modal fade in">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <a class="btn pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                  <h3 class="modal-title">Reportar desvío:</h3>
                </div>
                <div class="modal-body">
                  <h4>Complete los campos:</h4>
                  <div class="input-group">
                    <span class="input-group-addon">Descripción:</span>
                    <input type="text" class="form-control" name="descripcion" placeholder="Detalle la causa del desvío." required>
                  </div>
                   <div class="input-group">
                    <span class="input-group-addon">Kilometraje actual:</span>
                    <input type="text" class="form-control" name="kilometraje" required>
                     <span class="input-group-addon">Km</span>
                  </div>
                  <div class="input-group">
                   <input type="hidden" class="form-control" id="lat"  name="latitud" required>
                 </div>
                 <div class="input-group">
                  <input type="hidden" class="form-control" id="lon" name="longitud" required>
                </div>
                </div>
                <div class="modal-footer">
                  <div class="form-group text-center">
                    <button class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Reportar</button>
                  </div>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dalog -->
          </div><!-- /.modal -->
        </form>


        <!-- EMPIEZA REPORTAR combustible -->
        <form class="form" role="form" action="<?php echo $REPORTAR_CARGADECOMBUSTIBLE_HOST ?>" method="post">
         <!-- codigo del panel -->
         <div class="col-md-4">
           <div class="panel panel-primary">
            <div class="panel-heading text-center">Reportar incidente</div>
            <div class="panel-body text-center">
              <a href class="btn btn-default" data-toggle="modal" data-target="#reportarCargaDeCombustible"><span class="glyphicon glyphicon-scale"></span> Combustible</a>
            </div>
          </div>
        </div>
        <!-- codigo del modal que guarda y confirma los datos -->
        <div id="reportarCargaDeCombustible" class="modal fade in">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <a class="btn pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                <h3 class="modal-title">Reportar carga de combustible:</h3>
              </div>
              <div class="modal-body">
                <h4>Complete los campos:</h4>
                <div class="input-group">
                  <span class="input-group-addon">Cantidad de Combustible:</span>
                  <input type="text" class="form-control" name="cantidad" required>
                  <span class="input-group-addon">Lts.</span>
                </div>
                <div class="input-group">
                  <span class="input-group-addon">Importe del combustible:</span>
                  <input type="text" class="form-control" name="importe" required>
                   <span class="input-group-addon">$</span>
                </div>
                    <div class="input-group">
                  <span class="input-group-addon">Kilometraje actual:</span>
                  <input type="text" class="form-control" name="kilometraje" required>
                   <span class="input-group-addon">Km</span>
                </div>
                <div class="input-group">
                 <input type="hidden" class="form-control" id="lat2"  name="latitud" required>
               </div>
               <div class="input-group">
                <input type="hidden" class="form-control" id="lon2" name="longitud" required>
              </div>
              </div>
              <div class="modal-footer">
                <div class="form-group text-center">
                  <button class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Reportar</button>
                </div>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dalog -->
        </div><!-- /.modal -->
      </form>


      <!-- EMPIEZA REPORTAR kilometraje -->
      <form class="form" role="form" action="<?php echo $REPORTAR_KILOMETRAJE_HOST ?>" method="post">
       <!-- codigo del panel -->
       <div class="col-md-4" >
         <div class="panel panel-primary">
          <div class="panel-heading text-center">Reportar incidente</div>
          <div class="panel-body text-center">
            <a href="" class="btn btn-default" data-toggle="modal" data-target="#reportarKilometraje"><span class="glyphicon glyphicon-dashboard"></span> Kilometraje</a>
          </div>
        </div>
      </div>
      <!-- codigo del modal que guarda y confirma los datos -->
      <div id="reportarKilometraje" class="modal fade in">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <a class="btn pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
              <h3 class="modal-title">Reportar kilometraje actual:</h3>
            </div>
            <div class="modal-body">
              <h4>Complete los campos:</h4>
              <div class="input-group">
                <span class="input-group-addon">Kilometraje:</span>
                <input type="text" class="form-control" name="kilometraje" placeholder="Ingrese el kilometraje actual del vehículo." required>
                 <span class="input-group-addon">Km</span>
              </div>
              <div class="input-group">
               <input type="hidden" class="form-control" id="lat3"  name="latitud" required>
             </div>
             <div class="input-group">
              <input type="hidden" class="form-control" id="lon3" name="longitud" required>
            </div>
            </div>
            <div class="modal-footer">
              <div class="form-group text-center">
                <button class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Reportar</button>
              </div>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dalog -->
      </div><!-- /.modal -->
    </form>


  </div>

  <div class="hidden-xs">
    <div class="panel panel-default">
     <div class="panel-heading">Mis últimos reportes</div>
     <div class="container-fluid">
      <div class="row">
        <div class="table-responsive" id="tabla">
          <table class="table table-hover">
            <thead>
              <tr>
                <th class="text-center">ID</th>                
                <th class="text-center">Día/Hora</th>
                <th class="text-center">Tipo de reporte</th>
                <th class="text-center">Vehículo/Patente</th>
                <th class="text-center">Descripción</th>
                <th class="text-center">Combustible</th>
                <th class="text-center">Kilometraje</th>
                <th class="text-center">ID Viaje</th>
                <th class="text-center">ID Vehículo</th>
              </tr>
            </thead>
            <tbody  class="text-center">
              <?php
              $conexion = new conexion;
              $idEmpleado= $_SESSION['id'];
              $sql = "SELECT * FROM reporte
              INNER JOIN tipoReporte ON reporte.idTipoReporte = tipoReporte.idTipoReporte
              INNER JOIN viaje ON viaje.idViaje = reporte.idViaje
              INNER JOIN VehiculosDelViaje ON vehiculosDelViaje.idViaje = viaje.idViaje
              INNER JOIN vehiculo ON vehiculo.idVehiculo = VehiculosDelViaje.idVehiculo
              INNER JOIN tipoVehiculo ON tipoVehiculo.idTipoVehiculo = vehiculo.idTipoVehiculo
              INNER JOIN empleado ON empleado.idEmpleado = reporte.idEmpleado
              WHERE reporte.idEmpleado = $idEmpleado AND reporte.hora > timestampadd(hour, -24, now()) 
              GROUP BY idReporte ORDER BY idReporte ASC" ;

              $resultado= $conexion -> query($sql);

              while ($fila = $resultado->fetch_assoc()) {

                   echo "<tr>";

                   echo "<td>";
                   echo $fila['idReporte'];
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

                   echo "<td>";
                   echo $fila['idVehiculo'];
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
