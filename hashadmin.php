
 <form action="hashadmin.php" method="post">
 	<input type="password" name="admin">
 	<input type="submit" name="submit">
 </form><?php 

		if (isset($_POST['submit'])) {
			$pwd = password_hash($_POST['admin'], PASSWORD_DEFAULT);
		}
		echo $pwd;

 ?>