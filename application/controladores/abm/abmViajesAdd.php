<?php
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;
session_start();


$idViaje = '';
$origenViaje = $_POST['origenViaje'];
$destinoViaje = $_POST['destinoViaje'];
$chofer1 = $_POST['chofer1'];
$chofer2 = $_POST['chofer2'];
$idVehiculo1 = $_POST['idVehiculo1'];
$idVehiculo2 = $_POST['idVehiculo2'];
$fechaViaje =$_POST['fechaViaje'];
$kmRecorridoPrevisto = $_POST['recorridoPrevisto'];
$kmRecorridoReal = '';
$combustibleConsumidoPrevisto = $_POST['combustiblePrevisto'];
$combustibleConsumidoReal = '';
$presupuestoViaje = $_POST['presupuestoAsignado'];
$idEstadoViaje = 1;

  	$conexion = new Conexion();
  	if ($conexion->connect_error){
  		die("La conexión con la base de datos ha fallado: " . $conexion->connect_error);   
  	}
    		
  	$query =" INSERT INTO `viaje`(`idViaje`, `origenViaje`, `destinoViaje`, `fechaViaje`, `kmRecorridoPrevisto`, `kmRecorridoReal`, `combustibleConsumidoPrevisto`, `combustibleConsumidoReal`, `presupuestoViaje`, `idEstadoViaje`) VALUES (?,?,?,?,?,?,?,?,?,?)";
  	$statement = $conexion->prepare($query);
  	$statement->bind_param('isssiiiisi',$idViaje,$origenViaje,$destinoViaje,$fechaViaje,$kmRecorridoPrevisto,$kmRecorridoReal,$combustibleConsumidoPrevisto,$combustibleConsumidoReal,$presupuestoViaje,$idEstadoViaje);
  	$statement->execute();
  	$statement->close();

  	$idViaje=$conexion->insert_id; /*selecciona el ultimo id insertado y lo guarda en la variable idViaje*/
  	$query_chofer_viaje = "INSERT INTO `ChoferesDelViaje`(`idViaje`, `idEmpleado`) VALUES (?,?)";
  	$statement = $conexion->prepare($query_chofer_viaje);
  	$statement->bind_param('ii',$idViaje,$chofer1);
  	$statement->execute();
  	$statement->bind_param('ii',$idViaje,$chofer2);
  	$statement->execute();
  	$statement->close();		

  	$query_vehiculo_viaje = "INSERT INTO `VehiculosDelViaje`(`idVehiculo`, `idViaje`) VALUES (?,?)";
  	$statement = $conexion->prepare($query_vehiculo_viaje);
  	$statement->bind_param('ii',$idVehiculo1,$idViaje);
  	$statement->execute();
  	$statement->bind_param('ii',$idVehiculo2,$idViaje);
  	$statement->execute();
  	$statement->close();
  	$conexion->close();

  	/*vuelve al listado de viajes cargados*/
  	header("Location: " . "http://localhost/application/vistas/listaViajes.php");
  	?>