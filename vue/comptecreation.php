<!DOCTYPE html>
<html>
<?php
	include('entete.php');
?>
	<div class="body-comptecreation">
		<h2>Création d'un compte</h2><br>
		Les champs marqués par une étoile * sont obligatoires<br>

			<form method="POST" action="../modele/saveClient.php">
				<table class="input-sexe">
					<tr>
						<th align="right"><label>Civilité *</label></th>
						<th align="right"><label>M</label></th>
						<td><input type="radio" name="sexe" value="M" id="m"></td>
					
						<th><label>Mlle</label></th>
						<td><input type="radio" name="sexe" value="Mlle" id="mlle"></td>

						<th><label>Mme</label></th>
						<td><input type="radio" name="sexe" value="Mme" id="mm4"></td>

					</tr>
				</table>
				<div class="topbar-moncompte">
					<div class="modification-infosgen">
						Informations générales<br>
						<input type="text" name="name" placeholder="Prénom *"><br>
						<input type="text" name="pname" placeholder="Nom *"><br><br>
						Information sur l'adresse<br>
						<input type="text" name="adresse" placeholder="Adresse *"><br>
						<input type="cadresse" name="cadresse" placeholder="Complément d'adresse"><br>
						<input type="text" name="ville" placeholder="Ville *"><br>
						<input type="text" name="pays" placeholder="Pays *">
					</div>
					<div class="modification-identifiants">
						Créer ses identifiants<br>
						<input type="text" name="login" placeholder="téléphone * (+243)"><br>
						<input type="text" name="clog" placeholder="Confirmer téléphone"><br>
						<input type="password" name="pwd" placeholder="Mot de passe"><br>
						<input type="password" name="cpwd" placeholder="Confirmer Mot de passe"><br>
					</div>
					<div class="modification-submit">
						<input type="reset" name="Annuler" value="Annuler">
						<input type="submit" name="enregistrer" value="Enregistrer">
					</div>

				</div>

			</form>
			<div class="sidebar-comptecreat">
				Consulter nos<a href="useconditions.php"> conditions d'utilisation.</a> Besoin d'<a href="aide.php">aide</a>?<br>
				<a href="identification.php">J'ai déjà un compte</a>.
			</div>
		</div>

	<?php
		include('footer.php');
	?>
</body>
</html>


<!-- <form method="POST" action="save.php">
	Nom<br>
	<input type="text" name="name"><br>
	Prenom<br>
	<input type="text" name="pname"><br>Sexe<br>
	<input type="radio" name="sexe"><br>Adresse
	<input type="text" name="adresse"><br>Cadresse
	<input type="text" name="cadresse"><br>Ville
	<input type="text" name="ville"><br>Pays
	<input type="text" name="pays"><br>Login
	<input type="tel" name="login"><br>Clogin
	<input type="tel" name="clog"><br>Password
	<input type="password" name="pwd" minlength="6"><br>Cpassword
	<input type="password" name="cpwd"><br>
	<input type="submit">
</form> -->



