<?php
session_start();
require_once'includes/db.php';

            if (isset($_POST['form_inscription'])) 
{
if (!empty($_POST['login']) AND !empty($_POST['name']) AND !empty($_POST['surname']) AND !empty($_POST['pass']) AND !empty($_POST['confirm_password'])) // a voir la variables n'as encore prisIMPROTANT
	{
		// $requete = "INSERT INTO utilisateurs(login, prenom, nom, password) VALUES(?, ?, ?, ?)";
$stmt = mysqli_stmt_init($db);
if (mysqli_stmt_prepare($stmt, "INSERT INTO utilisateurs(login, prenom, nom, password) VALUES(?, ?, ?, ?)")) {
		$login = htmlspecialchars($_POST['login']);//sert a securiser la variables
		$name = htmlspecialchars($_POST['name']);
		$surname = htmlspecialchars($_POST['surname']);
		$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
		$confirm_pass = ($_POST['confirm_password']);
		$pwdyea = password_verify($confirm_pass, $pass);
		if ($pwdyea == true) {
		 /* Association des variables SQL */
  	 	 mysqli_stmt_bind_param($stmt,'ssss', $login, $name, $surname, $pass);
   	 		/* Exécution de la requête le 'ssss' reprensente les 4 champs d'apres si tu remplace par d celle ci n'apparait pas ... */
    			mysqli_stmt_execute($stmt);
    			 mysqli_stmt_close($stmt);
    				 header("location: connexion.php");
}
else
echo "c dur la vie quand tu sais pas bien confirmer ton mot de passe";
}
/* Fermeture de la connexion */
mysqli_close($db);
	}
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inscris-toi</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styleconnexion.css">
	<style>
		body{
			text-align: center;
			font-size: 12px;
			letter-spacing: 2px;
		}
	</style>
</head>
<body class="text-center">
	<form class="form-signin" action="" method="post">
		<img class="mb-4" src="includes/bootstrap-solid.svg" alt="" width="72" height="72">
		<h1 class="h3 mb-3 font-weight-normal">Please Sign up</h1>
		<label class="label" for="login">login</label>
		<br>
		<input class="form-control" id="login" name="login" type="text" value="<?php if(isset($login)) { echo $login; } ?>" required>
		<br>
		<label class="label" for="name">Prenom</label>
		<br>
		<input class="form-control" id="name" name="name" type="text" value="<?php if(isset($name)) { echo $name; } ?>" required>
		<br>
		<label class="label" for="surname">nom</label>
		<br>
		<input class="form-control" name="surname" value="<?php if(isset($surname)) { echo $surname; } ?>" type="text">
		<br>
		<label class="label" for="pass">Password</label>
		<br>
		<input class="form-control" name="pass" id="pass" type="password" required>
		<br>
		<label class="label" for="confirm_password">confirm your Password</label>
		<br>
		<input class="form-control" id="confirm_password" name="confirm_password" type="password" required>
		<br> <br>
		<button class="btn btn-lg btn-primary btn-block" name="form_inscription" type="submit">Sign Up</button>
		<a href="connexion.php">Connectez-vous</a>
	</form>
	</body>
</html>