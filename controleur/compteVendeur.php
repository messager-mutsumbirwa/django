<?php
	$requete = $bdd->prepare("SELECT * FROM mag m LEFT JOIN fournisseurs f ON f.idfsseur = m.id_fournisseur WHERE id_fournisseur = :id_fournisseur");
			$requete->bindValue(':id_fournisseur', $id);
			$requete->execute();
?>