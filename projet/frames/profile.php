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
</head>
<body>
	<?php
		echo "<h1>Bonjour, ".$_SESSION['prenom']." !</h1>";

		?><div class="gestion_global"><?php
		if ($_SESSION['habitilation'] == 3) {
			?>
				<a class='gestion' href='gestion_e.php'>Gestion des espaces</a>
				<a class='gestion' href='gestion_r.php'>Gestion des réservation</a>
				<a class='gestion' href='actus.php'>Gestion des Actualités</a>
			<?php
		}
		elseif ($_SESSION['habitilation'] == 2) {
			?>
				<a class='gestion' href='actus.php'>Gestion des Actualités</a>
			<?php
		}
		?>
			<a class='gestion' href='self_reservation.php'>Mes réservations</a>
		</div><?php
	?>
	<div class="profile_info">
		<ul>
			<li>E-mail : <?php echo $_SESSION['email']?></li>
			<li>Nom : <?php echo $_SESSION['nom']?></li>
			<li>Prénom : <?php echo $_SESSION['prenom']?></li>
			<li>Rejoins le : <?php echo $_SESSION['date_reservation']?></li>
			<li><a href="../assets/libraries/update_profile.php">Mettre à jour les informations</a></li>
		</ul>
	</div>
	<p id="signin"><a href="login.php?sw=relog">Se déconnecter</a></p>
</body>
</html>
<?php
	include_once "../assets/libraries/footer.php";
?>
