<?php
	session_start();
	include_once "../assets/libraries/header_nav.php";
	include_once "../assets/libraries/connexion_DB.php";

	if ($_SESSION['habitilation']==3) {
		debug_to_console("Habitilation niveau : ".$_SESSION['habitilation'].", Administrateur");
	}
	elseif($_SESSION['habitilation']==1) {
		debug_to_console("Habitilation niveau : ".$_SESSION['habitilation'].", Utilisateur");
	}
	else {
		echo "<a>Accès non authorisé !</a><br>";
		echo "<a href='profile'>RETOUR</a>";
	}

	$sql = $conn->prepare("SELECT * FROM emplacements");
	$sql->execute();
	$result = $sql->fetchAll();

	foreach ($result as $row => $link) { 
		echo "
			<div class='gestion_emplacement_container'>
				<a href='g_emplacement?id=".$link['id_emplacement']."'>
					<h1>".$link['emplacement']."</h1>
				</a>
			</div>
		";
	}
	
	include_once "../assets/libraries/footer.php";
?>