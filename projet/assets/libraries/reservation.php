<?php
	session_start();
	include_once "connexion_DB.php";
	include_once "fonctions.php";
	//echo "Réservation emplacement = ".$_GET['id'];

	try {
		$sql = $conn->prepare("SELECT * FROM reservations WHERE id_emplacement = '".$_GET['id']."' AND date_reservation = '".$_POST['reservationdate']."' ORDER BY horaire_reservation ASC");
		$sql->execute();
		$result = $sql->fetchAll();		
	}
	catch (Exception $e)
	{
		echo 'Exception reçue : ',  $e->getMessage(), "\n";
	    debug_to_console('Erreur : ' . $e->getMessage());
	}

	/*var_dump($result);
	var_dump($_POST);*/

	$DB_horaire = [];
	$DB_duree = [];
	$count = 0;
	foreach ($result as $row => $link) {
		$DB_horaire[$row] = $link['horaire_reservation'];
		$DB_duree[$row] = $link['duree_reservation'];
		$count = $count+1;
	}//tester valider horaire de réservation (non empiété sur une autre heure)

	$testvalideA = true;
	$testvalideB = true;
	$testvalideC = true;
	for ($cnt=0; $cnt < $count; $cnt++) { 
		echo $cnt;
		$libre = date("H:i", strtotime($DB_horaire[$cnt]));
		for ($dispoHo=0; $dispoHo < $DB_duree[$cnt]; $dispoHo++) { 
			debug_to_console($libre." == ".$_POST['reservationtime']."?");
			if ($libre == $_POST['reservationtime']) {
				debug_to_console("impossible 1");
				$testvalideA = false;
			}
			else {
				debug_to_console("possible 1");
				}
			$libre = date("H:i", strtotime($libre."+1 hour"));
		}

		$librepost = $_POST['reservationtime'];
		for ($dispoHor=0; $dispoHor < $_POST['reservationduree']; $dispoHor++) {
			$libre = date("H:i", strtotime($DB_horaire[$cnt]));
			debug_to_console($librepost." == ".$libre."?");
			if ($libre == $_POST['reservationtime']) {
				debug_to_console("impossible 2");
				$testvalideB = false;
			}
			else {
				debug_to_console("possible 2");
			}
			$librepost = date("H:i", strtotime($librepost."+1 hour"));
		}

		$librepost = date("H:i", strtotime($librepost."-1 hour"));
		echo $librepost;

		if ($librepost >= "18:00") {
			$testvalideC = false;
		}
	}

	//echo $testvalideA."	".$testvalideB."	".$testvalideC;
	if ($testvalideA && $testvalideB && $testvalideC) {
		echo "Réalisable";
		$sql = "INSERT INTO reservations(id_client, date_reservation, horaire_reservation, duree_reservation, id_emplacement)
				VALUES (:id_client, :date_reservation, :horaire_reservation, :duree_reservation, :id_emplacement)";
		$stmt= $conn->prepare($sql);

		$exec = $stmt->execute(array(
			":id_client" => $_SESSION['id_db'],
			":date_reservation" => $_POST['reservationdate'],
			":horaire_reservation" => $_POST['reservationtime'],
			":duree_reservation" => $_POST['reservationduree'],
			":id_emplacement" => $_GET['id']
		));

		if ($exec) {
			echo "<br>true";
	    	debug_to_console('Insertion réussie');
	    	header("Location: ../../frames/reservation.php");
		} else {
			echo "false";
			echo "Erreur: " . $sql . "<br>" . $conn->error;
		 	debug_to_console("Erreur: " . $sql . "<br>" . $conn->error);
		}
	}
	else {
		echo "Irréalisable";
		header("Location: ../../frames/emplacement.php?id=".$_GET['id']."&err=true");
	}
?>
