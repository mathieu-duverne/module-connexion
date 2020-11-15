
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Connexion</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styleconnexion.css">
</head>
	<body class="text-center">
    <form class="form-signin" action="connexion.php" method="POST">
    	
  <img class="mb-4" src="includes/bootstrap-solid.svg" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

  <label for="loginconnect" class="sr-only">Login</label>
  <input type="text" name="loginconnect" class="form-control" required placeholder="Login">

  <label for="passconnect" class="sr-only">Password</label>
  <input type="password" name="passconnect" class="form-control" placeholder="Password" required>

  <div class="checkbox mb-3"></div>

  <button class="btn btn-lg btn-primary btn-block" name="formconnexion" type="submit">Sign in</button>

  <a href="inscription.php">S'inscrire</a>
  <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
</form>
</body>
</html>
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
					  // var_dump($row);
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