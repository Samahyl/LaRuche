<?php 
	session_start();
	include_once "assets/libraries/header_nav.php";
	/*include_once "assets/libraries/style.php";*/
	include_once "assets/libraries/connexion_DB.php";
	include_once "assets/libraries/fonctions.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<?php
		//if (isset($_SESSION['prenom'])) {
			/*echo "<h1>Bonjour, ".$_SESSION['prenom']." !</h1>";*/
			//debug_to_console('Connecté en tant que '.$_SESSION['prenom']." ".$_SESSION['nom'].' identifié : '.session_id());
		//}
		//else{
			//header("Location: /frames/login");
			//die();
		//}
	?>

	<div class="up">
		<a href="#up"><img src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/64/000000/external-up-arrow-basic-ui-elements-flatart-icons-outline-flatarticons-3.png"/></a>
	</div>
	<div class="divinfos">
		<img id='imgindex' src='assets/img/building.png'>
		<p id='infoindex'><a href='frames/locate'>La Ruche - Rennes <br> 19 rue Louis Kérautret Botmel - 35000 Rennes</a></p>
		<!--<p id='infoindex'><a href="frames/about">En savoir plus</a></p>-->
	</div>

	<h1>Actualités</h1>

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
</body>
</html>
<?php
	include_once "assets/libraries/footer.php";
?>