<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<?php

include "lib/llibreria.php";
connectar();
 
$sx = simplexml_load_file('http://www.xatakandroid.com/lomejor/rss2.xml'); // carrega el fitxer XML de la font RSS que li indiquem

// llegix la informació del canal
foreach($sx->channel as $item)
{
$tit = addslashes($item->title);
echo $tit ." titulo <br>";
echo $item->link ." link <br>";
echo $item->language ." idioma <br>";
$cp = addslashes($item->copyright);
echo $cp ." copyright <br>";

// Grava les dades del canal a la taula "canals"

//if (mysql_query("INSERT INTO canals (data_alta,title,link,language,copyright) VALUES (NOW(),'$tit','$item->link','$item->language','$cp') ") ) echo "Registre afegit" . $item->nom ;
//else echo "Error en la gravació <br> ";
}
echo "Hem gravat la capçalera <br />" ;

// recupera la id d'aquest canal en la nostra taula Mysql
//$res = mysql_query("SELECT id FROM canals WHERE title = '$tit'");
//$id = mysql_result($res,0,0); // mysql_result($res,0,"id");

// Llegirem noticies
foreach($sx->channel->item as $item)
{
$tit = addslashes($item->title);
echo $tit ." titulo <br>";
echo $item->link ." link <br>";
echo $item->guid ." guid <br>";
echo $item->pubDate ." fecha <br>";
echo $item->author ." autor <br>";
$descri = addslashes($item->description);
echo $descri . " descripcion <br>";

// Grava cada noticia llegida del RSS a la taula de noticies

if (mysql_query("INSERT INTO noticies (id,title,link,guid,pubDate,author,description) VALUES (null,'$tit','$item->link','$item->guid',NOW(),'$item->author','$descri') ") ) echo "Registre afegit" . $tit ;
else echo "Error en la gravació <br> ";
}
echo "Fi de la gravació <br />" ;
?>

</head>
</html>
