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
    	
  <img class="mb-4" src="images/steve.jpg" alt="image-de-stevee-jobs" width="100" height="100">
  <h1>Please sign in</h1>

  <label for="loginconnect" class="sr-only">Login</label>
  <input class="form-control" type="text" name="loginconnect"  required placeholder="Login">

  <label for="passconnect" class="sr-only" >Password</label>
  <input class="form-control" type="password" name="passconnect"  placeholder="Password" required>
  <div class="checkbox mb-3"></div>
  <button class="btn btn-lg btn-primary btn-block" name="formconnexion" type="submit">Sign in</button><br>
  <a href="inscription.php">S'inscrire</a>
</form>
</body>
</html>
<?php
require_once'includes/db.php';
require_once'includes/function.php';
if(isset($_SESSION)) {
	session_destroy();
	header("location:connexion.php");
}
 	if(isset($_POST['formconnexion'])) {
 		$login = htmlspecialchars($_POST['loginconnect']);
		$passco = $_POST['passconnect'];

        if(loginConnect($db, $login, $passco)== false) {
            			echo "Login ou mot de passe Incorrect";        		
         }
         if (invalidPass($passco) !== false) {
         			echo "password invalid il ne doit pas contenir de caractère speciaux et pas plus de 23 caractère";
         }
}
 ?>