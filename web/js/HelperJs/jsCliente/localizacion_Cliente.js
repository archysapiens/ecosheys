  var map;
  var geocoder = new google.maps.Geocoder();
  var marker;
  var geos;

  function iniciar() {
    var myLatlng = new google.maps.LatLng(19.2846069,-99.5287891);
    var myOptions = {
      zoom: 10,
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map($("#mapaOriginal").get(0), myOptions);

  }

  function buscarDirecciones() {
    pasarValores();
    var rfcF, rfcM, nombreM, nombreF, numeroCliente,radioM,message;
    radioM = $("#radio1");
    radioF = $("#radio2");
    numeroCliente = $("#txtnoCliente").val();
    rfcM = $("#txtrfc_Moral").val();
    nombreM = $("#txtrazonsocial").val();
    rfcF = $("#txtrfc_Fisico").val();
    nombreF = $("#txtnombre").val();
    var aux1 = $('#latitude').val();
    var aux2 = $ ('#longitude').val();
    var auxDireccion = $("#txtDireccion").val();
    if (aux1.length==0 && aux2.length==0 && auxDireccion.length>0) {
      var address = $('#txtDireccion').val();
      geocoder.geocode( { 'address': address}, function(results, status){
        console.log(status);
        if (status == google.maps.GeocoderStatus.OK) {

          var mapOptions = {
            center: results[0].geometry.location,
            mapTypeId: google.maps.MapTypeId.ROADMAP
          };
          map = new google.maps.Map($("#mapaOriginal").get(0), mapOptions);
          map.fitBounds(results[0].geometry.viewport);
          marker = new google.maps.Marker({
            position: results[0].geometry.location,
            draggable: true
          });
          marker.setMap(map);
          var latF = results[0].geometry.location.lat();
          var lngF = results[0].geometry.location.lng();
          $('#latitude').val(latF);
          $ ('#longitude').val(lngF);
          var contenido =
          '<h3><span class="label label-info">&iexcl;Aviso!</span></h2>'+
          '<h4>El marcador es arrastrable</h4>'+
          '<h4>ub&iacute;calo en su posici&oacute;n real del cliente</h4>';



          var infowindow = new google.maps.InfoWindow({
            content: contenido
          });

          infowindow.open(map, marker);
          setTimeout(function(){
            infowindow.close();
          },7000);
        }

        else {
          window.alert("No hubo resultados, verifica la direcci&oacute;n");
          $("#txtDireccion").focus();
        }

        google.maps.event.addListener(marker, 'dragend', function(event) {

          var myLatLng = event.latLng;
          lat = myLatLng.lat();
          lng = myLatLng.lng();
          $('#latitude').val(lat);
          $('#longitude').val(lng);

        });

      });

    }
    else if (aux1.length>0 && aux2.length>0 && auxDireccion.length>0) {

    }

    else if (numeroCliente.length==0) {
      tabRetorno();
      message = 'n&uacute;mero de cliente '
      otorgarFoco(txtnoCliente, message);
    }

    else if (numeroCliente.length>0 || numeroCliente !='' ) {
      if (radioM.is(':checked')) {
        if (rfcM.length==0 || rfcM=='') {
          tabRetorno();
          var message = 'RFC empresa '
          otorgarFoco(txtrfc_Moral, message);
        }

        else if (nombreM.length==0 || nombreM =='') {
          tabRetorno();
          var message = 'nombre empresa '
          otorgarFoco(txtrazonsocial, message);
        }

        else if (auxDireccion.length == 0 || auxDireccion!="") {
          regresarTab2direccion();
        }

      }

      else if (radioF.is(':checked')) {
        if (rfcF.length==0 || rfcF=='') {
          tabRetorno();
          var message = 'RFC f&iacute;sico '
          otorgarFoco(txtrfc_Fisico, message);
        }

        else if (nombreF.length==0 || nombreF =='') {
          tabRetorno();
          var message = 'nombre cliente '
          otorgarFoco(txtnombre, message);
        }

        else if (auxDireccion.length == 0 || auxDireccion!="") {
          regresarTab2direccion()

        }
      }

      else if (radioM.is(':checked')==false && radioF.is(':checked')==false) {
        tabRetorno();
        if (!$('#message1').is('.in')) {
          setTimeout(function() {
            $('#message1').addClass('in').append('<h1>&iexcl;Aviso!</h1><p>Selecciona un tipo de cliente.</p>');
          },100);

          setTimeout(function () {
            $('#message1').removeClass('in');
            $('#message1 h1,p').fadeOut();
          },7000);
        }
      }
    }

    else {

    }
  }

  function buscarDireccionBoton() {
    var address = $('#txtDireccion').val();
    if (address.length>0) {
      geocoder.geocode( { 'address': address}, function(results, status){
        console.log(status);
        if (status == google.maps.GeocoderStatus.OK) {

          var mapOptions = {
            center: results[0].geometry.location,
            mapTypeId: google.maps.MapTypeId.ROADMAP
          };
          map = new google.maps.Map($("#mapaOriginal").get(0), mapOptions);
          map.fitBounds(results[0].geometry.viewport);
          marker = new google.maps.Marker({
            position: results[0].geometry.location,
            draggable: true
          });
          marker.setMap(map);
          var latF = results[0].geometry.location.lat();
          var lngF = results[0].geometry.location.lng();
          $('#latitude').val(latF);
          $ ('#longitude').val(lngF);
        }

        else {
          window.alert("No hubo resultados, verifica la direcci&oacute;n");
          $("#txtDireccion").focus();
        }

        google.maps.event.addListener(marker, 'dragend', function(event) {

          var myLatLng = event.latLng;
          lat = myLatLng.lat();
          lng = myLatLng.lng();
          $('#latitude').val(lat);
          $('#longitude').val(lng);

        });

      });

    }
    else {
      regresarTab2direccion()
    }

  }

  function desplegarMarcadoresMoral() {
    lat = $("#latitude_Mo").val();
    lng = $("#longitude_Mo").val();

    if (lat != '' || lng.length>0) {
      var myLatlng = new google.maps.LatLng(lat,lng);
      var opciones = {
        zoom: 16,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      map = new google.maps.Map($('#mapaModificarMoral').get(0), opciones);
      marker = new google.maps.Marker({
        draggable: true,
        position: myLatlng
      });
      marker.setMap(map);
    }

    else {

    }
    google.maps.event.addListener(marker, 'dragend', function(event) {

      var myLatLng = event.latLng;
      lat = myLatLng.lat();
      lng = myLatLng.lng();
      $('#latitude_Mo').val(lat);
      $('#longitude_Mo').val(lng);

    });

  }

  function desplegarMarcadoresFisica() {
    lat = $("#latitude_Fi").val();
    lng = $("#longitude_Fi").val();

    if (lat != '' || lng.length>0) {
      var myLatlng = new google.maps.LatLng(lat,lng);
      var opciones = {
        zoom: 16,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      map = new google.maps.Map($('#mapaModificarFisica').get(0), opciones);
      marker = new google.maps.Marker({
        draggable: true,
        position: myLatlng
      });
      marker.setMap(map);
    }

    else {

    }



    google.maps.event.addListener(marker, 'dragend', function(event) {

      var myLatLng = event.latLng;
      lat = myLatLng.lat();
      lng = myLatLng.lng();
      $('#latitude_Fi').val(lat);
      $('#longitude_Fi').val(lng);

    });

  }


  google.maps.event.addDomListener(window, 'load', iniciar);

  function pasarValores() {
    var estado,municipio,cp,direccion,aux;
    estado = $('#estados').val();
    municipio = $('#municipios').val();
    cp = $('#cp').val();
    direccion = municipio+(",")+estado+(" ")+cp;
    aux = ", ";

    if (direccion == aux) {
      $('#txtDireccion').val("");
    }
    else {
      $('#txtDireccion').val(direccion);
    }


  }

  function regresarTab2direccion() {
    setTimeout(function() {
      $('#tab2').tab('show');

    },200);

    setTimeout(function() {
      $('#estados').after('<span class="error">Ingrese Estado</span>');
      $("#estados").attr("size","7");
      $('#estados').focus();
    },500);
    setTimeout(function() {
      $("#estados").attr('size','');
    },2000);

    setTimeout(function() {
      $(".error").fadeOut().remove();
    },3600);

    if (!$('#message1').is('.in')) {
      setTimeout(function() {
        $('#message1').addClass('in').append('<h1>&iexcl;Aviso!</h1><p>Seleccione una direcci&oacute;n existente.</p>');
      },100);

      setTimeout(function () {
        $('#message1').removeClass('in');
        $('#message1 h1,p').fadeOut();
      },7000);
    }
  }

