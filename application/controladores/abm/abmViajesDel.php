<?php
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;
session_start();


$idViaje = $_POST['viajeSeleccionado'];

$conexion = new conexion;

if ($conexion->connect_error){
  die("La conexión con la base de datos ha fallado: " . $conexion->connect_error);
}
for ($i=0; $i<count($idViaje); $i++) {
  $idsBorrar = implode($idViaje, ', ');
}

$query = "DELETE FROM viaje WHERE idViaje IN ($idsBorrar) ";
$conexion->query($query);
$conexion->close(); //Se cierra conexion con BD


header("Location: " . "http://localhost/application/vistas/listaViajes.php"); //Se redirige a la ventana ABM
?>
