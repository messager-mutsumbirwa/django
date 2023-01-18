<?php
	$requete = $bdd->prepare("SELECT * FROM achats WHERE id_clients= :id ORDER BY !day_achat");
		$requete->execute(array('id' => $id, ));
?>