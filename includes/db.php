<?php 
	
	$db = mysqli_connect("localhost", "root", "", "moduleconnexion");
            //On vérifie la connexion
            if (!$db) {
                echo "ECHEC DE LA CONNEXION";
                exit();
            }

?>