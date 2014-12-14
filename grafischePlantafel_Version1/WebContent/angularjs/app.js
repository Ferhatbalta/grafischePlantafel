 // Schritte
// +  1. Select. Die Fakultaet- und Studiengang-Auswahl generiert.. 
// +  2. ..eine Tabelle mit Studienaufbau, die..
// +  3. ..verschiedene Module zusammen fasst.
// +  4. Die Module stehen einzeln in eigene div-Boxen.
// +  5. Die div-Boxen haben Links mit Module-Namen.
// +  6a. Die Module-Namen stehen in Arrays (abhaengig von der Auswahl!)
// ?- 6b. Alternative: Die Module-Namen stehen in XML-Datei, aus der gelesen wird.
// + 7. Die Module koennen aus/in Liste per drag and drop ausgezogen werden.
// ?- 8. Ein Button, der ein Modul erzeugt.
// ?- 9. Ein Button, der eine Lehrveranstaltung erzeugt.
// ?- 10.Ein Button, der ein Modul loescht.
// ?- 11.Ein Button, der eine Lehrveranstaltung loescht.
// ?- 12.Ein Link von Modul geht zum Pop-up-Fenster fuer die Modul-Beschreibung zum Bearbeitung.
// ?- 13.Wie 12. fuer die Bearbeitung einer Lehrveranstaltung.

var app = angular.module("mainModule", ["ngDragDrop"]);

