<?php
	$dbServer = "localhost";
	 $dbUser = "root";
	 $dbPassword = "calucifa75";
	  $dbName = "AGT";

	$bdd = mysqli_connect($dbServer, $dbUser, $dbPassword, $dbName);

	if($bdd = mysqli_connect($dbServer, $dbUser, $dbPassword, $dbName)) {} else echo '<pre>Erreur de connexion</pre>';
?>
