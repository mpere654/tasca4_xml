/**
 * 
 */

//<!--  Inici del AJAX -->    

function omplir(prov) {
  // Obtener la instancia del objeto XMLHttpRequest
  if(window.XMLHttpRequest) {
    peticion_http = new XMLHttpRequest();
  }
  else if(window.ActiveXObject) {
    peticion_http = new ActiveXObject("Microsoft.XMLHTTP");
  }
 
  // Preparar la funcion de respuesta
  peticion_http.onreadystatechange = muestraContenido;
 
  // Realizar peticion HTTP
  peticion_http.open('GET', 'lib/ajax_cerca.php?prov='+prov, true);
  peticion_http.send(null);
 
  function muestraContenido() {
    if(peticion_http.readyState == 4) {
      if(peticion_http.status == 200) {
        document.getElementById('tria').innerHTML =peticion_http.responseText;
      }
    }
  }
}
//<!-- Fi de l'AJAX -->