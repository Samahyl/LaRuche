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
	<h1>Mes réservations</h1>
	<?php
		$sql = $conn->prepare("SELECT * FROM reservations WHERE id_client = '".$_SESSION['id_db']."'");
		$sql->execute();
		$result = $sql->fetchAll();

		foreach ($result as $row => $link) {
			/*echo $row['id_reservation']."<br>";*/
			?>
				<div class="reservation_perso">
					<a href="emplacement?id=<?php echo $link['id_emplacement'];?>">
						<strong>Emplacement : <?php echo $link['id_emplacement'];?></strong>
					</a>
					<br>
					<a><strong>Date : </strong><?php echo $link['date_reservation']." et <strong>Heure : </strong>".$link['duree_reservation'];?></a><br>
					<a>Numéro de réservation : #<?php echo $link['id_reservation'];?></a>
				</div>
			<?php
		}
	?>
</body>
</html>

<?php
	include_once "../assets/libraries/footer.php";
?>