<?php
	include_once "header_nav.php";
	include_once "connexion_DB.php";
	include_once "fonctions.php";

	echo $_POST['password']."<br>";
	echo $_POST['nom']."<br>";
	echo $_POST['email']."<br>";
	echo hash('sha256', $_POST['password'])."<br>";

	$sql = $conn->prepare("SELECT * FROM utilisateurs WHERE email='".$_POST['email']."'");
	$sql->execute();
	$result = $sql->fetchAll();

	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		if (!isset($result) || empty($result)) {
			try
			{	
				$sql = "INSERT INTO utilisateurs (email, nom, prenom, date_arrivee, mdphash, habilitation)
				VALUES (
					'".$_POST['email']."',
					'".$_POST['nom']."',
					'".$_POST['prenom']."',
					CURDATE(),
					'".hash('sha256', $_POST['password'])."',
					'1')";

				$conn->query($sql);
				header('Location: ../../frames/login.php?new=true');
			}
			catch (Exception $e)
			{
			    debug_to_console('Erreur : ' . $e->getMessage());
			}
		}
		else {
			header('Location: ../../frames/signin.php?error=em2');
		}
	}
	else {
		header('Location: ../../frames/signin.php?error=em1');
	}
	

	//mail($_POST['login'], 'Bienvenue', 'Bonjour '.$_POST['nom'].' '.$_POST['prenom'].' chez nous !')
?>