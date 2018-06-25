<?php
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;
session_start();

$setPass = $_POST['setPass'];
$usuario = $_SESSION['usuario'];
$confirmPass = $_POST['confirmPass'];

if ($setPass==$confirmPass) {
	$conexion = new Conexion();
	$query = "UPDATE login SET pass = ? WHERE usuario = '$usuario'";
	$statement= $conexion->prepare($query);
	$statement->bind_param('s', $setPass);
	$statement->execute();
	$statement->close();
	$conexion->close();
	header("Location: " . "http://localhost/application/vistas/settings.php");
}

else{
	echo ("Las contraseñas no coinciden");
}
?>