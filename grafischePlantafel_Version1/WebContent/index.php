<!DOCTYPE html>
<html>

<head>
<title>Studienplaner</title>
<meta charset="utf-8">
<meta name="description" content="Übersicht der Studiengängen">
<link rel="stylesheet" href="css/stylesindex.css">
<script
	src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0/angular.min.js"></script>
<script
	src="http://www.directiv.es/application/html/js/ganarajpr/angular-dragdrop/draganddrop.js"></script>
<script type="text/javascript" src="angularjs/app.js"></script>
<?php
	$arrayTest = $scope.sem1;
?>

</head>
<body ng-app="mainModule">
	<header>
		<a href="#" title="Zur Startseite"> <img
			src="images/LogoStudienplaner.jpg" width="150" height="113"
			alt="Studienplaner" />
		</a>
		<h1>Studienplaner</h1>
		<nav id="sitenav">
			<ul id="nav_left">
				<li><a href="#">Home</a></li>
				<li><a href="#">Mein Studienplan</a></li>
				<li id="nav_right"><a href="#">Anmelden</a></li>
			</ul>

		</nav>
	</header>
	
	<main ng-controller="mainController">
	<section>
		
		<aside id="aside_left">
			<div id="auswahl">
				<label>Fakultät:</label> <select data-ng-model="fakultaet"
					data-ng-options="fakult.name for fakult in fakultaeten"
					ng-change="fakultaetChanged()">
				</select> <br /> <label>Studiengang:</label> <select
					data-ng-model="studiengang"
					data-ng-options="stud.name for stud in studiengaenge"
					ng-change="studiengangChanged()">
				</select> <br />

				<div id="modul_liste" ui-on-Drop="onDrop($event,$data,modulKa)">
					<p>Modulkatalog:</p>
					<select data-ng-model="modul"
						data-ng-options="mod.name for mod in module">
					</select> <br />
					<div id="dragItemsBox">
						<div class="modul" ui-draggable="true" drag="modul"
							on-drop-success="dropSuccessHandler($event,$index,modulKa)"
							ng-repeat="modul in modulKa">{{modul.name}}</div>
					</div>
					<div id="modul" ng-click="add(modulkatalog)"> + Modul hinzufügen </div>
				</div>
				<div id="container" ui-on-Drop="onDrop($event,$data,container)">Müll</div>
				<h1>
				<?php 
					echo $arrayTest[0]; 
					echo $arrayTest[1];
					echo $arrayTest[2];
	
	
			
					?>
				</h1>
			</div>
		</aside>

		<aside id="aside_right">
			<h5>Studiengangauswahl -> Fakultät: {{fakultaet.name}}
				Studingang: {{studiengang.name}}</h5>
			<div id="dropbereich">
				
			
				<table>
					<thead>
						<tr>
							<th id="th_semester">Sem.</th>
							<th>Studienaufbau</th>
						</tr>
					</thead>
					<tbody>
						<tr ui-on-Drop="onDrop($event,$data,sem1)">
							<td>
								<div id="semester"">1</div>
							</td>
							<td>
								<div id="struktur" ui-draggable="true" drag="mod1"
									on-drop-success="dropSuccessHandler($event,$index,sem1)"
									data-ng-model="modul" ng-repeat="mod1 in sem1">
									<a href="#">{{mod1.name}}</a>
								</div>
							</td>
						</tr>
						<tr ui-on-Drop="onDrop($event,$data,sem2)">
							<td>
								<div id="semester">2</div>
							</td>
							<td>
								<div id="struktur" ui-draggable="true" drag="mod2"
									on-drop-success="dropSuccessHandler($event,$index,sem2)"
									data-ng-model="modul"
									ng-repeat="mod2 in sem2 ">
									<a href="#">{{mod2.name}}</a>
								</div>
							</td>
						</tr>
						<tr ui-on-Drop="onDrop($event,$data,sem3)">
							<td>
								<div id="semester">3</div>
							</td>
							<td>
								<div id="struktur" ui-draggable="true" drag="mod3"
									on-drop-success="dropSuccessHandler($event,$index,sem3)"
									data-ng-model="modul"
									ng-repeat="mod3 in sem3 ">
									<a href="#">{{mod3.name}}</a>
								</div>
							</td>
						</tr>
						
						<tr ui-on-Drop="onDrop($event,$data,sem4)">
							<td>
								<div id="semester">4</div>
							</td>
							<td>
								<div id="struktur" ui-draggable="true" drag="mod4"
									on-drop-success="dropSuccessHandler($event,$index,sem4)"
									data-ng-model="modul"
									ng-repeat="mod4 in sem4 ">
									<a href="#">{{mod4.name}}</a>
								</div>
							</td>
						</tr>
						<tr ui-on-Drop="onDrop($event,$data,sem5)">
							<td>
								<div id="semester">5</div>
							</td>
							<td>
								<div id="struktur" ui-draggable="true" drag="mod5"
									on-drop-success="dropSuccessHandler($event,$index,sem5)"
									data-ng-model="modul"
									ng-repeat="mod5 in sem5 ">
									<a href="#">{{mod5.name}}</a>
								</div>
							</td>
						</tr>
						<tr ui-on-Drop="onDrop($event,$data,sem6)">
							<td>
								<div id="semester">6</div>
							</td>
							<td>
								<div id="struktur" ui-draggable="true" drag="mod6"
									on-drop-success="dropSuccessHandler($event,$index,sem6)"
									data-ng-model="modul"
									ng-repeat="mod6 in sem6 ">
									<a href="#">{{mod6.name}}</a>
								</div>
							</td>
						</tr>
						<tr ui-on-Drop="onDrop($event,$data,sem7)">
							<td>
								<div id="semester">7</div>
							</td>
							<td>
								<div id="struktur" ui-draggable="true" drag="mod7"
									on-drop-success="dropSuccessHandler($event,$index,sem7)"
									data-ng-model="modul"
									ng-repeat="mod7 in sem7 ">
									<a href="#">{{mod7.name}}</a>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</aside>
	</section>
	</main>
	<footer>
		<p>Team: Kinzel Veronika, Landry Kamdem, Ferhat Balta, Kazim Atila</p>
	</footer>
</body>
</html>