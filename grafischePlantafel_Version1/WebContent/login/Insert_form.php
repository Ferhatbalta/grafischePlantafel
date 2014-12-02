<?php
  session_start();
 	 if (!$_SESSION['user'] == "admin") {
     		die ("No session !!");
  }
?>
<!doctype html>
<html>
<head>
	<title>Daten einfuegen</title>
	<meta charset="iso-8859-1">
</head>
<body>
	<form action="DBName1.php" method="post">
		<p><label for="name">Name:<br>
			<input type="text" name="name" id="name"></label></p>
		<p><label for="nummer">Nummer:<br>
			<input type="number" name="nummer" id="nummer"></label></p>
		<input type="submit" value="Speichern">
	</form>
</body>
</html>
