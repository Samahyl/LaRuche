<?php 
	include_once "fonctions.php";
	$db = "projet";
	$user = "root";
	$pswd = "";
	$host = "localhost:3307";
	$port=3307;
	try
	{	
		$conn = new PDO('mysql:host=localhost:3307;dbname=projet', $user, $pswd);
	    debug_to_console('Connecté à : '.$db);
		$conn->exec("set names utf8mb4");
	}
	catch (Exception $e)
	{
	    debug_to_console('Erreur : ' . $e->getMessage());
	}
?>