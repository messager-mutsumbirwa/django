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
		<div class="form-mag-titre">FORMULAIRE DE GESTION DES ACHATS</div>
	</header>
	<div class="body-gest-mag">
		<div class="topbar-gest-achat">
			<div class="titre-topabar-gest-mag">
				Affichage des donnees de la BD
			</div>
			<div class="gest-mag-tablebd-titre">
				<div class="table-title-Achat-date">Date</div>
				<div class="table-title-Achat-client">Client</div>
				<div class="table-title-Achat-tel">Téléphone</div>
				<div class="table-title-Achat-add">Adresse</div>
				<div class="table-title-Achat-achat">Achat</div>
				<div class="table-title-Achat-quant">Quantite</div>
				<div class="table-title-Achat-punit">P.U</div>
				<div class="table-title-Achat-ptot">P.T</div>
				<div class="table-title-Achat-fsseur">Fsseurs</div>
				<div class="table-title-Achat-img">Commentaire</div>
				<div class="table-title-Achat-livr">Livré</div>
			</div>
			<?php
				require_once '../modele/connect_bd.php';
				$requete=$bdd->query('SELECT * FROM mag LEFT JOIN fournisseurs f ON f.idfsseur=m.id_fournisseur RIGHT JOIN achats a ON a.id_mag=m.id LEFT JOIN clients c ON c.id=a.id_clients');
				while ($donnees=$requete->fetch()) {
					echo'
				
			<div class="gest-mag-tablebd">
				<div class="tableAchat-date">
					'.htmlspecialchars($donnees['day_achat']).'
				</div>
				<div class="tableAchat-client">
					'.htmlspecialchars($donnees['name']).' '.htmlspecialchars($donnees['pname']).' 
				</div>
				<div class="tableAchat-tel">
					'.htmlspecialchars($donnees['login']).'
				</div>
				<div class="tableAchat-add">
					'.htmlspecialchars($donnees['adresse']).'
				</div>
				<div class="tableAchat-achat">
					<a href="../../img/'.htmlspecialchars($donnees['image']).'"><img src="../../img/'.htmlspecialchars($donnees['image']).'"></a> 
					'.htmlspecialchars($donnees['nameitem']).' 
				</div>
				<div class="tableAchat-quant">
					'.htmlspecialchars($donnees['quantite']).'
				</div>
				<div class="tableAchat-punit">
					'.htmlspecialchars($donnees['prixitem']).'$ soit '.htmlspecialchars($donnees['prixfranc']).'fc
				</div>
				<div class="tableAchat-ptot">
					'.htmlspecialchars($donnees['prix_tot']).'$ soit '.htmlspecialchars($donnees['prix_tot_franc']).'fc
				</div>
				<div class="tableAchat-fsseur">
					'.htmlspecialchars($donnees['ets']).'
				</div>
				<div class="tableAchat-img">Commentaire</div>
				<div class="tableAchat-livr">
					<form action="../modele/supachat.php" method="POST">
						<input type="hidden" name="id_achat" value="'.htmlspecialchars($donnees['id_achat']).'">
						<input type="submit" value="OUI" class="bt-action-livr">
					</form>
				</div>
			</div>';

			}
			?>
			
		</div>
	</div>
</body>
</html>