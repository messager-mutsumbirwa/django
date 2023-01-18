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
		<div class="form-mag-titre">FORMULAIRE DE GESTION DES COMPTES FOURNISSEURS</div>
	</header>
	<div class="body-gest-mag">
		<div class="topbar-gest-mag">
			<div class="titre-topabar-gest-mag">
				Affichage des donnees de la BD
			</div>
			<div class="gest-mag-tablebd-titre">
				<div class="tablebd-id">Id</div>
				<div class="tablebd-cat">Nom</div>
				<div class="tablebd-nom">Siege</div>
				<div class="tablebd-prix">ETS</div>
				<div class="tablebd-img">Activites</div>
				<div class="tablebd-datefin">Tél</div>
				<div class="tablebd-action">Action</div>
			</div>

			<?php
			//connexion à la base desdonnées
				require_once '../modele/connect_bd.php';
				$requete=$bdd->query('SELECT * FROM fournisseurs ORDER BY idfsseur');
				while ($donnees=$requete->fetch()) {
					echo '<div class="gest-mag-tablebd"><div class="tablebd-id">'.$donnees['idfsseur'] .'</div><div class="tablebd-cat">'. $donnees['name'] .'</div><div class="tablebd-nom">'. $donnees['siege'].'</div><div class="tablebd-prix">'. $donnees['ets'].'</div><div class="tablebd-img">' .$donnees['cat'].'</div>'.'<div class="tablebd-datefin">' .$donnees['login'].'</div>
						<div class="tablebd-bt-action">
							<div class="action-supprimer">
								<form action="../modele/suppfsseur.php" method="POST">
									<span class="bt-action-supprimer">
										<input type="hidden" name="id" value="'.$donnees['idfsseur'].'">
										<input type="submit" name="supprimer" value="Supprimer">
									</span>
								</form>
							</div>
							<div class="action-modifier">
								<form action="../modele/modif-fsseur.php" method="POST">
									<span class="bt-action-modifier">
										<input type="hidden" name="id" value="'.$donnees['idfsseur'].'">
										<input type="submit" name="modifier" value="Modifier">
									</span>
								</form>
							</div>
						</div>
					</div>
					';
				}
			?>

			
		
			
			

		</div>
		<div class="sidebar-gest-mag">
			<div class="titre-sidebar-gest-mag">
				Ajouter Personne
			</div>
			<form class="ajout-mag" action="../modele/saveFsseur.php" method="POST">
				Nom :<br>
				<input type="text" name="name">
				Nom de l'Ets :<br>
				<input type="text" name="ets"><br>
				Siege :<br>
				<input type="text" name="siege"><br>
				Ctégorie d'Activités :<br>
				<select name="cat">
					<option>Vetement</option>
					<option>Alimentation</option>
					<option>technologie</option>
					<option>Divers</option>
				</select><br>
				Téléphone
				<input type="tel" name="login"><br>
				Mot de passe
				<input type="password" name="pwd" minlength="6"><br>
				Autres infos :
				<input type="text" name="other"><br>
				<input type="reset" name="annuler" value="Annuler">
				<input type="submit" name="enregistrer" value="AJOUTER"><br>
			</form>
		</div>
	</div>
</body>
</html>