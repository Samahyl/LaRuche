<?php
	include_once "../assets/libraries/style.php";
	include_once "../assets/libraries/connexion_DB.php";
	include_once "../assets/libraries/fonctions.php";

	$sql = $conn->prepare("SELECT * FROM reservations WHERE date_reservation > CURDATE()");
	$sql->execute();
	$result = $sql->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<table>
    <thead>
    	<tr>
            <th colspan="3">Réservation</th>
       	</tr>
        <tr>
            <th colspan="1">Date</th>
            <th colspan="1">Durée</th>
            <th colspan="1">Emplacement</th>
        </tr>
    </thead>
    <tbody>
    	<?php 

    		$cpt = 0;
			foreach ($result as $row => $link) {
				$cpt=$cpt+1;
				if ($cpt%2==0) {
        			echo "<tr>";
					echo "<td class='pair'><strong>".$link['date_reservation']."</strong></td>";
					echo "<td class='pair'><strong>".$link['duree_reservation']."H</strong></td>";
					echo "<td class='pair'><strong>".$link['id_emplacement']."</strong></td>";
					echo "</tr>";
				}
				else {
        			echo "<tr>";
					echo "<td class='impair'><strong>".$link['date_reservation']."</strong></td>";
					echo "<td class='impair'><strong>".$link['duree_reservation']."H</strong></td>";
					echo "<td class='impair'><strong>".$link['id_emplacement']."</strong></td>";
					echo "</tr>";
				}
			}

    	?>       
    </tbody>
</table>
</body>
</html>