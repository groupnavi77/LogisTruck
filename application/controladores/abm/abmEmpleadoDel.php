<?php
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;
session_start();


  //Se trae el id del empleado seleccionado mediante el checkbox de la tabla
$idEmpleado = $_POST['empleadoSeleccionado'];

  //Se realiza la conexion con la bd
$conexion = new conexion;

//Si la misma tiene un problema se muestra un mensaje por pantalla
if ($conexion->connect_error){
  die("La conexión con la base de datos ha fallado: " . $conexion->connect_error);
}

//aca separo para el query los seleccionadsos
for ($i=0; $i<count($idEmpleado); $i++) {
  $idsBorrar = implode($idEmpleado, ', ');
}

//aca me fijo que no este el ID del sysadmin, osea el 8, si esta redirige sin hacer nada
if (strpos($idsBorrar, '8') == true){
  header("Location: " . "http://localhost/application/vistas/planillaDeEmpleados.php");
}
else {
  $query = "DELETE FROM empleado WHERE idEmpleado IN ($idsBorrar) ";
  $conexion->query($query);
  $conexion->close();
}



//Se redirige a la ventana ABM
header("Location: " . "http://localhost/application/vistas/planillaDeEmpleados.php");

?>
