<!DOCTYPE html>
<html>
	<?php
		include('entete.php');
	?>
	<div class="body-mag">
		<div class="mag-topbar">
			<div class="mag-topbar-title">Vêtements</div>
			<div class="mag-topbar-comment">Découvrez les vêtements de marque produits par Versace seulement sur django.com</div>
		</div>
		<div class="mag-sidebar">
			<div class="mag-sidebar-title">Produit de stock illimité</div>
			<div class="mag-sidebar-item-defils">
				<?php
					require_once '../modele/connect_db.php';
					require_once '../modele/stockillVetement.php';
					require_once '../controleur/stockillVetement.php';
					while ($donnees = $reponse->fetch())
					{
						echo '
						<form action="produit.php" method="POST">
							<input type="hidden" name="id" value="'.htmlspecialchars($donnees['id']).'">
							<input type="image" src="../img/'.htmlspecialchars($donnees['image']).'">
						</form>';
					}
					?>
			</div>

			<div class="mag-items">
				<?php
					require_once '../modele/connect_db.php';
					require_once '../modele/vetement.php';
					require_once '../controleur/vetement.php';
					while ($donnees = $reponse->fetch())
					{
						echo '<div class="mag-item">
								<form action="produit.php" method="POST">
									<input type="hidden" name="id" value="'.htmlspecialchars($donnees['id']).'">
										<div class="mag-item-img">
											<input type="image" src="../img/'.htmlspecialchars($donnees['image']).'">
										</div>
										<div class="mag-item-text">
											<div class="mag-item-comment">
												'.htmlspecialchars($donnees['commentaireitem']).'
											</div>
											<div class="mag-vendeur"><strong>'.htmlspecialchars($donnees['ets']).'</strong></div>
											<div class="mag-item-title"><input type="submit" value="'.htmlspecialchars($donnees['nameitem']).'"></div>
											<div class="mag-item-price">$'.htmlspecialchars($donnees['prixitem']).' ou '.htmlspecialchars($donnees['prixfranc']).'fc</div>
										</div>
								</form>
							</div>';


					}
					echo '<div class="getpage">Page : ';

						for ($i = 1 ; $i <= $nombreDePages ; $i++)
						{
						echo '<a href="vetement.php?page=' . $i . '">' . $i . '</a> ';
						}'</div>';
				?>
			</div>
		</div>
	</div>

	<?php
		include('footer.php');
	?>
</body>
</html>