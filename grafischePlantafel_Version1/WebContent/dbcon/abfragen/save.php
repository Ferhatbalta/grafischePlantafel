<?php


// 1
$dbhost = "localhost";
$dbuser = "dbuser";
$dbpassword = "";
$connection = mysql_connect($dbhost, $dbuser, $dbpassword) or die("Kann nicht verbinden: " . mysql_error());

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$mid = $request->mid;
$lok = $request->lok;

//2


$dbname = "studienPlaner";
mysql_select_db($dbname, $connection) or die("Konnte Datenbank nicht auswählen");

//3
$query = "UPDATE location
SET Location= $lok
WHERE M_ID = $mid";
$result = mysql_query($query, $connection) or die("Query failed: " . mysql_error());
	
$json = array();
while ($r=mysql_fetch_assoc($result)){
	$json[]= $r;
}

echo $json_data = json_encode($json);

	
?>
