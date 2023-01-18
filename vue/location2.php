<!DOCTYPE html>
<html>
	<?php
		include('entete2.php');
	?>
	<div class="body-ocacs">
		<div class="Occasions-container">
			<div class="occas-top">
				<div class="occas-top-title">
					Location et logement
				</div>
				<div class="occas-top-comment">
					Touver des belles maisons, en temps utiles et en tout lieu sur tout le site. Votre avenitr, c'est maintenant. 
				</div>
			</div>
			<div class="sidebar-occas">
				<?php
				require_once '../modele/connect_db.php';
				require_once '../modele/location.php';
				require_once '../controleur/location.php';
				while ($donnees = $reponse->fetch())
					{
						echo '	<div class="occas-item">
									<form action="produit2.php" method="POST">
										<input type="hidden" name="id" value="'.htmlspecialchars($donnees['id']).'">
												<div class="occas-item-comment">
													'.htmlspecialchars($donnees['commentaireitem']).'
												</div>
												<input type="image" src="../img/'.htmlspecialchars($donnees['image']).'" class="occas-item-img">
												<div class="occas-item-price">
													$'.htmlspecialchars($donnees['prixitem']).' ou '.htmlspecialchars($donnees['prixfranc']).'fc
												</div>
									</form>
								</div>';
					}
				?>
				
			</div>

		</div>
	</div>

	<?php
		include('footer2.php');
	?>
</body>
</html>