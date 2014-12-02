<?php
	session_start();
	$user = $_POST['user'];
	if (!$_SESSION['user'] == "admin") {
		
		$pw = $_POST['pw'];
		if ($user == "admin" and $pw == "123") {
			$_SESSION['user'] = "admin";
		} else {
			die ("Passwort falsch !!");      
		}
}
?>
<!doctype html>
<html>
<head>
	<meta charset="iso-8859-1">
	<title>Anmeldung erfolgreich</title>
</head>
<body>
<h1>Sie sind angemeldet.</h1>	
<p><a href="insert_form.php">Weiter</a></p>  
	<p><a href="logout.php">Logout</a></p>  
</body>
</html>
