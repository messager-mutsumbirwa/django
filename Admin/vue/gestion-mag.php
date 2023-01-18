<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-witdh, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" type="image/png" href="art.png" />
	<title>Ma plateforme</title>
</head>
<body>
	<header class="topbar">
		<div class="form-mag-titre">FORMULAIRE DE GESTION DE MAGASIN</div>
	</header>
	<div class="body-gest-mag">
		<div class="topbar-gest-mag">
			<div class="titre-topabar-gest-mag">
				Affichage des donnees de la BD
			</div>
			<div class="gest-mag-tablebd-titre">
				<div class="tablebd-id">Id</div>
				<div class="tablebd-cat">Catégorie</div>
				<div class="tablebd-nom">Nom</div>
				<div class="tablebd-prix">Prix</div>
				<div class="tablebd-img">Accueil</div>
				<div class="tablebd-datefin">Date</div>
				<div class="tablebd-action">Action</div>
			</div>

			<?php
				require_once '../modele/connect_bd.php';
				$requete=$bdd->query('SELECT * FROM mag ORDER BY id');
				while ($donnees=$requete->fetch()) {
					echo '<div class="gest-mag-tablebd"><div class="tablebd-id">'. $donnees['id'].'</div><div class="tablebd-cat">'.$donnees['catitem'].'</div><div class="tablebd-nom">'.$donnees['nameitem'].'</div><div class="tablebd-prix">'.$donnees['prixitem'].'</div><div class="tablebd-img">'.$donnees['accueil'].'</div><div class="tablebd-datefin">'.$donnees['day'].'</div><div class="tablebd-bt-action">
						<div class="action-supprimer">
							<form action="../modele/suppmag.php" method="POST">
								<span class="bt-action-supprimer">
									<input type="hidden" name="id" value="'.$donnees['id'].'">
									<input type="submit" name="supprimer" value="Supprimer">
								</span>
							</form>
						</div>
						<div class="action-modifier">
							<form action="../modele/modifmag.php" method="POST">
								<span class="bt-action-modifier">
									<input type="hidden" name="id" value="'.$donnees['id'].'">
									<input type="submit" name="modifier" value="Modifier">
								</span>
							</form>
						</div>
					</div>
				</div>';
				}
			?>
			
		</div>
		<div class="sidebar-gest-mag">
			<div class="titre-sidebar-gest-mag">
				Ajouter un Produit
			</div>
			<form class="ajout-mag" action="../modele/savemag.php" method="POST" enctype="multipart/form-data">
				Id Fournisseur
				<input type="number" name="id_fournisseur"><br>
				Catégorie<br>
				<select name="catitem">
					<option>Vetement</option>
					<option>Alimentation</option>
					<option>technologie</option>
					<option>Location</option>
					<option>Occasion</option>
					<option>Divers</option>
				</select><br>
				Nom :<br>
				<input type="text" name="nameitem">
				Prix :<br>
				<input type="number" name="prixitem"><br>
				Marque :<br>
				<input type="text" name="marqueitem"><br>
				Unité de mesure :<br>
				<input type="text" name="mesureunit"><br>
				Commentaire :<br>
				<textarea name="commentaireitem" rows="10" cols="50"></textarea><br>
				Image :<br>
			    <input type="file" name="icone" id="icone" /><br />
				Autres images :<br>
				<input type="file" name="image1" name="image1">
				<input type="file" name="image2" name="image2">
				<input type="file" name="image3" name="image3">
				<input type="file" name="image4" name="image4">
				Accueil<br>
				<input type="radio" name="accueil" value="Oui" id="Oui">On<br>
				<input type="radio" name="accueil" checked="checked" value="Non" id="Non">Off<br><br>
				Page d'offre<br>
				<input type="radio" name="offre" value="Oui" id="Oui">On<br>
				<input type="radio" name="offre" checked="checked" value="Non" id="Non">Off<br>
				Produit du jour<br>
				<input type="radio" name="pjour" value="Oui" id="Oui">On<br>
				<input type="radio" name="pjour" checked="checked" value="Non" id="Non">Off<br><br>
				Stock illimité<br>
				<input type="radio" name="stockillimite" value="Oui" id="Oui">On<br>
				<input type="radio" name="stockillimite" checked="checked" value="Non" id="Non">Off<br>
				Date Fin :<br>
				<input type="text" name="date-fin"><br>
				<input type="reset" name="annuler" value="Annuler">
				<input type="submit" name="enregistrer" value="AJOUTER"><br>
			</form>
		</div>
	</div>
</body>
</html>