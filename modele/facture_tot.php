<?php
	$req = $bdd->prepare("SELECT SUM(prix_tot) AS somme FROM achats WHERE day_achat = :day_achat");
		// $requete->bindValue(':id_clients', $id);
		$req->execute(array(
			'day_achat' => $day_achat,
			));	
?>