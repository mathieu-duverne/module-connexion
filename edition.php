<?php 
session_start();    
    require_once'includes/db.php';
            if (isset($_SESSION['id'])){                
                $id=$_SESSION['id'];
                //var_dump($id);
                $query=mysqli_query($db,"SELECT * FROM utilisateurs WHERE id='$id'");
                $row=mysqli_fetch_array($query);
              
    }
    if (!isset($_SESSION['userlogin']) && !isset($_SESSION['userpass']) && !isset($_SESSION['id']) && !isset($_SESSION['prenom']) && !isset($_SESSION['nom'])) {
                    session_start();
                    $_SESSION = array();
                    session_destroy();
                    header("Location: connexion.php");
    }
 if (isset($_SESSION['userlogin']) && isset($_SESSION['userpass']) && isset($_SESSION['id']) && isset($_SESSION['prenom']) && isset($_SESSION['nom'])) {
echo"<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Editez votre profil</title>
</head>
<center><body>
<h1> ".$row['prenom']." Edite ton profil</h1>
<form action=\"edition.php\" method=\"POST\">
    <label for=\"newlogin\">Login : ".$row['login']."</label><br>
    <input required type=\"text\" name=\"newlogin\" placeholder=\"Change ton login\" value=\"\"><br><br>
    <label for=\"newprenom\">Prenom : ".$row['prenom']."</label><br>
    <input required type=\"text\" name=\"newprenom\" placeholder=\"Change ton prenom\" value=\"\"><br><br>
    <label for=\"newnom\">Nom : ".$row['nom']."</label><br>
    <input required type=\"text\" name=\"newnom\" placeholder=\"Change ton nom\" value=\"\"> <br><br>
<input type=\"submit\" name=\"submit\" value=\"Valide tes informations personnelles\">
</form>
<form action=\"edition.php\" method=\"POST\">
<br><br>
    <label for=\"oldpass\">Ancien mot de passe</label><br>
    <input type=\"password\" name=\"oldpass\" placeholder=\"rentre ton ancien mot de passe\"><br><br>

    <label for=\"newpass\">Nouveau mot de passe</label><br>
    <input type=\"password\" name=\"newpass\" placeholder=\"Change ton mot de passe\" ><br><br>

    <label for=\"newconfirmpass\">Confirme ton nouveau mot de passe</label><br>
    <input type=\"password\" name=\"newconfirmpass\" placeholder=\"confirme la saisie ton mot de passe\"><br><br>
    <input type=\"submit\" name=\"submitmdp\" value=\"Valide ton changement de mot de passe\">
    
    <br><a href=\"index.php\">BACK TO U PROFILE</a>
</form>
</body></center>
</html>";
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
              $query = "UPDATE utilisateurs SET login = '$newlogin', prenom = '$newprenom', nom = '$newnom' WHERE id = '$id';";
                    $result = mysqli_query($db, $query);
                      echo "vos donnée ont bien etaient modifié<a href=\"profil.php\">Retour vers ton profil</a>";
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
 ?>