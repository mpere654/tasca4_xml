<?php

include "lib/llibreria.php";
connectar();


// CapÃ§alera fitxer XML a generar

header("Content-type: text/xml");
$t = "<?xml version=\"1.0\" encoding=\"utf-8\" ?>" .chr(13).chr(10) ;
$t .="<rss VERSION=\"2.0\">" . chr(13) . chr(10);

$t .= "<channel>" . chr(13) . chr(10);
//Creem el canal amb la informaciÃ³ de l'emisor de noticies
$t .="<title> Noticies Android </title>" . chr(13) . chr(10);
$t .="<link> http://www.xatakandroid.com/ </link>" .chr(13). chr(10);
$t .="<language> es </language>" . chr(13) . chr(10) ;
$t .="<webMaster> Miguel Ã�ngel PÃ©rez </webMaster>" . chr(13) . chr(10);
$t .="<copyright> xataka - miguel </copyright> " . chr(13) . chr(10) ;
$t .="<pubDate>" . date('D, d M Y g:i:s O', time()) . "</pubDate>" . chr(13) . chr(10) ;

$res=mysql_query("SELECT * FROM noticies ORDER BY id DESC LIMIT 10"); // consulta Mysql de les 10 ultimes noticies

// A partir de la consulta anirem omplint cada node "item"
for($x=0; $x < mysql_num_rows($res);$x++) // Bucle per recorrer tots els registres
{
	$t .="<item>" . chr(13) . chr(10) ;
	$t .="<title>" . mysql_result($res,$x,"title") . "</title>" . chr(13) . chr(10) ;
	$t .="<link>" . mysql_result($res,$x,"link") . "</link>" . chr(13) . chr(10) ;
	$t .="<guid>" . mysql_result($res,$x,"guid") . "</guid>" . chr(13) . chr(10) ;
	$t .="<pubDate>" . mysql_result($res,$x,"pubDate") . "</pubDate>" . chr(13) . chr(10) ;
	$t .="<description><![CDATA[" . mysql_result($res,$x,"description") . "]]></description>" . chr(13) . chr(10) ;
	$t .="</item>" . chr(13) . chr(10) ;
}

$t .="</channel>" . chr(13) . chr(10) ;
$t .="</rss>" ;


echo $t ;
?>