app.controller("mainController", function($scope, $http) {
	
// Fakultaeten	
	
	$http.get("../dbcon/fakultaet.php").success(function(response) {$scope.fakultaeten = response;});
	
	

	
	$scope.fChange = function(){
		$scope.aktuelleFakultaet = $scope.fakultaet.F_ID;
		$http.post( "../dbcon/fChange.php", { name: $scope.aktuelleFakultaet + "" } ).success(function(response) {$scope.studiengaenge = response;});

	};
	
	$scope.container = [];
	
	$scope.sChange = function(){

		$scope.aktuellerStudiengang = $scope.studiengang.S_ID;

		$http.post( "dbcon/abfragen/sem1.php", { name: $scope.aktuelleFakultaet, name1: $scope.aktuellerStudiengang } ).success(function(response) {$scope.arr1 = response;});
		$http.post( "dbcon/abfragen/sem2.php", { name: $scope.aktuelleFakultaet, name1: $scope.aktuellerStudiengang } ).success(function(response) {$scope.arr2 = response;});
		$http.post( "dbcon/abfragen/sem3.php", { name: $scope.aktuelleFakultaet, name1: $scope.aktuellerStudiengang } ).success(function(response) {$scope.arr3 = response;});
		$http.post( "dbcon/abfragen/sem4.php", { name: $scope.aktuelleFakultaet, name1: $scope.aktuellerStudiengang } ).success(function(response) {$scope.arr4 = response;});
		$http.post( "dbcon/abfragen/sem5.php", { name: $scope.aktuelleFakultaet, name1: $scope.aktuellerStudiengang } ).success(function(response) {$scope.arr5 = response;});
		$http.post( "dbcon/abfragen/sem6.php", { name: $scope.aktuelleFakultaet, name1: $scope.aktuellerStudiengang } ).success(function(response) {$scope.arr6 = response;});
		$http.post( "dbcon/abfragen/sem7.php", { name: $scope.aktuelleFakultaet, name1: $scope.aktuellerStudiengang } ).success(function(response) {$scope.arr7 = response;});
		$http.post( "dbcon/abfragen/sem8.php", { name: $scope.aktuelleFakultaet, name1: $scope.aktuellerStudiengang } ).success(function(response) {$scope.arr8 = response;});
		
	};
	
	$scope.save = function(){
		$scope.lok = 1;
		for(var i=0;i<$scope.arr1.length;i++) {
			$scope.mid = $scope.arr1[i].M_ID;
		
			$http.post( "dbcon/abfragen/save.php", { mid: $scope.mid, lok: $scope.lok } ).success(function(response){});
		}
		
		$scope.lok = 2;
		for(var i=0;i<$scope.arr2.length;i++) {
			$scope.mid = $scope.arr2[i].M_ID;
			$http.post( "dbcon/abfragen/save.php", { mid: $scope.mid, lok: $scope.lok } ).success(function(response){});
		}
		
		$scope.lok = 3;
		for(var i=0;i<$scope.arr3.length;i++) {
			$scope.mid = $scope.arr3[i].M_ID;
			$http.post( "dbcon/abfragen/save.php", { mid: $scope.mid, lok: $scope.lok } ).success(function(response){});
		}
		
		$scope.lok = 4;
		for(var i=0;i<$scope.arr4.length;i++) {
			$scope.mid = $scope.arr4[i].M_ID;
			$http.post( "dbcon/abfragen/save.php", { mid: $scope.mid, lok: $scope.lok } ).success(function(response){});
		}
		
		$scope.lok = 5;
		for(var i=0;i<$scope.arr5.length;i++) {
			$scope.mid = $scope.arr5[i].M_ID;
			$http.post( "dbcon/abfragen/save.php", { mid: $scope.mid, lok: $scope.lok } ).success(function(response){});
		}
		
		$scope.lok = 6;
		for(var i=0;i<$scope.arr6.length;i++) {
			$scope.mid = $scope.arr6[i].M_ID;
			$http.post( "dbcon/abfragen/save.php", { mid: $scope.mid, lok: $scope.lok } ).success(function(response){});
		}
		
		$scope.lok = 7;
		for(var i=0;i<$scope.arr7.length;i++) {
			$scope.mid = $scope.arr7[i].M_ID;
			$http.post( "dbcon/abfragen/save.php", { mid: $scope.mid, lok: $scope.lok } ).success(function(response){});
		}
		
		$scope.lok = 8;
		for(var i=0;i<$scope.arr8.length;i++) {
			$scope.mid = $scope.arr8[i].M_ID;
			$http.post( "dbcon/abfragen/save.php", { mid: $scope.mid, lok: $scope.lok } ).success(function(response){});
		}
		
		$scope.lok = 8;
		for(var i=0;i<$scope.container.length;i++) {
			$scope.mid = $scope.container[i].M_ID;
			$http.post( "dbcon/abfragen/delete.php", { mid: $scope.mid, lok: $scope.lok } ).success(function(response){});
		}
		
		$scope.lok = 8;
		for(var i=0;i<$scope.arrAdd.length;i++) {
			$scope.afid = $scope.arrAdd[i].fid;
			$scope.asid = $scope.arrAdd[i].sid;
			$scope.amkurz = $scope.arrAdd[i].mkurz;
			$scope.amodulname = $scope.arrAdd[i].modulname;
			$scope.aects = $scope.arrAdd[i].ects;
			$scope.mid = $scope.arrAdd[i].M_ID;
			
			$http.post( "dbcon/abfragen/insert.php", { fid: $scope.afid, sid: $scope.asid, mkurz: $scope.amkurz, modulname: $scope.amodulname, ects: $scope.aects  } ).success(function(response){});
			$http.post( "dbcon/abfragen/insert1.php", { sid: $scope.asid, mkurz: $scope.amkurz, modulname: $scope.amodulname, ects: $scope.aects  } ).success(function(response)
					{
				
				$scope.newMID = response.M_ID;
				
				$http.post( "dbcon/abfragen/insert2.php", { fid: $scope.afid, sid: $scope.asid, mid: $scope.newMID } ).success(function(response){});
					});
		}
		alert("Erfolgreich gespeichert");
	};
	
	
	
	

	$scope.dropSuccessHandler = function($event,index,array){
		array.splice(index,1);
	};
	$scope.onDrop = function($event,$data,array){
		array.push($data);
	};
	

	$scope.arrAdd = [];
	$scope.add = function(array)
	{
		$scope.modulname = document.getElementById('Modulname').value;
		$scope.ects = document.getElementById('Ects').value;
		$scope.mkurz = document.getElementById('mkurz').value;

		$scope.arr8.push({M_Name: $scope.modulname, ECTS:$scope.ects});
		$scope.arrAdd.push({fid: $scope.aktuelleFakultaet, sid: $scope.aktuellerStudiengang, mkurz: $scope.mkurz, modulname: $scope.modulname, ects: $scope.ects});

	};
	
	
	
	
	

	
	//Try to print START
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
	



//Try to print END
	



});