<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=moduleconnexion', 'root', '');

if (isset($_POST['form_inscription'])) 
{
	if (!empty($_POST['log']) AND !empty($_POST['name']) AND !empty($_POST['surname']) AND !empty($_POST['password']) AND !empty($_POST['confirm_password'])) 
	{


		$login = htmlspecialchars($_POST['log']);
		$name = htmlspecialchars($_POST['name']);
		$surname = htmlspecialchars($_POST['surname']);
		$password = sha1($_POST['password']);
		$confirm_password = sha1($_POST['confirm_password']);

		if ($password == $confirm_password) 
		{

			$reqlogin = $bdd->prepare('SELECT * FROM utilisateurs WHERE login = ?');
			$reqlogin-> execute(array($login));
			$loginexist = $reqlogin->rowCount();
				if ($loginexist == 0) 
				{

					
				
			
				$insertmbr = $bdd->prepare("INSERT INTO utilisateurs(login, prenom, nom, password) VALUES(?, ?, ?, ?)");
				$insertmbr ->execute(array($log, $name, $surname, $password));
				echo"Tout correspond vous etes inscrit";
				header('location: connexion.php');
		}
		else
		{
			echo "le login est déja utilisée";
		}
			}
		else
		{
			echo  "le mot de passe ne correspond pas !";
		}

		

	}
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inscris-toi</title>
</head>
<body>
	<form action="" method="post">
		<label for="log">login</label>
		<br>
		<input id="log" name="log" type="text" value="<?php if(isset($log)) { echo $log; } ?>" required>
		<br>
		<label for="name">Prenom</label>
		<br>
		<input id="name" name="name" type="text" value="<?php if(isset($name)) { echo $name; } ?>" required>
		<br>
		<label for="surname">nom</label>
		<br>
		<input name="surname" value="<?php if(isset($surname)) { echo $surname; } ?>" type="text">
		<br>
		<label for="password">Password</label>
		<br>
		<input name="password" id="password" type="password" required>
		<br>
		<label for="confirm_password">confirm your Password</label>
		<br>
		<input id="confirm_password" name="confirm_password" type="password" required>
		<br>
		<input type="submit" value="Inscription" id="form_inscription" name="form_inscription">

	</form>
	
</body>
</html>