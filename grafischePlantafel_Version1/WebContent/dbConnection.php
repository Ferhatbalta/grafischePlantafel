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
mysql_select_db($dbname, $connection) or die("Konnte Datenbank nicht ausw�hlen");

//3
$query = "SELECT m.M_Name, m.ECTS FROM 
location l, Fakultaet f, Modul m, Studiengang s
Where f.F_ID = l.F_ID
AND s.S_ID = l.S_ID
AND m.M_ID = l.M_ID
AND l.F_ID = $fak
AND l.S_ID = $stud";
$result = mysql_query($query, $connection) or die("Query failed: " . mysql_error());
	
$json = array();
while ($r=mysql_fetch_assoc($result)){
	$json[]= $r;
}

echo $json_data = json_encode($json);
/**
//4
if(mysql_num_rows($result) == 0){
	echo "keine Ergebnisse";
}

//5

//echo '<table border="1">';
while ($row = mysql_fetch_assoc($result)){
//	echo "<tr>";

	//echo "<td>" . $row[M_ID] . "</td>";
	//echo "<td>" . $row[S_ID] . "</td>";
	echo $row[M_ID];
	echo $row[S_ID];
	$testperson1_json = json_encode(get_object_vars($row));
	
	echo $testperson1_json;

//	echo "</tr>";

}
//echo "</table>";


	
//6

mysqli_free_result( $result );


**/
	
?>
