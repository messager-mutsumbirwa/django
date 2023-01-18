<!DOCTYPE html>
<html>
<?php
	include('entete.php');
?>
	<div class="body-identification">
		<div class="identification-container">
			<h2>Identifiez-vous</h2>
			<form action="../modele/authentification.php" method="POST">
				<input type="text" name="login" placeholder="Entrer Votre Téléphone">
				<input type="password" name="pwd" placeholder="Entrer Votre Mot de Passe">
				<span class="submit-identification">
					<input type="submit" name="envoyer" value="Continuer">
				</span>
			</form>
			<div class="aside-identification">
				En continuant, vous accepter nos <a href="useconditions.php">conditions d'utilisations</a>. Besoin 	d'<a href="aide.php">aide</a> ?<br>
				<a href="comptecreation.php">Je n'ai pas un compte</a>
			</div>
		</div>
	</div>
</body>
</html>
<?php
	include('footer.php');
?>