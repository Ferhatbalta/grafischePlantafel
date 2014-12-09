<?php


// 1
$dbhost = "localhost";
$dbuser = "dbuser";
$dbpassword = "";
$connection = mysql_connect($dbhost, $dbuser, $dbpassword) or die("Kann nicht verbinden: " . mysql_error());


//2


$dbname = "studienPlaner";
mysql_select_db($dbname, $connection) or die("Konnte Datenbank nicht auswählen");

//3
$query = "SELECT M_Name, ECTS FROM Modul";
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
