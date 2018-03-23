<?php
include "alku_with_ulkoasu.html";
/***
ottaa yhteyden kantaan.
***/
$host="magnesium";
$user="16bkasmirm";
$pass="salasana";
$skeema="db16bkasmirm";



try
{
	$yhteys= new PDO("mysql:host=$host;dbname=$skeema;charset=utf8",$user,$pass);
}
catch(PDOExeption $e)
{
	echo $e->getMessage();
	
}
?>






















<?php

include "loppu.html";

?>