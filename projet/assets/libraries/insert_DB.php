<?php
	include_once "header_nav.php";
	include_once "connexion_DB.php";
	include_once "fonctions.php";

	echo $_POST['password']."<br>";
	echo $_POST['nom']."<br>";
	echo $_POST['email']."<br>";
	echo hash('sha256', $_POST['password'])."<br>";

	$sql = "INSERT INTO utilisateurs (email, nom, prenom, mdphash)
	VALUES ('".$_POST['email']."','".$_POST['nom']."','".$_POST['prenom']."','".hash('sha256', $_POST['password'])."')";

	if ($conn->query($sql) === TRUE) {
    	debug_to_console('Insertion réussie	'.$_POST['email']."	".$_POST['nom']."	".$_POST['prenom']."	".hash('sha256', $_POST['password']));
	} else {
	 	debug_to_console("Erreur: " . $sql . "<br>" . $conn->error);
	}	

	//mail($_POST['login'], 'Bienvenue', 'Bonjour '.$_POST['nom'].' '.$_POST['prenom'].' chez nous !')
?>