<?php
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;
session_start();


$kilometraje = $_POST['kilometraje'];
$idEmpleado= $_SESSION['id'];
$idTipoReporte = 5;
$latitud = $_POST['latitud'];
$longitud = $_POST['longitud'];


$conexion = new conexion;

if ($conexion->connect_error){
	die("La conexión con la base de datos ha fallado: " . $conexion->connect_error);
}
$queryViaje = "SELECT viaje.idViaje, viaje.idEstadoViaje, vehiculo.idVehiculo FROM viaje
INNER JOIN choferesdelviaje ON viaje.idViaje = choferesdelviaje.idViaje
INNER JOIN VehiculosDelViaje ON vehiculosDelViaje.idViaje = viaje.idViaje
INNER JOIN vehiculo ON vehiculo.idVehiculo = VehiculosDelViaje.idVehiculo
WHERE choferesdelviaje.idEmpleado = $idEmpleado ORDER BY fechaViaje ASC LIMIT 1";
$resultado = $conexion->query($queryViaje);
$row=mysqli_fetch_row($resultado);
$idViaje = $row[0];
$idEstadoViaje = $row[1];
$idVehiculo = $row[2];



if ($idEstadoViaje != 3 AND $idViaje != NULL){

	$query = "INSERT INTO reporte (`kilometrajeVehiculo`, `latitud`, `longitud`, `idTipoReporte`, `idEmpleado`,  `idViaje`, idVehiculo ) VALUES (?,?,?,?,?, ?, ?)";

	$statement = $conexion->prepare($query);
	$statement->bind_param('iddiiii', $kilometraje,  $latitud, $longitud,  $idTipoReporte, $idEmpleado,$idViaje,$idVehiculo);

	$statement->execute();
	$statement->close();
	$conexion->close();

}
//Se redirige a la ventana ABM
header("Location: " . "http://localhost/application/vistas/reportarIncidente.php");

?>
