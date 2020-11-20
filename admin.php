<!DOCTYPE html>
<html>
<head>
    <title>Administration</title>
</head>
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
<body>
<style>
    body{
        text-align: center;
    }
    table{
        width: 100%;
        text-align: center;
    }
    th{
        border: 1px solid grey;
        padding: 2px;
    }
    th{
    }
    td{
        border: 1px solid grey;
        padding: 2px;
    }
</style>
<?php 		
session_start();
require_once'includes/db.php';
if($_SESSION['id']!=1){
					$_SESSION = array();
					session_destroy();
					header("Location: connexion.php");
}
            $requete =  ("SELECT * FROM utilisateurs;");
            $resultat = mysqli_query($db, $requete);
            $j=0;
            while (($field = mysqli_fetch_assoc($resultat))!== null){//pour les champs voir toutes les facon de faire W3SCHOOL
                if ($j==0) {
                    foreach ($field as $key => $value) {
            } 
            $j=$j+1;
            $idbutn = 0;
           }
                    $o = 0;
                    foreach ($field as $value) {
                        if ($o == 0){
                            $idbutn = $value;
                            $o = 1;
                        }
        }
		if($_SESSION['id']==1){
			 $requete =  ("SELECT * FROM utilisateurs;");
                $resultat = mysqli_query($db, $requete);
        $i=0;
       echo"<h1>Tous les utilisateurs du WEBSITE</h1><table><thead><tr>";
                while (($field = mysqli_fetch_assoc($resultat))!== null){//pour les champs voir toutes les facon de faire W3SCHOOL
                if ($i==0) {
                    foreach ($field as $key => $value) {
                        echo '<th>'.$key.'</th>';
            } 
            $i=$i+1;
            $idbtn = 0;
           }
        echo"</tr></thead><tbody><tr>";
                    $x = 0;
                    foreach ($field as $value) {
                        if ($x == 0){
                            $idbtn = $value;
                           
                            $x = 1;
                        }
                        echo '<td>'.$value.'</td>';
        }
        echo"<th><form method=\"post\" action=\"adminsisi.php\"><button  name=\"idbutton\" value=\"$idbtn\" >Edite</button></form></th><th><button type=\"submit\" value=\"$idbutn\" name=\"\" data-toggle=\"modal\" data-target=\"#modalSubscriptionForm\" class=\btn btn-light\">Delete</button></th></tr>";
    }
       echo "</tbody></table><br><br><a href=\"index.php\">Back</a>";
		}
 ?>
 <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="modalSubscriptionForm" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form><button type="submit" name="" class="btn btn-primary">Confirmer La supprésion</button></form>
   <?php 
        if (isset($_POST)) {
        $query=mysqli_query($db,"SELECT id FROM utilisateurs WHERE id='$idbutn'");
               while (($rows=mysqli_fetch_array($query))!== null) {
                    foreach ($rows as $key) {
                        // var_dump($key);
                        // var_dump($_POST);
                         if ($key == $idbutn) {
                            $i=0;$query = mysqli_query($db,"SELECT * FROM utilisateurs;");
                            while($row = mysqli_fetch_array($query)){
                            echo"<td scope=\"row\">".$row['id']."</td><td>".$row['login']."</td><td>".$row['prenom']."</td><td>".$row['nom']."";
                         }
            }break;
       }
   }
   }                
} mysqli_close($db);
    ?>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
</body>
</html>