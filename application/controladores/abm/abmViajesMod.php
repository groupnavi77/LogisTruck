<?php
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;
session_start();

$idViaje = $_POST['idViaje'];
$origenViaje = $_POST['origenViaje'];
$destinoViaje = $_POST['destinoViaje'];
$chofer1 = $_POST['chofer1'];
$chofer2 = $_POST['chofer2'];
$idVehiculo1 = $_POST['idVehiculo1'];
$idVehiculo2 = $_POST['idVehiculo2'];
$fechaViaje =$_POST['fechaViaje'];
$kmRecorridoPrevisto = $_POST['recorridoPrevisto'];
$combustibleConsumidoPrevisto = $_POST['combustiblePrevisto'];
$presupuestoViaje = $_POST['presupuestoAsignado'];
$idEstadoViaje = 1;

$conexion = new Conexion();
if ($conexion->connect_error){
  die("La conexión con la base de datos ha fallado: " . $conexion->connect_error);   
}

$query1 = "UPDATE `viaje`
SET origenViaje = ?, destinoViaje = ?, fechaViaje = ?, kmRecorridoPrevisto = ?, combustibleConsumidoPrevisto = ?, presupuestoViaje = ? WHERE idViaje = $idViaje";

$statement = $conexion->prepare($query1);
$statement->bind_param('sssiis', $origenViaje, $destinoViaje, $fechaViaje, $kmRecorridoPrevisto,$combustibleConsumidoPrevisto, $presupuestoViaje);
$statement->execute();
$statement->close();


$query2 = "UPDATE `choferesDelViaje` SET idEmpleado = ? WHERE idViaje = $idViaje";

$statement = $conexion->prepare($query2);
$statement->bind_param('i', $chofer1);
$statement->execute();
$statement->close();

$query3 = "UPDATE `choferesDelViaje` SET idEmpleado = ? WHERE idViaje = $idViaje";

$statement = $conexion->prepare($query3);
$statement->bind_param('i', $chofer2);
$statement->execute();
$statement->close();  		


$query4 = "UPDATE `vehiculosDelViaje` SET idVehiculo = ? WHERE idViaje = $idViaje";

$statement = $conexion->prepare($query4);
$statement->bind_param('i', $idVehiculo1);
$statement->execute();
$statement->bind_param('i', $idVehiculo2);
$statement->execute();
$statement->close();    


$conexion->close();

/*vuelve al listado de viajes cargados*/
header("Location: " . "http://localhost/application/vistas/listaViajes.php");
?>