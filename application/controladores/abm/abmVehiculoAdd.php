<?php
	require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
	require_once $CONEXION_DIR;
  session_start();


//Se traen los datos de los input y se guarda en una variable
  
  $idVehiculo; 
  $idTipoVehiculo;
  $marcaVehiculo = $_POST['marcaVehiculo'];
  $modeloVehiculo = $_POST['modeloVehiculo'];
  $tipoVehiculo = $_POST['tipoVehiculo'];
  $patenteVehiculo = $_POST['patenteVehiculo'];
  $numeroDeChasisVehiculo = $_POST['numeroDeChasisVehiculo'];
  $numeroDeMotorVehiculo = $_POST['numeroDeMotorVehiculo'];
  $anioDeFabricacionVehiculo = $_POST['anioDeFabricacionVehiculo'];
  $kmVehiculo = $_POST['kmVehiculo'];
  $capacidadCargaVehiculo = $_POST['capacidadCargaVehiculo'];
  $estadoVehiculo = $_POST['estadoVehiculo'];
  $costoVehiculo = $_POST['costoVehiculo'];


//Condicion para setear el idTipoVehiculo segun lo elegido en el select tipo
  if ($tipoVehiculo == 'Camión') {
     $idTipoVehiculo = 1;
  }

  else if ($tipoVehiculo == 'Acoplado') {
     $idTipoVehiculo = 2;
  }


//Se realiza la conexion con la bd
  $conexion = new conexion;

//Si la misma tiene un problema se muestra un mensaje por pantalla
  if ($conexion->connect_error){
      die("La conexión con la base de datos ha fallado: " . $conexion->connect_error);   
      }

//Se realiza la consulta a la bd
  $query = "INSERT INTO vehiculo (idVehiculo, patente, marca, modelo, numeroDeChasis, numeroDeMotor, anioDeFabricacion, costo, capacidadCarga, estadoVehiculo, kmVehiculo, idTipoVehiculo)  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

//Se realiza el prepare statement
  $statement = $conexion->prepare($query);

//Se realiza el bindeo de los datos
  $statement->bind_param('isssssiissii', $idVehiculo, $patenteVehiculo, $marcaVehiculo, $modeloVehiculo, $numeroDeChasisVehiculo, $numeroDeMotorVehiculo, $anioDeFabricacionVehiculo, $costoVehiculo, $capacidadCargaVehiculo, $estadoVehiculo, $kmVehiculo, $idTipoVehiculo);

//Se ejecuta
  $statement->execute();
  $statement->close();

//Se cierra la conexion a la base de datos
  $conexion->close();

//Se redirige a la ventana ABM 
  header("Location: " . "http://localhost/application/vistas/addVehiculo.php");

?>