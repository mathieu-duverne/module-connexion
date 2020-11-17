<?php 
function inscriptionVide($login, $name, $surname, $pass, $confirm_password){

		$result;
		if (empty($login) || empty($name) || empty($surname) || empty($pass) || empty($confirm_pass)) {
			$result = true;	
		}
		else{
			$result = false;
		}
		return $result;
}
//VOIR REGEX
	function invalidLogin($login){
		$result;
		if (!preg_match("/^[a-zA-Z0-9]{0,25}$/", $login)) {
			$result = true;
		}
		else{
			$result = false;
		}
		return $result;
	}
	function invalidPass($pass){
		$result;
		if (!preg_match("/^[a-zA-Z0-9]{0,25}$/", $pass)) {
			$result = true;
		}
		else{
			$result = false;
		}
		return $result;
	}
	function invalidName($name){
		$result;
		if (!preg_match("/^[a-zA-Z0-9]{0,25}$/", $name)) {
			$result = true;
		}
		else{
			$result = false;
		}
		return $result;
	}
	function invalidSurname($surname){
		$result;
		if (!preg_match("/^[a-zA-Z0-9]{0,25}$/", $surname)) {
			$result = true;
		}
		else{
			$result = false;
		}
		return $result;
	}
function pwdMatch($pwd_verif_inscription){
		$result;
		if ($pwd_verif_inscription == false) {
			$result = false;
		}
		else{
			$result = true;
		}
		return $result;
	}
	function uidExists($db, $login){
		$sql = "SELECT * FROM utilisateurs  WHERE login = ? ;";
		$stmt = mysqli_stmt_init($db);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
		// header("location: inscription.php?=errorUIDexists");
			echo "ici";//A VOIRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
		exit();	
		}
		//recuperation des donnée de la bdd
		mysqli_stmt_bind_param($stmt, "s", $login);
//execution
		mysqli_stmt_execute($stmt);
//retour sous forme d'une variables $resultData
		$resultData = mysqli_stmt_get_result($stmt);
//si il recupere les data dans la bdd alors sous forme de tableau associatif il les renvoie
		if ($row = mysqli_fetch_assoc($resultData)) {
				return $row;
		}
		else
		{
			$result = false;
			return $result;
		}
		mysqli_stmt_close($stmt);
	}
	function inscription($db, $login, $surname, $name, $pass){
		$sql = "INSERT INTO utilisateurs(login, prenom, nom, password) VALUES(?, ?, ?, ?);";
		$stmt = mysqli_stmt_init($db);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: inscription.php");
		exit();}
		 mysqli_stmt_bind_param($stmt,'ssss', $login, $name, $surname, $pass);
   	 		/* Exécution de la requête le 'ssss' reprensente les 4 champs d'apres si tu remplace par d celle ci n'apparait pas ... */
    			mysqli_stmt_execute($stmt);
    			mysqli_stmt_close($stmt);
    			header("location: connexion.php");
	}
//LES FUNCTION POUR INSCRIPTION

//LES FUNCTION POUR CONNEXION
	function invalidloginConnect($login){
		$resulta;
		if (!preg_match("/^[a-zA-Z0-9]{0,25}$/", $login)) {
			$resulta = true;
		}
		else{
			$resulta = false;
		}
		return $resulta;
	}
	function invalidpassConnect($passco){
		$resultat3;
		if (!preg_match("/^[a-zA-Z0-9]{0,25}$/", $passco)) {
			$resultat3 = true;
		}
		else{
			$resultat3 = false;
		}
		return $resultat3;
	}
function loginConnect($db, $login, $passco){
	// $login = htmlspecialchars($_POST['loginconnect']);
	// $passco = $_POST['passconnect'];
if(isset($_POST['formconnexion'])){
	$sql = 'SELECT * FROM utilisateurs WHERE id=? OR login=? OR password=?  OR nom=? OR prenom=?';
	$stmt = mysqli_stmt_init($db);
	mysqli_stmt_prepare($stmt, $sql);
 					mysqli_stmt_bind_param($stmt, "ssiss", $login, $passco, $id, $nom, $prenom);
 					mysqli_stmt_execute($stmt);
					$result = mysqli_stmt_get_result($stmt);
 	if($row = mysqli_fetch_assoc($result)){
							//mysqli_fetch_row()
 		var_dump($row);			
 if ($login == $row['login']) {
 	var_dump($row);
 					var_dump($row['password']);
 						var_dump($passco);
$pwdcheck = password_verify($passco, $row['password']);

 
 					//vers la ca bloque erreur n'ont apprecié demander a ruben
if ($pwdcheck == true) {
 		session_start();
 				//var_dump($row);				
 				//variable session;
 				$_SESSION['userlogin'] = $row['login'];
 				$_SESSION['userpass'] = $row['password'];
 				$_SESSION['id'] = $row['id'];
 				$_SESSION['nom']=$row['nom'];
 				$_SESSION['prenom']=$row['prenom'];
 				 header("location:index.php?connexion=succée");
 				mysqli_stmt_close($stmt);
 				exit();
 			}
 else{
 				$resultat2 = false;
 				return $resultat2;
				}
			}
		}		
	}
}
?>