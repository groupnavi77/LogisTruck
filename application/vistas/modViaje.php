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
          <li class="breadcrumb-item"><a href="listaViajes.php">Administrar viajes</a></li>
          <li class="breadcrumb-item active">Modifcar viaje</li>
        </ol>


        <div class="alert alert-warning page-alert" id="alert-1">
          <button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
          <strong>¡Realizado!</strong> Se modifico un viaje planificado.
        </div>

        <div class="form-group">
         <a href="listaViajes.php" class="btn btn-default ">Ver listado</a>
         <a href="armarViaje.php" class="btn btn-success">Planificar viaje</a>
         <a href="modViaje.php" class="btn btn-warning active">Modificar viaje</a>
       </div>

       <div class="panel panel-warning" id="tabla">
         <div class="panel-heading">
           <h3 class="panel-title">Modificación de viaje</h3>
         </div>
         <div class="container-fluid">

          <form class="form-horizontal" id="tabla" action="<?php echo $ABM_VIAJES_MOD_HOST?>" method="post">

            <div class="form-group"></div>

            <div class="form-group">
              <div class="col-md-8 col-md-offset-2">
                <div class="input-group center">
                  <span class="input-group-addon">Viaje a modificar</span>
                  <select name="idViaje" class="form-control" required>
                    <option value="" selected hidden>Elegir:</option>
                    <?php
                    $conexion = new conexion;
                    $sql = "SELECT * FROM viaje";
                    $resultado = $conexion -> query($sql);
                    while ($fila = mysqli_fetch_array($resultado)) {
                     echo "<option value=".$fila['idViaje'].">
                     ".$fila['idViaje']," - [Salida: ".$fila['origenViaje'],"] a [Destino: ".$fila['destinoViaje']."]</option>";
                   }
                   ?>
                 </select>
               </div>
             </div>
           </div>


           <div class="form-group">
             <div class="col-sm-12">
              <div class="row">
                <div class="col-md-6">
                  <div class="input-group">
                    <span class="input-group-addon">Salida</span>
                    <input type="text" class="form-control" name="origenViaje" required placeholder="Ingrese la ciudad, provincia y pais de salida.">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group">
                    <span class="input-group-addon">Destino
                    </span>
                    <input type="text" class="form-control" name="destinoViaje" required placeholder="Ingrese la ciudad, provincia y pais de destino.">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-12">


              <div class="row">

                <div class="col-md-6">
                  <div class="input-group">
                    <span class="input-group-addon">Chofer 1</span>
                    <select name="chofer1" class="form-control" required>
                      <option value="" selected hidden>Elegir:</option>
                      <?php
                      $conexion = new conexion;
                      $sql = "SELECT * FROM empleado INNER JOIN rol ON empleado.idRol = rol.idRol WHERE rol.idRol = 2";
                      $resultado = $conexion -> query($sql);
                      while ($fila = mysqli_fetch_array($resultado)) {
                       echo "<option value=".$fila['idEmpleado'].">
                       ".$fila['idEmpleado']," - ".$fila['nombresEmpleado'],", ".$fila['apellidosEmpleado']."</option>";
                     }
                     ?>
                   </select>
                 </div>
               </div>

               <div class="col-md-6">
                 <div class="input-group">
                  <span class="input-group-addon">Chofer 2</span>

                  <select name="chofer2" class="form-control" required>
                    <option value="" selected hidden>Elegir:</option>
                    <option value="NULL">No posee chofer 2</option>
                    <?php
                    $conexion = new conexion;
                    $sql = "SELECT * FROM empleado INNER JOIN rol ON empleado.idRol = rol.idRol WHERE rol.idRol = 2";
                    $resultado= $conexion -> query($sql);
                    while ($fila=mysqli_fetch_array($resultado)) {
                      echo "<option value=".$fila['idEmpleado'].">
                      ".$fila['idEmpleado']," - ".$fila['nombresEmpleado'],", ".$fila['apellidosEmpleado']."</option>";    
                    }
                    ?>
                  </select>
                </div>
              </div>


            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-md-6">
               <div class="input-group">
                <span class="input-group-addon">Vehículo 1</span>

                <select class="form-control" name="tipoVehiculo1" required>
                  <option>Camión</option>
                </select>
              </div>

            </div>

            <div class="col-md-6">
             <div class="input-group">
              <span class="input-group-addon">Patente</span>
              <select name="idVehiculo1" class="form-control" required>
                <option value="" selected hidden>Elegir por Patente</option>
                <?php
                $conexion = new conexion;
                $sql = "SELECT idVehiculo, patente FROM vehiculo WHERE idTipoVehiculo = 1 AND estadoVehiculo = 'Disponible' " ;
                $resultado= $conexion -> query($sql);
                while ($fila=mysqli_fetch_array($resultado)) {
                  echo "<option value=".$fila['idVehiculo'].">".$fila['patente']."</option>";     
                }
                ?>
              </select>


            </div>

          </div>

        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-12">
        <div class="row">
          <div class="col-md-6">
           <div class="input-group">
            <span class="input-group-addon">Vehículo 2</span>
            <select class="form-control" name="tipoVehiculo2" required>
              <option>Acoplado</option>
            </select>
          </div>

        </div>

        <div class="col-md-6">
         <div class="input-group">
          <span class="input-group-addon">Patente</span>

          <select name="idVehiculo2" class="form-control" required >
            <option value="" selected hidden>Elegir por Patente</option>
            <option value="NULL">No posee acoplado</option>

            <?php
            $conexion = new conexion;
            $sql = "SELECT idVehiculo, patente FROM vehiculo WHERE idTipoVehiculo = 2 AND estadoVehiculo = 'Disponible'";
            $resultado= $conexion -> query($sql);
            while ($fila=mysqli_fetch_array($resultado)) {
              echo "<option value=".$fila['idVehiculo'].">".$fila['patente']."</option>";     
            }
            ?>
          </select>
        </div>

      </div>

    </div>
  </div>
