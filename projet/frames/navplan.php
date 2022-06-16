<?php
	session_start();
	include_once "../assets/libraries/header_nav.php";
	include_once "../assets/libraries/connexion_DB.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h1>Plan du site</h1>
	<div class="mainnav">
		<li>
			<ul><a class="navtitle" href="../"><strong>Accueil</strong></a></ul>
			<ul><a>Page d'accueil du site et actualités de La Ruche</a></ul>
		</li>
		<li>
			<ul><a class="navtitle" href="locate.php"><strong>Nous trouver</strong></a></ul>
			<ul><a>Affichage d'une carte interactive avec un marqueur pour situer La Ruche</a></ul>
		</li>
		<li>
			<ul><a class="navtitle" href="reservation.php"><strong>Réserver</strong></a></ul>
			<ul><a>&emsp;&emsp;Emplacements : Affichage des emplacements de co-working disponibles</a></ul>
		</li>
		<li>
			<ul><a class="navtitle" href="about.php"><strong>A propos</strong></a></ul>
			<ul><a>Affichage des informations sur La Ruche et le site</a></ul>
		</li>
	</div>
	<div class="mainnav">
		<li>
			<ul><a class="navtitle" href="profile.php"><strong>Profil</strong></a></ul>
		</li>
	</div>
</body>
</html>