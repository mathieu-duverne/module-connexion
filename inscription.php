<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inscris-toi</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styleconnexion.css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style>
		body{
			text-align: center;
			font-size: 12px;
			letter-spacing: 2px;
			color: black;
		}
		label{
			color: black;
		}
	</style>
</head>
<body class="text-center">
	<form class="form-signin" action="inscription.php" method="post">
		<img class="mb-4" src="images/steve.jpg" alt="" width="100" height="100">
		<h1>Please Sign up</h1>
		<label  for="login">login</label>
		<input class="form-control" name="login" type="text" value="<?php if(isset($login)) { echo $login; } ?>" required>
		<label  for="name">Prenom</label>
		<input class="form-control" id="name" name="name" type="text" value="<?php if(isset($name)) { echo $name; } ?>" required>
		<label  for="surname">nom</label>
		<input class="form-control" name="surname" value="<?php if(isset($surname)) { echo $surname; } ?>" type="text" required>
		<label  for="pass">Password</label>
		<input class="form-control" name="pass" type="password" required>
		<label  for="confirm_password">confirm your Password</label>
		<input class="form-control"  name="confirm_password" type="password" required>
		<button class="btn btn-info btn-lg" type="submit" name="form_inscription">Inscription</button><br>
		<a href="connexion.php">Connectez-vous</a>
		</form>
			</body>
			</html>>
		
<?php
            if (isset($_POST['form_inscription'])) 
{
		require_once'includes/db.php';
		require_once'includes/function.php';

					$login = htmlspecialchars($_POST['login']);
					$name = htmlspecialchars($_POST['name']);
					$surname = htmlspecialchars($_POST['surname']);
					$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
					$confirm_pass = ($_POST['confirm_password']);
					$pwd_verif_inscription = password_verify($confirm_pass, $pass);
//si le login existe deja dans la bdd
if (uidExists($db, $login) !== false) {
	echo "Le login insérer est deja pris";
	exit();
}
//si le login est rentré avec des mauvais caractère
elseif (invalidLogin($login) !== false) {
		echo "login invalid il ne doit pas contenir de caractère speciaux";
		exit();
}
elseif (invalidPass($confirm_pass) !== false) {
		echo "password invalid il ne doit pas contenir de caractère speciaux et pas plus de 23 caractère";
		exit();
}
elseif (invalidName($name) !== false) {
		echo "Name invalid il ne doit pas contenir de caractère speciaux";
		exit();
}
elseif (invalidSurname($surname) !== false) {
		echo "Surname invalid il ne doit pas contenir de caractère speciaux";
		exit();
}
//si la verification du mdp a mal était faite
elseif (pwdMatch($pwd_verif_inscription) !== true) {
	echo "mot de passe mal confirmer c dure la vie qd t pas steve jobs";
	exit();
}
else{
//function qui insert tous les elements
inscription($db, $login, $surname, $name, $pass);
mysqli_close($db);
header('location: connexion.php');
exit();
	}
}
/* Fermeture de la connexion */
?>

