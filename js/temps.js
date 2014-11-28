/**
 * 
 */

function temps()
{
	var http_request = new XMLHttpRequest();
	var url = "http://api.openweathermap.org/data/2.5/weather?q=Gava,es&units=metric"; // URL que envia el fitxer JSON del temps
	
	 
	
	 // Descarrega les dades JSON del servidor.
	http_request.onreadystatechange = handle_json;
	http_request.open("GET", url, true);
	http_request.send(null);
 
	function handle_json() {
	  if (http_request.readyState == 4) {
	    if (http_request.status == 200) {
	      var json_data = http_request.responseText;   // l'objecte json_data guarda les dades rebudes en format JSON
	      var the_object = eval("(" + json_data + ")");   // guarda les dades en format objecte
	      var json = JSON.parse(json_data);          // parseja les dades per si volem accedir a un valor concret ja separat
	       var res = " <font color='red'>La temperatura a Gavà actualment és de " + json.main.temp + " ºC </font>" ; // Construim la cadena
	       document.getElementById('temps').innerHTML = res ;    // Enviem la cadena construida a la capa amb id = temps
	    } else {
	      alert("Fora de servei ");   // Si no carrega mostra missatge d'error
	    }
	    http_request = null;
	  }
	}
}