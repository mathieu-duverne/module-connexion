<!DOCTYPE html>
<html lang="en">
<head>
  <title>Index</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
  	
  	.sisi{
  		margin-right: 10px;
  		margin-top: 10px;
  	}
  	.sis{
  		font-size: 20px;
  	}
  	.rounded{
  		border-radius: 50%;
  	}
  


  </style>
</head>
<body class="text-center">
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="#">Page 2</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
<?php 
session_start(); 
	if (!isset($_SESSION['id'])) {
	
     echo" <li><a href=\"inscription.php\"><span class=\"glyphicon glyphicon-user\"></span> Sign Up</a></li>
      <li><a href=\"connexion.php\"><span class=\"glyphicon glyphicon-log-in\"></span> Login</a></li>";
}
if(isset($_SESSION['userlogin']) && isset($_SESSION['userpass']) && isset($_SESSION['id'])){
			$userprenom=$_SESSION['prenom'];
			
			// var_dump($_SESSION['userlogin']);
			// var_dump($_SESSION['userpass']);
			echo "<li><a class=\"sis\">".$_SESSION['prenom']." Jobs</a></li>";
			echo "<a  href=\"profil.php\" class=\"btn btn-default btn-sm sisi\">
          <span class=\"glyphicon glyphicon-user\"></span>Profil 
        </a>";
		
?>
    </ul>
  </div>
</nav>
<main>
<img width="250" height="200" class="rounded" src="images/imagesteve.jpg">
<h1>Bienvenue Steve <?php echo$_SESSION['nom']; ?></h1>
<h5>Voila la page d'accueil d'un vrai steve jobs Deconnecte toi ou va voir ton profil en haut, the most powerful is the design</h5>
<a href="deconnexion.php">Deconnexion</a>




<?php
 }
if ($_SESSION['id'] == 1) {
 	echo "<h1>You are the ADMIN of this website</h1><br><a href=\"profil.php\">Profil</a><br>
<a href=\"admin.php\">Gerer les utilisateurs de votres site</a>
 	";
 	exit();
 }
?>
	
</main>
</body>
</html>