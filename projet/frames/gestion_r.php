<?php
	?><script type="text/javascript" src="../js/alerts.js"></script><?php
	session_start();
	include_once "../assets/libraries/header_nav.php";
	include_once "../assets/libraries/connexion_DB.php";

	if ($_SESSION['habitilation']==3) {
		debug_to_console("Habitilation niveau : ".$_SESSION['habitilation'].", Administrateur");

		if (!isset($_GET['customsearch'])) {
			$sql = $conn->prepare("SELECT * FROM reservations,utilisateurs WHERE reservations.id_client=utilisateurs.id ORDER BY id_reservation ASC");
			$sql->execute();
			$result = $sql->fetchAll();
		}
		elseif (isset($_GET['customsearch'])) {
			$sql = $conn->prepare($_GET['customsearch']);
			$sql->execute();
			$result = $sql->fetchAll();
		}


		?>
		<form class="selection_r_admin" action="../assets/libraries/customselect.php" method="GET">
			<input type="text" name="champnom" placeholder="Recherche par nom de client">
			<select value="" name="rowsdisplayed">
				<option value="25">25 réservations</option>
				<option value="50">50 réservations</option>
				<option value="100">100 réservations</option>
				<option value="">Tout</option>
			</select><label> Affichage</label>
			<input type="submit" name="submit" value="Recherche">
		</form>
		<p id="btn_filtre"><a href="gestion_r" id="btn_filtres">Retirer la selection par filtres</a></p>

		<form action="../assets/libraries/delete_DB" method="GET"><h1>Sélectionnez les réservations à effacer</h1><?php
		if (!isset($_GET['colones'])) {
			foreach ($result as $row => $link) { 
				echo "<div class='affichage_reservations'>
						<a><strong>Client : ".$link['nom']." ".$link['prenom']."</strong><br>
						Date : ".$link['date_reservation']." | Horaire : ".$link['horaire_reservation']." | Durée : ".$link['duree_reservation']."h
						<a class='modifetsup' href='../assets/libraries/delete_DB?id_reservation=".$link['id_reservation']."' onclick='alert_suppr()''><p class='Pmodifetsup'>Supprimer</p></a><a class='modifetsup' href='../assets/libraries/edit_DB?id_reservation=".$link['id_reservation']."&id_client=".$link['id_client']."&date_reservation=".$link['date_reservation']."&horaire_reservation=".$link['horaire_reservation']."&duree_reservation=".$link['duree_reservation']."&id_emplacement=".$link['id_emplacement']."'><p class='Pmodifetsup'>Modifier</p></a></div>";
			}
		}
		elseif (isset($_GET['colones'])) {
			$cpt = 1;
			foreach ($result as $row => $link) { 
				if ($cpt == $_GET['colones']) {
					break;
				}
				$cpt++;
				echo "<div class='affichage_reservations'>
						<a><strong>Client : ".$link['nom']." ".$link['prenom']."</strong><br>
						Date : ".$link['date_reservation']." | Horaire : ".$link['horaire_reservation']." | Durée : ".$link['duree_reservation']."h
						<a class='modifetsup' href='../assets/libraries/delete_DB?id_reservation=".$link['id_reservation']."' onclick='alert_suppr()''><p class='Pmodifetsup'>Supprimer</p></a><a class='modifetsup' href='../assets/libraries/edit_DB?id_reservation=".$link['id_reservation']."&id_client=".$link['id_client']."&date_reservation=".$link['date_reservation']."&horaire_reservation=".$link['horaire_reservation']."&duree_reservation=".$link['duree_reservation']."&id_emplacement=".$link['id_emplacement']."'><p class='Pmodifetsup'>Modifier</p></a></div>";
			}	
			
		}

		?></form><?php
	}

	elseif($_SESSION['habitilation']==1) {
		debug_to_console("Habitilation niveau : ".$_SESSION['habitilation'].", Utilisateur");
	}
	else {
		echo "<a>Accès non authorisé !</a><br>";
		echo "<a href='profile'>RETOUR</a>";
	}
	
	include_once "../assets/libraries/footer.php";
?>