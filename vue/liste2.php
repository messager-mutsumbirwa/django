<!DOCTYPE html>
<html>
<?php include('entete2.php'); ?>
	<div class="body-maglist">
		<div class="maglist-topbar">
			<h2>Liste des produits</h2>
				Acheter les produits django à un prix trop bas
		</div>
		<div class="maglist-container">
			<?php
				require_once '../modele/connect_db.php';
				require_once '../modele/liste2.php';
				require_once '../controleur/liste2.php';
				while ($donnees = $reponse->fetch())
				{
					echo '
			<div class="maglist-item">
				<span class="price-maglist">$50</span><br>
				<form action="produit2.php" method="POST">
					<input type="hidden" name="id" value="'.htmlspecialchars($donnees['id']).'">
					<input type="submit" value="'.htmlspecialchars($donnees['nameitem']).'"><br>
				</form>
				Catégorie : '.htmlspecialchars($donnees['catitem']).'<br>
				Mise en stock '.htmlspecialchars($donnees['day']).'<br>
			</div>';
				}
				echo '<div class="getpage">Page : ';

						for ($i = 1 ; $i <= $nombreDePages ; $i++)
						{
						echo '<a href="liste2.php?page=' . $i . '">' . $i . '</a> ';
						}'</div>';
			?>
		</div>
	</div>
</div>

	<?php include('footer2.php'); ?>
</body>
</html>