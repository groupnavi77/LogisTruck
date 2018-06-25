

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

function mostrarPosicion(posicion) {
    var lat = posicion.coords.latitude;
    var lon = posicion.coords.longitude;
    var latlon = new google.maps.LatLng(lat, lon)
    var mapa = document.getElementById('mapa')
    mapa.style.height = '350px';
    mapa.style.width = '400px';
    var myOptions = {
    center:latlon,zoom:14,
    mapTypeId:google.maps.MapTypeId.ROADMAP,
    mapTypeControl:false,
    navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
    }
    document.getElementById("lat").value=lat;
    document.getElementById("lon").value=lon;
    var map = new google.maps.Map(document.getElementById("mapa"), myOptions);
    var marker = new google.maps.Marker({position:latlon,map:map,title:"Uste esta aqui."});
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
