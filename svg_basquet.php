<?php
include "lib/llibreria.php";
connectar();

 
 $despx_i = 0;
 $despy_i = 0;
 $height = 0;
 $width = 0;
 

		$ample=1280;



			$alt=960 ;



if (isset($_REQUEST["equip"])) $equip = $_REQUEST["equip"];
else  $equip="Baloncesto Sevilla" ;





$sql ="SELECT * FROM jugadors_acb Where equip like '%" . $equip . "%'"   ;
 mysql_query("SET NAMES 'utf8'");
$res=mysql_query($sql); // consulta SQL
 

 
$t = '<?xml version="1.0" encoding="utf-8"?>' . chr(13) . chr(10);
$t .= '<svg width="' . $ample .'" height="'. $alt.'" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">' .chr(13) . chr(10);  
$t .= '<!-- Created with SVG-edit - http://svg-edit.googlecode.com/ -->' . chr(13) . chr(10);  
$t .='<!-- Generat amb un script creat pel Taller XML  -->' . chr(13) . chr(10);  
$t .=' <g> ' . chr(13) . chr(10) ;
$t .='<title>' . $equip . '</title>' . chr(13) . chr(10);
$t .= '<text transform="matrix(5.34483, 0, 0, 4.05, -2268, -260.267)" xml:space="preserve" text-anchor="middle" font-family="serif" font-size="24" id="titol" y="99.7531" x="546.27959" stroke-width="2" stroke="#0000ff" fill="#000000">' . $equip . '</text>' . chr(13) . chr(10);
$c = 0;
$f= 0;



for($x=0; $x < mysql_num_rows($res); $x++)
{
if (strlen(mysql_result($res,$x,"foto"))>1)
{
$c++;
if( ($c%7) == 0 )
{
$c = 1;
$f = $f+1;
}

$posy_i= 200 + (200*$f)  ;
$posx_i=(182 * ($c-1) ) + 50 ;  
$posy_t=330 +  (200*$f) ;
$posx_t= $posx_i + 50 ;

$t .= '<image xlink:href="' . mysql_result($res,$x,"foto") . '" id="jugador' . $x .'" height="110.000002" width="132.000006"  y="' . $posy_i . '" x="' . $posx_i .'"/> ' . chr(13) . chr(10) ;
//$t .= '<text transform="matrix(1.18627, 0, 0, 1, -5.12255, 0)" xml:space="preserve" text-anchor="middle" font-family="serif" font-size="14" id="svg_' . $x .'" y="' . $posy_t .'" x="' . $posx_t .'" stroke-width="0" stroke="#000000" fill="#000000">' . utf8_decode(mysql_result($res,$x,"nom")) .'</text>' . chr(13) . chr(10) ;
$t .= '<text  xml:space="preserve" text-anchor="middle" font-family="serif" font-size="14" id="svg_' . $x .'" y="' . $posy_t .'" x="' . $posx_t .'" stroke-width="0" stroke="#000000" fill="#000000">' . mysql_result($res,$x,"nombre") .'</text>' . chr(13) . chr(10) ;
}
echo $t;
}


$t .= ' </g> ' . chr(13) . chr(10) ;
$t .= ' </svg> ' . chr(13) . chr(10) ;
 
// Capçalera fitxer XML a generar


//header("Content-type: text/xml; charset=utf-8"); // Capçalera de fitxer XML
echo $t ;
?>