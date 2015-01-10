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
$fid = $request->fis;
$sid = $request->sid;
$mid = $request->mid;
$mkurz = $request->mkurz;
$modulname = $request->modulname;
$ects = $request->ects;

/* SQL Befehl definieren*/
$query = " SELECT M_ID From Modul WHERE S_ID = ' $sid ' AND M_kurz = '$mkurz' AND M_Name = '$modulname' AND ECTS = '$ects';";

/* SQL-Befehle ausführen */
$result = mysql_query($query, $connection) or die("Query failed: " . mysql_error());
	

/* Ergebnis wird in einer Variablen geschrieben */
while ($r=mysql_fetch_assoc($result)){
	$json= $r;
}

/* Ergebniss Variable wird decodiert und and die AngulaJS App weitergegeben */
echo $json_data = json_encode($json);
	
?>
