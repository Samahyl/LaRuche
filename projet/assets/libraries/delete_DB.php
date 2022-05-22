<?php
	session_start();
	include_once "header_nav.php";
	include_once "connexion_DB.php";
	include_once "fonctions.php";

	$cpt = 0;
	$getval;
	foreach($_GET as $id => $value)
	{
		$getval = $value;
	}

	$sql = "DELETE FROM reservations WHERE id_reservation = '".$getval."'";
	echo $sql;
	if ($conn->query($sql) === TRUE) {
    	debug_to_console('Suppression réussie');
    	//echo $string."<br>".$sql;
    	header("Location: ../../frames/gestion_r");
	} else {
	 	debug_to_console("Erreur: " . $sql . "<br>");
	 	header("Location:  ../../frames/gestion_r");
	}
?>