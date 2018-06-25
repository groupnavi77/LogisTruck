<?php
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $SESION_IN_DIR;
require_once $CONEXION_DIR;
require_once $SESION_ADMIN;
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
          <li><a href="panelControlAdmin.php">Inicio</a></li>
          <li class="active">Reportes</li>
        </ol>

          <div class="row">

        <div class="col-md-4" >
         <div class="panel panel-primary">
           <div class="panel-heading text-center">Reportes</div>
           <div class="panel-body text-center">
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#reportesEmpleados">
            <span class="glyphicon glyphicon-exclamation-sign"></span> Empleados
            </button>
          </div>
        </div>
      </div>

      <!-- Modal  reportes empleados -->
      <div class="modal fade in" id="reportesEmpleados">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <a class="btn pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
              <h2 class="modal-title" id="exampleModalLabel">Reportes de Empleados:</h2>
            </div>
            <div class="modal-body">
              <div class="container-fluid">
                <form action="reportesEmpleadosAdmin.php" method="post">

                  <div class="input-group">
                    <span class="input-group-addon">Desde</span>
                    <input type="date" class="form-control" name="fechaDesde" required>
                  </div>

                  <div class="input-group">
                    <span class="input-group-addon">Hasta</span>
                    <input type="date" class="form-control" name="fechaHasta" required>
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
      <!-- fin modal reportes empleados-->



      <div class="col-md-4">
       <div class="panel panel-primary">
        <div class="panel-heading text-center">Visualizar</div>
        <div class="panel-body text-center">
           <button type="button" class="btn btn-default" data-toggle="modal" data-target="#mantenimientos">
           <span class="glyphicon glyphicon-wrench"></span> Mantenimientos
           </button>
        </div>
      </div>
    </div>

    <!-- Modal  mantenmientos -->
    <div class="modal fade in" id="mantenimientos">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <a class="btn pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
            <h2 class="modal-title" id="exampleModalLabel">Mantenimientos vehiculares:</h2>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <form action="reportesMantenimientoAdmin.php" method="post">

                <div class="input-group">
                  <span class="input-group-addon">Desde</span>
                  <input type="date" class="form-control" name="fechaDesde" required>
                </div>

                <div class="input-group">
                  <span class="input-group-addon">Hasta</span>
                  <input type="date" class="form-control" name="fechaHasta" required>
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
    <!-- fin modal mantenimientos-->

      <div class="col-md-4">
       <div class="panel panel-primary">
        <div class="panel-heading text-center">Ultimas</div>
          <div class="panel-body text-center">
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#ubicaciones">
            <span class="glyphicon glyphicon-map-marker"></span> Ubicaciones
            </button>
          </div>
        </div>
      </div>

      <div class="modal fade in" id="ubicaciones">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <a class="btn pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
              <h2 class="modal-title" id="exampleModalLabel">Ubicaciones:</h2>
            </div>
            <div class="modal-body">
              <div class="container-fluid">
                <form action="reportesUbicacionesAdmin.php" method="post">

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
                    <input type="date" class="form-control" name="fechaDesde" required>
                  </div>

                  <div class="input-group">
                    <span class="input-group-addon">Hasta</span>
                    <input type="date" class="form-control" name="fechaHasta" required>
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
  </div>


</div>



</div>

<div id="mapa" class="hidden"></div>

<footer>
  <?php require_once $FOOTER_DIR; ?>
</footer>

</body>


</html>
