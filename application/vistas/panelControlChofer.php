<?php
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $SESION_IN_DIR;
require_once $CONEXION_DIR;
require_once $SESION_CHOFER;

$idEmpleado=$_SESSION['id'];

$conexion = new conexion;

/*busco el id del proximo viaje asignado y lo asigno a una variable*/
$sql="SELECT choferesdelviaje.idEmpleado, viaje.idViaje, MIN(viaje.fechaViaje) FROM choferesdelviaje INNER JOIN viaje ON choferesdelviaje.idViaje = viaje.idViaje WHERE choferesdelviaje.idEmpleado = '$idEmpleado' AND viaje.idEstadoViaje=1";
$resultado= $conexion -> query($sql);
$fila = $resultado->fetch_assoc();
$idProxAsignado = $fila['idViaje'];

/*busco campos del id del proximo viaje*/
$sql="SELECT origenViaje, destinoViaje, presupuestoViaje, fechaViaje from viaje WHERE idViaje = '$idProxAsignado' AND  idEstadoViaje = 1";
$resultado= $conexion -> query($sql);
$fila = $resultado->fetch_assoc();
$fechaViaje = $fila['fechaViaje'];
$origenViaje = $fila['origenViaje'];
$destinoViaje = $fila['destinoViaje'];
$presupuestoViaje = $fila['presupuestoViaje'];

/*busco datos del camion*/
$sql="SELECT tipovehiculo.tipoVehiculo, vehiculo.modelo, vehiculo.patente FROM viaje inner JOIN vehiculosdelviaje ON viaje.idViaje = vehiculosdelviaje.idViaje INNER JOIN vehiculo ON vehiculosdelviaje.idVehiculo = vehiculo.idVehiculo inner JOIN tipovehiculo ON vehiculo.idTipoVehiculo = tipovehiculo.idTipoVehiculo WHERE tipovehiculo.idTipoVehiculo = 1 AND viaje.idViaje = '$idProxAsignado'";
$resultado= $conexion -> query($sql);
$fila = $resultado->fetch_assoc();
$tipovehiculo1 = $fila['tipoVehiculo'];
$modelo1 = $fila['modelo'];
$patente1 = $fila['patente'];


