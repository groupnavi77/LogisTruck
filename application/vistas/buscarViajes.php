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

      <div class="col-sm-10 main">

        <ol class="breadcrumb">
          <li><a href="panelControlSupervisor.php">Inicio</a></li>
          <li class="active">Buscar viajes</li>
        </ol>


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viajesPorChofer">
          Viajes por chofer
        </button>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viajesPorVehiculo">
          Viajes por vehiculo
        </button>


        <!-- Modal viajes por chofer -->
        <div class="modal fade in" id="viajesPorChofer">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <a class="btn pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                <h2 class="modal-title" id="exampleModalLabel">Buscar viajes por chofer:</h2>
              </div>
              <div class="modal-body">
                <div class="container-fluid">
                  <form action="viajesPorChofer.php" method="post">

                    <div class="input-group">
                      <span class="input-group-addon">Chofer</span>
                      <select name="chofer" class="form-control" required>
                        <option value="" selected hidden>Elegir chofer</option>
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

                    <div class="input-group">
                      <span class="input-group-addon">Desde</span>
                      <input type="date" class="form-control" name="fechaViajeDesde" required>
                    </div>

                    <div class="input-group">
                      <span class="input-group-addon">Hasta</span>
                      <input type="date" class="form-control" name="fechaViajeHasta" required>
                    </div>

                    <div class="modal-footer">
                      <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>       
            </div>
          </div>
        </div>
        <!-- fin modal viajes por chofer-->


        <!-- Modal viajes por vehiculo -->
        <div class="modal fade in" id="viajesPorVehiculo">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
               <a class="btn pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
               <h2 class="modal-title" id="exampleModalLabel">Buscar viajes por vehículo:</h2>
             </div>
             <div class="modal-body">
              <div class="container-fluid">
                <form action="viajesPorVehiculo.php" method="post">

                  <div class="input-group">
                    <span class="input-group-addon">Vehículo</span>
                    <select name="patente" class="form-control" required>
                      <option value="" selected hidden>Elegir patente</option>

                      <?php
                      $conexion = new conexion;
                      $sql = "SELECT idVehiculo, patente FROM vehiculo";
                      $resultado= $conexion -> query($sql);
                      while ($fila=mysqli_fetch_array($resultado)) {
                        echo "<option value=".$fila['idVehiculo'].">".$fila['patente']."</option>";     
                      }
                      ?>
                    </select>
                  </div>

                  <div class="input-group">
                    <span class="input-group-addon">Desde</span>
                    <input type="date" class="form-control" name="fechaViajeDesde" required>
                  </div>

                  <div class="input-group">
                    <span class="input-group-addon">Hasta</span>
                    <input type="date" class="form-control" name="fechaViajeHasta" required>
                  </div>

                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                  </div>
                </form>
              </div>
            </div>

          </div>
        </div>
      </div>
      <!--fin modal viajes por vehiculo-->



    </div>
  </div>
</div>

</body>

<footer>
  <?php require_once $FOOTER_DIR; ?>
</footer>
</html>
