<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>log/delog..</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
	body{
		margin: 100px;
		text-align: center;
	}
	h1{
		margin: 50px;
	}
	a{
		margin: 10px;
	}
</style>
<body>
	<h1>MODULE DE CONNEXION</h1>
	<?php
	session_start(); 
	if (!isset($_SESSION['id'])) {
	echo "<a href=\"connexion.php\">Connectez-vous</a><br><br>x<a href=\"inscription.php\">Inscription</a>";
	}

	
		if(isset($_SESSION['userlogin']) && isset($_SESSION['userpass']) && isset($_SESSION['id'])){
			$userprenom=$_SESSION['prenom'];
			echo "Hello $userprenom<br>tu est connecté";
			// var_dump($_SESSION['userlogin']);
			// var_dump($_SESSION['userpass']);
			echo "<br><a href=\"profil.php\">Your profil</a>";
		}



	 ?>
	
</body>
</html>