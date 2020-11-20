<!DOCTYPE html>
<html>
<head>
	<title>Administration</title>
</head>
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
<body>
	<table class="table">
	<thead class="thead-dark">
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Login</th>
			<th scope="col">Prenom</th>
			<th scope="col">Nom</th>
		</tr>
	</thead>
	<tbody>
		<tr>
<?php 
session_start();
require_once'includes/db.php';
require_once'includes/function.php';
if (isset($_POST['idbutton'])) {
	$thisid = $_POST['idbutton'];
	$_SESSION['userid'] = $thisid;
		$query=mysqli_query($db,"SELECT id FROM utilisateurs");
               while (($rows=mysqli_fetch_array($query))!== null) {
                	foreach ($rows as $key) {
                		// var_dump($key);
                		// var_dump($_POST);
                		 if ($key == $thisid) {
                		 	$i=0;$query = mysqli_query($db,"SELECT * FROM utilisateurs WHERE id='$thisid';");
                		 	while($row = mysqli_fetch_array($query)){
                		 	echo"<td scope=\"row\">".$row['id']."</td><td>".$row['login']."</td><td>".$row['prenom']."</td><td>".$row['nom']."";
                		 }
			}break;
       }
   }            	
}
?>
</tr>
	</tbody>
</table>
<?php
if (isset($_POST['adminlog']) && isset($_POST['adminprenom']) && isset($_POST['adminNom'])) {
			$newlogin = htmlspecialchars($_POST['adminlog']);
              $newprenom = htmlspecialchars($_POST['adminprenom']);
              $newnom = htmlspecialchars($_POST['adminNom']);
             $userid = $_SESSION['userid'];
              if (invalidLogin($newlogin) !== false) {
		echo "login invalid il ne doit pas contenir de caractère speciaux veuillez respecter la syntaxe";
		echo "<a href=\"admin.php\" class=\"btn btn-primary\">Echouée Retry</a><br>";
		exit();
				}
				if (invalidName($newprenom) !== false) {
		echo "Prenom invalide il ne doit pas contenir de caractère speciaux veuillez respecter la syntaxe";
		echo "<a href=\"admin.php\" class=\"btn btn-primary\">Echouée Retry</a><br>";
		exit();
				}
				if (invalidName($newnom) !== false) {
		echo "Nom invalid il ne doit pas contenir de caractère speciaux  veuillez respecter la syntaxe";
		echo "<a href=\"admin.php\" class=\"btn btn-primary\">Echouée Retry</a><br>";
		exit();
				}
				if (uidExists($db, $newlogin) !== false) {
	echo "Le login insérer est deja pris veuillez respecter la syntaxe";
	echo "<a href=\"admin.php\" class=\"btn btn-primary\">Echouée Retry</a><br>";
	exit();
}
              $query = "UPDATE utilisateurs SET login = '$newlogin', prenom = '$newprenom', nom = '$newnom' WHERE id = '$userid';";
              $result = mysqli_query($db, $query);
                      echo "<a href=\"admin.php\" class=\"btn btn-primary\">Modification completée</a><br>";
                      exit();
	}

 ?>

	<main class="text-center">
		<br><br><br><br>
<h3>Tu peux modifié les informations mais pas le mot de passe.</h3>
<br>
<div class="text-center">
<a href="" class="btn btn-primary" data-toggle="modal" data-target="#modalSubscriptionForm">Modifie</a><br>
</div>
<form action="adminsisi.php" method="POST">
<div class="modal fade" id="modalSubscriptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Hello I'm Steve Jobs</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="form3">Nouveau Login</label>
          <input  name="adminlog" type="text" id="form3" class="form-control validate">
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-envelope prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="form2">Nouveau Prenom</label>
          <input  name="adminprenom" type="text" id="form2" class="form-control validate">
        </div>
        <br>
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="form1">Nouveau Nom</label>
          <input  name="adminNom" type="text" id="form1" class="form-control validate">
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="submit" class="btn btn-info">
      <span class="glyphicon glyphicon-send"></span>Send
    </button>
      </div>
    </div>
  </div>
</div>
</form><br>
<h5 class="text-center">rafraichie pour observé les changements</h5><br>
<a href="admin.php" class="btn btn-outline-primary">Reviens sur le page d'administration</a> <br><br>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
</body>
</html>