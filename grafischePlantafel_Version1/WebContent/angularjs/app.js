var app = angular.module("mainModule", ["ngDragDrop"]);

app.controller("mainController", function($scope, $http) {
		
	// Fakultaeten auslesen
	$http.get("../dbcon/fakultaet.php").success(function(response) {$scope.fakultaeten = response;});
	
	
	// Funktion beim ändern des Studienganges
	$scope.fChange = function(){
		// übergibt die aktuelle Fakultaet ID
		$scope.aktuelleFakultaet = $scope.fakultaet.F_ID;
		// Studiengaenge zu der angegebenen Fakultaet mittels der F_ID auslesen
		$http.post( "../dbcon/fChange.php", { name: $scope.aktuelleFakultaet + "" } ).success(function(response) {$scope.studiengaenge = response;});
	};
	
	
	// Funktion beim ändern des Studienganges um die Plantafel mit den Modulen aus dem ausgewähltem Studiengang zu befüllen
	$scope.sChange = function(){
		// übergibt die aktuelle Studiengang ID
		$scope.aktuellerStudiengang = $scope.studiengang.S_ID;
		
		// befüllt die jeweiligen Arrays mit den Modulen
		$http.post( "dbcon/semester/sem1.php", { name: $scope.aktuelleFakultaet, name1: $scope.aktuellerStudiengang } ).success(function(response) {$scope.arr1 = response;});
		$http.post( "dbcon/semester/sem2.php", { name: $scope.aktuelleFakultaet, name1: $scope.aktuellerStudiengang } ).success(function(response) {$scope.arr2 = response;});
		$http.post( "dbcon/semester/sem3.php", { name: $scope.aktuelleFakultaet, name1: $scope.aktuellerStudiengang } ).success(function(response) {$scope.arr3 = response;});
		$http.post( "dbcon/semester/sem4.php", { name: $scope.aktuelleFakultaet, name1: $scope.aktuellerStudiengang } ).success(function(response) {$scope.arr4 = response;});
		$http.post( "dbcon/semester/sem5.php", { name: $scope.aktuelleFakultaet, name1: $scope.aktuellerStudiengang } ).success(function(response) {$scope.arr5 = response;});
		$http.post( "dbcon/semester/sem6.php", { name: $scope.aktuelleFakultaet, name1: $scope.aktuellerStudiengang } ).success(function(response) {$scope.arr6 = response;});
		$http.post( "dbcon/semester/sem7.php", { name: $scope.aktuelleFakultaet, name1: $scope.aktuellerStudiengang } ).success(function(response) {$scope.arr7 = response;});
		$http.post( "dbcon/semester/sem8.php", { name: $scope.aktuelleFakultaet, name1: $scope.aktuellerStudiengang } ).success(function(response) {$scope.arr8 = response;});
	};
	
	// Papierkorb
	$scope.container = [];
	
	// Funktion um änderungen zu speichern
	$scope.save = function(){
		// Alle Module, die im Array des 1. Semesters sind werden gespeichert
		$scope.lok = 1;
		for(var i=0;i<$scope.arr1.length;i++) {
			$scope.mid = $scope.arr1[i].M_ID;
			$http.post( "dbcon/abfragen/save.php", { mid: $scope.mid, lok: $scope.lok } ).success(function(response){});
		}
		
		// Alle Module, die im Array des 2. Semesters sind werden gespeichert
		$scope.lok = 2;
		for(var i=0;i<$scope.arr2.length;i++) {
			$scope.mid = $scope.arr2[i].M_ID;
			$http.post( "dbcon/abfragen/save.php", { mid: $scope.mid, lok: $scope.lok } ).success(function(response){});
		}
		
		// Alle Module, die im Array des 3. Semesters sind werden gespeichert
		$scope.lok = 3;
		for(var i=0;i<$scope.arr3.length;i++) {
			$scope.mid = $scope.arr3[i].M_ID;
			$http.post( "dbcon/abfragen/save.php", { mid: $scope.mid, lok: $scope.lok } ).success(function(response){});
		}
		
		// Alle Module, die im Array des 4. Semesters sind werden gespeichert
		$scope.lok = 4;
		for(var i=0;i<$scope.arr4.length;i++) {
			$scope.mid = $scope.arr4[i].M_ID;
			$http.post( "dbcon/abfragen/save.php", { mid: $scope.mid, lok: $scope.lok } ).success(function(response){});
		}
		
		// Alle Module, die im Array des 5. Semesters sind werden gespeichert
		$scope.lok = 5;
		for(var i=0;i<$scope.arr5.length;i++) {
			$scope.mid = $scope.arr5[i].M_ID;
			$http.post( "dbcon/abfragen/save.php", { mid: $scope.mid, lok: $scope.lok } ).success(function(response){});
		}
		
		// Alle Module, die im Array des 6. Semesters sind werden gespeichert
		$scope.lok = 6;
		for(var i=0;i<$scope.arr6.length;i++) {
			$scope.mid = $scope.arr6[i].M_ID;
			$http.post( "dbcon/abfragen/save.php", { mid: $scope.mid, lok: $scope.lok } ).success(function(response){});
		}
		
		// Alle Module, die im Array des 7. Semesters sind werden gespeichert
		$scope.lok = 7;
		for(var i=0;i<$scope.arr7.length;i++) {
			$scope.mid = $scope.arr7[i].M_ID;
			$http.post( "dbcon/abfragen/save.php", { mid: $scope.mid, lok: $scope.lok } ).success(function(response){});
		}
		
		// Alle Module, die im Array des Modulkataloges sind werden gespeichert
		$scope.lok = 8;
		for(var i=0;i<$scope.arr8.length;i++) {
			$scope.mid = $scope.arr8[i].M_ID;
			$http.post( "dbcon/abfragen/save.php", { mid: $scope.mid, lok: $scope.lok } ).success(function(response){});
		}
		
		// Alle Module, die im Array des Papierkorbes sind werden gelöscht
		for(var i=0;i<$scope.container.length;i++) {
			$scope.mid = $scope.container[i].M_ID;
			$http.post( "dbcon/abfragen/delete.php", { mid: $scope.mid, lok: $scope.lok } ).success(function(response){});
		}
		alert("Erfolgreich gespeichert");
	};
	
	// Drop Funktion
	$scope.dropSuccessHandler = function($event,index,array){
		array.splice(index,1);
	};
	
	// Drop Funktion
	$scope.onDrop = function($event,$data,array){
		// dem jeweiligem Array wird eine Neue Datei angehängt
		array.push($data);
	};
	
	// Funktion um neues Modul hinzuzufügen
	$scope.arrAddModul = [];
	$scope.addModul = function()
	{
		// Modulname, Ects und Modul kurzbeschreibung werden von der Benutzereingabe abgeholt und in einer Variablen gespeichert
		$scope.modulname = document.getElementById('Modulname').value;
		$scope.ects = document.getElementById('Ects').value;
		$scope.mkurz = document.getElementById('mkurz').value;

		$scope.arr8.push({M_Name: $scope.modulname, ECTS:$scope.ects});
		$scope.arrAddModul.push({fid: $scope.aktuelleFakultaet, sid: $scope.aktuellerStudiengang, mkurz: $scope.mkurz, modulname: $scope.modulname, ects: $scope.ects});
		
			$scope.afid = $scope.arrAddModul[0].fid;
			$scope.asid = $scope.arrAddModul[0].sid;
			$scope.amkurz = $scope.arrAddModul[0].mkurz;
			$scope.amodulname = $scope.arrAddModul[0].modulname;
			$scope.aects = $scope.arrAddModul[0].ects;
			$scope.mid = $scope.arrAddModul[0].M_ID;
			
			$http.post( "dbcon/abfragen/insert.php", { fid: $scope.afid, sid: $scope.asid, mkurz: $scope.amkurz, modulname: $scope.amodulname, ects: $scope.aects  } ).success(function(response){});
			$http.post( "dbcon/abfragen/insert1.php", { sid: $scope.asid, mkurz: $scope.amkurz, modulname: $scope.amodulname, ects: $scope.aects  } ).success(function(response)
					{
						$scope.aktuelleMID = response.M_ID; 
						$http.post( "dbcon/abfragen/insert2.php", { fid: $scope.afid, sid: $scope.asid, mid: $scope.aktuelleMID } ).success(function(response){});
					});
				
			$scope.arrAddModul = [];	
			alert("Modul hinzugefügt");
			
	};
	
	
	$scope.addFakultaet = function()
	{
		// Modulname, Ects und Modul kurzbeschreibung werden von der Benutzereingabe abgeholt und in einer Variablen gespeichert
		$scope.fakultaetname = document.getElementById('Fakultaetname').value;
		$scope.fkurz = document.getElementById('fkurz').value;
		
		$http.post( "dbcon/abfragen/fakultaetHinzufuegen.php", { fname: $scope.fakultaetname, fkurz: $scope.fkurz} ).success(function(response){});
			alert("Fakultät hinzugefügt");
			window.location.href="/index.html";
	};
	
	$scope.addStudiengang = function(){
		$scope.studiengangname = document.getElementById('Studiengangname').value;
		$scope.skurz = document.getElementById('skurz').value;
		
		$http.post( "dbcon/abfragen/studiengangHinzufuegen.php", { sname: $scope.studiengangname, skurz: $scope.skurz, fid: $scope.aktuelleFakultaet} ).success(function(response){});
		alert("Studiengang hinzugefügt");
		window.location.href="/index.html";
	};
	
	$scope.test = function(aModulId){
			$http.post("../dbcon/aModul.php", { name: aModulId }).success(function(response) {$scope.aModulArr = response;});
	};


	
	
	
	//Funktion um zu Drucken
	$scope.printDiv = function(drucken) {
	  var printContents = document.getElementById(drucken).innerHTML;
	  //var originalContents = document.body.innerHTML;   
	  var originalContents = document.innerHTML;   
	  var popupWin = window.open('', '_blank', 'width=1000,height=600');
	  popupWin.document.open()
	  popupWin.document.write(
			  '<html>' + 
			  	'<head>' + 
			  		'<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">' +
			  		'<link rel="stylesheet" href="css/mycssstyle.css">' + 
			  		'</head><body onload="window.print()">' + printContents + '</html>');
	  popupWin.document.close();
	} 
	


});