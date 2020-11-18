<?php 
session_start();
require_once'includes/db.php';
   require_once'includes/function.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profil</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .sisi{
      margin-right: 10px;
      margin-top: 10px;
    }
    main{
      text-align: center;
     
    }
  main div{
     display:flex;
      flex-direction:row;
      justify-content:space-around;
  }
  main h1{
    font-size: 50px;
    letter-spacing: 5px;
  }

    </style>
</head>
<body>
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
 <li><a href="deconnexion.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
      <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> BACK</a></li>

      <a  href="profil.php\" class="btn btn-default btn-sm sisi">
          <span class="glyphicon glyphicon-user"></span>Profil 
        </a>
    </ul>
  </div>
</nav>
  <main> 
<?php
  if (isset($_SESSION['id'])){                
                $id=$_SESSION['id'];
                //var_dump($id);
                $query=mysqli_query($db,"SELECT * FROM utilisateurs WHERE id='$id'");
                $row=mysqli_fetch_array($query);
    }
//pour PROFIL BIEN REGARDER LES MODIFICATION NE SE CHARGE PAS DIRECTEMENT METTRE EN LIEN AVEC LA BDD ET L'ID VOULUE
		if (isset($_SESSION['userlogin']) && isset($_SESSION['userpass']) && isset($_SESSION['id']) && isset($_SESSION['prenom']) && isset($_SESSION['nom'])) 
			{
				$userinfo['login'] = $_SESSION['userlogin'];
				$userinfo['nom'] = $_SESSION['nom'];
				$userinfo['prenom'] = $_SESSION['prenom'];
				$userinfo['pass'] = $_SESSION['userpass'];
				// var_dump($userinfo);

	
	echo "<h2>Une fois vos modifications faites</h12><br><h3>Appuyer une fois sur ce boutton pour visualisé vos modifications !</h3><br><br><a href=\"profil.php\" class=\"btn btn-info btn-ms\">
          <span class=\"glyphicon glyphicon-send\"></span> Send 
        </a><br><div>
<form action=\"profil.php\" method=\"POST\">
	<h3>modifie tes infos</h3>
    <label for=\"newlogin\">Login : ".$row['login']."</label><br>
    <input class=\"form-control\" required type=\"text\" name=\"newlogin\" placeholder=\"Change ton login\" value=\"\"><br><br>

    <label for=\"newprenom\">Prenom : ".$row['prenom']."</label><br>
    <input class=\"form-control\" required type=\"text\" name=\"newprenom\" placeholder=\"Change ton prenom\" value=\"\"><br><br>

<label for=\"newnom\">Nom : ".$row['nom']."</label><br>
<input class=\"form-control\" required type=\"text\" name=\"newnom\" placeholder=\"Change ton nom\" value=\"\"><br><br>

<input class=\"btn btn-info btn-lg\" type=\"submit\" name=\"submit\" value=\"Valide tes informations personnelles\">
</form>

<form action=\"profil.php\" method=\"POST\">
<h3>modifie ton mot de passe</h3>
    <label for=\"oldpass\">Ancien mot de passe</label><br>
    <input class=\"form-control\" type=\"password\" name=\"oldpass\" placeholder=\"rentre ton ancien mot de passe\"><br><br>

    <label for=\"newpass\">Nouveau mot de passe</label><br>
    <input class=\"form-control\" type=\"password\" name=\"newpass\" placeholder=\"Change ton mot de passe\" ><br><br>

    <label for=\"newconfirmpass\">Confirme ton nouveau mot de passe</label><br>
    <input class=\"form-control\" type=\"password\" name=\"newconfirmpass\" placeholder=\"confirme la saisie ton mot de passe\"><br><br>
    <input class=\"btn btn-info btn-lg\" type=\"submit\" name=\"submitmdp\" value=\"Valide ton changement de mot de passe\">
    
   
</form>
</div>";

}
    if(isset($_POST['submit'])){
         //var_dump($_POST);
        // $oldpass = $_POST['oldpass'];
        // $newpass = ($_POST['newpass']);
        // $newconfirmpass = password_hash($_POST['newconfirmpass'], PASSWORD_DEFAULT);
        if (isset($_POST['newlogin']) && isset($_POST['newprenom']) && isset($_POST['newnom'])) {//quand l'on change deux sur 3 l'un se mets meme si il est vide penser a une suite de if pour chaque truc jsp 
           // var_dump($_POST);

                 $newlogin = $_POST['newlogin'];
              $newprenom = $_POST['newprenom'];
              $newnom = $_POST['newnom'];
              if (invalidLogin($newlogin) !== false) {
		echo "login invalid il ne doit pas contenir de caractère speciaux";
		exit();
				}
				if (invalidName($newprenom) !== false) {
		echo "Prenom invalide il ne doit pas contenir de caractère speciaux";
		exit();
				}
				if (invalidName($newnom) !== false) {
		echo "Nom invalid il ne doit pas contenir de caractère speciaux";
		exit();
				}
				if (uidExists($db, $newlogin) !== false) {
	echo "Le login insérer est deja pris";
	exit();
}
              $query = "UPDATE utilisateurs SET login = '$newlogin', prenom = '$newprenom', nom = '$newnom' WHERE id = '$id';";
                    $result = mysqli_query($db, $query);
                      echo "vos donnée ont bien etaient modifiéeeeeeeeeeeeeee";
                      exit();
		}
}
if(isset($_POST['submitmdp']))
{
      if (isset($_POST['oldpass']) && isset($_POST['newpass']) && isset($_POST['newconfirmpass'])) {

                        $oldpass = $_POST['oldpass'];
                        $newpass = $_POST['newpass'];
                        $newconfirmpass = password_hash($_POST['newconfirmpass'], PASSWORD_DEFAULT);
                        $oldcheck = password_verify($oldpass, $row['password']);
                        //var_dump($oldpass);
                         //var_dump($row['password']);
                         //var_dump($newpass);
                         //var_dump($newconfirmpass);
//oldcheck correspond a la verif de l'ancien et de celui dan la bdd
    if ($oldcheck == true) {
                            $newcheck = password_verify($newpass, $newconfirmpass);
                    if ($newcheck == true) {
$query = "UPDATE utilisateurs SET password = '$newconfirmpass' WHERE id = '$id';";
                    $result = mysqli_query($db, $query);
                                echo "Votre Mot de passe a bien était modifié";
                                header('location:profil.php?id='.$_SESSION['id']);
                                exit();
                                mysqli_close($db);
                              }else{
                                echo "Décidement tes nouveau mot de passe sont incorrect steve jobs"; 
                          }
                          }
                          else{
                                echo "ton ancien mdp n'est pas correct steve jobs";
                          }
                       }
                }
	if (!isset($_SESSION['userlogin']) && !isset($_SESSION['userpass']) && !isset($_SESSION['id']) && !isset($_SESSION['prenom']) && !isset($_SESSION['nom'])) 
			{
					session_start();
					$_SESSION = array();
					session_destroy();
					header("Location: connexion.php");
			}
    ?>
     </main>
   </body>
   </html>
