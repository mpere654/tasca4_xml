<?php
echo header('Content-Type: text/html; charset=UTF-8');


ini_set('display_errors', 1);  // Obrim el report d'errors en fase de desenvolupament
session_start();     // Iniciem sessio imprescindible per gestionar validacions
include_once "lib/llibreria.php";    // Incluim la nostra llibreria de funcions
connectar();    // Connectem la BD

// Validacio
if (isset($_REQUEST["accio"]) )  // Mirem quina acciÃ³ hem escollit
{
if ($_REQUEST["accio"]=="logout")  logout();  // si hem escollit l'acciÃ³ de sortida fem el logut cridant a la funciÃ³ que tindrem a la llibreria.php
}

if(!isset($_SESSION['usuari']))     // Mirem si no estem validats
{
    if(isset($_POST['login']))   // Mirem si hem enviat la loginaciÃ³
    {
        if(loginar(mysql_real_escape_string($_POST['user']) , mysql_real_escape_string($_POST['password']) ))   // Activem la funciÃ³ de validaciÃ³
        {
            $_SESSION['usuari'] = $_POST['user'] ;    // Si son correctes usuarii contrasenya grava usuari a la sessiÃ³
            header("location:index.php");               // Torna a carregar la pagina
        }
    }
    }
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--

Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Title      : Newsprint
Version    : 1.0
Released   : 20070824
Description: A two-column, fixed-width design for blogs and small websites.

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Taller XML</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="css/default.css" rel="stylesheet" type="text/css" media="screen" />
<link href="css/propi.css" rel="stylesheet" type="text/css" media="screen" />
<!-- mapa -->
   <style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
     <script src="js/temps.js"></script>
          <script src="js/ajax_cerca.js"></script>
    
    <script>
