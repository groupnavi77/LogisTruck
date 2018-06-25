<?php
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
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
          <li class="breadcrumb-item"><a href="planillaDeEmpleados.php">Administrar personal</a></li>
          <li class="breadcrumb-item active">Añadir personal</li>
        </ol>

        <div class="alert alert-success page-alert" id="alert-1">
          <button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
          <strong>¡Realizado!</strong> El nuevo empleado ha sido añadido correctamente.
        </div>

        <div class="form-group">
          <a href="planillaDeEmpleados.php" class="btn btn-default ">Planilla</a>
          <a href="altaDeEmpleado.php" class="btn btn-success active">Añadir</a>
          <a href="modEmpleado.php" class="btn btn-warning">Modificar</a>
        </div>


        <div class="panel panel-success" id="tabla">
         <div class="panel-heading">
           <h3 class="panel-title">Complete los campos para añadir un nuevo empleado</h3>
         </div>
         <div class="container-fluid">

          <form class="form-horizontal" id="tabla" role="form" action="<?php echo $ABM_EMPLEADO_ADD_HOST?>" method="post">

            <div class="form-group"></div>

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
   <a type="submit" data-toggle="modal" data-target="#confirmar" class="btn btn-success">Añadir</a> 
   <button type="reset" class="btn btn-default">Cancelar</button>
 </div>
</div>


<div class="modal fade in" id="confirmar" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <a class="btn pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
        <h3 class="modal-title">Añadir nuevo empleado</h3>
      </div>
      <div class="modal-body">
        <h4>¿Está seguro que desea añadir un nuevo empleado? Se guardarán los datos ingresados.</h4>
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
