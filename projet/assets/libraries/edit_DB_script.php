<?php
	session_start();
	include_once "connexion_DB.php";

	var_dump($_POST);

	$data = [
	    'horaire_reservation' => $_POST['horaire_after'],
	    'duree_reservation' => $_POST['duree_after'],
	    'date_reservation' => $_POST['date_after'],
	];

	echo "<br>";

	var_dump($data);
	$sql = "UPDATE reservations SET date_reservation=:date_reservation, horaire_reservation=:horaire_reservation, duree_reservation=:duree_reservation WHERE id_reservation=".$_POST['id_reservation']."";
	echo $sql;
	$stmt = $conn->prepare($sql);
	if ($stmt->execute($data) === TRUE) {
    	debug_to_console('Suppression réussie');
    	header("Location: edit_DB.php?id_reservation_new=".$_POST['id_reservation']."");
	} else {
	 	debug_to_console("Erreur: " . $sql . "<br>");
	 	header("Location:  ../../frames/gestion_r.php");
	}
?>
