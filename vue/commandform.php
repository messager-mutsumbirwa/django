<!DOCTYPE html>
<html>
<?php include('entete2.php'); ?>
	<div class="body-commandform">
		<div class="cform-container">
			<?php
				require_once '../controleur/control.php'; 

					// reception des donnees 
				$id=$_SESSION['idp'];

				//tester de conformite de mot de passe et id
				$result=($id);
				$info_prod=seeData($result);
				$id_fournisseur=$info_prod['id_fournisseur']; 
				$name=$info_prod['nameitem']; 
				$name=$info_prod['nameitem']; 
				$cat=$info_prod['catitem']; 
				$prix=$info_prod['prixitem']; 
				$mesureunit=$info_prod['mesureunit'];
				$prixfranc=$info_prod['prixfranc']; 
				?>
			<div class="topbar-cform">
				<span>Acheter sur django en toute sécurité et confidence</span><br>
				<span>Nous assurons la protection de tous vos paiements</span>
			</div>
			<div class="sidebar-cform">
				<form action="../modele/ajoutPanier.php" method="POST">
					<div class="article-name">
						Catégorie :
						<input type="text" name="catAchat" value="<?php echo $cat; ?>" onFocus="this.blur()"><br>
					</div>
					<div class="article-name">
						Commande ou reserve pour <br>
						<input type="text" name="nameAchat" value="<?php echo $name; ?>" onFocus="this.blur()"><br>
					</div>
					<div class="article-prix">
						Prix de l'article<br>
						$<input type="text" name="prixAchat" value="<?php echo $prix; ?>" onFocus="this.blur()">/<?php echo $mesureunit ?><br>soit<br> 
						Fc<input type="text" name="prixfranc" value="<?php echo $prixfranc; ?>" onFocus="this.blur()">/<?php echo $mesureunit ?>
						<br>
					</div>
					<div class="command-quantité">
						Saisissez ici le nombre de (<strong><?php echo $mesureunit ?></strong>) selon vos préférences<br>
						<input type="number" name="quantAchat" value="1"><br>
					</div>
					<!-- <div class="moyen-paiement">
						Choisissez le moyen de paiement que vous souhaiter utiliser<br>
						<select name="paiement">
							<option>Via Airtel Money</option>
							<option>Via Orange Money</option>
						</select>
					</div>
					<div class="adresse-livraison"> 
						Choisissez l'adresse de livraison<br>
						<select name="livraison">
							<option>A mon domicile</option>
							<option>A notre siège</option>
						</select>
					</div> -->
					<div class="temps-livraison">
						Nous livrons les articles dans 24h/7. Vous pouvez aussi nous appalez ou nous joindre via chat
					</div>
					<div class="article-commander">
						<input type="hidden" name="idProd" value="<?php echo $id; ?>">
						<input type="hidden" name="idClient" value="<?php echo $_SESSION['id']; ?>">
						<input type="hidden" name="idFsseur" value="<?php echo $id_fournisseur; ?>">

						<input type="submit" name="panierajout" value="Ajouter au panier">
					</div>
				</form>
			</div>
		</div>
	</div>

	<?php include('footer2.php'); ?>
</body>
</html>