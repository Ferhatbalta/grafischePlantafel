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
	$scope.fakultaeten = [			// f steht fuer Furtwangen
	        { id:"fwi", name:"WI"}, 
	        { id:"fin", name:"IN"}
	];
// Studiengaenge	
	$scope.fwi = [
	        { id:"fwib", name:"WIB"}, 
	        { id:"fwnb", name:"WNB"},
	        { id:"fmba", name:"MBA"}, 
	        { id:"fmbc", name:"MBC"}
	];
	
	$scope.fin = [
	  	    { id:"fabc", name:"ABC"}, 
		    { id:"fdtf", name:"DTF"},
		    { id:"femn", name:"EMN"}, 
		    { id:"fkpt", name:"KPT"}
	];
// Module
	
	$scope.fwib = [
	       { id:"1", name:"Promod"},
	       { id:"1", name:"Mathe"},
	       { id:"2", name:"Internetworking"},
	       { id:"2", name:"ReWe"},
	       { id:"3", name:"Geschaeftsprozesse"},
	       { id:"3", name:"ProMod"},
	       { id:"4", name:"Logistik"},
	       { id:"4", name:"SWE"},
	       { id:"5", name:"Praxissemester"},
	       { id:"5", name:"Studienarbeit"},
	       { id:"6", name:"Business-Projekt"},
	       { id:"6", name:"Software-Projekt"},
	       { id:"7", name:"Muendliche Pruefung"},
	       { id:"7", name:"Thesis"}	       
	];
	
	$scope.fwib = [
	    	       { id:"fwib1", name:"Promod"},
	    	       { id:"1", name:"Mathe"},
	    	       { id:"2", name:"Internetworking"},
	    	       { id:"2", name:"ReWe"},
	    	       { id:"3", name:"Geschaeftsprozesse"},
	    	       { id:"3", name:"ProMod"},
	    	       { id:"4", name:"Logistik"},
	    	       { id:"4", name:"SWE"},
	    	       { id:"5", name:"Praxissemester"},
	    	       { id:"5", name:"Studienarbeit"},
	    	       { id:"6", name:"Business-Projekt"},
	    	       { id:"6", name:"Software-Projekt"},
	    	       { id:"7", name:"Muendliche Pruefung"},
	    	       { id:"7", name:"Thesis"}	       
	    	];
	
	$scope.fwib1 = [
	                {name:"ProMod"},
	                {name: "Mathe"}
	                ];
	
	$scope.fwnb = [
	    	       { id:"1", name:"Web Design"},
	    	       { id:"1", name:"ABWL"},
	    	       { id:"2", name:"Datenbanken"},
	    	       { id:"2", name:"ReWe"},
	    	       { id:"3", name:"Requirments Engineering"},
	    	       { id:"3", name:"eBusiness"},
	    	       { id:"4", name:"Logistik"},
	    	       { id:"4", name:"eShop Design"},
	    	       { id:"5", name:"Praxissemester"},
	    	       { id:"5", name:"Studienarbeit"},
	    	       { id:"6", name:"Business-Projekt"},
	    	       { id:"6", name:"IT-Management"},
	    	       { id:"7", name:"Muendliche Pruefung"},
	    	       { id:"7", name:"Thesis"}	       
	    	];
	
	
	
	$scope.semesters_grid = [
	        {name:"1"}, {name:"2"}, {name:"3"}, {name:"4"}, {name:"5"}, {name:"6"}, {name:"7"}
	];
	
	$scope.modulkatalog = [{ id:"4", name:"SWE"}, { id:"2", name:"Controlling"}];
	
	
	//Aenderungen ueberwachen: Fakultaet 
	$scope.fakultaet = $scope.fakultaeten[0];
	($scope.fakultaetChanged = function(){
		$scope.studiengang = ($scope.studiengaenge = $scope[$scope.fakultaet.id])[0];
	})();
	
	//Aenderungen ueberwachen: Studiengang 
	$scope.studiengang = $scope.studiengaenge[0];
	($scope.studiengangChanged = function(){
		$scope.modul = ($scope.module = $scope[$scope.studiengang.id]);
	})();
	
	$scope.dropSuccessHandler = function($event,index,array){
		array.splice(index,1);
	};
	$scope.onDrop = function($event,$data,array){
		array.push($data);
	};
	

	
	$scope.add = function(array){
		
		$scope.modulKa.push(
				{name: window.prompt("Welches Modul moechten Sie hinzufuegen?"), 
					ECTS:window.prompt("ECTS?")}	
		);

		//$scope.modulkatalog.push({id: window.prompt("Semester?", "") , 
			//name: window.prompt("Welches Modul wollen Sie hinzufügen?", "")});
	};
	
	
		
	$http.get("http://studienplaner.cloud.hs-furtwangen.de/dbConnection.php").success(function(response) {$scope.arr1test = response;});

	
	
	// Test mit 8 Arrays
	
	$scope.modulKa = [
	                  {name:'Test Modul 1', ECTS:"6"}, 
	                  {name:'Test Modul 2', ECTS:"6"}];

	
	//$scope.sem1 = ['Mathe','ProMod1'];
	$scope.sem1 = [
	               {name:'Einfuehrung in die Wirtschaftsinformatik', ECTS:"6"}, 
	               {name:'Wirtschafts-mathematik und -statistik', ECTS:"6"},
	               {name:'Datenbanken', ECTS:"6"},
	               {name:'Betriebs-wirtschaftslehre 1', ECTS:"6"},
	               {name:'Programmieren und Modellieren 1', ECTS:"6"}
	               ];
	$scope.teeeeest = ["hallo", "na", "dsd", "erwin", "ist", "ein", "pic"];
	var tmpjson = {array: $scope.teeeeest};
	
	$scope.sem2 = [
	               {name:'Geschaeftsprozesse- und Innovationsmanagement', ECTS:'6'},
	               {name:'Internetworking', ECTS:'6'},
	               {name:'Rechnungswesen und Controlling', ECTS:'6'},
	               {name:'Business Kommunikation 1', ECTS:'6'},
	               {name:'Formale Methoden und Datenstrukturen', ECTS:'6'}
	              
	               ];
	
	$scope.sem3 = [
	         	   {name:'Integrierte Standardsoftware', ECTS:'6'},
	               {name:'Business Kommunikation 2:', ECTS:'6'},
	               {name:'Programmieren und Modellieren 2', ECTS:'9'},
	               {name:'System- und Netzwerkarchitekturen', ECTS:'9'}
	               
	               ];
	
	$scope.sem4 = [
	               {name:'Profilfach 1', ECTS:'6'},
	               {name:'Wissensmanagement', ECTS:'6'},
	               {name:'Betriebswirtschaftslehre 2 und Volkswirtschaftslehre ', ECTS:'6'},
	               {name:'Software Engineering', ECTS:'6'},
	               {name:'Logistik und Supply Chain Management', ECTS:'6'}
	               ];
	
	$scope.sem5 = [	               
	               {name:'Praktisches Studiensemester', ECTS:'6'},
	               {name:'Einfuehrung / Vorbereitung Praktisches Studiensemester', ECTS:'6'},
	               {name:'Nachbereitung Praktisches Studiensemester', ECTS:'6'},
	               {name:'Studienarbeit', ECTS:'6'}
	               ];
	
	$scope.sem6 = [ 
	               {name:'Profilfach 2', ECTS:'6'},
	               {name:'Software-Projekt', ECTS:'6'},
	               {name:'Business-Projekt', ECTS:'6'}      
	               ];
	
	$scope.sem7 = [
	               {name:'Bachelor-Projekt', ECTS:'6'},
	               {name:'Thesis', ECTS:'6'},
	               {name:'muendliche Pruefung', ECTS:'6'}
	               ];
	$scope.container = [  ];
	
	$scope.speichern = function(){
		alert(0);
		$.post("angularjs/dbcon.php", {
			auswahl: "speicherArray",
			array: tmpjson
		}).success(function(data) {
			alert(typeof(data));
		}).error(function(err) {
			alert(err);
		});
		
	};
	
	function saveJs()
	{
	var ahttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  ahttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  ahttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	
	ahttp.onreadystatechange=function()
	  {
	  if (ahttp.readyState==4 && xmlhttp.status==200)
	    {
	    //document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
	    }
	  }
	
	ahttp.open('POST', 'http://studienplaner.cloud.hs-furtwangen.de/test.php', true);
	ahttp.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
	ahttp.send($scope.sem2);
	}
	


});