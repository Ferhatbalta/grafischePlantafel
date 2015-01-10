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
$name = $request->name;


/* SQL Befehl definieren*/
$query = "SELECT   a.MB_ID, b.M_Name, a.M_ID, a.Dozent, a.SWS, b.ects, a.Fach, a.gesamtAa, a.praesenzAa, 
		           a.vUnAa, a.Pruefung
                   FROM Modulbeschreibung a, Modul b
                   WHERE a.M_ID = b.M_ID
                   AND a.M_ID = '$name';";

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
