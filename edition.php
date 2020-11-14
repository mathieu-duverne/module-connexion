<?php 
session_start();	
	require_once'includes/db.php';
			if (isset($_SESSION['id'])){				
				$id=$_SESSION['id'];
				//var_dump($id);
				$query=mysqli_query($db,"SELECT * FROM utilisateurs WHERE id='$id'");
				$row=mysqli_fetch_array($query);
	}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Editez votre profil</title>
</head>
<body align="center">
<h1><?php echo $row['prenom']; ?> edite ton profil</h1>
<form action="edition.php" method="POST">
	<label for="newlogin">Login :</label><br>
	<input type="text" name="newlogin" placeholder="Change ton login" value="<?php echo $row['login'];?>"><br><br>
	<label for="newprenom">Prenom :</label><br>
	<input type="text" name="newprenom" placeholder="Change ton prenom" value="<?php echo $row['prenom'];?>"><br><br>
	<label for="newnom">Nom</label><br>
	<input type="text" name="newnom" placeholder="Change ton nom" value="<?php echo $row['nom'];?>"> <br><br>
	<label for="oldpass">Ancien mot de passe</label><br>
	<input type="password" name="oldpass" placeholder="rentre ton ancien mot de passe" ><br><br>
	<label for="newpass">Nouveau mot de passe</label><br>
	<input type="password" name="newpass" placeholder="Change ton mot de passe" ><br>
	<br>
	<label for="newconfirmpass">Confirme ton nouveau mot de passe</label><br>
	<input type="password" name="newconfirmpass" placeholder="confirme la saisie ton mot de passe" > <br>
	<br>
	<input type="submit" name="submit" value="Valide tes changements">
	<a href="index.php">BACK TO U PROFILE</a>
</form>
</body>
</html>
<?php 
	if(isset($_POST['submit'])){
		// var_dump($_POST);
        $newlogin = $_POST['newlogin'];
        $newprenom = $_POST['newprenom'];
        $newnom = $_POST['newnom'];
        // $oldpass = $_POST['oldpass'];
        // $newpass = ($_POST['newpass']);
        // $newconfirmpass = password_hash($_POST['newconfirmpass'], PASSWORD_DEFAULT);
      $query = "UPDATE utilisateurs SET login = '$newlogin', prenom = '$newprenom', nom = '$newnom' WHERE id = '$id';";
                    $result = mysqli_query($db, $query);
                    echo "vos donée ont bien etaient modifié<a href=\"connexion.php\"></a>";


        if (isset($_POST['oldpass']) && isset($_POST['newpass']) && isset($_POST['newconfirmpass'])) {



                    	$oldpass = $_POST['oldpass'];
       					$newpass = $_POST['newpass'];

        				$newconfirmpass = password_hash($_POST['newconfirmpass'], PASSWORD_DEFAULT);

        				$oldcheck = password_verify($oldpass, $row['password']);

        				// var_dump($oldpass);
        				// var_dump($row['password']);

        if ($oldcheck == true) {
        					$newcheck = password_verify($newpass, $newconfirmpass);

        			if ($newcheck == true) {
$query = "UPDATE utilisateurs SET password = '$newconfirmpass' WHERE id = '$id';";
                    $result = mysqli_query($db, $query);
        						echo "Votre Mot de passe a bien était modifié";
        						header('location:profil.php?id='.$_SESSION['id']);
        						exit();
        						mysqli_close($db);
        					}
        				}
                    }
                }
 ?>