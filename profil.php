<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profil</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styleconnexion.css">
</head>
	<center><body class="text-center">
<?php
		if (isset($_SESSION['userlogin']) && isset($_SESSION['userpass']) && isset($_SESSION['id']) && isset($_SESSION['prenom']) && isset($_SESSION['nom'])) 
			{
				$userinfo['login'] = $_SESSION['userlogin'];
				$userinfo['nom'] = $_SESSION['nom'];
				$userinfo['prenom'] = $_SESSION['prenom'];
				$userinfo['pass'] = $_SESSION['userpass'];
				
				}
			?>
				<a href="edition.php">Editer mon profil</a>
				<a href="deconnexion.php">Se deconnecter</a>
			<?php
		
	echo" <h1>Profil utilisateurs</h1><br>";

	echo "login :"; $userinfo['login']; 
	echo"<br>prenom :"; $userinfo['prenom'];
	
	  echo "<br>nom :"; $userinfo['nom']; 
	
	 echo"<br>password : **********<br>";
	?>
</body></center>
</html>