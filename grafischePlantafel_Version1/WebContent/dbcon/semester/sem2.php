<?php


// 1
$dbhost = "localhost";
$dbuser = "dbuser";
$dbpassword = "";
$connection = mysql_connect($dbhost, $dbuser, $dbpassword) or die("Kann nicht verbinden: " . mysql_error());

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$fak = $request->name;
$stud = $request->name1;

//2


$dbname = "studienPlaner";
mysql_select_db($dbname, $connection) or die("Konnte Datenbank nicht auswählen");

//3
$query = "SELECT m.M_Name, m.ECTS, l.M_ID FROM 
location l, Fakultaet f, Modul m, Studiengang s
Where f.F_ID = l.F_ID
AND s.S_ID = l.S_ID
AND m.M_ID = l.M_ID
AND l.location = 2
AND l.F_ID = $fak
AND l.S_ID = $stud";
$result = mysql_query($query, $connection) or die("Query failed: " . mysql_error());
	
$json = array();
while ($r=mysql_fetch_assoc($result)){
	$json[]= $r;
}

echo $json_data = json_encode($json);

	
?>
