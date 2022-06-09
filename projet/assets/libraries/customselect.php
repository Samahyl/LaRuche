<?php
	echo $_GET['champnom']."<br>";
	echo $_GET['rowsdisplayed']."<br>";

	$customsearch = "SELECT * FROM reservations,utilisateurs WHERE reservations.id_client=utilisateurs.id AND nom LIKE '%".$_GET['champnom']."%' ORDER BY id_reservation ASC";

	echo $customsearch;

	header('Location: ../../frames/gestion_r?customsearch='.$customsearch.'&colones='.$_GET['rowsdisplayed'].'');
?>