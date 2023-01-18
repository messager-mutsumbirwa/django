<?php
	if (isset($_GET['page']))
	{
	$page = $_GET['page']; 
	}
	else 
	
	{
	$page = 1; 
	} 
	
	$premierMessageAafficher = ($page - 1) * $nombredesitemsParPage;
	$reponse = $bdd->query('SELECT * FROM mag WHERE accueil="oui" AND (catitem="vetement" OR catitem="occasion" OR catitem="alimentation" OR catitem="technologie") ORDER BY id DESC LIMIT
	' . $premierMessageAafficher . ', ' . $nombredesitemsParPage);
?>