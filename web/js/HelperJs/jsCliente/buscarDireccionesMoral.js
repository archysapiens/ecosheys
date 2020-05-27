var mapMo;
var geocoder = new google.maps.Geocoder();
var markerMo;



function initializeMo() {
  var myLatlngMo = new google.maps.LatLng(19.2846069,-99.5287891);
  var myOptions = {
    zoom: 10,
    center: myLatlngMo,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  mapMo = new google.maps.Map($("#map_canvasMoral").get(0), myOptions);
  console.log("Ha inicializado el script moral");
}

function buscarCoordenadasMoralOriginal() {
  // Obtenemos la dirección y la asignamos a una variable
  console.log("Ya entre");
  var latitudMo = $('#latitudMo1').val();
  var longitudMo = $ ('#longitudMo1').val();
  var latlngMo = new google.maps.LatLng(latitudMo,longitudMo);
  console.log("Tengo las coordenadas de moral"+latlngMo);
  geocoder.geocode({'location':latlngMo}, function(results, status){
    console.log("Tengo estatus" + status);
    if (status == google.maps.GeocoderStatus.OK) {
      if (results[1]) {
        var mapOptions = {
          center: results[1].geometry.location,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        mapMo = new google.maps.Map($("#map_canvasMoral").get(0), mapOptions);
        mapMo.fitBounds(results[1].geometry.viewport);
        markerMo=new google.maps.Marker({
          position:latlngMo,
        });
        markerMo.setMap(mapMo);
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

function buscarCoordenadasMoralC() {
  // Obtenemos la dirección y la asignamos a una variable
  console.log("Ya entre en el segundo script de moral");
  var latitudMo = $('#latitudMo1').val();
  var longitudMo = $ ('#longitudMo1').val();
  console.log(latitudMo+(',')+longitudMo);
  var latlngMo = new google.maps.LatLng(latitudMo,longitudMo);
  geocoder.geocode({'location':latlngMo}, function(results, status){
    console.log("Tengo estatus" + status);
    if (status == google.maps.GeocoderStatus.OK) {
      if (results[1]) {
        var mapOptions = {
          center: results[1].geometry.location,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        mapMo = new google.maps.Map($("#map_canvasMoral").get(0), mapOptions);
        mapMo.fitBounds(results[1].geometry.viewport);
        markerMo=new google.maps.Marker({
          position:latlngMo,
          draggable: true
        });
        markerMo.setMap(mapMo);
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

    google.maps.event.addListener(markerMo, 'dragend', function(event) {

      var myLatLng = event.latLng;
      lat = myLatLng.lat();
      lng = myLatLng.lng();
      $('#latitudMo1').val(lat);
      $('#longitudMo1').val(lng);

    });

  });

}

function buscarDireccionMoral() {
  console.log("Ya ingrese a la direccion de moral");
  var address = $('#addressMo').val();
  console.log(address);
  geocoder.geocode( { 'address': address}, function(results, status){
    console.log(status);
    if (status == google.maps.GeocoderStatus.OK) {

      var mapOptions = {
        center: results[0].geometry.location,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      mapMo = new google.maps.Map($("#map_canvasMoral").get(0), mapOptions);
      mapMo.fitBounds(results[0].geometry.viewport);
      markerMo = new google.maps.Marker({
        position: results[0].geometry.location,
        draggable: true
      });
      markerMo.setMap(mapMo);
      var latF = results[0].geometry.location.lat();
      var lngF = results[0].geometry.location.lng();
      $('#latitudMo1').val(latF);
      $ ('#longitudMo1').val(lngF);
      console.log("lati" + latF+(",")+("Longi")+lngF);
    }
    else {
      window.alert("No hubo resultados");
    }

    google.maps.event.addListener(markerMo, 'dragend', function(event) {

      var myLatLng = event.latLng;
      lat = myLatLng.lat();
      lng = myLatLng.lng();
      $('#latitudMo1').val(lat);
      $('#longitudMo1').val(lng);

    });

  });
}

google.maps.event.addDomListener(window, 'load', initializeMo);

