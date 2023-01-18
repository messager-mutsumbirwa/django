<!DOCTYPE html>
<html>
<?php include('entete2.php'); ?>
<?php
	require_once '../modele/connect_db.php'; 
	require_once '../controleur/control.php'; 

  	// reception des donnees 
	$id=$_SESSION['idfsseur'];
	
	//tester de conformite de mot de passe et id
	$result=($id);
	$info_fsseur=seeDataFsseurs($result);
    $login=$info_fsseur['login']; 
    $pwd=$info_fsseur['pwd'];  
    $cat=$info_fsseur['cat'];  
    $name=$info_fsseur['name']; 
    $siege=$info_fsseur['siege']; 
    $ets=$info_fsseur['ets']; 
?>
	<div class="body-moncompte">
		<a href="compteVendeur2.php">Retour vers la page précédente</a>
		<h2>Gérer mon compte</h2>
		<form action="../controleur/savemodif-fsseur2.php" method="POST">
			<div class="topbar-moncompte">
				<div class="modification-identifiants">
					Modifier ses identifiants<br>
					<input type="text" name="login" value="<?php echo htmlspecialchars($login);?>"><br>
					<input type="password" name="pwd" minlength="6" value="<?php echo htmlspecialchars($pwd);?>"><br>
				</div>
				<div class="modification-infosgen">
					Informations générales<br>
					<input type="text" name="name" value="<?php echo htmlspecialchars($name);?>"><br>
					<select name="cat">
						<option><?php echo htmlspecialchars($cat);?></option>
						<option>Vêtement</option>
						<option>Alimentation</option>
						<option>Technologie</option>
						<option>Divers</option>
					</select><br>
					<input type="text" name="siege" value="<?php echo htmlspecialchars($siege);?>"><br>
					<input type="text" name="ets" value="<?php echo htmlspecialchars($ets);?>"><br>
				</div>
				<div class="modification-submit">
					<input type="reset" name="Annuler" value="Annuler">
					<input type="submit" name="modifier" value="Modifier">
				</div>

			</div>
		</form>
	</div>

<?php include('footer2.php'); ?>
</body>
</html>