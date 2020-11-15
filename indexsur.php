<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>log/delog..</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styleconnexion.css">
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