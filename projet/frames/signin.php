<?php 
	include "../assets/libraries/header_nav.php";
	include "../assets/libraries/connexion_DB.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<form method="POST" action="../assets/libraries/insert_DB.php">
		<input type="email" name="email" placeholder="E-mail">	
		<input type="text" name="nom" placeholder="Nom">
		<input type="text" name="prenom" placeholder="Prenom">
		<input type="password" id ="password" name="password" placeholder="Mot de Passe" value="">
		<input type="password" id ="password" name="password" placeholder="Confirmer Mot de Passe" value="">
		<input id="submitbutton" type="submit" name="submit" value="Ok">
		<!--<a>Mot de passe ou Login incorrect</a>-->
	</form>
	<?php
		if (isset($_GET['error'])) {
			if ($_GET['error'] == "em1") {
				echo "<p style='text-align:center;color:red;'><strong>Email non valide !</strong></p>";
			}
			if ($_GET['error'] == "em2") {
				echo "<p style='text-align:center;color:red;'><strong>Email déjà utilisée !</strong></p>";
			}
		}
	?>
	<p id="signin">Ou <a href="login">se connecter</a></p>
</body>
</html>