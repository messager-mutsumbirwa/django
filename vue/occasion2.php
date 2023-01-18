<!DOCTYPE html>
<html>
	<?php
		include('entete2.php');
	?>
	<div class="body-ocacs">
		<div class="Occasions-container">
			<div class="occas-top">
				<div class="occas-top-title">
					Deals and promotion
				</div>
				<div class="occas-top-comment">
					Shop today the first occasion of year on alain.com. 
					Shop today the first occasion of year on alain.com.  
				</div>
			</div>
			<div class="sidebar-occas">
				<?php
				require_once '../modele/connect_db.php';
				require_once '../modele/occasion.php';
				require_once '../controleur/occasion.php';
				while ($donnees = $reponse->fetch())
					{
						echo '	<div class="occas-item">
									<form action="/../modele/produit2.php" method="POST">
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