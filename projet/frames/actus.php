<?php
	session_start();
	include_once "../assets/libraries/header_nav.php";
	include_once "../assets/libraries/connexion_DB.php";
	include_once "../assets/libraries/fonctions.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="../js/alerts.js" defer></script>
</head>
<body>
	<form method="POST" action="../assets/libraries/AddActu.php">
		<input type="text" name="titre" max="32" placeholder="Titre">
		<input type="text" name="soustitre" max="64" placeholder="Sous-Titre">
		<textarea class="textfield" name="texte" rows="10" cols="60" placeholder="Tapez votre mise à jour du journal"></textarea>
		<input type="submit" name="submitbutton" value="Ecrire">
	</form>

	<button onclick="actusAff()" type="button" id="btn_actus">Affichage des actualités</button>

	<div id="all_actu">
		<?php
			$sql = $conn->prepare("SELECT * FROM actualites ORDER BY date_actu DESC");
			$sql->execute();
			//$query=mysqli_query($conn, $sql) or die(mysqli_error($conn));
			$result = $sql->fetchAll();

			foreach ($result as $row => $link) {
		  		?>
					<div class="publicactus">
						<p class="titreactu"><?php echo $link['titre_actu'];?></p>
						<a class="soustitreactu"><?php echo $link['soustitre_actu'];?></a><br>
						<a class="dateactu"><?php echo $link['date_actu'];?></a><br>
						<p class="texteactu"><?php echo $link['texte_actu'];?></p>
					</div>
				<?php
		  	}
		?>
	</div>
</body>
</html>
<?php
	include_once "../assets/libraries/footer.php";
?>