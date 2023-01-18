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
	$reponse = $bdd->query('SELECT * FROM mag WHERE accueil="oui" ORDER BY id DESC LIMIT
	' . $premierMessageAafficher . ', ' . $nombredesitemsParPage);
?>