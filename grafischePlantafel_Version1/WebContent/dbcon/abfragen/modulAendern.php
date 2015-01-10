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
$aModulId = $request->aModulId;
$inputDozent = $request->inputDozent;
$inputFach = $request->inputFach;
$inputECTS = $request->inputECTS;
$inputSWS = $request->inputSWS;
$inputGesamtAa = $request->inputGesamtAa;
$inputPraesenzAa = $request->inputPraesenzAa;
$inputVuNaA = $request->inputVuNaA;
$inputPruefung = $request->inputPruefung;



if (strlen($inputDozent)>0) {  /* Prüfung ob sich der Wert geändert hat */
	/* SQL Befehl definieren*/
	$query = "UPDATE Modulbeschreibung
	SET Dozent= '$inputDozent'
	WHERE M_ID = $aModulId";
	
	/* SQL-Befehle ausführen */
	$result = mysql_query($query, $connection) or die("Query failed: " . mysql_error());
} 

if (strlen($inputFach)>0) { /* Prüfung ob sich der Wert geändert hat */
	/* SQL Befehl definieren*/
	$query = "UPDATE Modulbeschreibung
	SET Fach= '$inputFach'
	WHERE M_ID = $aModulId";
	
	/* SQL-Befehle ausführen */
	$result = mysql_query($query, $connection) or die("Query failed: " . mysql_error());
}

if (strlen($inputECTS)>0) { /* Prüfung ob sich der Wert geändert hat */
	/* SQL Befehl definieren*/
	$query = "UPDATE Modul
	SET ECTS= '$inputECTS'
	WHERE M_ID = $aModulId";
	
	/* SQL-Befehle ausführen */
	$result = mysql_query($query, $connection) or die("Query failed: " . mysql_error());
}

if (strlen($inputSWS)>0) { /* Prüfung ob sich der Wert geändert hat */
	/* SQL Befehl definieren*/
	$query = "UPDATE Modulbeschreibung
	SET SWS= '$inputSWS'
	WHERE M_ID = $aModulId";
	
	/* SQL-Befehle ausführen */
	$result = mysql_query($query, $connection) or die("Query failed: " . mysql_error());
}

if (strlen($inputGesamtAa)>0) { /* Prüfung ob sich der Wert geändert hat */
	/* SQL Befehl definieren*/
	$query = "UPDATE Modulbeschreibung
	SET gesamtAa= '$inputGesamtAa'
	WHERE M_ID = $aModulId";
	
	/* SQL-Befehle ausführen */
	$result = mysql_query($query, $connection) or die("Query failed: " . mysql_error());
}

if (strlen($inputPraesenzAa)>0) { /* Prüfung ob sich der Wert geändert hat */
	/* SQL Befehl definieren*/
	$query = "UPDATE Modulbeschreibung
	SET praesenzAa= '$inputPraesenzAa'
	WHERE M_ID = $aModulId";
	
	/* SQL-Befehle ausführen */
	$result = mysql_query($query, $connection) or die("Query failed: " . mysql_error());
}


if (strlen($inputVuNaA)>0) { /* Prüfung ob sich der Wert geändert hat */
	/* SQL Befehl definieren*/
	$query = "UPDATE Modulbeschreibung
	SET vUnAa= '$inputVuNaA'
	WHERE M_ID = $aModulId";
	
	/* SQL-Befehle ausführen */
	$result = mysql_query($query, $connection) or die("Query failed: " . mysql_error());
}


if (strlen($inputPruefung)>0) { /* Prüfung ob sich der Wert geändert hat */
	/* SQL Befehl definieren*/
	$query = "UPDATE Modulbeschreibung
	SET Pruefung = '$inputPruefung'
	WHERE M_ID = $aModulId";
	
	/* SQL-Befehle ausführen */
	$result = mysql_query($query, $connection) or die("Query failed: " . mysql_error());
}


?>
