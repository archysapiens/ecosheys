$(function(){
  $('#Modal_Registro_Cliente').modal('show');
  setTimeout(function() {
    $("#txtnoCliente").focus();
  },1200);
});

$(document).ready(function(){
  var  checkin = $("#checkFisico");
  $("#checkFisico").on('click', function(){
    if(checkin.is(':checked')) {
      var b = document.getElementById("txtnoCliente").value;
      var cadena ="RFCTEMPNO";
      var auxiliar = cadena+b;
      if (auxiliar.length==10) {
        var poner = document.getElementById("txtrfc_Fisico").value=auxiliar+"E"+"C"+"O";
      }
      else if (auxiliar.length==11) {
        var poner = document.getElementById("txtrfc_Fisico").value=auxiliar+"E"+"C";
      }
      else if (auxiliar.length==12) {
        var poner = document.getElementById("txtrfc_Fisico").value=auxiliar+"E";
      }
      else if (auxiliar.length==13) {
        var poner = document.getElementById("txtrfc_Fisico").value=auxiliar;
      }

      setTimeout(function() {
        $("#checkFisico").removeAttr("checked");;
      },100);

      setTimeout(function() {
        $("#radio2").prop('checked', true);;
      },200);
    }
    else {
    }
  });
});


$(document).ready(function(){
  var  checkinMor = $("#checkMor");
  var radioone = $("#radio1");
  $('#checkMor').on('click', function(){
    if(checkinMor.is(':checked')) {
      var b = document.getElementById("txtnoCliente").value;
      var cadena ="RFCTMPMO";
      var auxiliar = cadena+b;
      if (auxiliar.length==9) {
        var poner = document.getElementById("txtrfc_Moral").value=auxiliar+"S"+"H"+"E";
      }
      else if (auxiliar.length==10) {
        var poner = document.getElementById("txtrfc_Moral").value=auxiliar+"S"+"H";
      }
      else if (auxiliar.length==11) {
        var poner = document.getElementById("txtrfc_Moral").value=auxiliar+"S";
      }
      else if (auxiliar.length==12) {
        var poner = document.getElementById("txtrfc_Moral").value=auxiliar;
      }
      setTimeout(function() {
        $("#checkMor").removeAttr("checked");;
      },100);

      setTimeout(function() {
        $("#radio1").prop('checked', true);;
      },200);
    }
    else {
    }
  });
});


