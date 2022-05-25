<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../css/main.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Kalam&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
	<link rel="icon" href="https://img.icons8.com/external-flat-satawat-anukul/64/000000/external-spring-spring-flat-set-flat-satawat-anukul-28.png">
	<title>La Ruche</title>
</head>
	<a name="up" style="visibility: hidden;"></a>
<header>
	<a id="titre" href="/">La Ruche<img id="imgtitre" src="https://img.icons8.com/external-flat-satawat-anukul/64/000000/external-spring-spring-flat-set-flat-satawat-anukul-28.png"></a>
	<!--<a id="connex" href="/login/">Se connecter</a>-->
</header>
<body>
	<div class="navigation">
		<ul>
			<li><a href="../../">Accueil</a></li>
			<li><a href="../../frames/locate.php">Nous trouver</a></li>
			<li><a href="../../frames/reservation.php">Réserver</a></li>
			<li><a href="../../frames/about.php">A propos</a></li>
			<?php
				if (isset($_SESSION['prenom'])) {
					echo '<li><a id="login" href="../../frames/profile.php">Bonjour, '.$_SESSION['prenom'].'</a></li>';
				}
				else{
					echo '<li><a id="login" href="../../frames/login.php">Se connecter</a></li>';
				}
			?>
		</ul>
	</div>

	<!--Coolors Palette Widget
      <script src="https://coolors.co/palette-widget/widget.js"></script>
      <script data-id="00554117893689452">new CoolorsPaletteWidget("00554117893689452", ["2e1f27","854d27","dd7230","f4c95d","e7e393"]); </script>-->
</body>
</html>

<?php	
	include_once "connexion_DB.php";
	include_once "fonctions.php";
	$host = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	debug_to_console($host);

	$sql = $conn->prepare("SELECT id_emplacement FROM emplacements");
	$sql->execute();
	$result = $sql->fetchAll();

	if($host === 'projet/frames/emplacement?id=1') {
	} elseif ($host === 'projet/frames/emplacement.php?id=2') {
	} elseif ($host === 'projet/frames/emplacement.php?id=3') {
	} elseif ($host === 'projet/frames/emplacement.php?id=4') {
	} elseif ($host === 'projet/frames/emplacement.php?id=5') {
	} else {
	}
?>
