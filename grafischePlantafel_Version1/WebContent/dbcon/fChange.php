<?php

/**
 **********************************************************************************
 *					Grafische Plantafel / Studienplaner							 *
 *			Softwareprojekt WS 14/15 Wirtschaftsinformatik  					 *
 *	Ferhat Balta, Kazim Atila, Veronika Kinzel, William Landry Tella Kamdem		 *
 *								12.01.2015										 *
 **********************************************************************************
 **/

/* externe PHP Datei wird importiert, um die Verbindung zur Datenbank herzustellen */
include 'verbindungHerstellen.php';

/* Variablen werden von der AngularJS App an die PHP datei übergeben */
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$fak = $request->name;
/* SQL Befehl definieren*/
$query = "SELECT S_ID, S_kurz, S_Name FROM `Studiengang` WHERE `F_ID` = $fak";

/* SQL-Befehle ausführen */
$result = mysql_query($query, $connection) or die("Query failed: " . mysql_error());
	
/* Ergebnis wird in ein Array geschrieben */
$json = array();
while ($r=mysql_fetch_assoc($result)){
	$json[]= $r;
}

/* Ergebniss Array wird decodiert und and die AngulaJS App weitergegeben */
echo $json_data = json_encode($json);

	
?>
