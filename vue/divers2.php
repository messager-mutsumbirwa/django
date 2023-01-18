<!DOCTYPE html>
<html>
	<?php
		include('entete2.php');
	?>
	<div class="body-mag">
		<div class="mag-topbar">
			<div class="mag-topbar-title">Divers</div>
			<div class="mag-topbar-comment">Retrouvez tous les trucs introuvables chez nous.</div>
		</div>
		<div class="mag-sidebar">
			<div class="mag-sidebar-title">Produit de stock illimité</div>
			<div class="mag-sidebar-item-defils">
				<?php
					require_once '../modele/connect_db.php';
					require_once '../modele/stockilldivers.php';
					require_once '../controleur/stockilldivers.php';
					while ($donnees = $reponse->fetch())
					{
						echo '
						<form action="produit2.php" method="POST">
							<input type="hidden" name="id" value="'.htmlspecialchars($donnees['id']).'">
							<input type="image" src="../img/'.htmlspecialchars($donnees['image']).'">
						</form>';
					}
					?>
			</div>

			<div class="mag-items">
				<?php
					require_once '../modele/connect_db.php';
					require_once '../modele/divers.php';
					require_once '../controleur/divers.php';
					while ($donnees = $reponse->fetch())
					{
						echo '<div class="mag-item">
								<form action="produit2.php" method="POST">
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
		include('footer2.php');
	?>
</body>
</html>