</div>



<div class="form-group">
  <div class="col-sm-12">
    <div class="input-group">
      <span class="input-group-addon">Fecha de viaje</span>
      <input type="date" class="form-control" name="fechaViaje" required>
    </div>
  </div>
</div>


<div class="form-group">
  <div class="col-sm-12">
    <div class="input-group">
      <span class="input-group-addon">Recorrido previsto</span>
      <input type="text" class="form-control"  name="recorridoPrevisto" required>
      <span class="input-group-addon">Kilómetros</span>
    </div>
  </div>
</div>

<div class="form-group">
  <div class="col-sm-12">
   <div class="input-group">
    <span class="input-group-addon">Combustible previsto</span>
    <input type="text" class="form-control" name="combustiblePrevisto" required>
    <span class="input-group-addon">Litros</span>
  </div>
</div>
</div>

<div class="form-group">
  <div class="col-sm-12">
   <div class="input-group">
    <span class="input-group-addon">Presupuesto asignado</span>
    <input type="telefono" class="form-control" name="presupuestoAsignado" required>
    <span class="input-group-addon">AR$</span>
  </div>
</div>
</div>



<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <a data-toggle="modal" href="#myModal" class="btn btn-warning">Modificar</a>
    <button type="submit" class="btn btn-default">Cancelar</button>
  </div>
</div>


<div id="myModal" class="modal fade in">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <a class="btn pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
        <h3 class="modal-title">Modificar Viaje:</h3>
      </div>
      <div class="modal-body">
        <h4>¿Está seguro que desea modificar los datos del viaje? Se perderán los datos anteriores.</h4>
      </div>
      <div class="modal-footer">
        <div class="form-group text-center">

          <button class="btn btn-warning" type="submit"><span class="glyphicon glyphicon-check"></span> Modificar</button>
        </div>
      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dalog -->
</div><!-- /.modal -->

</form>

</div>
</div>

</div>


</div>

</body>

<footer>
  <?php require_once '../helpers/inc/footer.php'; ?>
</footer>
</html>
