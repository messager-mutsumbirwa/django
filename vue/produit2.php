<!DOCTYPE html>
<html>
<?php
	include('entete.php');
?>
	<div class="body-produit">
		<div class="produit-container">
			<div class="produit-infos">
				<?php

					require_once '../controleur/control.php'; 

					  	// reception des donnees 
						$id=$_POST['id'];
						// $pwd_crypte=sha1($pwd);
						
						//tester de conformite de mot de passe et id
						$result=($id);
						$info_prod=seeData($result);
					    $id=$info_prod['id']; 
					    $nameitem=$info_prod['nameitem']; 
					    $catitem=$info_prod['catitem'];
					    $image=$info_prod['image'];
					    $image1=$info_prod['image1'];
					    $image2=$info_prod['image2'];
					    $image3=$info_prod['image3'];
					    $image4=$info_prod['image4'];
					    $commentaireitem=$info_prod['commentaireitem'];
					    $prixitem=$info_prod['prixitem'];
					    $prixfranc=$info_prod['prixfranc'];
					    $day=$info_prod['day'];
				?>
				Catégorie : <a href="<?php echo htmlspecialchars($catitem).'.php';?>"><?php echo htmlspecialchars($catitem);?></a><br>
				<?php echo htmlspecialchars($nameitem); ?>
			</div>
			<form action="identification2.php" method="POST">
				<input type="hidden" name="id" value="<?php echo htmlspecialchars($id);?>">
				<div class="produit-imgprincipal">
					<input type="image" src="../img/<?php echo htmlspecialchars($image); ?>">
				</div>
				<span class="produit-commentaire"><?php echo htmlspecialchars($commentaireitem); ?></span><br>
				<span class="produit-prix">$<?php echo htmlspecialchars($prixitem); ?> ou <?php echo htmlspecialchars($prixfranc);?>fc</span><br>
				<span class="produit-datestock">
					Publié le <?php echo htmlspecialchars($day);?>
				</span><br><br>
				<span class="btcommander">
					<input type="submit" value="Continuer">
				</span>
			</form>
		</div>
		<div class="sidebar-produit">
			<h2>Images du produit</h2>
			<div class="produit-img">
				<img src="../img/<?php echo htmlspecialchars($image1); ?>">
				<img src="../img/<?php echo htmlspecialchars($image2); ?>">
				<img src="../img/<?php echo htmlspecialchars($image3); ?>">
				<img src="../img/<?php echo htmlspecialchars($image4); ?>">
			</div>
		</div>
	</div>
<?php
	include('footer.php');
?>
</body>
</html>