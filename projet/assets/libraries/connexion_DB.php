<?php 
	include_once "fonctions.php";
	$db = "projet";
	$user = "root";
	$pswd = "BTSsnir2022";
	//$host = "localhost:3307"; Utiliser le port 3306 sur le serveur
	//$port=3307; Utiliser le port 3307 sur Wamp
	try
	{	
		$conn = new PDO('mysql:host=localhost:3306;dbname=projet', $user, $pswd);
	    debug_to_console('Connecté à : '.$db);
		$conn->exec("set names utf8mb4");
	}
	catch (Exception $e)
	{
	    debug_to_console('Erreur : ' . $e->getMessage());
	}
?>