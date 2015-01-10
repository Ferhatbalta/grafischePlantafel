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

/* SQL Befehl definieren*/
$query = "SELECT F_ID, F_kurz, F_Name FROM `Fakultaet`";

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
