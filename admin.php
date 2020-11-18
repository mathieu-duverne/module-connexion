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
                        // var_dump($);
        }
        echo"<th><form method=\"post\" action=\"adminsisi.php\"><button  name=\"idbutton\" value=\"$idbtn\" >Edite</button></form></th> <th><button>Delete</button></th></tr>";
    }
       echo "</tbody></table><br><br><a href=\"index.php\">Back</a>";
    mysqli_close($db);

		}
 ?>