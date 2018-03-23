<!doctype html>
<html>
<head>
<title>Asennus_lan_tietokanta</title>
<meta charset="utf-8">
</head>
<body>

<?php
require "./yhteys.php";
$sql="DROP TABLE IF EXISTS lan";
$kysely = $yhteys->query($sql);
if($kysely) echo "Poistetaan vanhat lan-taulut..<br>";

//uuden taulun sql ja luominen  
$sql="CREATE TABLE IF NOT EXISTS `lan` (
  `k_id` int(11) NOT NULL AUTO_INCREMENT,
  `etunimi` varchar(30) NOT NULL,
  `sukunimi` varchar(30) NOT NULL,
  `ktunnus` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `puh` varchar(20) NOT NULL,
  PRIMARY KEY (`k_id`));
";//aseta tähän tietokannan sql-koodi 
$kysely = $yhteys->query($sql);
if($kysely!=FALSE) echo "Taulu lan lisätty!<br>";



//lisätään vierasavain/avaimet
$sql="ALTER TABLE lan KEY `ktunnus` (`ktunnus`)";
$kysely = $yhteys->query($sql);
if($kysely!=FALSE) echo "Vierasavain on lisätty!<br>";
?>
</body>
</html>