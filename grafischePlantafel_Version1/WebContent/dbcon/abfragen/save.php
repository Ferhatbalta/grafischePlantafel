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
include '../verbindungHerstellen.php';

/* Variablen werden von der AngularJS App an die PHP datei übergeben */
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$mid = $request->mid;
$lok = $request->lok;

/* SQL Befehl definieren*/
$query =  "UPDATE location
SET Location= $lok
WHERE M_ID = $mid";

/* SQL-Befehle ausführen */
$result = mysql_query($query, $connection) or die("Query failed: " . mysql_error());
	

?>
