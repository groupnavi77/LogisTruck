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
$sql = "SELECT * FROM viaje
                    INNER JOIN estadoViaje ON viaje.idEstadoViaje = estadoViaje.idEstadoViaje
                    INNER JOIN ChoferesDelViaje cv ON cv.idViaje = viaje.idViaje
                    INNER JOIN VehiculosDelViaje vv ON vv.idViaje = viaje.idViaje
                    INNER JOIN vehiculo ON vehiculo.idVehiculo = vv.idVehiculo
                    INNER JOIN tipoVehiculo ON tipoVehiculo.idTipoVehiculo = vehiculo.idTipoVehiculo
                    INNER JOIN empleado ON empleado.idEmpleado = cv.idEmpleado
                    WHERE vehiculo.idTipoVehiculo = 1
                    GROUP BY viaje.idViaje";

$resultado= $mysqli->query($sql);

$html  =  "<html>";
$html .=  "<body>";
$html .=  "<img src='../../vistas/img/logo1.png' />";
$html .=  "<h2>| Listado de Viajes |</h2>";
$html .=  "<table>";
$html .=  "<thead>";
$html .=  "<tr>";
$html .=  "<th>ID</th>";
$html .=  "<th>Chofer 1</th>";
$html .=  "<th>Camión</th>";
$html .=  "<th>Patente</th>";
$html .=  "<th>Salida</th>";
$html .=  "<th>Destino</th>";
$html .=  "<th>Fecha de Salida</th>";
$html .=  "<th>Distancia</th>";
$html .=  "<th>Estado</th>";
$html .=  "</tr>";
$html .=  "</thead>";
$html .=  "<tbody>";


while ($fila = $resultado->fetch_assoc()){

    $html .= "<tr>";
    $html .= "<td>" . $fila['idViaje'] . "</td>";
    $html .= "<td>"  . "(" . $fila['idEmpleado']. ") " .  $fila['nombresEmpleado'] . ", " . $fila['apellidosEmpleado'] . "</td>";
    $html .= "<td>" . $fila['marca'] ." - ". $fila['modelo'] . "</td>";
    $html .= "<td>" . $fila['patente'] . "</td>";
    $html .= "<td>" . $fila['origenViaje'] . "</td>";
    $html .= "<td>" . $fila['destinoViaje'] . "</td>";
    $html .= "<td>" . $fila['fechaViaje'] . "</td>";
    $html .= "<td>" . $fila['kmRecorridoPrevisto'] . " Km" . "</td>";
    $html .= "<td>" . $fila['tipoEstadoViaje'] . "</td>";
    $html .= "</tr>";
}

$html .=  "</tbody>";
$html .=  "</table>";
$html .= '</body></html>';

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape'); // (Opcional) Configurar papel y orientación
$dompdf->render(); // Generar el PDF desde contenido HTML
$pdf = $dompdf->output(); // Obtener el PDF generado
$dompdf->stream('listadoViajes.pdf'); // Enviar el PDF generado al navegador

?>