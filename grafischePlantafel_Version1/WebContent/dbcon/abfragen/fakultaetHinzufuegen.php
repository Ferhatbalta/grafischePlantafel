<?php


// 1
$dbhost = "localhost";
$dbuser = "dbuser";
$dbpassword = "";
$connection = mysql_connect($dbhost, $dbuser, $dbpassword) or die("Kann nicht verbinden: " . mysql_error());

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$fname = $request->fname;
$fkurz = $request->fkurz;



//2


$dbname = "studienPlaner";
mysql_select_db($dbname, $connection) or die("Konnte Datenbank nicht ausw�hlen");

//3
$query = " INSERT INTO Fakultaet (F_kurz, F_Name) VALUES ('$fname', '$fkurz')";
//INSERT INTO location(F_ID, S_ID, M_ID, Location) VALUES ('$fid', '$sid', '$mid', '8')";

$result = mysql_query($query, $connection) or die("Query failed: " . mysql_error());
	

$json = array();
while ($r=mysql_fetch_assoc($result)){
	$json[]= $r;
}

echo $json_data = json_encode($json);
	
?>
