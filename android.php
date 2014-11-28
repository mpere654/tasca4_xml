<?php

include "llibreria.php";
connectar();

if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//$_POST para el post

$username = $_GET['numero'];
$password = $_GET['bloqueo'];


$result = mysqli_query($con,"INSERT INTO 'info_device' ('number_phone' ,'block_app' ,'other')VALUES ('333', 'true', 'eee');");
$row = mysqli_fetch_array($result);
$data = $row[0];


if($data){
echo $data;
}
mysqli_close($con);
?>