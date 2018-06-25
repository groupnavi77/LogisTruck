<head>
  <?php require_once $HEADER_DIR; ?>  
</head>


<div id="barraMenu">
  <div class="col-md-2 hidden-xs" >
    <div class="panel panel-primary" >
      <div class="panel">

        <div class="panel-body">
          <a href="" class="thumbnail hidden-xs">
            <img src="img/user.png" class="img-responsive" width="70%">
          </a>

          <div class="caption">
            <a href="" class="thumbnail visible-xs">
              <img src="img/user.png" class="img-responsive" width="20%">
            </a>
            
            <h4 class="text-center" style="font-weight: bold"><?php echo $_SESSION['nombre'].' '. $_SESSION['apellido'];?></h4>
            <h5 class="text-center">Usuario: <?php echo $_SESSION['usuario'];?></h5>
            <h5 class="text-center">DNI: <?php echo $_SESSION['dni'];?></h5>
            <h5 class="text-center">Cargo: <?php echo $_SESSION['rol'];?></h5>
          </div>
        </div>

          <ul class="nav nav-navbar hidden-xs" style="font-weight: bold">
            <li class="text-center"><a href="panelControlAdmin.php">Inicio</a></li>
            <li class="text-center"><a href="settings.php">Mi Cuenta</a></li>
            <!-- <li class="text-center"><a href="">Ayuda</a></li> -->
          </ul>

        </div>
      </div>
    </div>