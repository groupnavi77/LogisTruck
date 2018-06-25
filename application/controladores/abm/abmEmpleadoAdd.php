<?php
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;


//Se traen los datos de los input y se guarda en una variable
$idEmpleado;
$idRol;
$nombres = $_POST['nombres']; 
$apellidos = $_POST['apellidos'];
$dni = $_POST['dni'];
$cuitCuil = $_POST['cuitCuil'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$preguntaConduce = $_POST['preguntaConduce'];
$tipoLicencia = $_POST['tipoLicencia'];
$fechaDeNacimiento = $_POST['fechaDeNacimiento'];
$paisDeOrigen = $_POST['paisDeOrigen'];
$cargo = $_POST['cargo'];

$usuario = $_POST['usuario'];
$pass = $_POST['pass'];



//Condicion para setear el idRol segun lo elegido en el select cargo
if ($cargo == 'Administrador') {
 $idRol = 1;
}
if ($cargo == 'Chofer') {
 $idRol = 2;
}
if ($cargo == 'Mecánico') {
 $idRol = 3;
}
if ($cargo == 'Supervisor') {
 $idRol = 4;
}

$conexion = new conexion;

//Si la misma tiene un problema se muestra un mensaje por pantalla
if ($conexion->connect_error){
  die("La conexión con la base de datos ha fallado: " . $conexion->connect_error);   
}

//Se realiza la consulta a la bd
$query = "INSERT INTO empleado (dniEmpleado, cuitEmpleado, nombresEmpleado, apellidosEmpleado, fechaDeNacimiento, paisOrigenEmpleado, telefonoEmpleado, emailEmpleado, tipoLicenciaConducir, idRol) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

  $statement = $conexion->prepare($query); //Se realiza el prepare statement
  $statement->bind_param('sssssssssi', $dni, $cuitCuil, $nombres, $apellidos, $fechaDeNacimiento, $paisDeOrigen, $telefono, $email, $tipoLicencia, $idRol);
  $statement->execute(); //Se ejecuta
  $statement->close();

  $idEmpleado = $conexion->insert_id; //Devuelve el ultimo id autogenerado de la consulta anterior
  $query_login = "INSERT INTO `login`(`usuario`, `pass`, `idEmpleado`) VALUES (?, ?, ?)";
  $statement = $conexion->prepare($query_login);
  $statement->bind_param('ssi', $usuario, $pass, $idEmpleado);
  $statement->execute();
  $statement->close(); 


   $conexion->close(); //Se cierra la conexion a la base de datos


//Se redirige a la ventana ABM 
   header("Location: " . "http://localhost/application/vistas/altaDeEmpleado.php");

   ?>