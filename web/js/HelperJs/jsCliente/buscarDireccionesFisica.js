var map;
var geocoder = new google.maps.Geocoder();
var marker;
var geos;


function initialize() {
  var myLatlng = new google.maps.LatLng(19.2846069,-99.5287891);
  var myOptions = {
    zoom: 10,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map($("#map_canvasF").get(0), myOptions);
  console.log("Ha inicializado el script fisico");
}

function buscarCoordenadasFisicaOriginal() {
  // Obtenemos la dirección y la asignamos a una variable
  console.log("Ya entre");
  var latitudFi = $('#latitudF').val();
  var longitudFi = $ ('#longitudF').val();
  var latlngF = new google.maps.LatLng(latitudFi,longitudFi);
  console.log("Tengo las coordenadas"+latlngF);
  geocoder.geocode({'location':latlngF}, function(results, status){
    console.log("Tengo estatus" + status);
    if (status == google.maps.GeocoderStatus.OK) {
      if (results[1]) {
        var mapOptions = {
          center: results[1].geometry.location,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map($("#map_canvasF").get(0), mapOptions);
        map.fitBounds(results[1].geometry.viewport);
        marker=new google.maps.Marker({
          position:latlngF,
        });
        marker.setMap(map);
        var latF = results[1].geometry.location.lat();
        var lngF = results[1].geometry.location.lng();

      }
      else {
        alert("Sin resultados");
      }

    }
    else {
      window.alert("Geocoder fallo"+status);
    }

  });

}

function buscarCoordenadasFisicaC() {
  // Obtenemos la dirección y la asignamos a una variable
  console.log("Ya entre en el segundo script");
  var latitudFi = $('#latitudF').val();
  var longitudFi = $ ('#longitudF').val();
  var latlngF = new google.maps.LatLng(latitudFi,longitudFi);
  geocoder.geocode({'location':latlngF}, function(results, status){
    console.log("Tengo estatus" + status);
    if (status == google.maps.GeocoderStatus.OK) {
      if (results[1]) {
        var mapOptions = {
          center: results[1].geometry.location,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map($("#map_canvasF").get(0), mapOptions);
        map.fitBounds(results[1].geometry.viewport);
        marker=new google.maps.Marker({
          position:latlngF,
          draggable: true
        });
        marker.setMap(map);
        var latF = results[1].geometry.location.lat();
        var lngF = results[1].geometry.location.lng();
        console.log("lati" + latF+(",")+("Longi")+lngF);
      }
      else {
        alert("Las coordenadas no dieron resultados");
      }

    }
    else {
      window.alert("Hubo problemas al encontrar la ubicacion de las coordenadas");
    }

    google.maps.event.addListener(marker, 'dragend', function(event) {

      var myLatLng = event.latLng;
      lat = myLatLng.lat();
      lng = myLatLng.lng();
      $('#latitudF').val(lat);
      $('#longitudF').val(lng);

    });

  });

}

function buscarDireccionFisica() {
  console.log("Ya ingrese");
  var address = $('#addressFi').val();
  console.log(address);
  geocoder.geocode( { 'address': address}, function(results, status){
    console.log(status);
    if (status == google.maps.GeocoderStatus.OK) {

      var mapOptions = {
        center: results[0].geometry.location,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      map = new google.maps.Map($("#map_canvasF").get(0), mapOptions);
      map.fitBounds(results[0].geometry.viewport);
      marker = new google.maps.Marker({
        position: results[0].geometry.location,
        draggable: true
      });
      marker.setMap(map);
      var latF = results[0].geometry.location.lat();
      var lngF = results[0].geometry.location.lng();
      $('#latitudF').val(latF);
      $ ('#longitudF').val(lngF);
      console.log("lati" + latF+(",")+("Longi")+lngF);
    }
    else {
      window.alert("No hubo resultados");
    }

    google.maps.event.addListener(marker, 'dragend', function(event) {

      var myLatLng = event.latLng;
      lat = myLatLng.lat();
      lng = myLatLng.lng();
      $('#latitudF').val(lat);
      $('#longitudF').val(lng);

    });

  });
}

google.maps.event.addDomListener(window, 'load', initialize);

