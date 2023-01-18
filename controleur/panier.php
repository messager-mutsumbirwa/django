<?php
	$requete = $bdd->prepare("SELECT * FROM mag m RIGHT JOIN panier p ON m.id = p.id_mag WHERE id_clients = :id_clients");
		$requete->bindValue(':id_clients', $id);
		$requete->execute();
?>