$(function(){
  var opcionMoral = document.getElementById("radio1");
  var opcionFisico = document.getElementById("radio2");
  var txt1 = document.getElementById("txtrfc_Moral");
  var txt2 = document.getElementById("txtrazonsocial");
  var txt3 = document.getElementById("txtrfc_Fisico");
  var txt4 = document.getElementById("txtnombre");
  var txt5 = document.getElementById("txtap_P");
  var txt6 = document.getElementById("txtap_M");
  //var txt7 = document.getElementById("txtnra");
  var txt8 = document.getElementById("txt_tel_ofi_cont");
  var txt9 = document.getElementById("txt_tel_cel_cont");
  var txt10 = document.getElementById("txt_obs_cont");
  var txt11 = document.getElementById("txt_email_cont");

  var botonMoral = document.getElementById("btnGuardar_Moral");
  var botonFisico = document.getElementById("btnGuardar_Fisico");

  var DIVCONTACTOS = document.getElementById("Contenedor_Contacto_Moral");

  //  var BTNCONTACTOS = document.getElementById("myModal3");

  var chekkMo = document.getElementById("checkMor");
  var check = document.getElementById("checkFisico");

  var SELECTHORA1 = document.getElementById("hora1");
  var SELECTHORA2 = document.getElementById("hora2");
  var SELECTHORA3 = document.getElementById("hora3");
  var SELECTHORA4 = document.getElementById("hora4");

  opcionMoral.addEventListener("click", function() { //PERSONA MORAL
    txt3.value="";
    txt4.value="";
    txt5.value="";
    txt6.value="";
    txt8.value="";
    txt9.value="";
    txt10.value="";
    txt11.value="";
    txt1.disabled = false;
    txt2.disabled = false;
    txt3.disabled = true;
    txt4.disabled = true;
    txt5.disabled = true;
    txt6.disabled = true;
    //txt7.disabled = false;
    txt8.disabled = true;
    txt9.disabled = true;
    txt10.disabled = true;
    txt11.disabled = true;
    botonFisico.style.display='none';
    botonMoral.style.display='';

    DIVCONTACTOS.style.display='';

    //BTNSUCURSAL.style.display='';
    //BTNCONTACTOS.style.display='';
    chekkMo.disabled = false;
    check.disabled = true;

    SELECTHORA1.disabled = true;
    SELECTHORA2.disabled = true;
    SELECTHORA3.disabled = true;
    SELECTHORA4.disabled = true;
  }, false);

  opcionFisico.addEventListener("click", function() { //PERSONA FISICA
    txt1.value="";
    txt2.value="";
    txt1.disabled = true;
    txt2.disabled = true;
    txt3.disabled = false;
    txt4.disabled = false;
    txt5.disabled = false;
    txt6.disabled = false;
    //txt7.disabled = false;
    txt8.disabled = false;
    txt9.disabled = false;
    txt10.disabled = false;
    txt11.disabled = false;
    botonFisico.style.display='';
    botonMoral.style.display='none';
    DIVCONTACTOS.style.display='none';
    //BTNCONTACTOS.style.display='none';

    chekkMo.disabled = true;
    check.disabled = false;
    SELECTHORA1.disabled = false;
    SELECTHORA2.disabled = false;
    SELECTHORA3.disabled = false;
    SELECTHORA4.disabled = false;
  }, false);
});
    $(document).ready(function() {
      $('#txtnoCliente').blur(function(){
      
          if ($("#txtnoCliente").val()=="") {

            }
            
            else {
                      $('#Info').html('<img  alt="" />').fadeOut(1000);
                      var NO_CLIENTE = $(this).val();
                      var dataString = 'txtnoCliente='+NO_CLIENTE;

                        $.ajax({
                            type: "POST",
                            url: "validacion_no_cliente.php",
                            data: dataString,
                            success: function(data) {
                              console.log(data);
                                $('#Info').fadeIn(1000).html(data);
                            }            
                          });
            }// fin txtnoCliente
      });
    });

function tabRetorno() {
  setTimeout(function () {
    $("#tab1").tab('show');
  },200);
}

function otorgarFoco(identificador, mensajep) {
      $(identificador).focus();
  if (!$('#message1').is('.in')) {
    $('#message1').addClass('in').append('<h1>&iexcl;Aviso!</h1><p>El campo '+mensajep+'  est&aacute; vacio.</p>');
    setTimeout(function() {
      $(identificador).addClass('animated tada');
    },200);


    setTimeout(function () {
      $(identificador).removeClass('animated tada');
      $('#message1').removeClass('in');
      $('#message1 h1,p').fadeOut();
    },4000);
  }
}

function validarCampos() {
  var rfcF, rfcM, nombreM, nombreF, numeroCliente,radioM,message;
  radioM = $("#radio1");
  radioF = $("#radio2");
  numeroCliente = $("#txtnoCliente").val();
  rfcM = $("#txtrfc_Moral").val();
  nombreM = $("#txtrazonsocial").val();
  rfcF = $("#txtrfc_Fisico").val();
  nombreF = $("#txtnombre").val();
  if (numeroCliente.length == 0 || numeroCliente == '') {
    tabRetorno();
    message = 'n&uacute;mero de cliente '
    otorgarFoco(txtnoCliente, message);
  }
  else if (numeroCliente.length > 0 || numeroCliente !=''){

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
    }

    if (radioF.is(':checked')) {
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
    }

    else if (radioM.is(':checked')==false && radioF.is(':checked')==false) {
      tabRetorno();
      if (!$('#message1').is('.in')) {
        setTimeout(function() {
          $('#message1').addClass('in').append('<h1> &iexcl;Aviso!</h1><p>Selecciona un tipo de cliente.</p>');
        },100);

        setTimeout(function () {
          $('#message1').removeClass('in');
          $('#message1 h1,p').fadeOut();
        },7000);
      }
    }

  }
}

