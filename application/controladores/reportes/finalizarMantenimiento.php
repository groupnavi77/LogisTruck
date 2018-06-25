<?php
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;
session_start();

$idVehiculo = $_POST['vehiculoSeleccionado'];

$conexion = new conexion;

if ($conexion->connect_error){
	die("La conexión con la base de datos ha fallado: " . $conexion->connect_error);   
}

for ($i=0; $i<count($idVehiculo); $i++) {
	$idsBorrar = implode($idVehiculo, ', ');
}

$query = " UPDATE vehiculo SET estadoVehiculo = 'Disponible' WHERE idVehiculo IN ($idsBorrar) ";

$conexion->query($query);
$conexion->close(); //Se cierra conexion con BD


header("Location: " . "http://localhost/application/vistas/vehiculosFueraDeServicio.php"); //Redirijo



?>