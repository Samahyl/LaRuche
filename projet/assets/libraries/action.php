<?php
	session_start();

	if (isset($_SESSION['prenom'])) {
		session_unset();
		session_destroy();
	}
	include_once "connexion_DB.php";
	include_once "header_nav.php";
	include_once "fonctions.php";

	$email = $_POST['email'];
	$mdphash = hash('sha256', $_POST['password']);

	$sql = $conn->prepare("SELECT * FROM utilisateurs WHERE email='".$_POST['email']."'");
	$sql->execute();
	$result = $sql->fetchAll();
	
	//var_dump($result);
	if (empty($result)) {
		echo "<a>Compte inexistant !</a><br>";
		echo '<a href="../../frames/signin.php">Créer un compte</a><br>';
		echo '<a href="../../frames/login.php">Réassayer</a>';
	}
	foreach ($result as $row => $link) {
		$value = $mdphash;
		debug_to_console('Mot de Passe hash : '.$value);
		if ($value == $link['mdphash']) {
			session_start();
			$_SESSION['id_db'] = $link['id'];
			$_SESSION['date_reservation'] = $link['date_arrivee'];
			$_SESSION['prenom'] = $link['prenom'];
			$_SESSION['nom'] = $link['nom'];
			$_SESSION['email'] = $link['email'];
			$_SESSION['habitilation'] = $link['habilitation'];
			header('Location: ../../frames/profile.php');
		}
		elseif ($value != $link['mdphash']) {
			echo "Mot de passe incorrecte <br>";
			echo '<a href="../../frames/login.php">Réassayer</a>';
		}			
		else {
			echo "Entrez votre mdp <br>";
		}
	}

	/*while ($row = $query->fetch_array(MYSQLI_BOTH)) {
		$value = $mdphash;
    	debug_to_console('Mot de Passe hash : '.$value);
		if ($value == $row['mdphash']) {
			session_start();
			$_SESSION['id_db'] = $row['id'];
			$_SESSION['date_reservation'] = $row['date_arrivee'];
			$_SESSION['prenom'] = $row['prenom'];
			$_SESSION['nom'] = $row['nom'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['habitilation'] = $row['habilitation'];
			header('Location: ../../frames/profile');
		}
		elseif ($value != $row['mdphash']) {
			echo "Mot de passe incorrecte <br>";
			echo '<a href="../../frames/login">Réassayer</a>';
		}			
		else {
			echo "Entrez votre mdp <br>";
		}
	}*/
?>