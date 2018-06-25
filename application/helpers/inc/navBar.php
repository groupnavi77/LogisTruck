<?php require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php"; ?>

<nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">

    <div class="navbar-header">
       <span class="navbar-brand"><a class="visible-xs" href="panelControlAdmin.php"><img class="img-responsive" src="../vistas/img/logo3.png"  width="80%"></a></span>
      <span class="navbar-brand"><a class="hidden-xs" href="panelControlAdmin.php"><img class="img-responsive" src="../vistas/img/logo3.png"  width="28%"></a></span>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">

        <span class="sr-only">LogisTruck</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="visible-xs" ><a href="settings.php"><span class="glyphicon glyphicon-user"></span> Mi Cuenta</a></li>
        <?php if ($_SESSION['rol'] === 'sysadmin'){
         echo "<li class='' ><a href='panelControlAdmin.php'>Panel Administrador</a></li>";
         echo "<li class='' ><a href='panelControlSupervisor.php'>Panel Supervisor</a></li>";
         echo "<li class='' ><a href='panelControlChofer.php'>Panel Chofer</a></li>";
         echo "<li class='' ><a href='panelControlMecanico.php'>Panel Mecanico</a></li>";
       }
       ?>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class=""><a href="<?php echo $SESION_OUT_HOST ?>"><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesión</a></li>
      </ul>

    </div>

  </div>
</nav>
