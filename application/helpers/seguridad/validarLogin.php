<?php
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;
session_start();

$user = $_POST['user'];
$password = $_POST['pass'];

$conexion = new conexion;
/*$db = new mysqli('localhost:3307','root','', 'pw2');*/


/*$query = "SELECT login.usuario, login.pass, rol.tipoRol FROM login INNER JOIN empleado ON login.idEmpleado = empleado.idEmpleado  INNER JOIN rol ON empleado.idRol = rol.idRol WHERE login.usuario = '$user' AND login.pass = '$password' ";
$resultado = $conexion->query($query);
$row=mysqli_fetch_row($resultado);*/


$query = "SELECT login.usuario, login.pass, rol.tipoRol, empleado.nombresEmpleado, empleado.apellidosEmpleado, empleado.dniEmpleado, empleado.idEmpleado FROM login INNER JOIN empleado ON login.idEmpleado = empleado.idEmpleado  INNER JOIN rol ON empleado.idRol = rol.idRol WHERE login.usuario = ? AND login.pass = ? ";
$statement = $conexion->prepare($query);
$statement->bind_param('ss',$user,$password);
$statement->execute();
$resultado = $statement->get_result();
$row=mysqli_fetch_row($resultado);

var_dump($row);


if ($resultado->num_rows > 0){

	$id = $row[6];
	$rol= $row[2];
	$nombre = $row[3];
	$apellido = $row[4];
	$dni = $row[5];


	$_SESSION['id'] = $id;
	$_SESSION['usuario'] = $user;
	$_SESSION['rol'] = $rol;
	$_SESSION['nombre'] = $nombre;
	$_SESSION['apellido'] = $apellido;
	$_SESSION['dni'] = $dni;
	$_SESSION["autentic"] = true;

	switch ($rol) {
		case 'administrador':
			header("Location: " . $PANEL_ADMIN_HOST);
			break;

		case 'mecanico':
			header("Location: " . $PANEL_MECANICO_HOST);
			break;

		case 'chofer':
			header("Location: " . $PANEL_CHOFER_HOST);
			break;

		case 'supervisor':
			header("Location: " . $PANEL_SUPERVISOR_HOST);
			break;

		case 'sysadmin':
			header("Location: " . $PANEL_ADMIN_HOST);
			break;

		default:
		header("Location: " . $INDEX_HOST);
		session_destroy();
		exit();
			break;
	}

}
else{
	header("Location: " . $INDEX_HOST);
	session_destroy();
}



?>
