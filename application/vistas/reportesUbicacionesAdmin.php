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
  <script src="js/mapaSupervisor.js" type="text/javascript"></script>
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
          <li><a href="reportesAdmin.php">Inicio</a></li>
          <li class="active">Ultimas Ubicaciones</li>
        </ol>


      <div class="col-sm-9 main">
        <div class="container-fluid" id="mapa"></div>
      </div>




              <div class="panel panel-primary hidden ">
               <div class="panel-heading">Ubicaciones</div>
               <div class="container-fluid" id="tabla">
                <div class="row">
                  <div class="table-responsive" id="tabla">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <!-- <th class="text-center">ID</th> -->
                            <th class="text-center">Nombres</th>
                            <th class="text-center">Apellidos</th>
                            <th class="text-center">Latitud</th>
                            <th class="text-center">Longitud</th>
                          </tr>
                        </thead>
                        <tbody  class="text-center">

                          <?php

                          $fechaDesde = $_POST['fechaDesde'];
                          $fechaHasta = $_POST['fechaHasta'];
                          $idEmpleado = $_POST['chofer'];

                          $conexion = new conexion;
                          $sql = "SELECT * FROM empleado
                          INNER JOIN ubicacion ON empleado.idEmpleado = ubicacion.idEmpleado
                          WHERE empleado.idEmpleado = '$idEmpleado' AND
                          ubicacion.horaUbicacion BETWEEN '$fechaDesde' AND '$fechaHasta'";

                          $resultado= $conexion -> query($sql);
                          $cont = 0;
                          while ($fila = $resultado->fetch_assoc()) {
                            echo "<tr>";


                            echo "<td id='nom".$cont."'> ";
                            echo $fila['nombresEmpleado'];
                            echo "</td>";

                            echo "<td id='ape".$cont."'> ";
                            echo $fila['apellidosEmpleado'];
                            echo "</td>";

                            echo "<td id='lat".$cont."'> ";
                            echo $fila['latitud'];
                            echo "</td>";

                            echo "<td id='lon".$cont."'> ";
                            echo $fila['longitud'];
                            echo "</td>";
                            $cont = $cont + 1;
                          }

                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
               </div>
              </div>

  </body>


</html>
