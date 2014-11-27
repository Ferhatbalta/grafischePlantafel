<?php
$db = mysqli_connect("localhost", "root", "", "roberto");
if(!$db)
{
  exit("Verbindungsfehler: ".mysqli_connect_error());
}
$auswahl = $_POST["auswahl"];
	
if($auswahl==="speicherArray")
	{
		echo "test";
		test();
	}

function test() {
	//$array = json_decode($_POST["array"]);
	echo "ja";
	

	mysql_query("INSERT INTO `test`(`Name`) VALUES (\'test25\')");

	
	
	
	
	mysql_close($db);
	
}

?>