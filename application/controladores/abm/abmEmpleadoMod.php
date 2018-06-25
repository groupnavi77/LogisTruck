<?php
 require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
 require_once $CONEXION_DIR;
 session_start();

$dni = $_POST['dni'];
$cuitCuil = $_POST['cuitCuil'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$fechaDeNacimiento = $_POST['fechaDeNacimiento'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$licencia = $_POST['tipoLicencia'];
$paisDeOrigen = $_POST['paisDeOrigen'];
$cargo = $_POST['cargo'];

$empleado = $_POST['empleado'];

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


if ($conexion->connect_error){
      die("La conexión con la base de datos ha fallado: " . $conexion->connect_error);   
      }

if ($empleado != 8){  //el sysadmin no se puede modificar


  $query = "UPDATE empleado 
              SET dniEmpleado = ? , cuitEmpleado = ? , nombresEmpleado = ? , apellidosEmpleado = ? ,
                fechaDeNacimiento = ? , emailEmpleado = ? , telefonoEmpleado = ? ,
                    tipoLicenciaConducir = ? , paisOrigenEmpleado = ?, idRol = ?
                        WHERE idEmpleado = $empleado ";

  $statement = $conexion->prepare($query);
  $statement->bind_param('sssssssssi', $dni, $cuitCuil, $nombres, $apellidos, $fechaDeNacimiento, $email, $telefono, $tipoLicencia, $paisDeOrigen, $idRol);
  $statement->execute();
  $statement->close();

  $query2 = "UPDATE login SET usuario = ?, pass = ? WHERE idEmpleado = $empleado";
    $statement = $conexion->prepare($query2);
  $statement->bind_param('ss', $usuario, $pass);
  $statement->execute();
  $statement->close();


  $conexion->close();
}

//Se redirige a la ventana ABM 
  header("Location: " . "http://localhost/application/vistas/modEmpleado.php");


?>