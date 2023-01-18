<!DOCTYPE html>
<html>
	<?php
		include('entete2.php');
	?>
	<div class="body-mag">
		<div class="mag-topbar">
			<div class="mag-topbar-title">Alimentation</div>
			<div class="mag-topbar-comment">Découvrer les produits de boutique de qualité à bon prix</div>
		</div>
		<div class="mag-sidebar">

			<div class="mag-items">
				<?php
					require_once '../modele/connect_db.php';
					require_once '../modele/alimentation.php';
					require_once '../controleur/alimentation.php';
					while ($donnees = $reponse->fetch())
					{
						echo '<div class="mag-item">
								<form action="produit2.php" method="POST">
										<input type="hidden" name="id" value="'.htmlspecialchars($donnees['id']).'">
									<div class="mag-item-img">
										<input type="image" src="../img/'.htmlspecialchars($donnees['image']).'" class="mag-item-img">
									</div>
									<div class="mag-item-text">
										<div class="mag-item-comment">
											'.htmlspecialchars($donnees['commentaireitem']).'
										</div>
										<div class="mag-vendeur"></div>
										<div class="mag-item-title"><input type="submit" value="'.htmlspecialchars($donnees['nameitem']).'"></div>
										<div class="mag-item-price">$'.htmlspecialchars($donnees['prixitem']).' ou '.htmlspecialchars($donnees['prixfranc']).'fc</div>par unité de mesure
									</div>
								</form>
							</div>';


					}
					echo '<div class="getpage">Page : ';

						for ($i = 1 ; $i <= $nombreDePages ; $i++)
						{
						echo '<a href="alimentation2.php?page=' . $i . '">' . $i . '</a> ';
						}'</div>';
				?>
			</div>
		</div>
	</div>

	<?php
		include('footer2.php');
	?>
</body>
</html>