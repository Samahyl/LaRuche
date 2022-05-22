<?php
	session_start();
	include_once "../assets/libraries/header_nav.php";
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
	<div id="mainnav">
		<p>Site</p>
		<div id="subnav">
			<p class="navtitles">Accueil</p>
			<div class="contentnav">
				<p></p>
			</div>
		</div>
		<div id="subnav">
			<p class="navtitles">Nous Trouver</p>
			<div class="contentnav">
				<p></p>
			</div>
		</div>
		<div id="subnav">
			<p class="navtitles">Réserver</p>
			<div class="contentnav">
				<p></p>
			</div>
		</div>
		<div id="subnav">
			<p class="navtitles">A Propos</p>
			<div class="contentnav">
				<p></p>
			</div>
		</div>
		<div id="subnav">
			<p class="navtitles">Mon Profil | Se connecter</p>
			<div class="contentnav">
				<?php
					switch ($_SESSION['habitilation']) {
						case 1:
							echo "<p>Affichage n°1</p>";
							break;
						case 2:
							echo "<p>Affichage n°2</p>";
							break;
						case 3:
							echo "<p>Affichage n°3</p>";
							break;
						default:
							echo "<p>Affichage n°0</p>";
							break;
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>