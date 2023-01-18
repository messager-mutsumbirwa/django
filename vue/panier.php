<!DOCTYPE html>
<html>
<?php
	include('entete2.php');
?>
	<div class="body-panier">
		<div class="topbar-panier">
			<h2>Votre panier</h2>
			<div class="pannier-titres">
				<div class="panier-titre-article">Article</div>
				<div class="panier-titre-name"></div>
				<div class="panier-titre-quantite">Quantité</div>
				<div class="panier-titre-prixtot">Prix total</div>
				<div class="panier-titre-supprimer">Sup</div>
			</div>
			<?php
				$id=$_SESSION['idp'];	
					require_once '../modele/connect_db.php';
					require_once '../controleur/panier.php';

					while ($donnees = $requete->fetch())
					{
						echo 
			'<div class="panier-item">
				<div class="panier-item-img">
					<img src="../img/'.htmlspecialchars($donnees['image']).'" width="100%">
				</div>
				<div class="panier-item-name">
					'.htmlspecialchars($donnees['nameitem']).'
				</div>
				<div class="panier-item-quantite">
					'.htmlspecialchars($donnees['quantite']).'
				</div>
				<div class="panier-item-prixtot">
					'.htmlspecialchars($donnees['prix_tot']).'$
				</div>
				<div class="panier-item-supprimer">
					<form action="../modele/suppPanier.php" method="POST">
						<input type="hidden" name="id" value="'.htmlspecialchars($donnees['id']).'">
						<input type="image" src="../img/Supprimer.png" width="50%"">
					</form>
				</div>
			</div>';
			}
		?>
		</div>

		<div class="sidebar-panier">
			<div class="panier-prixtot">
				<?php
					$id=$_SESSION['id'];	
							  // connexion a la BD
					require_once '../modele/connect_db.php';
					require_once '../controleur/panierTot.php';

					while ($donnees = $requete->fetch())
					{
						$prixfranctot=$donnees['prix_tot']*2000;
						echo 'Montant total : '.htmlspecialchars($donnees['prix_tot']).'$ soit '.htmlspecialchars($prixfranctot).'fc';
					}
				?>
			</div>
		<form action="../modele/saveAchat.php" method="POST">
			<div class="mode-paiement">
				<h2>Mode de Payement</h2>
				<select name="paiement">
					<option>Via Airtel Money</option>
					<option>Via Orange Money</option>
				</select>
			</div>
			<div class="mode-livraison">
				Livraison en France
			</div>
			<div class="mode-livraison">
				<h2>Mode de Livraison</h2>
				<select name="livraison">
					<option>A domicile</option>
					<option>A notre siège</option>
				</select>
			</div>
			<div class="panier-commander">
					<input type="hidden" name="id" value="<?php echo $_SESSION['id'];?>">
					<input type="submit" name="commander" value="Passer la commande"> 
			</div>
		</form>
		</div>
		<a href="listemagsins2.php">
			<span class="ajout-panier">Ajouter au panier</span>
		</a>
		<div class="panier-infos">
			<div class="panier-infos-remboursement">
				<h2>Satisfait et remboursé</h2>
				Vous disposer dès chaque achat de 15 jours pour changer d'avis
			</div>
			<div class="panier-infos-paiement">
				<h2>Mode de Paiement</h2>
				Seuls le paiement via Airtel Money ou Orange Money sont disponible. Vous pouvez aussi acheter cash
			</div>
			<div class="panier-infos-services">
				<h2>Services clients</h2>
					Lundi au samedi<br>
					De 7h à 17h
			</div>
			<div class="panier-infos-livraison">
				<h2>Livraison</h2>
					Nous livrons uniquement en RDC à Goma précisement<br>
			</div>
		</div>
	</div>
<?php
	include('footer2.php');
?>
</body>
</html>