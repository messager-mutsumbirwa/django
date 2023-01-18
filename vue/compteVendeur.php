<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<?php
		include('entete.php');
	?>
	<div class="body-c_vendeur">
		<div class="gestion-cvendeur">
			<h2>Bienvenue chez vous Monsieur  <strong></strong></h2>
			<div class="c-vendeur-gestion">
				<a href="moncompte-fsseur.php">Gérer mon Compe</a><br>
				Changer ses identifiants ainsi que ses informations générales
			</div>
		</div>
		<div class="topbar-c_vendeur">
			<h2>Le contenu de votre magasin</h2>
			<div class="mag-c_vendeur">
				<div class="titre-c_vendeur">
					<div class="titre-c_vendeur_date">Vos articles</div>
					<div class="titre-c_vendeur_img"></div>
					<div class="titre-c_vendeur_name"></div>
					<div class="titre-c_vendeur_prix">Prix Unitaire</div>
					<div class="titre-c_vendeur_cat">Catégorie</div>
					<div class="titre-c_vendeur_supp"></div>
				</div>
				<?php
					$id=$_SESSION['idfsseur'];
					require_once '../modele/connect_db.php';
					require_once('../controleur/compteVendeur.php');
					while ($donnees = $requete->fetch())
					{
						echo'
				<div class="article-c_vendeur">
					<div class="article-c_vendeur_date">
						'.htmlspecialchars($donnees['day']).'
					</div>
					<div class="article-c_vendeur_img">
						<img src="../img/'.htmlspecialchars($donnees['image']).'"">
					</div>
					<div class="article-c_vendeur_name">
						'.htmlspecialchars($donnees['nameitem']).'
					</div>
					<div class="article-c_vendeur_prix">
						'.htmlspecialchars($donnees['prixitem']).'$ soit '.htmlspecialchars($donnees['prixfranc']).'fc
					</div>
					<div class="article-c_vendeur_cat">
						'.htmlspecialchars($donnees['catitem']).'
					</div>
					<div class="article-c_vendeur_supp">
						<form action="../modele/suppmag.php" method="POST">
							<input type="hidden" value="'.htmlspecialchars($donnees['id']).'" name="id">
							<input type="image" src="../img/supprimer.png">
						</form>
					</div>
				</div>';
					}
				?>
			</div>
		</div>

		<div class="sidebar-c_vendeur">
			<h2>Liste de mes ventes</h2>
			<div class="mag-c_vendeur">
				<div class="titre-c_vendeur">
					<div class="titre-c_vendeur_date">Date d'achat</div>
					<div class="titre-c_vendeur_img"></div>
					<div class="titre-c_vendeur_name"></div>
					<div class="titre-c_vendeur_quant">Quant</div>
					<div class="titre-c_vendeur_punit">P.U</div>
					<div class="titre-c_vendeur_prix">P.T</div>
				</div>
				<?php
					$id=$_SESSION['idfsseur'];
					require_once '../modele/connect_db.php';
					require_once('../controleur/compteVendeur-achat.php');
					while ($donnees = $requete->fetch())
					{
						echo '
				<div class="article-c_vendeur">
					<div class="article-c_vendeur_date">
						'.htmlspecialchars($donnees['day']).'
					</div>
					<div class="article-c_vendeur_img">
						<img src="../img/'.htmlspecialchars($donnees['image']).'">
					</div>
					<div class="article-c_vendeur_name">
						'.htmlspecialchars($donnees['nameitem']).'
					</div>
					<div class="article-c_vendeur_quant">
						'.htmlspecialchars($donnees['quantite']).' '.htmlspecialchars($donnees['mesureunit']).'
					</div>
					<div class="article-c_vendeur_punit">
						'.htmlspecialchars($donnees['prixitem']).'$ soit '.htmlspecialchars($donnees['prixfranc']).'fc
					</div>
					<div class="article-c_vendeur_prix">
						'.htmlspecialchars($donnees['prix_tot']).'$ soit '.htmlspecialchars($donnees['prix_tot_franc']).'fc
					</div>
				</div>';
					}
				?>
			</div>
		</div>
	</div>
	


	<?php
		include('footer.php');
	?>
</body>
</html>