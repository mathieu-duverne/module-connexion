<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Connexion</title>
</head>
<body>
	<form method="post" action="">
		<label for="log">Login : </label>
		<br>
		<input type="text" name="log" id="log" value="<?php if(isset($log)) { echo $log; } ?>" >
		<br>
		<label for="password">Password : </label>
		<br>
		<input type="password" name="password" id="password">
		
	</form>
	
</body>
</html>