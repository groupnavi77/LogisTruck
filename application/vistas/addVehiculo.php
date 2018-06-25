<?php
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
/*require_once $_SERVER["DOCUMENT_ROOT"]. "/application/helpers/clases/includes.php";*/
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
      <div class="col-sm-10 main">


          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="panelControlAdmin.php">Inicio</a></li>
            <li class="breadcrumb-item"><a href="listaVehiculos.php">Administrar vehículos</a></li>
            <li class="breadcrumb-item active">Añadir vehículo</li>
          </ol>

          <div class="alert alert-success page-alert" id="alert-1">
            <button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
            <strong>¡Realizado!</strong> Se ha agregado un nuevo vehículo a la flota.
          </div>

          <div class="form-group">
           <a href="listaVehiculos.php" class="btn btn-default">Ver listado</a>
           <a href="addVehiculo.php" class="btn btn-success active">Añadir vehículo</a>
         </div>

         <div class="panel panel-success" id="tabla">
           <div class="panel-heading">
             <h3 class="panel-title">Completar para añadir un nuevo vehículo</h3>
           </div>
           <div class="container-fluid">

             <form class="form-horizontal" id="tabla" role="form" action="<?php echo $ABM_VEHICULO_ADD_HOST?>" method="post">

               <div class="form-group"></div>

               <div class="form-group">
                <div class="col-md-12">
                  <div class="row">

                    <div class="col-md-6">
                      <div class="input-group">
                        <span class="input-group-addon">Marca</span>
                        <select class="form-control" name="marcaVehiculo" >
                          <option>Sin definir</option>
                          <option>Iveco</option>
                          <option>Mercedes Benz</option>
                          <option>Scania</option>
                          <option>Volvo</option>
                          <option>Renault</option>
                          <option>Toyota</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                     <div class="input-group">
                      <span class="input-group-addon">Modelo</span>
                      <input type="text" class="form-control" name="modeloVehiculo" required>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-12">
                <div class="row">

                  <div class="col-md-6">
                   <div class="input-group">
                    <span class="input-group-addon">Tipo</span>
                    <select class="form-control" name="tipoVehiculo">
                      <option>Sin definir</option>
                      <option>Camión</option>
                      <option>Acoplado</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                 <div class="input-group">
                  <span class="input-group-addon">Patente</span>
                  <input type="text" class="form-control" name="patenteVehiculo" required  placeholder="Ingrese según corresponda: (AA123BB) o (ABC789).">
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="form-group">
         <div class="col-md-12">
          <div class="row">
            <div class="col-md-6">
             <div class="input-group date">
              <span class="input-group-addon">Nº Chasis</span>
              <input type="text" class="form-control" name="numeroDeChasisVehiculo" required placeholder="Compuesto por 17 caracteres alfanuméricos.">
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-group date">
              <span class="input-group-addon">Nº Motor
              </span>
              <input type="text" class="form-control" name="numeroDeMotorVehiculo" required>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="form-group">
     <div class="col-md-12">
      <div class="row">

        <div class="col-md-6">
         <div class="input-group date">
          <span class="input-group-addon">Año</span>
          <input type="text" class="form-control" name="anioDeFabricacionVehiculo" required>
        </div>
      </div>

      <div class="col-md-6">
        <div class="input-group date">
          <span class="input-group-addon">Kilometraje
          </span>
          <input type="text" class="form-control" name="kmVehiculo" required>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="form-group">
  <div class="col-md-12">
   <div class="input-group">
    <span class="input-group-addon">Carga soportada</span>
    <input type="text" class="form-control" name="capacidadCargaVehiculo" required>
    <span class="input-group-addon">Kg</span>
  </div>
</div>
</div>

<div class="form-group">
  <div class="col-md-12">
    <div class="row">

    <div class="col-md-6">
   <div class="input-group">
    <span class="input-group-addon">Precio</span>
    <input type="telefono" class="form-control" name="costoVehiculo">
  </div>
</div>

<div class="col-md-6">
 <div class="input-group">
  <span class="input-group-addon">Estado</span>
  <select class="form-control" name="estadoVehiculo">
    <option>Disponible</option>
    <option>Fuera de servicio</option>
  </select>
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
        <h3 class="modal-title">Añadir nuevo vehículo</h3>
      </div>
      <div class="modal-body">
        <h4>¿Está seguro que sea añadir un nuevo vehiculo? Se guardarán los datos ingresados.</h4>
      </div>
      <div class="modal-footer">
        <div class="form-group text-center">

    <!-- Dato a corregir: Cuando pongo( data-toggle="page-alert" data-delay="9000" data-toggle-id="1" ) no se guarda los datos en BD -->
          <button type="submit" name="enviar" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Confirmar</button>

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

</body>

<footer>
  <?php require_once $FOOTER_DIR; ?>
</footer>
</html>
