<?php
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;



class Ubicacion{




  private $idEmpleado;
  private $dniEmpleado;
  private $latitudEmpleado;
  private $longitudEmpleado;

  public function __construct($idEmpleado , $latitudEmpleado , $longitudEmpleado){

       $this->idEmpleado = $idEmpleado;
       $this->latitudEmpleado = $latitudEmpleado;
       $this->longitudEmpleado = $longitudEmpleado;

  }

  public function insertarUbicacion(){

    $conexion = new Conexion();
    if ($conexion->connect_error){
      die("La conexión con la base de datos ha fallado: " . $conexion->connect_error);
    }
    $query =" INSERT INTO `ubicacion`(`idEmpleado`, `latitud`, `longitud`) VALUES (?,?,?)";
    $statement = $conexion->prepare($query);
    $statement->bind_param('idd',$this->idEmpleado,$this->latitudEmpleado,$this->longitudEmpleado);
    $statement->execute();
    $statement->close();
    $conexion->close();


  }

  public function mostrarUbicacionEmpleado($idEmpleado){
    $conexion = new Conexion();
    if ($conexion->connect_error){
      die("La conexión con la base de datos ha fallado: " . $conexion->connect_error);
    }
    $query =" SELECT `idEmpleado`,`latitud`,`longitud` FROM ubicacion WHERE idEmpleado = ?";
    $statement = $conexion->prepare($query);
    $statement->bind_param('i',$idEmpleado);
    $statement->execute();  
    $resultado = $statement->get_result();
    $statement->close();
    $conexion->close();
    $row=mysqli_fetch_row($resultado);

    if ($resultado->num_rows > 0){

    	return $resultado;
    }
    else{
      	header("Location: " . $INDEX_HOST);
      	session_destroy();
    }
  }


}


/*echo 	$latitud . "<br>";

echo 	$longitud . "<br>";

echo 	$id . "<br>";

echo	$rol . "<br>";

echo	$nombre . "<br>";

echo	$apellido . "<br>";

echo	$dni . "<br>";*/


?>
