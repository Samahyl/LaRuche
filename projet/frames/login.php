<?php 
	session_start(); //Début de session
	include "../assets/libraries/header_nav.php"; //Intégration de mise en page + header HTML
	include "../assets/libraries/connexion_DB.php"; //Intégration de connexion à la base de données
	if (isset($_GET['sw']) == "relog") { //Si première connexion ou changement de compte
		$lnk = "../../assets/libraries/action.php?sw=relog"; //Variable de lien en fonction de la condition
	}
	else { //Sinon
		$lnk = "../../assets/libraries/action.php"; //Variable de lien en fonction de la condition
	} //Fin si
?>

<!DOCTYPE html> <!-- Début fichier HTML -->
<html> <!-- Début code HTML -->
<head> <!-- Entête -->
	<meta charset="utf-8"> <!-- Définition encodage de la page -->
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Définition encodage de la page -->
</head> <!-- Fin entête -->
<body> <!-- Corps -->
	<?php echo "<form method='POST' action='".$lnk."''>";?> <!-- Début formulaire de connexion -->
		<input type="email" name="email" placeholder="E-mail"> <!-- Champs de login  -->
		<input type="password" id ="password" name="password" placeholder="Mot de Passe" value=""> <!-- Champs de mot de passe  -->
		<input id="submitbutton" type="submit" name="submit" value="Ok"> <!-- Envoie des données pour connexion -->
	</form> <!-- Fin formulaire -->
	<p id="signin">Ou <a href="../../frames/signin.php"><strong>s'inscrire</strong></a></p> <!-- Rédirection page d'inscription -->
</body> <!-- Fin corps -->
</html> <!-- Fin code HTML -->
