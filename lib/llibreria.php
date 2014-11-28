<?php

	function connectar(){ 
		mysql_connect("mysql6.000webhost.com","a5194399_xml","9002018j"); // Connexió servidor Mysql
		mysql_select_db("a5194399_xml"); // Escollim Base de Dades
	
		mysql_query("SET NAMES 'utf8'");
	}
	
	
	function loginar($usuari,$password)
	{
		$sql = "SELECT * FROM usuaris WHERE usuari='$usuari' and contrasenya= MD5('$password') ";
		echo $sql ;
		$result = mysql_query($sql);
		if (mysql_num_rows($result) >0)  return 1;
		else return 0 ;
	
	}
	function logout()
	{
		session_start();
		unset($_SESSION["usuari"]);
		session_unset();
		header('location: index.php?accio=');
	}
	
	
?>
