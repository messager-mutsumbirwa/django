<!DOCTYPE html>
<html>
	<?php
		include('entete.php');
	?>
	<div class="body-offre">
		<?php
			require_once '../modele/connect_db.php';
			require_once '../modele/pjour.php';
			require_once '../controleur/pjour.php';
			while ($donnees = $reponse->fetch())
				{
					echo '<div class="day-offre-top">
							<form action="produit.php" method="POST">
										<input type="hidden" name="id" value="'.htmlspecialchars($donnees['id']).'">
								<div class="day-offre-title">
									Deal du jour
								</div>
									<input type="image" src="../img/'.htmlspecialchars($donnees['image']).'" class="day-offre-img">
								<div class="day-offre-prix">
									Payer seulement à $'.$donnees['prixitem'].'ou '.$donnees['prixfranc'].'fc
								</div>
								<div class="day-offre-timerest">
									Mise en vente le '.$donnees['day'].'
								</div>
							</form>
						</div>	';
				}
			?>
		<div class="offre-container">
			<div class="offre-title">
				Offres
			</div>
			<?php
			require_once '../modele/connect_db.php';
			require_once '../modele/offre.php';
			require_once '../controleur/offre.php';
			while ($donnees = $reponse->fetch())
				{
					echo '<div class="offre-item">
							<form action="produit.php" method="POST">
										<input type="hidden" name="id" value="'.htmlspecialchars($donnees['id']).'">		
								<div class="offre-item-title">
									'.$donnees['nameitem'].'
								</div>
									<input type="image" src="../img/'.htmlspecialchars($donnees['image']).'"  class="offre-item-img">
								<div class="offre-item-timerest">
									Mise en vente le '.$donnees['day'].'
								</div>
							</form>
						</div>';
				}
			?>
		</div>
	</div>

	<?php
		include('footer.php');
	?>
</body>
</html>