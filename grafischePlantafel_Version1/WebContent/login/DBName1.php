<?php


$name = $_POST["name"];
$nummer = $_POST["nummer"];

$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$connection = mysql_connect($dbhost, $dbuser, $dbpassword) or die("Kann nicht verbinden: " . mysql_error());


$dbname = "iw";
mysql_select_db($dbname, $connection) or die("kann db nicht finden");
	
	
	
/**if (mysql_query("INSERT INTO Telefonbuch (name, nummer) VALUES ('" .$name . "', '" . $nummer . "')"))
{
	echo "Der Datensatz $name, $nummer wurde eingefügt.";
} else { print "Fehler beim Einfügen.";
}**/

mysql_query("INSERT INTO Telefonbuch (name, nummer) VALUES ('" .$name . "', '" . $nummer . "')");
mysql_close($connection);

	
?>
