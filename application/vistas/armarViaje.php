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
            <li class="breadcrumb-item active">Planificar viaje</li>
          </ol>

          <div class="alert alert-success page-alert" id="alert-1">
            <button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
            <strong>¡Realizado!</strong> Se agregó un nuevo viaje.
          </div>

          <div class="form-group">
           <a href="listaViajes.php" class="btn btn-default ">Ver listado</a>
           <a href="armarViaje.php" class="btn btn-success active">Planificar viaje</a>
           <a href="modViaje.php" class="btn btn-warning">Modificar viaje</a>
         </div>

         <div class="panel panel-success" id="tabla">
           <div class="panel-heading">
             <h3 class="panel-title">Planificación de viaje</h3>
           </div>
           <div class="container-fluid">

            <form class="form-horizontal" role="form" id="tabla" action="<?php echo $ABM_VIAJES_ADD_HOST?>" method="post">

              <div class="form-group"></div>

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

                    <select name="chofer2" class="form-control">
                      <option value="" selected hidden>Elegir:</option>
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
                    <!--<option>Acoplado</option>-->
                  </select>
                </div>

              </div>

              <div class="col-md-6">
               <div class="input-group">
                <span class="input-group-addon">Patente</span>
                <select name="idVehiculo1" class="form-control" required="">
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
              <select class="form-control" name="tipoVehiculo2">
                <option>Acoplado</option>
              </select>
            </div>

          </div>

          <div class="col-md-6">
           <div class="input-group">
            <span class="input-group-addon">Patente</span>

            <select name="idVehiculo2" class="form-control" required="">
              <option value="" selected hidden>Elegir por Patente</option>
              <option value="">No posee acoplado</option>

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
        <input type="text" class="form-control"  name="recorridoPrevisto">
        <span class="input-group-addon">Kilómetros</span>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-12">
     <div class="input-group">
      <span class="input-group-addon">Combustible previsto</span>
      <input type="text" class="form-control" name="combustiblePrevisto">
      <span class="input-group-addon">Litros</span>
    </div>
  </div>
</div>

<div class="form-group">
  <div class="col-sm-12">
   <div class="input-group">
    <span class="input-group-addon">Presupuesto asignado</span>
    <input type="telefono" class="form-control" name="presupuestoAsignado">
    <span class="input-group-addon">AR$</span>
  </div>
</div>
</div>


<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <!--    <button   data-dismiss="modal" type="submit" name="enviar" data-toggle="page-alert" data-delay="4000" data-toggle-id="1" class="btn btn-success">Planificar</button> -->

    <a type="submit" data-toggle="modal" data-target="#confirmar" name="enviar" class="btn btn-success">Planificar</a>
    <button type="reset" class="btn btn-default">Cancelar</button>
  </div>
</div>


<div class="modal fade in" id="confirmar" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <a class="btn pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
        <h3 class="modal-title">Planificar nuevo viaje:</h3>
      </div>
      <div class="modal-body">
        <h4>¿Está seguro que desea añadir un nuevo viaje planificado? Se guardarán los datos ingresados.</h4>
      </div>
      <div class="modal-footer">
        <div class="form-group text-center">

          <!-- Dato a corregir: Cuando pongo  ( data-toggle="page-alert" data-delay="9000" data-toggle-id="1" ) no se guarda los datos en BD -->
          <button type="submit" name="enviar" class="btn btn-success" ><span class="glyphicon glyphicon-check"></span> Confirmar</button>

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
  <?php require_once $FOOTER_DIR; ?>
</footer>
</html>
