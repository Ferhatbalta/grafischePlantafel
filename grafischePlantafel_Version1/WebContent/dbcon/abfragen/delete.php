<?php


// 1
$dbhost = "localhost";
$dbuser = "dbuser";
$dbpassword = "";
$connection = mysql_connect($dbhost, $dbuser, $dbpassword) or die("Kann nicht verbinden: " . mysql_error());

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$mid = $request->mid;

//2


$dbname = "studienPlaner";
mysql_select_db($dbname, $connection) or die("Konnte Datenbank nicht auswählen");

//3
$query = "DELETE FROM location WHERE M_ID = $mid";

$result = mysql_query($query, $connection) or die("Query failed: " . mysql_error());
	
$json = array();
while ($r=mysql_fetch_assoc($result)){
	$json[]= $r;
}

echo $json_data = json_encode($json);

// frdsh

$query1 = "DELETE FROM Modul WHERE M_ID =  $mid";

$result1 = mysql_query($query1, $connection) or die("Query failed: " . mysql_error());

$json1 = array();
while ($r1=mysql_fetch_assoc($result1)){
	$json1[]= $r1;
}

echo $json_data = json_encode($json1);
	
?>
