<?php
require_once '../dompdf/autoload.inc.php';


use Dompdf\Dompdf;



$html  =  "<html>";
$html .=  "<body>";
$html .=  "<img src='../../vistas/img/logo1.png' />";
$html .=  "<br>";
$html .=  "<br>";
$html .=  "<h2> Codigo QR de su Viaje </h2>";
$html .=  "<br>";
$html .=  "<h3> Chofer <small>" . $nombreChofer . " " . $apellidoChofer .  "</small> </h3>";
$html .=  "<br>";
$html .=  "<br>";
$html .=  "<img src='../qrImage/" . $idViaje . ".png' />";
$html .= '</body></html>';


// echo $html; exit;  // para mostrar que voy a imprimir, comentarlo para que se genere el pdf

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'vertical'); // (Opcional) Configurar papel y orientación
$dompdf->render(); // Generar el PDF desde contenido HTML
$pdf = $dompdf->output(); // Obtener el PDF generado
$dompdf->stream('QrViaje' . $idViaje . '.pdf'); // Enviar el PDF generado al navegador

?>
