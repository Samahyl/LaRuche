<?php
	session_start();
	include_once "../assets/libraries/header_nav.php";
	include_once "../assets/libraries/connexion_DB.php";
	if (isset($_SESSION['prenom'])) {
			debug_to_console('Connecté en tant que '.$_SESSION['prenom']." ".$_SESSION['nom'].' identifié : '.session_id());
		}
		else{
			header("Location: /frames/login.php");
			die();
		}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="carte_reservation">
	<?php
		if (!isset($_GET['customsearch'])) {
			$sql = $conn->prepare("SELECT * FROM emplacements WHERE ouvert=1");
			$sql->execute();
			$result = $sql->fetchAll();
		}
		elseif (isset($_GET['customsearch'])) {
			$sql = $conn->prepare($_GET['customsearch']);
			$sql->execute();
			$result = $sql->fetchAll();
		}

		?>
		<h1>Choisissez un emplacement</h1>
		<form class="selection_reserve" action="../assets/libraries/customselect_r.php" method="GET">
			<input type="date" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" name="champdate">
			<!-- <input type="time" value="09:00" min="09:00" max="18:00" step="3600" name=""> -->
			<select value="1" name="folks">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
			</select><label><img id="selectionpeople" src="https://img.icons8.com/external-neu-royyan-wijaya/32/000000/external-people-neu-users-neu-royyan-wijaya-2.png"/></label>
			<div class="divradio">
				<input type="radio" name="alradio"><label>Alvéole</label>
				<input type="radio" name="reradio"><label>Réunion</label>
				<input type="radio" name="coradio"><label>Conférence</label>
			</div>
			<input type="submit" name="submit" value="Recherche">
		</form>
		<p id="btn_filtre"><a href="reservation.php" id="btn_filtres">Retirer la selection par filtres</a></p>
		<?php

		foreach ($result as $row => $link) {
			$var_test = $link['emplacement'];
			$var_b = "Alvéole";
			$var_r = "Réunion";
			$var_c = "Conférence";
			?>
			<div class="carte">
					<?php 
					if (strpos($var_test, $var_b)!==false) {
						echo "<div class='gauche_carte bur'>";
							echo "<a href='emplacement.php?id=".$link['id_emplacement']."'>".$link['emplacement']."</a>";
						echo "</div>";
					} elseif (strpos($var_test, $var_r)!==false) {
						echo "<div class='gauche_carte reu'>";
							echo "<a href='emplacement.php?id=".$link['id_emplacement']."'>".$link['emplacement']."</a>";
						echo "</div>";
					} elseif (strpos($var_test, $var_c)!==false) {						
						echo "<div class='gauche_carte conf'>";
							echo "<a href='emplacement.php?id=".$link['id_emplacement']."'>".$link['emplacement']."</a>";
						echo "</div>";
					} else {
						echo "<div class='gauche_carte none'>";
							echo "<a href='emplacement.php?id=".$link['id_emplacement']."'>".$link['emplacement']."</a>";
						echo "</div>";
					}
					?>
				<div class='droite_carte'>
					<?php echo $link['description'] ?>
				</div>
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