<?php
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
include $QR_LIB_DIR;
require_once $SESION_IN_DIR;
require_once $SESION_SUPER;


$usuario = $_SESSION['usuario'];
$idViaje = $_POST['boton'];
$sitio = $QR_SESION_HOST;

$conexion = new mysqli('localhost', 'root', '', 'pw2');
//$conexion = new mysqli('localhost:3307', 'root', '', 'pw2'); //Usar para proyecto de Jero

if ($conexion->connect_error){
  die("La conexión con la base de datos ha fallado: " . $conexion->connect_error);
}


$query = "SELECT viaje.destinoViaje, viaje.fechaViaje, viaje.presupuestoViaje,
vehiculo.marca, vehiculo.modelo, vehiculo.patente, empleado.nombresEmpleado, empleado.apellidosEmpleado
FROM viaje
INNER JOIN vehiculosdelviaje ON viaje.idViaje = vehiculosdelviaje.idViaje
INNER JOIN vehiculo ON vehiculo.idVehiculo = vehiculosdelviaje.idVehiculo
INNER JOIN choferesdelviaje ON choferesdelviaje.idViaje = viaje.idViaje
INNER JOIN empleado ON empleado.idEmpleado = choferesdelviaje.idEmpleado
WHERE viaje.idViaje = ?";



$statement = $conexion->prepare($query); //Se realiza el prepare statement
$statement->bind_param('i', $idViaje); //Se realiza el bindeo de los datos
$statement->execute(); //Se ejecuta
$resultado = $statement->get_result();
$row=mysqli_fetch_row($resultado);
$statement->close();
$conexion->close(); //Se cierra conexion con BD

if ($resultado->num_rows > 0){

	$destinoViaje= $row[0];
	$fechaViaje = $row[1];
	$presupuestoViaje = $row[2];
	$marcaVehiculo = $row[3];
	$modeloVehiculo = $row[4];
	$patenteVehiculo = $row[5];
  $nombreChofer = $row[6];
  $apellidoChofer = $row[7];

}
else{
	header("Location: " . $INDEX_HOST);
	session_destroy();
}


$datos = "Señor " . $nombreChofer . " " . $apellidoChofer . " su viaje con destino a " . $destinoViaje . " se realizara el dia " . $fechaViaje . " en el vehiculo " . $marcaVehiculo . " " . $modeloVehiculo . " dominio " . $patenteVehiculo . ". Cuenta con un presupuesto de " . $presupuestoViaje . " pesos. Para realizar los reportes inicie sesion del siguiente sitio " . $sitio;
  //
  // QRcode::png($datos,false,QR_ECLEVEL_Q,32);

  QRcode::png($datos,$QR_IMG_DIR .  $idViaje . '.png',FALSE,6);


  include $GENERAR_PDF_QR_DIR;
  ?>
