<?php


// 1
$dbhost = "localhost";
$dbuser = "dbuser";
$dbpassword = "";
$connection = mysql_connect($dbhost, $dbuser, $dbpassword) or die("Kann nicht verbinden: " . mysql_error());


$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$fak = $request->name;
//2


$dbname = "studienPlaner";
mysql_select_db($dbname, $connection) or die("Konnte Datenbank nicht auswählen");

//3
$query = "SELECT S_ID, S_kurz, S_Name FROM `Studiengang` WHERE `F_ID` = $fak";
$result = mysql_query($query, $connection) or die("Query failed: " . mysql_error());
	
$json = array();
while ($r=mysql_fetch_assoc($result)){
	$json[]= $r;
}

echo $json_data = json_encode($json);

	
?>
