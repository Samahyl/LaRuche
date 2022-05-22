<?php
	session_start();
	include_once "connexion_DB.php";
	include_once "fonctions.php";

	$texte = $_POST['texte'];
	$sql = "INSERT INTO actualites (date_actu, titre_actu, soustitre_actu, texte_actu, id_staff)
			VALUES (CURRENT_TIMESTAMP(), :titre_actu, :soustitre_actu, :texte_actu, :id_staff)";
	$stmt= $conn->prepare($sql);

	$exec = $stmt->execute(array(
		":titre_actu" => $_POST['titre'],
		":soustitre_actu" => $_POST['soustitre'],
		":texte_actu" => $texte,
		":id_staff" => $_SESSION['id_db'],
	));


	if ($sql === TRUE) {
    	debug_to_console('Insertion réussie');
    	header("Location: ../../");
	} else {
		echo "Erreur: " . $sql . "<br>" . $conn->error;
	 	debug_to_console("Erreur: " . $sql . "<br>" . $conn->error);
	}	
	
?>