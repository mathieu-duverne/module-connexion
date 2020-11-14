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
	<style>
		body{
			text-align: center;
			font-size: 12px;
			letter-spacing: 2px;
		}
	</style>
</head>
<body>
	<center><form action="" method="post">
		<label for="login">login</label>
		<br>
		<input id="login" name="login" type="text" value="<?php if(isset($login)) { echo $login; } ?>" required>
		<br>
		<label for="name">Prenom</label>
		<br>
		<input id="name" name="name" type="text" value="<?php if(isset($name)) { echo $name; } ?>" required>
		<br>
		<label for="surname">nom</label>
		<br>
		<input name="surname" value="<?php if(isset($surname)) { echo $surname; } ?>" type="text">
		<br>
		<label for="pass">Password</label>
		<br>
		<input name="pass" id="pass" type="password" required>
		<br>
		<label for="confirm_password">confirm your Password</label>
		<br>
		<input id="confirm_password" name="confirm_password" type="password" required>
		<br> <br>
		<input type="submit" value="Inscription" id="form_inscription" name="form_inscription">
		&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="connexion.php">Connectez-vous</a>
	</form></center>
	</body>
</html>