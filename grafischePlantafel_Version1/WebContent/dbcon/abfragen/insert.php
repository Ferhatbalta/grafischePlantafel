<?php


// 1
$dbhost = "localhost";
$dbuser = "dbuser";
$dbpassword = "";
$connection = mysql_connect($dbhost, $dbuser, $dbpassword) or die("Kann nicht verbinden: " . mysql_error());

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$fid = $request->fis;
$sid = $request->sid;
$mid = $request->mid;
$mkurz = $request->mkurz;
$modulname = $request->modulname;
$ects = $request->ects;


//2


$dbname = "studienPlaner";
mysql_select_db($dbname, $connection) or die("Konnte Datenbank nicht ausw�hlen");

//3
$query = " INSERT INTO Modul(S_ID, M_kurz, M_Name, ECTS) VALUES ('$sid', '$mkurz', '$modulname', '$ects')";

$result = mysql_query($query, $connection) or die("Query failed: " . mysql_error());
	

$json = array();
while ($r=mysql_fetch_assoc($result)){
	$json[]= $r;
}

echo $json_data = json_encode($json);
	
?>