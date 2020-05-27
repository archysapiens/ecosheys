// JavaScript Document
 
// Función para recoger los datos de PHP según el navegador, se usa siempre.
function objetoAjax(){
  var xmlhttp=false;
  try {
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
 
  try {
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (E) {
    xmlhttp = false;
  }
}
 
if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
    xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
}
 //Función para recoger los datos del formulario y enviarlos por post  
function GuardarContactos(){
 
  //div donde se mostrará lo resultados
  divResultado = document.getElementById('mostrar_contactos');
  //recogemos los valores de los inputs
  num_cliente_CON=document.frm_contactos.no_cliente.value;
  rfc_CON=document.frm_contactos.rfc.value;
  nombre_CON=document.frm_contactos.nombre.value;
  appat_CON=document.frm_contactos.app_pat.value;
  apmat_CON=document.frm_contactos.app_mat.value;
  telofi_CON=document.frm_contactos.tel_ofi.value;
  telcel_CON=document.frm_contactos.tel_cel.value;
  obsCON=document.frm_contactos.obs.value;
  email_CON=document.frm_contactos.email.value;
  hora1_CON=document.frm_contactos.hora1_con.value;
  hora2_CON=document.frm_contactos.hora2_con.value;
  hora3_CON=document.frm_contactos.hora3_con.value;
  hora4_CON=document.frm_contactos.hora4_con.value;
  //instanciamos el objetoAjax
  ajax=objetoAjax();
 
  //uso del medotod POST
  //archivo que realizará la operacion
  //registroCONTACTO.php
  
  ajax.open("POST", "newClient.php",true);
  $("#Modal_Contacto_Moral").modal("hide");//ESTA LINEA QUIERE DECIR QUE CUANDO SE GUARDEN LOS DATOS SE CIERRE LA VENTANA MODAL
  
  //ajax.open("POST", "consulta.php",true);
   //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
  ajax.onreadystatechange=function() {
    //la función responseText tiene todos los datos pedidos al servidor
    if (ajax.readyState==4) {
      //mostrar resultados en esta capa
    divResultado.innerHTML = ajax.responseText
      //llamar a funcion para limpiar los inputs
    LimpiarCampos();
  }
 }
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  //enviando los valores a registro.php para que inserte los datos
    ajax.send("formCreatedMoralDatos="+num_cliente_CON+"&NO_CLIENTE="+num_cliente_CON+"&RFC_EMP="+rfc_CON+"&NOMBRE_C="+nombre_CON+"&APP_PATERNO_C="+appat_CON+"&APP_MATERNO_C="+apmat_CON+"&EMAIL="+email_CON+
      "&TELEFONO_OFI="+telofi_CON+"&TELEFONO_CELL="+telcel_CON+
      "&HOR1="+hora1_CON+"&HOR2="+hora2_CON+"&HOR3="+hora3_CON+"&HOR4="+hora4_CON+"&OBSERVACIONES="+obsCON)
}

 //función para limpiar los campos
function LimpiarCampos(){
  document.frm_contactos.nombre.value="";
  document.frm_contactos.app_pat.value="";
  document.frm_contactos.app_mat.value="";
  document.frm_contactos.tel_ofi.value="";
  document.frm_contactos.tel_cel.value="";
  document.frm_contactos.obs.value="";
  document.frm_contactos.email.value="";
  //document.frm_contactos.hora1_con.value="";
  //document.frm_contactos.hora2_con.value="";
  //document.frm_contactos.txtnum_CLI_CON.focus();
}

//Función para recoger los datos del formulario y enviarlos por post  
function ActualizarContactos(){
 
  //div donde se mostrará lo resultados
  divResultado = document.getElementById('mostrar_contactos');
  //recogemos los valores de los inputs
  num_cliente_CON_Act_Auxiliar=document.frm_contactos_actualizar.no_cliente_Act_auxiliar.value;
  nombre_CON_Act_Auxiliar=document.frm_contactos_actualizar.nombre_Act_auxiliar.value;

  num_cliente_CON_Act=document.frm_contactos_actualizar.no_cliente_Act.value;
  rfc_CON_Act=document.frm_contactos_actualizar.rfc_Act.value;
  nombre_CON_Act=document.frm_contactos_actualizar.nombre_Act.value;
  appat_CON_Act=document.frm_contactos_actualizar.app_pat_Act.value;
  apmat_CON_Act=document.frm_contactos_actualizar.app_mat_Act.value;
  telofi_CON_Act=document.frm_contactos_actualizar.tel_ofi_Act.value;
  telcel_CON_Act=document.frm_contactos_actualizar.tel_cel_Act.value;
  obsCON_Act=document.frm_contactos_actualizar.obs_Act.value;
  email_CON_Act=document.frm_contactos_actualizar.email_Act.value;
  hora1_CON_Act=document.frm_contactos_actualizar.hora1_act_con.value;
  hora2_CON_Act=document.frm_contactos_actualizar.hora2_act_con.value;
  hora3_CON_Act=document.frm_contactos_actualizar.hora3_act_con.value;
  hora4_CON_Act=document.frm_contactos_actualizar.hora4_act_con.value;
  //instanciamos el objetoAjax
  //instanciamos el objetoAjax
  ajax=objetoAjax();
 
  //uso del medotod POST
  //archivo que realizará la operacion
  //registroCONTACTO.php
  
  ajax.open("POST", "newClient.php",true);
  $("#Modal_Actualizar_Contacto").modal("hide");//ESTA LINEA QUIERE DECIR QUE CUANDO SE GUARDEN LOS DATOS SE CIERRE LA VENTANA MODAL
  
  //ajax.open("POST", "consulta.php",true);
   //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
  ajax.onreadystatechange=function() {
    //la función responseText tiene todos los datos pedidos al servidor
    if (ajax.readyState==4) {
      //mostrar resultados en esta capa
    divResultado.innerHTML = ajax.responseText
      //llamar a funcion para limpiar los inputs
  //  LimpiarCampos();
  }
 }
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  //enviando los valores a registro.php para que inserte los datos
    ajax.send("formUpdateMoralDatos="+num_cliente_CON_Act+"NO_CLIENTE="+num_cliente_CON_Act+"&NO_CLIENTE_AUXILIAR="+num_cliente_CON_Act_Auxiliar+"&RFC_EMP="+rfc_CON_Act+"&NOMBRE_C="+nombre_CON_Act+"&NOMBRE_C_AUXILIAR="+nombre_CON_Act_Auxiliar+"&APP_PATERNO_C="+appat_CON_Act+"&APP_MATERNO_C="+apmat_CON_Act+"&EMAIL="+email_CON_Act+
      "&TELEFONO_OFI="+telofi_CON_Act+"&TELEFONO_CELL="+telcel_CON_Act+"&HOR1="+hora1_CON_Act+"&HOR2="+hora2_CON_Act+"&HOR3="+hora3_CON_Act+"&HOR4="+hora4_CON_Act+
        "&OBSERVACIONES="+obsCON_Act)
}