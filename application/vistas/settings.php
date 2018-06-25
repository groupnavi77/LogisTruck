<?php
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
include $SESION_IN_DIR;


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

      <div class="col-md-10 main">

        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="panelControlAdmin.php">Inicio</a></li>
          <li class="breadcrumb-item active">Mi cuenta</li>
        </ol>

        <div class="alert alert-success page-alert" id="alert-1">
          <button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
          <strong>¡Realizado!</strong> Los cambios se han guardado.
        </div>

        <div class="panel panel-primary " id="tabla">
         <div class="panel-heading">
           <h3 class="panel-title">Mi cuenta - Puede cambiar su contraseña</h3>
         </div>
         <div class="container-fluid">

          <form class="form-horizontal" role="form" id="tabla" action="<?php echo $ABM_SETTINGS_MOD_HOST ?>" method="post">

            <div class="form-group"></div>

            <div class="form-group">
              <div class="col-sm-12">
                <div class="input-group ">
                  <span class="input-group-addon ">Nombres</span>
                  <input type="text" class="form-control " value="<?php echo $_SESSION['nombre'];?>" disabled>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-12">
               <div class="input-group">
                <span class="input-group-addon">Apellidos</span>
                <input type="text" class="form-control" value="<?php echo $_SESSION['apellido'];?>" disabled>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-12">
             <div class="input-group">
              <span class="input-group-addon">DNI</span>
              <input type="text" class="form-control" value="<?php echo $_SESSION['dni'];?>" disabled>
            </div>
          </div>
        </div>


    <div class="form-group">
      <div class="col-sm-12">
       <div class="input-group">
         <span class="input-group-addon">Cargo</span>
         <input type="text" class="form-control" value="<?php echo $_SESSION['rol'];?>" disabled="">
       </div>
     </div>
   </div>

   <div class="form-group">
    <div class="col-sm-12">
     <div class="input-group">
       <span class="input-group-addon">Usuario</span>
       <input type="text" class="form-control" value="<?php echo $_SESSION['usuario'];?>" disabled="">
     </div>
   </div>
 </div>

 <div class="form-group">
  <div class="col-sm-12">
   <div class="input-group">
    <span class="input-group-addon">Contraseña</span>
    <input name="setPass" type="password" class="form-control" value="12345">
  </div>
</div>
</div>

<div class="form-group">
  <div class="col-sm-12">
   <div class="input-group">
    <span class="input-group-addon">Confirme contraseña</span>
    <input name="confirmPass" type="password" class="form-control" value="12345">
  </div>
</div>
</div>



<div class="form-group text-center">
  <!--<button class="btn btn-primary" value="Guardar" type="submit" data-toggle="page-alert" data-delay="4000" data-toggle-id="1"">Guardar</button>-->
  <button type="submit" name="guardar" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Guardar</button>
  <button class="btn btn-default" value="Cancelar" type="reset" >Cancelar</button>

</div>

</form>

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
