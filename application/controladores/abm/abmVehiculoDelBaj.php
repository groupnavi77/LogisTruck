<?php
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;
session_start();


$idVehiculo = $_POST['vehiculoSeleccionado']; //traigo id del seleccionado por checkbox de la tabla
$botonElegido = $_POST['abmVehiculo']; //Traigo el name del boton elegido


$conexion = new conexion; //Se realiza la conexion con la bd


if ($conexion->connect_error){
	die("La conexión con la base de datos ha fallado: " . $conexion->connect_error);
}

//Switch para realizar baja por mantenimiento o borrado definitivo de la flota

switch ($botonElegido) {
	case 'bajaPorMantenimiento':

	for ($i=0; $i<count($idVehiculo); $i++) {
		$idsToDelete = implode($idVehiculo, ', ');
	}

	$query = "UPDATE vehiculo SET estadoVehiculo = 'Fuera de Servicio' WHERE idVehiculo  IN ($idsToDelete) ";
	$conexion->query($query);


	header("Location: " . "http://localhost/application/vistas/listaVehiculos.php"); //Redirijo
	break;

	case 'borrar':

	for ($i=0; $i<count($idVehiculo); $i++) {
		$idsToDelete = implode($idVehiculo, ', ');
	}

	$query = "DELETE FROM vehiculo WHERE idVehiculo IN ($idsToDelete) ";
	$conexion->query($query);
	header("Location: " . "http://localhost/application/vistas/listaVehiculos.php");
	break;


	default:
	header("Location: " . "http://localhost/application/vistas/listaVehiculos.php");
		break;

}






?>
