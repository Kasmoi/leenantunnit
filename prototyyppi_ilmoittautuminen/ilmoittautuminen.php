<?php
$ok=false;//auttaa tietojen kanssa


if(!empty($_POST['sukunimi']) && !empty($_POST['etunimi']) && !empty($_POST['ktunnus']) && !empty($_POST['email']) && !empty($_POST['puh'])) 
{

	$ok=TRUE;// tiedot olemassa ok
	$etunimi=$_POST['etunimi'];
	$sukunimi= $_POST['sukunimi'];
	$ktunnus=$_POST['ktunnus'];
	$sahkoposti=$_POST['email'];
	$puh=$_POST['puh'];
	require "./yhteys.php";//yhteys kantaan
	
	

		

		$sql="INSERT INTO lan (etunimi,sukunimi,ktunnus,email,puh) VALUES (?,?,?,?,?)";
		$kysely = $yhteys->prepare($sql);
		$kysely->execute(array($etunimi,$sukunimi,$ktunnus,$sahkoposti,$puh));
		if($kysely!=FALSE) echo "Käyttajä on lisätty!";

	

}
/**********************************
lomakkeen tulostus
************************************/
if(!$_POST || $ok==FALSE)
{

	if(!empty($_POST))
	{


		if(empty($_POST['etunimi'])) echo "Etunimi puuttuu!<br>";
		if(empty($_POST['sukunimi'])) echo "Sukunimi puuttuu!<br>";
		if(empty($_POST['ktunnus'])) echo "Käyttäjätunnus puuttuu!<br>";
		if(empty($_POST['email'])) echo "Sähköposti osoite puuttuu puuttuu!<br>";
		if(empty($_POST['puh'])) echo "Puhelin numero puuttuu!<br>";
		if(tunnusta_ei_kannassa($yhteys,$ktunnus)==FALSE) echo "Käyttäjätunnus on jo käytössä, kokeile toista tunnusta.<br>";
	}
	require "alku_with_ulkoasu.html";
	?>
	<h2>ilmoittautuminen</h2>

	<form method="post" action = "ilmoittautuminen.php" class="formi">
	Etunimi <input type="text" class="teksti" name="etunimi" value="<?php if(isset($_POST['etunimi'])) echo $_POST['etunimi']?>"><br>

	Sukunimi <input type="text" class="teksti" name="sukunimi" value="<?php if(isset($_POST["sukunimi"])) echo $_POST['sukunimi']?>"><br>

	Käyttäjätunnus <input type="text" class="teksti" name="ktunnus" value="<?php if(isset($_POST['ktunnus'])) echo $_POST['ktunnus']?>"><br>

	Sahkoposti <input type="text" class="teksti" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']?>"><br>

	Puhelin: <input type="text" class="teksi" name="puh" value="<?php if(isset($_POST['puh'])) echo $_POST['puh']?>"><br>



	<input type="submit" id="buttoni" value="ilmoittaudu"><br>

	</form><br> 

	<?php
	
}
require "loppu.html";
?>