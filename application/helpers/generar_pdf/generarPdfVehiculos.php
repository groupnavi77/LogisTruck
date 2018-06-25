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
$sql = "SELECT * FROM vehiculo INNER JOIN tipovehiculo ON vehiculo.idTipoVehiculo = tipovehiculo.idTipoVehiculo";
$resultado= $mysqli->query($sql);

$html  =  "<html>";
$html .=  "<body>";
$html .=  "<img src='../../vistas/img/logo1.png' />";
$html .=  "<h2>| Listado de Vehículos |</h2>";
$html .=  "<table>";
$html .=  "<thead>";
$html .=  "<tr>";
$html .=  "<th>ID</th>";
$html .=  "<th>Patente</th>";
$html .=  "<th>Marca</th>";
$html .=  "<th>Modelo</th>";
$html .=  "<th>Tipo</th>";
$html .=  "<th>Año</th>";
$html .=  "<th>Nº Chasis</th>";
$html .=  "<th>Nº Motor</th>";
$html .=  "<th>Kilometraje</th>";
$html .=  "<th>Capacidad</th>";
$html .=  "<th>Precio</th>";
$html .=  "</tr>";
$html .=  "</thead>";
$html .=  "<tbody>";


while ($fila = $resultado->fetch_assoc()){

    $html .= "<tr>";
    $html .= "<td>" . $fila['idVehiculo'] . "</td>";
    $html .= "<td>" . $fila['patente'] . "</td>";
    $html .= "<td>" . $fila['marca'] . "</td>";
    $html .= "<td>" . $fila['modelo'] . "</td>";
    $html .= "<td>" . $fila['tipoVehiculo'] . "</td>";
    $html .= "<td>" . $fila['anioDeFabricacion'] . "</td>";
    $html .= "<td>" . $fila['numeroDeChasis'] . "</td>";
    $html .= "<td>" . $fila['numeroDeMotor'] . "</td>";
    $html .= "<td>" . $fila['kmVehiculo'] . " Km" . "</td>";
    $html .= "<td>" . $fila['capacidadCarga'] . " Kg" . "</td>";
    $html .= "<td>" . "$ " . $fila['costo'] .  "</td>";
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
$dompdf->stream('listadoVehiculos.pdf'); // Enviar el PDF generado al navegador

?>