function initialize() {
  var cuenca = new google.maps.LatLng(40.079091, -2.138015);
  var mapOptions = {
    zoom: 8,
    center: cuenca,
	mapTypeId: google.maps.MapTypeId.ROADMAP
  }

  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var ctaLayer = new google.maps.KmlLayer({
    url: 'http://mpere654.comli.com/unitat3/ciutats_visitades_peninsula.kml'
  });
  ctaLayer.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>

<!-- fin mapa -->

<!-- busqueda en xml -->

<script>
function cercar()
{
	var cadena = '<style>' + "\n" ;
	cadena +='TD.titol { ' + "\n" ;
	cadena += 'font-weight: bold;' + "\n" ;
	cadena += 'color : red;' + "\n" ;  
	cadena += '}' + "\n" ;  
	cadena += '</style>' + "\n" ;  
	cadena +='<style>' + "\n" +'TD.enlace { ' + "\n" ;
	cadena += 'font-weight: bold;' + "\n" ;
	cadena += 'color : blue;' + "\n" ;  
	cadena += '}' + "\n" ;  
	cadena += '</style>' + "\n" ; 
	cadena +='<table border="2" WIDTH="50%" colorborder="#AAD4FF">';
	var valor = document.getElementById('s').value;
	//valor = valor.toUpperCase() ;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	 }
	xmlhttp.open("GET","http://mpere654.comli.com/unitat3/rss.php",false);
	xmlhttp.send();
	xmlDoc=xmlhttp.responseXML;
	var x=xmlDoc.getElementsByTagName("item");
	for (i=0;i<x.length;i++)
		  {
			  if ((x[i].getElementsByTagName("title")[0].childNodes[0].nodeValue).search(valor)>=0)
			  {
				  cadena +='<tr><td colspan="3" align="center" class="titol">';
				  cadena +=x[i].getElementsByTagName("title")[0].childNodes[0].nodeValue;
				  cadena +='</td></tr><tr><td class="enlace"><a href=';
				  cadena +=x[i].getElementsByTagName("link")[0].childNodes[0].nodeValue;
				   cadena +='>enlace</a></td></tr><tr><td class="titol">';
				  cadena +=x[i].getElementsByTagName("pubDate")[0].childNodes[0].nodeValue;
				  cadena += '</td></tr>';
				  //cadena +=x[i].getElementsByTagName("description")[0].childNodes[0].nodeValue;	 
				 // cadena +='</td></tr>';  
			  }
		  }
			  cadena +="</table>";
			  document.getElementById("content").innerHTML = cadena;
  }  
 <!-- busqueda en xml -->
</script>
</head>
<body onload="temps();">
<!-- start header -->
<div id="header">
	<div id="loginar" style="width: 600px; float: right; text-align: center;">
  
  	<?php
    if(!isset($_SESSION['usuari']))  // Sino estÃ  validat
    {
	?>
  
	<form action="" method="post" class="login">
	    <label>Usuari &nbsp; </label><input name="user" type="text" size="10">
	    <label> &nbsp; Contrasenya &nbsp; </label><input name="password" type="password" size="10">
	    <input name="login" type="submit" value="login">
	  	admin - admin
	</form>
	
	<?php
	}
	else     // Si estÃ  validat
	{
		echo $_SESSION["usuari"] . '<a href="index.php?accio=logout"> (Sortir) </a> ';  // Si estÃ  validat surt el nom d eusuari i l'enllaÃ§ per sortir
	}
	?>
	</div> 
	
	<h1><a href="#">Taller XML</a></h1>
	<p>Miguel A. Pérez - Taller XML</p>	
</div>
<!-- end header -->
<!-- star menu -->
<div id="cssmenu">
	<ul>
		<li class='active '><a href="index.php"><span>Inici</span></a></li>	
		<li><a href="#">Visors</a></li>
		<li class="has-sub "><a href="#"><span>Exportació</span></a>
		<ul>
         <li><a href='#'><span>XML</span></a></li>
         <li><a href='#'><span>RSS</span></a></li>
         <li><a href='#'><span>KML</span></a></li>
         <li><a href='#'><span>SVG</span></a></li>
        </ul></li>		
		<li class="has-sub "><a href="#">Formularis</a>
		<ul>
         <li><a href='javascript:omplir(1);'><span>Minerals</span></a></li>
         <li><a href='javascript:omplir(2);'><span>ACB</span></a></li>		
		</ul></li>
		<li><a href="#">Informació</a></li>
		<li><a href="html5/index.php">HTML5-TEMPS</a></li>
		
	</ul>
</div>
<!-- end menu -->
<!-- start page -->
<div id="page">
	<!-- start content -->
	<div id="content">
		<div id="jornada">
			<?php
			            $xslDoc = new DOMDocument();
						$xslDoc->load("files/calendari.xsl");   // carrega el fitxer XSL per donar format HTML a les dades
	
						$xmlDoc = new DOMDocument();
						$xmlDoc->load("files/calendari.xml"); // en aquest cas agafara la url del RSS de l'adreÃ§a
	
						$xsltProcessor = new XSLTProcessor();
						$xsltProcessor->registerPHPFunctions();
						$xsltProcessor->importStyleSheet($xslDoc);
	
						echo $xsltProcessor->transformToXML($xmlDoc);  // Escriu el resultat de la transformaciÃ³ XSLT
			?>	
		
		</div>
		<div id="map-canvas" style="width: 500px ; height: 500px; "></div>
		<div class="entry">
			<iframe src="svg_basquet.php?ample=500&alt=350" scrolling="yes" align="middle" height="300" width="500"></iframe>           
		</div>
		
		<div class="post">
			<div class="title">
				<h2><a href="#">Mostra de tag</a></h2>
				<p><small>2014 OCTUBRE </small></p>
			</div>			
			<p class="links"> <a href="#" class="more">Read More</a> &nbsp;&nbsp;&nbsp; <a href="#" class="comments">No Comments</a> </p>
		</div>
	</div>
	<!-- end content -->
	<!-- start sidebar -->
	<div id="sidebar">
		<div id="temps" ></div>
		<div id="search">
			
			<!-- <form id="searchform" > -->
                       	
                            <h2>Cercar - Case sensitive</h2>
                            <input type="text" name="s" id="s" size="15" value="" onkeypress="if (event.keyCode == 13) cercar()" />
                       
            <!-- </form> --> 
		</div>
		<div id="tria">
		</div>
		<ul>
			<li id="categories">
				<h2>RSS ANDROID</h2>
				<?php
					$xslDoc = new DOMDocument();
					$xslDoc->load("noticies.xsl");   // carrega el fitxer XSL per donar format HTML a les dades

					$xmlDoc = new DOMDocument();
					$xmlDoc->load("http://mpere654.comli.com/unitat3/rss.php"); // en aquest cas agafara la url del RSS de l'adreÃ§a

					$xsltProcessor = new XSLTProcessor();
					$xsltProcessor->registerPHPFunctions();
					$xsltProcessor->importStyleSheet($xslDoc);

					echo $xsltProcessor->transformToXML($xmlDoc);  // Escriu el resultat de la transformaciÃ³ XSLT
				?>				
			</li>
			<li id="calendar">
				<h2>Calendar</h2>
				<div id="calendar_wrap">
					<table id="wp-calendar" summary="Calendar">
						<caption>
						August 2007
						</caption>
						<thead>
							<tr>
								<th abbr="Monday" scope="col" title="Monday">M</th>
								<th abbr="Tuesday" scope="col" title="Tuesday">T</th>
								<th abbr="Wednesday" scope="col" title="Wednesday">W</th>
								<th abbr="Thursday" scope="col" title="Thursday">T</th>
								<th abbr="Friday" scope="col" title="Friday">F</th>
								<th abbr="Saturday" scope="col" title="Saturday">S</th>
								<th abbr="Sunday" scope="col" title="Sunday">S</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<td abbr="July" colspan="3" id="prev"><a href="#">&laquo; Jul</a></td>
								<td class="pad">&nbsp;</td>
								<td abbr="September" colspan="3" id="next" class="pad"><a href="#">Sep &raquo;</a></td>
							</tr>
						</tfoot>
						<tbody>
							<tr>
								<td colspan="2" class="pad">&nbsp;</td>
								<td>1</td>
								<td>2</td>
								<td>3</td>
								<td>4</td>
								<td>5</td>
							</tr>
							<tr>
								<td>6</td>
								<td>7</td>
								<td>8</td>
								<td>9</td>
								<td>10</td>
								<td>11</td>
								<td>12</td>
							</tr>
							<tr>
								<td>13</td>
								<td>14</td>
								<td>15</td>
								<td>16</td>
								<td>17</td>
								<td>18</td>
								<td>19</td>
							</tr>
							<tr>
								<td>20</td>
								<td>21</td>
								<td>22</td>
								<td>23</td>
								<td id="today">24</td>
								<td>25</td>
								<td>26</td>
							</tr>
							<tr>
								<td>27</td>
								<td>28</td>
								<td>29</td>
								<td>30</td>
								<td>31</td>
								<td class="pad" colspan="2">&nbsp;</td>
							</tr>
						</tbody>
					</table>
				</div>
			</li>
			<li>
				<h2>Lorem Ipsum Dolor</h2>
				<ul>
					<li><a href="#">Nulla luctus eleifend purus</a></li>
					<li><a href="#">Praesent scelerisque scelerisque</a></li>
					<li><a href="#">Ut nonummy rutrum sem</a></li>
					<li><a href="#">Pellentesque tempus quam quis</a></li>
					<li><a href="#">Fusce ultrices fringilla metus</a></li>
					<li><a href="#">Praesent mattis condimentum</a></li>
				</ul>
			</li>
		</ul>
	</div>
	<!-- end sidebar -->
	<div id="extra" class="separador_blanc">&nbsp;</div>
</div>
<!-- end page -->
<!-- start footer -->
<div id="footer">
	<p class="legal"> &copy;2007 Newsprint. All Rights Reserved.
		&nbsp;&nbsp;&bull;&nbsp;&nbsp;
		Design by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a> </p>
	<p class="links"> <a href="http://validator.w3.org/check/referer" class="xhtml" title="This page validates as XHTML">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a> &nbsp;&bull;&nbsp; <a href="http://jigsaw.w3.org/css-validator/check/referer" class="css" title="This page validates as CSS">Valid <abbr title="Cascading Style Sheets">CSS</abbr></a> </p>
</div>
<!-- end footer -->
<div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div></body>
</html>
