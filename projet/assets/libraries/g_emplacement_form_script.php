<?php
	session_start();
	include_once "connexion_DB.php";

	//var_dump($_GET);

	/*$data = [
			'id_emplacement' => $_GET['emp_id'],
		    'description' => $_GET['emp_desc'],
		];*/

	if (empty($_GET['emp_desc'])) {
		$nodesc = 'Aucune description pour le moment';
		//$data['description'] = $nodesc;
		$data = [
			'id_emplacement' => $_GET['emp_id'],
		    'description' => $nodesc,
		];
	}
	else {
		$data = [
			'id_emplacement' => $_GET['emp_id'],
		    'description' => $_GET['emp_desc'],
		];
	}

	if (!isset($_GET['emp_dispo'])) {
		$sql = "
		UPDATE emplacements 
			SET description=:description, ouvert=0
			WHERE id_emplacement=:id_emplacement
		";
	}
	else {
		$sql = "
		UPDATE emplacements 
			SET description=:description, ouvert=1
			WHERE id_emplacement=:id_emplacement
		";
	}

	

	echo "<br>";

	var_dump($data);
	/*$sql = "
	UPDATE emplacements 
		SET description=:description 
		AND ouvert=:disponibilite 
		WHERE id_emplacement=:id_emplacement
	";*/

	echo $sql;
	$stmt = $conn->prepare($sql);
	if ($stmt->execute($data) === TRUE) {
    	debug_to_console('Modification réussie');
    	header("Location: ../../frames/g_emplacement_form.php?id=".$_GET['emp_id']."");
	} else {
	 	debug_to_console("Erreur: " . $sql . "<br>");
	 	header("Location: ../../frames/g_emplacement_form.php?id=".$_GET['emp_id']."");
	}
?>