<?php
	session_start();
	include_once "../assets/libraries/header_nav.php";
	include_once "../assets/libraries/connexion_DB.php";
	include_once "../assets/libraries/fonctions.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--<script type="text/javascript" src="../js/maps.js"></script>--> 
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
</head>
<body><!--
    <div id="map"></div>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpbiamJ7aAkSJl2bIlKRVaJv1hnb7G4y8&callback=initMap&v=weekly"></script>-->
	<div id="map"></div>
	<script src="../js/maps.js"></script>

</script>
</body>
</html>
<?php
	include_once "../assets/libraries/footer.php";
?>