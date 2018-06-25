<?php 
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;
session_start();

$entregado = $_POST['entregado'];
$patente = $_POST['patente'];
$descripcion = $_POST['descripcion'];
$operacion = $_POST['operacion'];
$costo = $_POST['costo'];
$service = $_POST['service'];
$tipoMantenimiento = $_POST['tipoMantenimiento'];
$mantenimientoInterno;
$mantenimientoExterno;
$id = $_SESSION['id'];


if ($tipoMantenimiento == "interno") {
	$mantenimientoInterno = TRUE;

}
else if ($tipoMantenimiento == "externo") {
	$mantenimientoExterno = TRUE;

}

$conexion = new conexion;

if ($conexion->connect_error){
  die("La conexión con la base de datos ha fallado: " . $conexion->connect_error);   
}


$query= "INSERT INTO `servicio` (`fechaReparacion`, `descripcionReparacion`, `costoReparacion`, `service`, `arregloExternoReparacion`, `arregloInternoReparacion`, `idEmpleado`, `idVehiculo`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)" ;

$statement = $conexion->prepare($query);
$statement->bind_param('ssdiiiii',$entregado, $descripcion, $costo, $service, $mantenimientoExterno, $mantenimientoInterno, $id, $patente);
$statement->execute();
$statement->close();


header("Location: " . "http://localhost/application/vistas/panelControlMecanico.php"); //Se redirige a la ventana ABM 
?>
