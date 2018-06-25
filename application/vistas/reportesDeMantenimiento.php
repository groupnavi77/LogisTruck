<?php
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $SESION_IN_DIR;
require_once $SESION_MECANICO;
require_once $CONEXION_DIR;
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
          <li><a href="panelControlMecanico.php">Inicio</a></li>
          <li class="active">Reportar mantenimientos</li>
        </ol>

      <!--  <div class="alert alert-success page-alert" id="alert-1">
          <button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
          <strong>¡Realizado!</strong> Se reportó un nuevo mantenimiento interno.
        </div>-->


        <div class="panel panel-success" id="tabla">
         <div class="panel-heading">
           <h3 class="panel-title">Reportar nuevo mantenimiento</h3>
         </div>
         <div class="container-fluid">

          <form class="form-horizontal" action="<?php echo $REPORTAR_MANTENIMIENTO_MECANICO_HOST ?>" method="post">

            <div class="form-group"></div>

            <div class="form-group">
              <div class="col-md-6">
                <div class="input-group">
                  <span class="input-group-addon">Tipo de mantenimiento</span>
                  <select class="form-control" name="tipoMantenimiento" required>
                    <option selected hidden >Elegir:</option>
                    <option value="interno">Interno</option>
                    <option value="externo">Externo</option>
                  </select>
                </div>
              </div>


              <div class="col-md-6">
                <div class="input-group">
                  <div class="checkbox">
                    <label><input type="checkbox" value="1" name="service">Pertenece al service del vehículo.</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-12">
               <div class="input-group">
                <span class="input-group-addon">Vehículo</span>
                <select class="form-control" name="patente" required>
                  <option selected hidden >Elegir:</option>
                  <?php
                  $conexion = new conexion;
                  $sql = "SELECT * FROM vehiculo 
                          INNER JOIN tipoVehiculo ON vehiculo.idTipoVehiculo = tipoVehiculo.idTipoVehiculo
                          WHERE vehiculo.estadoVehiculo = 'Fuera de servicio' 
                          ORDER BY vehiculo.idVehiculo ASC";
                  $resultado= $conexion -> query($sql);

                  while ($fila=mysqli_fetch_array($resultado)) {

                    echo "<option value=".$fila['idVehiculo'].">"
                    .$fila['idVehiculo'], " - " .$fila['marca'], " " .$fila['modelo'], " - [" .$fila['patente']. "]". " - " .$fila['tipoVehiculo'],
                    "</option>";     
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>


          <div class="form-group">
           <div class="col-md-12">
            <div class="row">
              <div class="col-md-6">
               <div class="input-group date">
                <span class="input-group-addon">Fecha de Reparación</span>
                <input type="date" class="form-control" name="entregado" required>
              </div>
            </div>

            <div class="col-md-6">
             <div class="input-group">
              <span class="input-group-addon">Costo</span><span class="input-group-addon">$</span>
              <input type="number" min="0" step=".01" class="form-control" value="00.00" name="costo" required>
            </div>
          </div> 

        </div>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-12">
       <div class="input-group">
        <span class="input-group-addon">Descripción</span>
        <textarea class="form-control" rows="3" id="comment" name="descripcion" placeholder="Describa el mantenimiento realizado en el vehículo." required></textarea>
      </div>
    </div>
  </div>


  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
     <button   type="submit" class="btn btn-success">Reportar</button>
     <button type="reset" class="btn btn-default">Cancelar</button>
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

</body>

<footer>
  <?php require_once $FOOTER_DIR; ?>
</footer>
</html>
