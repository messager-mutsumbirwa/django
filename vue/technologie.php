<!DOCTYPE html>
<html>
	<?php
		include('entete.php');
	?>
	<div class="body-mag">
		<div class="mag-topbar">
			<div class="mag-topbar-title">Technologie</div>
			<div class="mag-topbar-comment">Découvrer toutes les production de la maison Apple à un prix abordable</div>
		</div>
		<div class="mag-sidebar">
			<div class="mag-sidebar-title">Produit de stock illimité</div>
			<div class="mag-sidebar-item-defils">
				<?php
					require_once '../modele/connect_db.php';
					require_once '../modele/stockillTechnologie.php';
					require_once '../controleur/stockillTechnologie.php';
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
					require_once '../modele/technologie.php';
					require_once '../controleur/technologie.php';
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
											'.$donnees['commentaireitem'].'
										</div>
										<div class="mag-vendeur"><strong>'.$donnees['ets'].'</strong></div>
										<div class="mag-item-title"><input type="submit" value="'.$donnees['nameitem'].'"></div>
										<div class="mag-item-price">$'.$donnees['prixitem'].' ou '.$donnees['prixfranc'].'fc</div>
									</div>
								</form>
							</div>';


					}
					echo '<div class="getpage">Page : ';

						for ($i = 1 ; $i <= $nombreDePages ; $i++)
						{
						echo '<a href="technologie.php?page=' . $i . '">' . $i . '</a> ';
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