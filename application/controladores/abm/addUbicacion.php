<?php
	require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
	require_once $CONEXION_DIR;
  require_once $UBICACION_DIR;
  require_once $SESION_IN_DIR;


//Se traen los datos de los input y se guarda en una variable


  $latitudEmpleado = $_POST['latitud'];
  $longitudEmpleado = $_POST['longitud'];
  $rol = $_SESSION['rol'];
  $nombre= $_SESSION['nombre'] ;
  $apellido = $_SESSION['apellido'];
  $dni = $_SESSION['dni'] ;
  $idEmpleado= $_SESSION['id'];

  $ubicacion = new Ubicacion($idEmpleado, $latitudEmpleado , $longitudEmpleado);
  $ubicacion->insertarUbicacion();


  header("Location: " . $PANEL_CHOFER_HOST);
?>