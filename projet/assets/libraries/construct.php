<?php
	$tdvide = "<td></td>";
	$trs = "<tr>"; $tre = "</tr>";
	$tdr = "<td class='occupe'>Réservé</td>";
	$tdi = "<td class='ndispo'>Indisponible</td>";
	$tdn = "<td class='default'>Manquant</td>";
	$tre = "</tbody></table>";

	if (!isset($semaine)) {
		$semaine = date('W', strtotime(date('Y-m-d')));
	}
	else {
		$semaine = date('W', strtotime($date_select));
	}

	$construct = /*<div>
				<table class='planning'>
					<thead>
						<tr>
							<th colspan='11' class='titre_planning'>Semaine ".$semaine."</th>
						</tr>*/"
				        <tr>
				        	<th class='heureplan' style='width: 1rem;''>j/h</th>
				            <th class='heureplan'>9h</th>
				            <th class='heureplan'>10h</th>
				            <th class='heureplan'>11h</th>
				            <th class='heureplan'>12h</th>
				            <th class='heureplan'>13h</th>
				            <th class='heureplan'>14h</th>
				            <th class='heureplan'>15h</th>
				            <th class='heureplan'>16h</th>
				            <th class='heureplan'>17h</th>
				            <th class='heureplan'>18h</th>
				        </tr>
				    </thead>
				    <tbody>";


?>