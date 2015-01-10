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
$fid = $request->fid;
$sid = $request->sid;
$mid = $request->mid;

/* SQL Befehle definieren*/
$query = " INSERT INTO location(F_ID, S_ID, M_ID, Location) VALUES ('$fid', '$sid', '$mid', '8')";
$query1 = "INSERT INTO Modulbeschreibung(M_ID, Dozent, SWS, Fach, gesamtAa, praesenzAa, vUnAa, Pruefung)
			VALUES ('$mid','','','','','','','');";

$query2 = "SELECT m.M_Name, m.ECTS, l.M_ID FROM 
location l, Fakultaet f, Modul m, Studiengang s
Where f.F_ID = l.F_ID
AND s.S_ID = l.S_ID
AND m.M_ID = l.M_ID
AND l.location = 8
AND l.F_ID = $fid
AND l.S_ID = $sid";


/* SQL-Befehle ausführen */
$result = mysql_query($query, $connection) or die("Query failed: " . mysql_error());
$result1 = mysql_query($query1, $connection) or die("Query failed: " . mysql_error());
$result2 = mysql_query($query2, $connection) or die("Query failed: " . mysql_error());


/* Ergebnis wird in ein Array geschrieben */
$json = array();
while ($r=mysql_fetch_assoc($result2)){
	$json[]= $r;
}

/* Ergebniss Array wird decodiert und and die AngulaJS App weitergegeben */
echo $json_data = json_encode($json);
	
?>
