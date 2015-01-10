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

/* SQL Befehle definieren*/ 
$query = "DELETE FROM location WHERE M_ID = $mid"; /* Löscht Modul anhand der M_ID von der Tabelle Location */
$query1 = "DELETE FROM Modulbeschreibung  WHERE M_ID =  $mid"; /* Löscht Modul anhand der M_ID von der Tabelle Modulbeschreibung */
$query2 = "DELETE FROM Modul WHERE M_ID =  $mid"; /* Löscht Modul anhand der M_ID von der Tabelle Modul  */

/* SQL-Befehle ausführen */
$result = mysql_query($query, $connection) or die("Query failed: " . mysql_error());
$result1 = mysql_query($query1, $connection) or die("Query failed: " . mysql_error());
$result2 = mysql_query($query2, $connection) or die("Query failed: " . mysql_error());

?>
