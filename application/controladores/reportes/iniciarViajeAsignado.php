<?php
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;
session_start();

$idEstadoViajeNuevo = 2; // con 2 EL VIAJE PASA A "EN CURSO"
$idEmpleadoLogueado = $_SESSION['id']; //Traigo el id del empleado logueado, para verificar si es el chofer del viaje
$kilometraje = $_POST['kilometraje'];
$latitud = $_POST['latitud'];
$longitud = $_POST['longitud'];
$idTipoReporte = 1; //el tipo de reporte 1 es iniciar viaje

$conexion = new conexion;

if ($conexion->connect_error){
	die("La conexión con la base de datos ha fallado: " . $conexion->connect_error);   
}


$queryViaje = "SELECT viaje.idViaje, choferesdelviaje.idEmpleado, viaje.idEstadoViaje, vehiculo.idVehiculo FROM viaje
INNER JOIN choferesdelviaje ON viaje.idViaje = choferesdelviaje.idViaje
INNER JOIN VehiculosDelViaje ON vehiculosDelViaje.idViaje = viaje.idViaje
INNER JOIN vehiculo ON vehiculo.idVehiculo = VehiculosDelViaje.idVehiculo 
WHERE choferesdelviaje.idEmpleado = $idEmpleadoLogueado /* traigo los viajes del empleado logueado */
ORDER BY fechaViaje ASC LIMIT 1";

$resultado = $conexion->query($queryViaje);
$row = mysqli_fetch_row($resultado);
$idViaje = $row[0]; //traigo el valor del idViaje y lo guardo en esta variable
$idEmpleadoViaje = $row[1]; //traigo el idEmpleado asignado en ese viaje
$idEstadoViajeActual = $row[2];
$idVehiculo = $row[3];

if ($idEmpleadoLogueado == $idEmpleadoViaje AND $idEstadoViajeActual == 1) // si id del empleado logueado es = al empleado asignado en ese viaje hago el update, y el estado del viaje tiene que ser (1)PLANIFICADO
{

	$query = "UPDATE `viaje` SET `idEstadoViaje` = ? WHERE `idViaje` = $idViaje";

	$statement = $conexion->prepare($query);
	$statement->bind_param('i', $idEstadoViajeNuevo);
	$statement->execute();
	$statement->close();


	$query2 = "INSERT INTO reporte (`latitud`, `longitud`, `kilometrajeVehiculo`, `idTipoReporte`, `idEmpleado`, `idViaje`, idVehiculo) VALUES (?, ?, ?, ?, ?, ?, ?)";

	$statement = $conexion->prepare($query2);
	$statement->bind_param('ddiiiii', $latitud, $longitud, $kilometraje, $idTipoReporte, $idEmpleadoLogueado, $idViaje, $idVehiculo);
	$statement->execute();
	$statement->close();

	$conexion->close();
}

//Se redirige a la ventana ABM 
header("Location: " . "http://localhost/application/vistas/panelControlChofer.php");

?>