<?php
	session_start();
	include_once "header_nav.php";
	include_once "connexion_DB.php";
	include_once "fonctions.php";
	date_default_timezone_set('Europe/Paris');

	//var_dump($_GET);

	if (isset($_GET['id_reservation_new']) && !empty($_GET['id_reservation_new'])) {
		$sql = $conn->prepare("SELECT * FROM reservations WHERE id_reservation=".$_GET['id_reservation_new']."");
		$sql->execute();
		$result = $sql->fetchAll();
		/*var_dump($result);*/

		$id_reserv;
		foreach ($result as $row => $link) {
			$id_reserv = $link['id_reservation'];
			$id_cli = $link['id_client'];
			$date_reserv = $link['date_reservation'];
			$horaire_reserv = $link['horaire_reservation'];
			$duree_reserv = $link['duree_reservation'];
			$id_empl = $link['id_emplacement'];
		}
		?>		
			<div class="edit_forms">
				<h1>Résultat : </h1>	
				<form action="edit_DB_script.php" method="POST">
				<div class="edit_forms_div">
					<h3>Informations immuables :</h3>
					<label>Identifiant de réservation : </label><input type="text" name="id_reservation" value="<?php  echo $id_reserv?>">
					<label>Identifiant client : </label><input type="text" name="id_client" value="<?php  echo $id_cli?>">
					<label>Identifiant emplacement : </label><input type="text" name="id_emplacement" value="<?php  echo $id_empl?>">
				</div>
					<label>Date : </label><input type="text" name="date_before" value="<?php echo $date_reserv?>" readonly><br>
					<label>Horaire : </label><input type="text" name="horaire_before" value="<?php echo $horaire_reserv?>" readonly><br>
					<label>Durée : </label><input type="text" name="duree_before" value="<?php echo $duree_reserv?>" readonly>
					<!-- <hr><br>
					<input type="date" min="<?php echo $date_reserv?>" name="date_after"><br><br>
					<input type="time" name="horaire_after" min="09:00" max="18:00" step="3600" required>
					<input type="range" max="9" min="1" value="1" name="duree_after" name="date_before"oninput="this.nextElementSibling.value = this.value"><output>1
						</output><a>h</a> -->
					<!-- <input type="submit" name=""> -->
					<p class="back_button_gestion"><a href="../../frames/gestion_r.php">Retour page de gestion</a></p>
				</form>
			</div>
		<?php
	}
	else {
		?>
			<div class="edit_forms">
				<form action="edit_DB_script.php" method="POST">
				<div class="edit_forms_div">
					<h3>Informations immuables :</h3>
					<label>Identifiant de réservation : </label><input type="text" name="id_reservation" value="<?php  echo $_GET['id_reservation']?>">
					<label>Identifiant client : </label><input type="text" name="id_client" value="<?php  echo $_GET['id_client']?>">
					<label>Identifiant emplacement : </label><input type="text" name="id_emplacement" value="<?php  echo $_GET['id_emplacement']?>">
				</div>
					<label>Date : </label><input type="text" name="date_before" value="<?php echo $_GET['date_reservation']?>" readonly><br>
					<label>Horaire : </label><input type="text" name="horaire_before" value="<?php echo $_GET['horaire_reservation']?>" readonly><br>
					<label>Durée : </label><input type="text" name="duree_before" value="<?php echo $_GET['duree_reservation']?>" readonly>
					<hr><br>
					<input type="date" min="<?php echo $_GET['date_reservation']?>" name="date_after"><br><br>
					<input type="time" name="horaire_after" min="09:00" max="18:00" step="3600" required>
					<input type="range" max="9" min="1" value="1" name="duree_after" name="date_before"oninput="this.nextElementSibling.value = this.value"><output>1
						</output><a>h</a>
					<input type="submit" name="">
				</form>
			</div>
		<?php		
	}

?>
	<!-- <div class="edit_forms">
		<form action="edit_DB_script.php" method="POST">
		<div class="edit_forms_div">
			<h3>Informations immuables :</h3>
			<label>Identifiant de réservation : </label><input type="text" name="id_reservation" value="<?php  echo $_GET['id_reservation']?>">
			<label>Identifiant client : </label><input type="text" name="id_client" value="<?php  echo $_GET['id_client']?>">
			<label>Identifiant emplacement : </label><input type="text" name="id_emplacement" value="<?php  echo $_GET['id_emplacement']?>">
		</div>
			<label>Date : </label><input type="text" name="date_before" value="<?php echo $_GET['date_reservation']?>" readonly><br>
			<label>Horaire : </label><input type="text" name="horaire_before" value="<?php echo $_GET['horaire_reservation']?>" readonly><br>
			<label>Durée : </label><input type="text" name="duree_before" value="<?php echo $_GET['duree_reservation']?>" readonly>
			<hr><br>
			<input type="date" min="<?php echo $_GET['date_reservation']?>" name="date_after"><br><br>
			<input type="time" name="horaire_after" min="09:00" max="18:00" step="3600" required>
			<input type="range" max="9" min="1" value="1" name="duree_after" name="date_before"oninput="this.nextElementSibling.value = this.value"><output>1
				</output><a>h</a>
			<input type="submit" name="">
		</form>
	</div> -->
