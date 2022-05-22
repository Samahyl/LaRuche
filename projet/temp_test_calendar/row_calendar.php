<?php
	try {
		$sql = $conn->prepare("SELECT * FROM reservations WHERE id_emplacement = '".$_GET['id']."' AND date_reservation = '".$date_select."' ORDER BY horaire_reservation ASC");
		$sql->execute();
		$result = $sql->fetchAll();		
	}
	catch (Exception $e)
	{
		echo 'Exception reçue : ',  $e->getMessage(), "\n";
	    debug_to_console('Erreur : ' . $e->getMessage());
	}	

	$tabHo = [];
	$tabDu = [];
	$horaire = "09:00:00";
	foreach ($result as $row => $link) {/*
		debug_to_console("horaire réservation :".$link['horaire_reservation']);
		debug_to_console("duree réservation :".$link['duree_reservation']);*/
		$tabHo[$row] = $link['horaire_reservation'];
		$tabDu[$row] = $link['duree_reservation'];
		$tabtemp[$row] = $link['date_reservation'];
	}

	$alreadyexist = NULL;
	for ($noeli=0; $noeli < 10; $noeli++) {
		for ($linoe=0; $linoe < 10; $linoe++) { 
			if (isset($tabHo[$linoe]) && $tabHo[$linoe]==$horaire) {
				for ($niloe=0; $niloe < $tabDu[$linoe]; $niloe++) {
					//echo $tdr;
					echo "<td id='".$tabtemp[$linoe]."' class='occupe'>Réservé</td>";
					$alreadyexist = $alreadyexist + 1;
				}
				//debug_to_console("alreadyexist : ".$alreadyexist);
			}
		}
		if ($alreadyexist == 0) {
			echo $tdvide;
		}
		else {
			$alreadyexist = $alreadyexist - 1;
		}/*
		debug_to_console("noeli :".$noeli);
		debug_to_console("alreadyexist : ".$alreadyexist);*/
		$horaire = date("H:i:s", strtotime($horaire."+1 hour"));
	}
?>
