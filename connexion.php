<?php
require_once'includes/db.php';

     if (isset($_POST['formconnexion'])) {
            if (!empty($_POST['loginconnect']) AND !empty($_POST['passconnect'])){
				$login = htmlspecialchars($_POST['loginconnect']);
				$passco = $_POST['passconnect'];
//  Récupération de l'utilisateur et de son pass hashé
            		$stmt = mysqli_stmt_init($db);
mysqli_stmt_prepare($stmt, 'SELECT * FROM utilisateurs WHERE login=? OR password=? OR id=? OR nom=? OR prenom=?');
					mysqli_stmt_bind_param($stmt, "ssiss", $login, $passco, $id, $nom, $prenom);
					mysqli_stmt_execute($stmt);
					$result = mysqli_stmt_get_result($stmt);
					$row = mysqli_fetch_assoc($result);
					$pwdCheck = password_verify($passco, $row['password']);
					// var_dump($passco);
					// var_dump($row['password']);	
					//  var_dump($row);
	if ($pwdCheck == false && $login != $row['login'] ) {
				echo "mot de passe incorrect ou login incorrect";
			}
	elseif ($pwdCheck == true && $login == $row['login']) {
		session_start();
				//var_dump($row);				
				//variable session
				$_SESSION['userlogin'] = $row['login'];
				$_SESSION['userpass'] = $row['password'];
				$_SESSION['id'] = $row['id'];
				$_SESSION['nom']=$row['nom'];
				$_SESSION['prenom']=$row['prenom'];
				header("location:index.php?connexion=succée");
					}	
    		}mysqli_stmt_close($stmt);
    	}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Connexion</title>

	<link rel="stylesheet" type="text/css" href="styleconnexion.css">
</head>
<body>
	<form method="post" action="connexion.php">
		<label for="loginconnect">Login : </label>
		<input required type="text" name="loginconnect" id="loginconnect" value="<?php if(isset($login)) { echo $login; } ?>" >
		<label for="passconnect">Password : </label>
		<input type="password" name="passconnect" id="passconnect" required>
		<input type="submit" value="Connexion" name="formconnexion">
		
		<a href="inscription.php">S'inscrire</a>
	</form>
	
</body>
</html>