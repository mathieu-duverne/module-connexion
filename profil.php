<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profil</title>
</head>
	<center><body>
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
		
	 ?><h1>Profil utilisateurs</h1>
	<br>
	login : <?php echo $userinfo['login']; ?>
	<br>
	prenom : <?php echo $userinfo['prenom']; ?>
	<br>
	nom : <?php echo $userinfo['nom']; ?>
	<br>
	password : **********
	<br>
</body></center>
</html>