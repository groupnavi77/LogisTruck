<?php
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
require_once $CONEXION_DIR;
require_once $SESION_IN_DIR;
require_once $SESION_ADMIN;

$conexion = new Conexion;


//selecciona cantidades para cada estado de viaje
$query = "SELECT estadoviaje.tipoEstadoViaje as 'Estado de viaje', COUNT(viaje.idViaje) as 'Cantidad de viajes'
FROM viaje
RIGHT JOIN estadoviaje
ON viaje.idEstadoViaje = estadoviaje.idEstadoViaje
GROUP BY estadoviaje.tipoEstadoViaje";

$resultado = $conexion->query($query);

$estadoViajes=array(array('Estado de viaje', 'Cantidad de viajes'));

while ($fila = mysqli_fetch_array($resultado)) {
  $estadoViajes[] = array($fila['Estado de viaje'],(int)$fila['Cantidad de viajes']);
}


$query="SELECT estadoVehiculo AS 'Estado', COUNT(estadoVehiculo) AS 'Cantidad de vehiculos'
FROM vehiculo GROUP BY estadoVehiculo";
$resultado = $conexion->query($query);

$estadoVehiculos=array(array('Estado del vehiculo', 'Cantidad de vehiculos'));

while ($fila = mysqli_fetch_array($resultado)) {
  $estadoVehiculos[] = array($fila['Estado'],(int)$fila['Cantidad de vehiculos']);
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once $HEADER_DIR; ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


</head>

<body>

  <?php require_once $NAVBAR_DIR; ?>

  <div class="container-fluid">
    <div class="row">


      <?php require_once $PANEL_LATERAL_PERFIL_DIR; ?>

      <!-- aca empieza el contenido de lo fuera de la barra lateral-->
      <div class="col-sm-9 main">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="panelControlAdmin.php">Inicio</a></li>
          <li class="breadcrumb-item active">Visualizar estadísticas</li>
        </ol>

    <div class="col-sm-9 main">
      <div class="container-fluid">

        <!--       Hay que usar GOOGLE CHARTS
             Se podrian hacer graficos comparando los viajes planificados, en curso y finalizados
             Comparar cuantos vehiculos estan en servicio y cuantos fuera de servicio
             Comparar en un viaje el kilometraje aproximado que se asigno con el real. Con esos datos hardcordeados, no calculables
        -->

<!-- grafico de estado de viajes-->

         <div id="chart_div_1"></div>

         <script type="text/javascript">
           google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawStacked);

function drawStacked() {
      var data = google.visualization.arrayToDataTable(

      <?php echo json_encode($estadoViajes);?>
        );

      var options = {
        title: 'Estado de viajes',
        chartArea: {width: '50%'},
        isStacked: true,
        hAxis: {
          title: 'Cantidad de viajes',
          minValue: 0,
        },
        vAxis: {
          title: 'Estado'
        }
      };
      var chart = new google.visualization.BarChart(document.getElementById('chart_div_1'));
      chart.draw(data, options);
    }
         </script>

  <!-- fin grafico estado de viajes-->



           <div id="piechart"></div>

         <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable(
          <?php echo json_encode($estadoVehiculos);?>
          );

        var options = {
          title: 'Estado de vehiculos'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>


      </div>
    </div>


</body>

<footer>
  <?php require_once $FOOTER_DIR; ?>
</footer>
</html>
