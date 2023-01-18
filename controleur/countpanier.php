<?php
	$requete = $bdd->prepare("SELECT COUNT(id_clients) AS panier FROM panier WHERE id_clients = :id");
		$requete->bindValue(':id', $id);
		$requete->execute();
?>