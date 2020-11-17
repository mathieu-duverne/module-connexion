<?php 

	if (isset($_POST['pwd'])) {
		$pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
		$pwdverif = $_POST['pwdverif'];
		$checkpwd = password_verify($pwdverif, $pwd);
		if ($checkpwd == true) {
			echo $pwdverif;
			echo $checkpwd;
		}


	}


 ?>


 <form action="test.php" method="POST">
 	<input type="password" name="pwd">
 	<input type="password" name="pwdverif">
 	<input type="submit" name="submit">
 </form>