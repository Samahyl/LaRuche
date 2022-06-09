<?php 
	session_start(); //Début de session

	if (isset($_SESSION['prenom'])) {
		session_unset();
		session_destroy();
	}
	include "../assets/libraries/header_nav.php"; //Intégration de mise en page + header HTML
	include "../assets/libraries/connexion_DB.php"; //Intégration de connexion à la base de données
	$lnk = "../../assets/libraries/action";
?>

<!DOCTYPE html> <!-- Début fichier HTML -->
<html> <!-- Début code HTML -->
<head> <!-- Entête -->
	<meta charset="utf-8"> <!-- Définition encodage de la page -->
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Définition encodage de la page -->
</head> <!-- Fin entête -->
<body> <!-- Corps -->
	<?php
		if (isset($_GET['new'])) {
			if ($_GET['new'] == true) {
				echo "<h2 style='text-align:center'>Bienvenue ! <br>Entrez vos identifiants</h2>";
			}
		}
	?>
	<?php echo "<form method='POST' action='".$lnk."''>";?> <!-- Début formulaire de connexion -->
		<input type="email" name="email" placeholder="E-mail"> <!-- Champs de login  -->
		<input type="password" id ="password" name="password" placeholder="Mot de Passe" value=""> <!-- Champs de mot de passe  -->
		<input id="submitbutton" type="submit" name="submit" value="Ok"> <!-- Envoie des données pour connexion -->
	</form> <!-- Fin formulaire -->
	<p id="signin">Ou <a href="../../frames/signin"><strong>s'inscrire</strong></a></p> <!-- Rédirection page d'inscription -->
</body> <!-- Fin corps -->
</html> <!-- Fin code HTML -->