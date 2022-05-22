<?php
	session_start();
	include_once "assets/libraries/header_nav.php";
	include_once "assets/libraries/connexion_DB.php";
	include_once "assets/libraries/construct.php";
	date_default_timezone_set('Europe/Paris');
?>


<?php
	$nbw = 52-$semaine;
	debug_to_console("nbw : ".$nbw);
	$time = date('w', strtotime(date('Y-m-d')));

	switch ($time) {
		case 0:
			$selvar = date('Y-m-d', strtotime(date('Y-m-d')."+1 day"));
			$finselvar = date('Y-m-d', strtotime(date('Y-m-d')."+5 day"));
			//debug_to_console(date('l', strtotime(date('Y-m-d')))." ". $selvar);
			break;
		case 1:
			$selvar = date('Y-m-d', strtotime(date('Y-m-d')));
			$finselvar = date('Y-m-d', strtotime(date('Y-m-d')."+4 day"));
			//debug_to_console(date('l', strtotime(date('Y-m-d')))." ". $selvar);
			break;
		case 2:
			$selvar = date('Y-m-d', strtotime(date('Y-m-d')."-1 day"));
			$finselvar = date('Y-m-d', strtotime(date('Y-m-d')."+3 day"));
			//debug_to_console(date('l', strtotime(date('Y-m-d')))." ". $selvar);
			break;
		case 3:
			$selvar = date('Y-m-d', strtotime(date('Y-m-d')."-2 day"));
			$finselvar = date('Y-m-d', strtotime(date('Y-m-d')."+2 day"));
			//debug_to_console(date('l', strtotime(date('Y-m-d')))." ". $selvar);
			break;
		case 4:
			$selvar = date('Y-m-d', strtotime(date('Y-m-d')."-3 day"));
			$finselvar = date('Y-m-d', strtotime(date('Y-m-d')."+1 day"));
			//debug_to_console(date('l', strtotime(date('Y-m-d')))." ". $selvar);
			break;
		case 5:
			$selvar = date('Y-m-d', strtotime(date('Y-m-d')."-4 day"));
			$finselvar = date('Y-m-d', strtotime(date('Y-m-d')));
			//debug_to_console(date('l', strtotime(date('Y-m-d')))." ". $selvar);
			break;
		case 6:
			$selvar = date('Y-m-d', strtotime(date('Y-m-d')."+2 day"));
			$finselvar = date('Y-m-d', strtotime(date('Y-m-d')."+6 day"));
			//debug_to_console(date('l', strtotime(date('Y-m-d')))." ". $selvar);
			break;					
		default:
			// code...
			break;
	}

	for ($o=0; $o <= $nbw; $o++) {		
		if (!isset($date_select)) { 
			$date_select = $selvar ;
		}
		else {
			$date_select = date('Y-m-d', strtotime($date_select."+3 day")); 
		}
		$semaine = date('W', strtotime($date_select));
		echo "<div>
				<table class='planning'>
					<thead>
						<tr>
							<th colspan='11' class='titre_planning'>Semaine ".$semaine."</th>
						</tr>";
		echo $construct;
		for ($i=0; $i < 5; $i++) {
			echo $trs;
			switch ($i) {
				case 0:
					echo "<td class='jourplan'>Lun</td>";
					$date_select = $date_select;
					break;
				case 1:
					echo "<td class='jourplan'>Mar</td>";
					$date_select = date('Y-m-d', strtotime($date_select."+1 day"));
					break;
				case 2:
					echo "<td class='jourplan'>Mer</td>";
					$date_select = date('Y-m-d', strtotime($date_select."+1 day"));
					break;
				case 3:
					echo "<td class='jourplan'>Jeu</td>";
					$date_select = date('Y-m-d', strtotime($date_select."+1 day"));
					break;
				case 4:
					echo "<td class='jourplan'>Ven</td>";
					$date_select = date('Y-m-d', strtotime($date_select."+1 day"));
					break;								
				default:
					echo $tdvide;
					break;
			}	
			//echo $date_select."<br>";	
			include "temp_test_calendar/row_calendar.php";
		}
		echo $tre;
	}
	/*echo $construct;
	$date_select; 
	for ($i=0; $i < 5; $i++) {
		echo $trs;
		switch ($i) {
			case 0:
				echo "<td class='jourplan'>Lun</td>";
				$date_select = $selvar;
				break;
			case 1:
				echo "<td class='jourplan'>Mar</td>";
				$date_select = date('Y-m-d', strtotime($date_select."+1 day"));
				break;
			case 2:
				echo "<td class='jourplan'>Mer</td>";
				$date_select = date('Y-m-d', strtotime($date_select."+1 day"));
				break;
			case 3:
				echo "<td class='jourplan'>Jeu</td>";
				$date_select = date('Y-m-d', strtotime($date_select."+1 day"));
				break;
			case 4:
				echo "<td class='jourplan'>Ven</td>";
				$date_select = date('Y-m-d', strtotime($date_select."+1 day"));
				break;								
			default:
				echo $tdvide;
				break;
		}	
		//echo $date_select."<br>";	
		include "temp_test_calendar/row_calendar.php";
	}
	echo $tre;*/
?>
<h1>Maquette:</h1>

<div>
	<table class="planning">
		<thead>
			<tr>
				<th colspan="11" class="titre_planning">Semaine</th>
			</tr>
	        <tr>
	        	<th class="heureplan" style="width: 1rem;">j/h</th>
	            <th class="heureplan">9h</th>
	            <th class="heureplan">10h</th>
	            <th class="heureplan">11h</th>
	            <th class="heureplan">12h</th>
	            <th class="heureplan">13h</th>
	            <th class="heureplan">14h</th>
	            <th class="heureplan">15h</th>
	            <th class="heureplan">16h</th>
	            <th class="heureplan">17h</th>
	            <th class="heureplan">18h</th>
	        </tr>
	    </thead>
	    <tbody>
	        <tr>
	        	<td class="jourplan">Lun</td>
	        	<td class="occupe">Réservé</td>
	        	<td></td>
	        	<td></td>
	        	<td></td>
	        	<td></td>
	        	<td></td>
	        	<td></td>
	        	<td></td>
	        	<td></td>
	        	<td></td>
	        </tr>
	        <tr>
	        	<td class="jourplan">Mar</td>
	        	<td></td>
	        	<td class="occupe">Réservé</td>
	        	<td></td>
	        	<td></td>
	        	<td></td>
	        	<td></td>
	        	<td></td>
	        	<td class="ndispo">Indisponible</td>
	        	<td></td>
	        	<td></td>
	        </tr>
	        <tr>
	        	<td class="jourplan">Mer</td>
	        	<td></td>
	        	<td></td>
	        	<td></td>
	        	<td class="occupe">Réservé</td>
	        	<td></td>
	        	<td></td>
	        	<td></td>
	        	<td></td>
	        	<td></td>
	        	<td></td>
	        </tr>
	        <tr>
	        	<td class="jourplan">Jeu</td>
	        	<td></td>
	        	<td class="occupe">Réservé</td>
	        	<td></td>
	        	<td></td>
	        	<td></td>
	        	<td></td>
	        	<td></td>
	        	<td></td>
	        	<td></td>
	        	<td></td>
	        </tr>
	        <tr>
	        	<td class="jourplan">Ven</td>
	        	<td></td>
	        	<td></td>
	        	<td></td>
	        	<td></td>
	        	<td></td>
	        	<td></td>
	        	<td class="occupe">Réservé</td>
	        	<td></td>
	        	<td></td>
	        	<td></td>
	        </tr>
	    </tbody>
	</table>
</div>