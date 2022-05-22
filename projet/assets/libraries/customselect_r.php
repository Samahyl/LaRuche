<?php
	include_once "fonctions.php";
	echo $_GET['champdate']."<br>";
	echo $_GET['folks']."<br>";

	//$customsearch = "SELECT DISTINCT emplacements.* FROM emplacements,reservations WHERE accueil >= '".$_GET['folks']."' AND date_reservation != '".$_GET['champdate']."' ORDER BY emplacements.id_emplacement ASC ";

	//echo $customsearch."<br><br>";

	$cpt = 0;
	$string = "";
	foreach($_GET as $id => $value)
	{
		if($cpt == 0){
			$string.="date_reservation != '".$value."'";
		}
		else {
			if ($id == "folks") {
				$string.=" AND ";
				$string.=" accueil >= '".$value."'";
			}
			if ($id == "alradio" || $id == "reradio" || $id == "conradio") {
				$nomemp = null;
				if ($id == "alradio") $nomemp = "Alvéole";
				if ($id == "reradio") $nomemp = "Réunion";
				if ($id == "conradio") $nomemp = "Conférence";
				$string.=" AND ";
				$string.=" emplacement >= '".$nomemp."'";
			}
		}
	   debug_to_console('ID = '.$id.' --> '.$value);
	   $cpt++;
	}

	$customsearch = "SELECT DISTINCT emplacements.* FROM emplacements,reservations WHERE ".$string." ORDER BY emplacements.id_emplacement ASC ";

	header('Location: ../../frames/reservation?customsearch='.$customsearch.'');
?>