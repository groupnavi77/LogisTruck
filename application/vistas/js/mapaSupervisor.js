

$(document).ready(function(){
if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(mostrarPosicion, showError);
    } else {
        x.innerHTML = "La geolocacion no es soportada por su navegador.";
    }
});


var x = document.getElementById("demo");
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(mostrarPosicion, showError);
    } else {
        x.innerHTML = "La geolocacion no es soportada por su navegador.";
    }
}


// $(document).ready(function(){
//   var lats = [];
//   var lons = [];
//   for (i = 0; $( "#lat" + i ).text() != ""; i++) {
//       lats[i] = $( "#lat" + i ).text();
//       lons[i] = $( "#lon" + i ).text();
//       console.log("probando recorrido de arrays");
//       console.log(lats[i]);
//       console.log(lats[i]);
//   }
// });

function mostrarPosicion(posicion) {

    var lat = posicion.coords.latitude;
    var lon = posicion.coords.longitude;
    var latlon = new google.maps.LatLng(lat, lon)
    // var latlon2 = new google.maps.LatLng(-34.6403973	, -58.54817869999999)
    var mapa = document.getElementById('mapa')
      mapa.style.height = '450px';
      mapa.style.width = '970px';

    var myOptions = {
    center:latlon,zoom:14,
    mapTypeId:google.maps.MapTypeId.ROADMAP,
    mapTypeControl:false,
    navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
    }
    var map = new google.maps.Map(document.getElementById("mapa"), myOptions);
    var lats = [];
    var lons = [];
    var latlons = [];
    var apes =[];
    var noms = [];
    for (i = 0; $( "#lat" + i ).text() != ""; i++) {
        lats[i] = $( "#lat" + i ).text();
        lons[i] = $( "#lon" + i ).text();
        apes[i] = $( "#ape" + i ).text();
        noms[i] = $( "#nom" + i ).text();
        latlon = new google.maps.LatLng(lats[i], lons[i])
        var marker = new google.maps.Marker({position:latlon,map:map,title:apes[i],label: {
    color: '#0D56D8',
    fontWeight: 'bolder',
    text: apes[i]+ " , " + noms[i],
  },});
        console.log("probando recorrido de arrays");
        console.log(lats[i]);
        console.log(lats[i]);
        console.log(apes[i]);
    }
}


function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            x.innerHTML = "La geolocacion ha sido denegada por el usuario";
            break;
        case error.POSITION_UNAVAILABLE:
            x.innerHTML = "La localizacion no esta disponible."
            break;
        case error.TIMEOUT:
            x.innerHTML = "El timepo de espera ha expirado"
            break;
        case error.UNKNOWN_ERROR:
            x.innerHTML = "Ha ocurrido un error inesperado."
            break;
    }
}
