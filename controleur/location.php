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
	$reponse = $bdd->query('SELECT * FROM mag m LEFT JOIN fournisseurs f ON m.id_fournisseur = f.idfsseur WHERE m.catitem="location" LIMIT ' . $premierMessageAafficher . ', ' . $nombredesitemsParPage);
?>