<?php
	session_start();
	include_once "../assets/libraries/header_nav.php";
	include_once "../assets/libraries/connexion_DB.php";
	include_once "../assets/libraries/construct.php";
	date_default_timezone_set('Europe/Paris');
?>
<!DOCTYPE html>
<html>
<head> <!-- Balise "head" de la page -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head> <!-- Fin de la balise "head" de la page -->
<body> <!-- Balise "body" de la page = le corps de la page -->
	<?php // ouverture/execution de code PHP dans la page
		$sql = $conn->prepare("SELECT * FROM emplacements WHERE id_emplacement = '".$_GET['id']."'");
		$sql->execute();
		$result = $sql->fetchAll();
		/* ^ Cherche dans la base de données les infomations relatives aux paramètres et les renvois ^ */

		foreach ($result as $row => $link) { /* Debut boucle for = Sauvegarde du type d'emplacement*/
			$var_test = $link['emplacement'];
			$var_b = "Alvéole";
			$var_r = "Réunion";
			$var_c = "Conférence";
		} /* Fin boucle for */
	?>
	<div class="emplacement_frame"> <!-- concerne le contenu entier de la page au sein du corps en lui-meme -->
		<div class="l_panel"> <!-- Partie gauche du contenu de la page -->
			<p class="l_panel_titre">Réserver</p> <!-- sous bloc du panneau gauche -->
			<?php echo "<form method='POST' action='../assets/libraries/reservation.php?id=".$_GET['id']."'>"?> <!-- création formulaire en HTML intégré en PHP -->
				<a>Date :</a><br> <!-- Info relative au formulaire -->
				<input type="date" name="reservationdate" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>"><br><br> <!-- Contenu du formulaire à remplir -->
				<a>Arrivée : </a><br> <!-- Info relative au formulaire -->
				<input type="time" name="reservationtime" value="" min="09:00" max="18:00" step="3600" required> <!-- Contenu du formulaire à remplir -->
				<br><br><a>Durée souhaitée [1h - 9h]:</a><br> <!-- Info relative au formulaire -->
				<div id="slider">
					<input type="range" max="9" min="1" value="1" name="reservationduree" oninput="this.nextElementSibling.value = this.value"> <!-- Contenu du formulaire à remplir --><output>1
					</output><a>h</a> <!-- Info relative au formulaire -->
				</div>
				<input type="submit" name="" value="Réserver"> <!-- envoie du formulaire au script PHP -->
			</form> <!-- Fin du formulaire -->
			<?php
			if (isset($_GET['err']) && !empty($_GET['err'])) {
				if ($_GET['err']) {
					?>
					<div class="err_div">
						<p>Impossible d'empiéter sur d'autres réservations !<br>ou<br> Dépasser 18h !</p>
					</div>
					<?php
				}
			}
			?>
		</div>
		<div class="r_panel">
			<p class="titreemplacement">Information sur la salle : <?php echo $link['emplacement']?></p><br>
			<?php
			if (strpos($var_test, $var_b)!==false) {
				echo "<div class='emplacement_img bur'></div>";
			} elseif (strpos($var_test, $var_r)!==false) {
				echo "<div class='emplacement_img reu'></div>";
			} elseif (strpos($var_test, $var_c)!==false) {						
				echo "<div class='emplacement_img conf'></div>";
			} else {
				echo "<div class='emplacement_img none'></div>";
			}
			?>

			<?php
				$time = date('w', strtotime(date('Y-m-d')));

				switch ($time) {
					case 0:
						$selvar = date('Y-m-d', strtotime(date('Y-m-d')."+1 day"));
						$finselvar = date('Y-m-d', strtotime(date('Y-m-d')."+5 day"));
						debug_to_console(date('l', strtotime(date('Y-m-d')))." ". $selvar);
						break;
					case 1:
						$selvar = date('Y-m-d', strtotime(date('Y-m-d')));
						$finselvar = date('Y-m-d', strtotime(date('Y-m-d')."+4 day"));
						debug_to_console(date('l', strtotime(date('Y-m-d')))." ". $selvar);
						break;
					case 2:
						$selvar = date('Y-m-d', strtotime(date('Y-m-d')."-1 day"));
						$finselvar = date('Y-m-d', strtotime(date('Y-m-d')."+3 day"));
						debug_to_console(date('l', strtotime(date('Y-m-d')))." ". $selvar);
						break;
					case 3:
						$selvar = date('Y-m-d', strtotime(date('Y-m-d')."-2 day"));
						$finselvar = date('Y-m-d', strtotime(date('Y-m-d')."+2 day"));
						debug_to_console(date('l', strtotime(date('Y-m-d')))." ". $selvar);
						break;
					case 4:
						$selvar = date('Y-m-d', strtotime(date('Y-m-d')."-3 day"));
						$finselvar = date('Y-m-d', strtotime(date('Y-m-d')."+1 day"));
						debug_to_console(date('l', strtotime(date('Y-m-d')))." ". $selvar);
						break;
					case 5:
						$selvar = date('Y-m-d', strtotime(date('Y-m-d')."-4 day"));
						$finselvar = date('Y-m-d', strtotime(date('Y-m-d')));
						debug_to_console(date('l', strtotime(date('Y-m-d')))." ". $selvar);
						break;
					case 6:
						$selvar = date('Y-m-d', strtotime(date('Y-m-d')."+2 day"));
						$finselvar = date('Y-m-d', strtotime(date('Y-m-d')."+6 day"));
						debug_to_console(date('l', strtotime(date('Y-m-d')))." ". $selvar);
						break;					
					default:
						// code...
						break;
				}

				$date_select = $selvar;; 
				$semaine = date('W', strtotime($date_select));
				echo "<div>
				<table class='planning'>
					<thead>
						<tr>
							<th colspan='11' class='titre_planning'>Semaine ".$semaine."</th>
						</tr>";
				echo $construct;
				for ($i=0; $i < 5; $i++) {
					echo $trs;
					switch ($i) {
						case 0:
							echo "<td class='jourplan'>Lun</td>";
							$date_select = $selvar;
							break;
						case 1:
							echo "<td class='jourplan'>Mar</td>";
							$date_select = date('Y-m-d', strtotime($date_select."+1 day"));
							break;
						case 2:
							echo "<td class='jourplan'>Mer</td>";
							$date_select = date('Y-m-d', strtotime($date_select."+1 day"));
							break;
						case 3:
							echo "<td class='jourplan'>Jeu</td>";
							$date_select = date('Y-m-d', strtotime($date_select."+1 day"));
							break;
						case 4:
							echo "<td class='jourplan'>Ven</td>";
							$date_select = date('Y-m-d', strtotime($date_select."+1 day"));
							break;								
						default:
							echo $tdvide;
							break;
					}	
					include "../assets/libraries/row_calendar.php";
				}
				echo $tre;

				/*if (isset($_GET['loadmore']) && !empty($_GET['loadmore'])) {
					$loadmore = $_GET['loadmore'] + 10;
					echo "<p id='p_btn_c'><a id='btn_calendar' href='emplacement?id=".$_GET['id']."&loadmore=".$loadmore."'>Charger plus</a></p>";
				}
				else {
					echo "<p id='p_btn_c'><a id='btn_calendar' href='emplacement?id=".$_GET['id']."&loadmore=10'>Charger plus</a></p>";					
				}*/
			?>
		</div>
	</div>
</body>
</html>
