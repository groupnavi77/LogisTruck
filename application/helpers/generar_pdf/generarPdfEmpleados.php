<?php
require_once '../dompdf/autoload.inc.php';
session_start();

  if(!$_SESSION["autentic"]){
        header("Location:  http://localhost/application/vistas/index.php");
        session_destroy();

  }

use Dompdf\Dompdf;


$mysqli = new mysqli('localhost', 'root', '', 'pw2'); //Usar para los que tenemos puerto 3306 por defecto
//$mysqli = new mysqli('localhost:3307', 'root', '', 'pw2'); //Usar para el proyecto de Jero


// $conexion = New conexion();
$sql = "SELECT * FROM empleado INNER JOIN rol ON empleado.idRol = rol.idRol";
$resultado= $mysqli->query($sql);

$html  =  "<html>";
$html .=  "<body>";
$html .=  "<img src='../../vistas/img/logo1.png' />";
$html .=  "<h2>| Listado de Empleados |</h2>";
$html .=  "<table>";
$html .=  "<thead>";
$html .=  "<tr>";
$html .=  "<th>ID</th>";
$html .=  "<th>Nombres</th>";
$html .=  "<th>Apellidos</th>";
$html .=  "<th>DNI</th>";
$html .=  "<th>Pais de origen</th>";
$html .=  "<th>Fecha de nacimiento</th>";
$html .=  "<th>Tipo de licencia</th>";
$html .=  "<th>Cargo</th>";
$html .=  "<th>Teléfono</th>";
$html .=  "<th>Email</th>";
$html .=  "</tr>";
$html .=  "</thead>";
$html .=  "<tbody>";


while ($fila = $resultado->fetch_assoc()){

    $html .= "<tr>";
    $html .= "<td>" . $fila['idEmpleado'] . "</td>";
    $html .= "<td>" . $fila['nombresEmpleado'] . "</td>";
    $html .= "<td>" . $fila['apellidosEmpleado'] . "</td>";
    $html .= "<td>" . $fila['dniEmpleado'] . "</td>";
    $html .= "<td>" . $fila['paisOrigenEmpleado'] . "</td>";
    $html .= "<td>" . $fila['fechaDeNacimiento'] . "</td>";
    $html .= "<td>" . $fila['tipoLicenciaConducir'] . "</td>";
    $html .= "<td>" . $fila['tipoRol'] . "</td>";
    $html .= "<td>" . $fila['telefonoEmpleado'] . "</td>";
    $html .= "<td>" . $fila['emailEmpleado'] . "</td>";
    $html .= "</tr>";
}

$html .=  "</tbody>";
$html .=  "</table>";
$html .= '</body></html>';

// echo $html; exit;  // para mostrar que voy a imprimir, comentarlo para que se genere el pdf

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape'); // (Opcional) Configurar papel y orientación
$dompdf->render(); // Generar el PDF desde contenido HTML
$pdf = $dompdf->output(); // Obtener el PDF generado
$dompdf->stream('listadoEmpleados.pdf'); // Enviar el PDF generado al navegador

?>