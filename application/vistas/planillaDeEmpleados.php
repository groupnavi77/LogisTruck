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
        <li class="breadcrumb-item active">Administrar personal</li>
      </ol>

      <div class="alert alert-danger page-alert" id="alert-1">
        <button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
        <strong>¡Realizado!</strong> El empleado seleccionado se ha eliminado.
      </div>

      <div class="form-group">
        <a href="planillaDeEmpleados.php" class="btn btn-default active">Planilla</a>
        <a href="altaDeEmpleado.php" class="btn btn-success">Añadir</a>
        <a href="modEmpleado.php" class="btn btn-warning">Modificar</a>
        <div class="pull-right"><a href="<?php echo $GENERAR_PDF_EMPLEADOS_HOST ?>" class="btn btn-default"><span class="glyphicon glyphicon-file"></span> Generar PDF</a></div>
      </div>


      <div class="panel panel-primary">
       <div class="panel-heading">Planilla de Empleados</div>
       <div class="container-fluid" id="tabla">
        <div class="row">
          <div class="table-responsive" id="tabla">

            <form role="form" action="<?php echo $ABM_EMPLEADO_DEL_HOST ?>" method="post">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">ID</th>
                    <th class="text-center">Nombres</th>
                    <th class="text-center">Apellidos</th>
                    <th class="text-center">DNI</th>
                    <th class="text-center">Pais de origen</th>
                    <th class="text-center">Fecha de nacimiento</th>
                    <th class="text-center">Tipo de licencia</th>
                    <th class="text-center">Cargo</th>
                    <th class="text-center">Teléfono</th>
                    <th class="text-center">Email</th>
                  </tr>
                </thead>
                <tbody  class="text-center">

                  <?php
                  $conexion = new conexion;
                  $sql = "SELECT * FROM empleado INNER JOIN rol ON empleado.idRol = rol.idRol ORDER BY empleado.idEmpleado ASC";
                  $resultado= $conexion -> query($sql);

                  while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";

                    echo "<td>";
                    echo "<input type='checkbox' id='btn-update' name='empleadoSeleccionado[]' value='".$fila['idEmpleado']."'  ";
                    echo "</td>";

                    echo "<td>";
                    echo $fila['idEmpleado'];
                    echo "</td>";

                    echo "<td> ";
                    echo $fila['nombresEmpleado'];
                    echo "</td>";

                    echo "<td> ";
                    echo $fila['apellidosEmpleado'];
                    echo "</td>";

                    echo "<td> ";
                    echo $fila['dniEmpleado'];
                    echo "</td>";

                    echo "<td> ";
                    echo $fila['paisOrigenEmpleado'];
                    echo "</td>";

                    echo "<td> ";
                    echo $fila['fechaDeNacimiento'];
                    echo "</td>";

                    echo "<td> ";
                    echo $fila['tipoLicenciaConducir'];
                    echo "</td>";

                    echo "<td> ";
                    echo $fila['tipoRol'];
                    echo "</td>";

                    echo "<td> ";
                    echo $fila['telefonoEmpleado'];
                    echo "</td>";

                    echo "<td> ";
                    echo $fila['emailEmpleado'];
                    echo "</td>";
                  }

                  ?>
                </tbody>
              </table>
            </div>
          </div>

          <div class="form-group">
           <a data-toggle="modal" href="#myModal" data-target="#confirmar" class="btn btn-danger">Eliminar seleccionados</a>
           <!-- <button type="submit" value="borrar" class="btn btn-danger">Elminar seleccionados</button> -->
         </div>

       </div>
     </div>


     <!-- Modal -->
     <div class="container">
      <div class="row">

        <div id="confirmar" class="modal fade in"  role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">

              <div class="modal-header">
                <a class="btn pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                <h3 class="modal-title">Eliminación de empleados:</h3>
              </div>
              <div class="modal-body">
                <h4>¿Está seguro que desea eliminar el empleado seleccionado? Los datos se perderán.</h4>
              </div>
              <div class="modal-footer">
                <div class="form-group text-center">
                  <!--   <button class="btn btn-danger" data-dismiss="modal" type="submit" data-toggle="page-alert" data-delay="9000" data-toggle-id="1"><span class="glyphicon glyphicon-ok"></span> Eliminar</button> -->

                  <button class="btn btn-danger" type="submit" value="borrar"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
                </div>
              </div>

            </div><!-- /.modal-content -->
          </div><!-- /.modal-dalog -->
        </div><!-- /.modal -->
      </form>

    </div>
  </div>

</body>

<footer>
  <?php require_once $FOOTER_DIR; ?>
</footer>
</html>
