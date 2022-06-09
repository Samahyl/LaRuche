<?php
	session_start();
	include_once "../assets/libraries/header_nav.php";
	include_once "../assets/libraries/connexion_DB.php";
	include_once "../assets/libraries/construct.php";
	$sql = $conn->prepare("SELECT * FROM emplacements WHERE id_emplacement = ".$_GET['id']."");
	$sql->execute();
	$result = $sql->fetchAll();
	//var_dump($result);
?>
<!DOCTYPE html>
<html>
<body>
	<form method="GET" action="../assets/libraries/g_emplacement_form_script.php">
		<?php echo '<input type="hidden" name="emp_id" value="'.$_GET['id'].'">'?>
		<label><strong>Description actuelle :</strong></label>
		<p>"<?php echo $result[0][5]?>"</p>
		<?php if($result[0][6]==1){echo "Emplacement ouvert";} else {echo "Emplacement fermer";}?>
		<br><hr><br>
		<label><strong>Description pour <?php echo $result[0][1]?> :</strong></label>
		<input type="text" name="emp_desc" placeholder="Entrer ici une description">
		<br><label>Ouvert ? :</label>
		<input type="checkbox" name="emp_dispo">
		<!--<p><a href="">Prévisualiser</a></p>-->
		<br><br><input type="submit" name="" value="Mettre à jour l'emplacement">
	</form>
	<!--<p class="preview_div">Rendu actuel pour  <?php //echo $result[0][1]?></p>-->
</body>
</html>