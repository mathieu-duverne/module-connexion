<?php 		
session_start();
require_once'includes/db.php';
if($_SESSION['id']!=1){
					$_SESSION = array();
					session_destroy();
					header("Location: connexion.php");
}
		if($_SESSION['id']==1){
			 $requete =  ("SELECT * FROM utilisateurs;");
                $resultat = mysqli_query($db, $requete);
        $i=0;
       echo"<h1>Tous les utilisateurs du WEBSITE</h1><table><thead><tr>";
                while (($field = mysqli_fetch_assoc($resultat))!== null){//pour les champs voir toutes les facon de faireW3SCHOOL
                if ($i==0) {
                    foreach ($field as $key => $value) {
                        echo '<th>'.$key.'</th>';
            } 
            $i=$i+1;
           }
        echo"</tr></thead><tbody><tr>";
                    foreach ($field as $value) {
                        echo '<td>'.$value.'</td>';
        }
        echo"</tr>";
    }
       echo "</tbody></table><br><br><a href=\"index.php\">Back</a>";
    mysqli_close($db);

		}
 ?>