/*busco datos del acoplado*/
$sql="SELECT tipovehiculo.tipoVehiculo, vehiculo.modelo, vehiculo.patente FROM viaje inner JOIN vehiculosdelviaje ON viaje.idViaje = vehiculosdelviaje.idViaje INNER JOIN vehiculo ON vehiculosdelviaje.idVehiculo = vehiculo.idVehiculo inner JOIN tipovehiculo ON vehiculo.idTipoVehiculo = tipovehiculo.idTipoVehiculo WHERE tipovehiculo.idTipoVehiculo = 2 AND viaje.idViaje = '$idProxAsignado'";
$resultado= $conexion -> query($sql);
$fila = $resultado->fetch_assoc();
$tipovehiculo2 = $fila['tipoVehiculo'];
$modelo2 = $fila['modelo'];
$patente2 = $fila['patente'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once $HEADER_DIR; ?>
  <script src="https://maps.google.com/maps/api/js?key=AIzaSyAiq3xISXSZYgkd9GDAOdajy4NK2d3L7dY"></script>
</head>

<body>



  <?php require_once $NAVBAR_DIR; ?>

  <div class="container-fluid">
    <div class="row">

      <div id="mapa" class="hidden"></div>

      <?php require_once $PANEL_LATERAL_PERFIL_DIR; ?>


      <!-- aca empieza el contenido de lo fuera de la barra lateral-->
      <div class="col-md-10 main">

        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Inicio</li>
        </ol>


<!--         <div class="alert alert-warning page-alert" id="alert-9">
          <button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
          <strong>¡Atento!</strong> El viaje asignado ha comenzado.
        </div>

        <div class="alert alert-success page-alert" id="alert-10">
          <button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
          <strong>¡Buen trabajo!</strong> El viaje asignado ha finalizado.
        </div>
 -->
        <div class="row">

          <form class="form" role="form" action="<?php echo $INICIAR_VIAJE_HOST ?>" method="post">
            <div class="col-md-3" >
             <div class="panel panel-success">
              <div class="panel-heading text-center">Viaje asignado</div>

              <div class="panel-body text-center">
               <a data-target="#iniciarViaje" class="btn btn-default" data-toggle="modal" ><span class="glyphicon glyphicon-play"></span> Iniciar</a>
             </div>

           </div>
         </div>

         <div id="iniciarViaje" class="modal fade in">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <a class="btn pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                <h3 class="modal-title">Iniciar viaje:</h3>
              </div>
              <div class="modal-body">
                <h4>Complete los campos para iniciar el viaje asignado:</h4>
                <div class="input-group">
                  <span class="input-group-addon">Kilometraje:</span>
                  <input type="text" class="form-control" name="kilometraje" placeholder="Ingrese el kilometraje actual del vehículo." required>
                  <span class="input-group-addon">Km</span>
                </div>
                <div class="input-group">
                 <input type="hidden" class="form-control" id="lat"  name="latitud" required>
               </div>
               <div class="input-group">
                <input type="hidden" class="form-control" id="lon" name="longitud" required>
              </div>

            </div><!-- /.modal-content -->
            <div class="modal-footer">
              <div class="form-group text-center">
                <!-- data-toggle="page-alert" data-delay="9000" data-toggle-id="9" -->
                <button class="btn btn-success" type="submit" ><span class="glyphicon glyphicon-play"></span> Iniciar</button>
              </div>
            </div>          </div><!-- /.modal-dalog -->
          </div><!-- /.modal -->
        </div>
      </form> 

      <div class="col-md-3">
       <div class="panel panel-primary" id="">
        <div class="panel-heading text-center">Informar</div>

        <div class="panel-body text-center">
         <a href="informarPosicionChofer.php" class="btn btn-default "><span class="glyphicon glyphicon-map-marker"></span> Posición</a>
       </div>

     </div>
   </div>

   <div class="col-md-3" >

     <div class="panel panel-primary" id="">
      <div class="panel-heading text-center">Reportar</div>

      <div class="panel-body text-center">
       <a href="reportarIncidente.php" class="btn btn-default "><span class="glyphicon glyphicon-exclamation-sign"></span> Incidentes</a>

     </div>
   </div>
 </div>


 <form class="form" role="form" action="<?php echo $FINALIZAR_VIAJE_HOST ?>" method="post">
   <div class="col-md-3" >
     <div class="panel panel-danger">
      <div class="panel-heading text-center">Viaje asignado</div>

      <div class="panel-body text-center">
       <a data-target="#finalizarViaje" class="btn btn-default" data-toggle="modal" ><span class="glyphicon glyphicon-stop"></span> Finalizar</a>
     </div>

   </div>
 </div>
 <div id="finalizarViaje" class="modal fade in">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <a class="btn pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
        <h3 class="modal-title">Finalizar viaje:</h3>
      </div>
      <div class="modal-body">
        <h4>Complete los campos para finalizar el viaje en curso:</h4>
        <div class="input-group">
          <span class="input-group-addon">Kilometraje:</span>
          <input type="text" class="form-control" name="kilometraje" placeholder="Ingrese el kilometraje actual del vehículo." required>
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
        <!--data-toggle="page-alert" data-delay="9000" data-toggle-id="10" -->
        <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-stop"></span> Finalizar</button>
      </div>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dalog -->
</div><!-- /.modal -->
</form>


</div>



<div class="panel panel-primary">
 <div class="panel-heading">Próximo viaje asignado:</div>
 <div class="panel-body" id="tabla">
  <div class="table-responsive">
   <div class="container-fluid">

    <form class="form-horizontal" rol="form">

     <div class="form-group">
      <div class="col-sm-12">
        <div class="input-group">
          <span class="input-group-addon ">Número identificador #</span>
          <input type="text" class="form-control" value="<?php echo $idProxAsignado;?>" disabled>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-12">
        <div class="input-group">
          <span class="input-group-addon ">Salida</span>
          <input type="text" class="form-control" value="<?php echo "$origenViaje";?>" disabled>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-12">
       <div class="input-group">
        <span class="input-group-addon">Destino</span>
        <input type="text" class="form-control" value="<?php echo "$destinoViaje";?>" disabled>
      </div>
    </div>
  </div>
<!--
  <div class="form-group">
    <div class="col-sm-12">
     <div class="input-group">
      <span class="input-group-addon">Chofer 1</span>
      <input type="text" class="form-control" value="Julián Lopez" disabled>
    </div>
  </div>
</div>

<div class="form-group">
  <div class="col-sm-12">
   <div class="input-group">
    <span class="input-group-addon">Chofer 2</span>
    <input type="email" class="form-control" value="Jorge Martinez" disabled>
  </div>
</div>
</div>
-->

<div class="form-group">
  <div class="col-sm-12">
   <div class="input-group">
    <span class="input-group-addon">Vehículo 1</span>
    <input type="text" class="form-control" value="<?php echo "$tipovehiculo1"." "."$modelo1"." - "."$patente1";?>" disabled>
  </div>
</div>
</div>

<div class="form-group">
  <div class="col-sm-12">
   <div class="input-group">
     <span class="input-group-addon">Vehículo 2</span>
     <input type="text" class="form-control" value="<?php echo "$tipovehiculo2"." "."$modelo2"." - "."$patente2";?>" disabled>
   </div>
 </div>
</div>

<div class="form-group">
  <div class="col-sm-12">
   <div class="input-group">
     <span class="input-group-addon">Fecha de salida</span>
     <input type="text" class="form-control" value="<?php echo "$fechaViaje";?>" disabled>
   </div>
 </div>
</div>

<div class="form-group">
  <div class="col-sm-12">
   <div class="input-group">
    <span class="input-group-addon">Presupuesto para viáticos asignado</span>
    <input type="text" class="form-control" value="<?php echo "$presupuestoViaje";?>" disabled="">
    <span class="input-group-addon">AR$</span>
  </div>
</div>
</div>





</form>
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

<!-- Modales -->
<div class="container">
  <div class="row">





    <div id="myModalFinalizarViaje" class="modal fade in">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <a class="btn pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
            <h3 class="modal-title">Finalizar viaje:</h3>
          </div>
          <div class="modal-body">
            <h4>¿Está seguro que desea finalizar el viaje en curso?</h4>
          </div>
          <div class="modal-footer">
            <div class="form-group text-center">
              <button class="btn btn-danger" data-dismiss="modal" type="submit" data-toggle="page-alert" data-delay="9000" data-toggle-id="10"><span class="glyphicon glyphicon-ok"></span> Finalizar</button>
            </div>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dalog -->
    </div><!-- /.modal -->






  </div>
</div>

<?php 

?>


<footer>
  <?php require_once $FOOTER_DIR; ?>
</footer>



</body>


</html>