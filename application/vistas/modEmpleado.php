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

      <div class="col-sm-10 main">

        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="panelControlAdmin.php">Inicio</a></li>
          <li class="breadcrumb-item"><a href="planillaDeEmpleados.php">Administrar personal</a></li>
          <li class="breadcrumb-item active">Modificar personal</li>
        </ol>

<!--       <div class="alert alert-warning page-alert" id="alert-12">
      <button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
      <strong>¡Realizado!</strong> Se modificó el empleado seleccionado.
    </div> -->

    <div class="form-group">
      <a href="planillaDeEmpleados.php" class="btn btn-default ">Planilla</a>
      <a href="altaDeEmpleado.php" class="btn btn-success">Añadir</a>
      <a href="modEmpleado.php" class="btn btn-warning active">Modificar</a>
    </div>

    <div class="panel panel-warning ext" id="tabla">
     <div class="panel-heading">
       <h3 class="panel-title">Complete los campos para modificar un empleado</h3>
     </div>
     <div class="container-fluid">

      <form class="form-horizontal" id="tabla" method="post" action="<?php echo $ABM_EMPLEADO_MOD_HOST; ?>">

       <div class="form-group"></div>

       <div class="form-group">
        <div class="col-md-8 col-md-offset-2">
          <div class="input-group center">
            <span class="input-group-addon">Empleado a modificar</span>
            <select name="empleado" class="form-control" required>
              <option value="" selected hidden>Elegir:</option>
              <?php
              $conexion = new conexion;
              $sql = "SELECT * FROM empleado INNER JOIN rol ON empleado.idRol = rol.idRol";
              $resultado = $conexion -> query($sql);
              while ($fila = mysqli_fetch_array($resultado)) {
               echo "<option value=".$fila['idEmpleado'].">
               ".$fila['idEmpleado']," - ".$fila['nombresEmpleado'],", ".$fila['apellidosEmpleado']."</option>";
             }
             ?>
           </select>
         </div>
       </div>
     </div>

     <div class="form-group">
      <div class="col-sm-12">
        <div class="input-group">
          <span class="input-group-addon">Nombres</span>
          <input type="text" class="form-control" name="nombres" required>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-12">
        <div class="input-group">
          <span class="input-group-addon">Apellidos</span>
          <input type="text" class="form-control" name="apellidos" required>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-12">
       <div class="row">

        <div class="col-xs-6">
          <div class="input-group">
            <span class="input-group-addon">DNI</span>
            <input type="text" class="form-control" name="dni" required>
          </div>
        </div>

        <div class="col-xs-6">
         <div class="input-group">
          <span class="input-group-addon">CUIT/CUIL</span>
          <input type="text" class="form-control" name="cuitCuil" required>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="form-group">
  <div class="col-sm-12">
    <div class="row">
      <div class="col-xs-6">
       <div class="input-group">
        <span class="input-group-addon">Email</span>
        <input type="email" class="form-control" name="email" placeholder="Por ejemplo: (usuario@correo.com)">
      </div>

    </div>

    <div class="col-xs-6">
     <div class="input-group">
      <span class="input-group-addon">Teléfono</span>
      <input type="text" class="form-control" name="telefono" required>
    </div>

  </div>

</div>
</div>
</div>

<div class="form-group">
  <div class="col-sm-12">
    <div class="row">
      <div class="col-xs-6">
       <div class="input-group">
        <span class="input-group-addon">¿Conduce?</span>
        <select class="form-control" name="preguntaConduce">
          <option>Sin especificar</option>
          <option>Si</option>
          <option>No</option>
        </select>
      </div>

    </div>

    <div class="col-xs-6">
     <div class="input-group">
      <span class="input-group-addon">Tipo de Licencia</span>
      <select class="form-control" name="tipoLicencia">
        <option>Sin especificar</option>
        <option>A</option>
        <option>B</option>
        <option>C</option>
        <option>D</option>
        <option>E</option>
        <option>F</option>
        <option>G</option>
      </select>
    </div>

  </div>

</div>
</div>
</div>


<div class="form-group">
  <div class="col-sm-12">
    <div class="input-group">
      <span class="input-group-addon">Fecha de nacimiento</span>
      <input type="date" class="form-control" name="fechaDeNacimiento" placeholder="Por ejemplo: (AAAA/MM/DD)" required>
    </div>
  </div>
</div>

<div class="form-group">
  <div class="col-sm-12">
   <div class="input-group">
    <span class="input-group-addon">País de origen</span>
    <input type="text" class="form-control" name="paisDeOrigen" required>
  </div>

</div>
</div>


<div class="form-group">
  <div class="col-sm-12">
    <div class="input-group">
      <span class="input-group-addon">Cargo</span>
      <select class="form-control" name="cargo">
        <option>Sin especificar</option>
        <option>Chofer</option>
        <option>Mecánico</option>
        <option>Supervisor</option>
      </select>

    </div>
  </div>
</div>

<div class="form-group">
  <div class="col-sm-12">
   <div class="row">

    <div class="col-xs-6">
      <div class="input-group">
        <span class="input-group-addon">Usuario</span>
        <input type="text" class="form-control" name="usuario" placeholder="Ingrese un nombre de usuario para asignarle a la cuenta del empleado." required>
      </div>
    </div>

    <div class="col-xs-6">
     <div class="input-group">
      <span class="input-group-addon">Contraseña</span>
      <input type="text" class="form-control" name="pass" placeholder="Ingrese una contraseña para esa cuenta" required>
    </div> 
  </div>

</div>
</div>
</div>



<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <a data-toggle="modal" href="#myModal" class="btn btn-warning">Modificar</a>
    <button type="submit" class="btn btn-default">Cancelar</button>
  </div>
</div>

<!-- Modal -->
<div class="container">
  <div class="row">


    <div id="myModal" class="modal fade in">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <a class="btn pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
            <h3 class="modal-title">Modificar Empleado:</h3>
          </div>
          <div class="modal-body">
            <h4>¿Está seguro de modificar el empleado? Se perderán datos anteriores.</h4>
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
</div>
</div>


</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="./stylesheets/bootstrap/js/bootstrap.min.js"></script>
</body>
<footer>
  <?php require_once $FOOTER_DIR; ?>
</footer>
</html>
