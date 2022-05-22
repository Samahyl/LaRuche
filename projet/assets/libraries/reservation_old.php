<?php
	session_start();
	include_once "connexion_DB.php";
	include_once "fonctions.php";
	echo "Réservation emplacement = ".$_GET['id'];
/*
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

	foreach ($result as $row => $link) {

	}*///tester valider horaire de réservation (non empiété sur une autre heure)

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
    	//header("Location: ../../frames/reservation");
	} else {
		echo "false";
		echo "Erreur: " . $sql . "<br>" . $conn->error;
	 	debug_to_console("Erreur: " . $sql . "<br>" . $conn->error);
	}
?>