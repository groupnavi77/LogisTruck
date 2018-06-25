<?php
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;
require_once $SESION_IN_DIR;
require_once $SESION_SUPER;

 $idVehiculo = $_POST['patente'];
 $fechaViajeDesde = $_POST['fechaViajeDesde'];
 $fechaViajeHasta = $_POST['fechaViajeHasta'];
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
          <li><a href="panelControlSupervisor.php">Inicio</a></li>
          <li><a href="buscarViajes.php">Buscar viajes</a></li>
          <li class="active">Viajes por vehículo</li>
        </ol>


        <div class="panel panel-primary">
         <div class="panel-heading">Viajes del vehículo <?php echo" [$idVehiculo], entre ($fechaViajeDesde) y ($fechaViajeHasta):"; ?></div>
         <div class="container-fluid">
          <div class="row">
            <div class="table-responsive" id="tabla">
              <table class="table table-hover">
                <thead>
                 <tr>
                   <th class="text-center">ID Viaje</th>
                   <th class="text-center">Fecha de salida</th>
                   <th class="text-center">Salida</th>
                   <th class="text-center">Destino</th>
                   <th class="text-center">Estado</th>
                 </tr>
               </thead>
               <tbody  class="text-center">

                <?php

                $idVehiculo = $_POST['patente'];
                $fechaViajeDesde = $_POST['fechaViajeDesde'];
                $fechaViajeHasta = $_POST['fechaViajeHasta'];

                $conexion = new conexion;

                $query= "SELECT * FROM viaje 
                INNER JOIN vehiculosdelviaje ON viaje.idViaje = vehiculosdelviaje.idViaje
                INNER JOIN estadoViaje ON viaje.idEstadoViaje = estadoViaje.idEstadoViaje
                WHERE vehiculosdelviaje.idVehiculo = '$idVehiculo' AND viaje.fechaViaje BETWEEN '$fechaViajeDesde' AND '$fechaViajeHasta'"; 
                $resultado= $conexion -> query($query);

                while ($fila = $resultado->fetch_assoc()) {

                  echo'<tr>';

                  echo '<td>'.$fila['idViaje'].'</td>';
                  echo '<td>'.$fila['fechaViaje'].'</td>';
                  echo '<td>'.$fila['origenViaje'].'</td>';
                  echo '<td>'.$fila['destinoViaje'].'</td>';
                  echo '<td>'.$fila['tipoEstadoViaje'].'</td>';

                  echo'</tr>';
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

</body>

<footer>
  <?php require_once $FOOTER_DIR; ?>
</footer>
</html>







