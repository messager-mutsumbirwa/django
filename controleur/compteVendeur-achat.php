<?php
	$requete = $bdd->prepare("SELECT * FROM mag m LEFT JOIN achats a ON a.id_mag = m.id WHERE id_fsseurs = :id_fsseurs ORDER BY a.day_achat");
			$requete->bindValue(':id_fsseurs', $id);
			$requete->execute();
?>