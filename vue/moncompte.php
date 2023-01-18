<!DOCTYPE html>
<html>
<?php include('entete2.php'); ?>
<?php
	require_once '../modele/connect_db.php'; 
	require_once '../controleur/control.php'; 

  	// reception des donnees 
	$id=$_SESSION['id'];
	
	//tester de conformite de mot de passe et id
	$result=($id);
	$info_client=seeDataClients($result);
    $name=$info_client['name']; 
    $pname=$info_client['pname']; 
    $adresse=$info_client['adresse']; 
    $cadresse=$info_client['cadresse']; 
    $ville=$info_client['ville']; 
    $pays=$info_client['pays']; 
    $cadresse=$info_client['cadresse']; 
   	$login=$info_client['login'];
   	$pwd=$info_client['pwd'];
   	$sexe=$info_client['sexe'];
?>
	<div class="body-moncompte">
		<h2>Gérer mon compte</h2>
		<form action="../controleur/savemodifClient.php" method="POST">
			<div class="topbar-moncompte">
				<div class="modification-identifiants">
					Modifier ses identifiants<br>
					<input type="text" name="login" value="<?php echo htmlspecialchars($login);?>"><br>
					<input type="password" name="pwd" placeholder="Saisissez le nouveau mot de passe"><br>
					<input type="password" name="cpwd" placeholder="Confirmer le nouveau mot de passe"><br>
				</div>
				<div class="modification-infosgen">
					Informations générales<br>
					<select name="sexe">
						<option><?php echo htmlspecialchars($sexe);?></option>
						<option>M</option>
						<option>Mme</option>
						<option>Mlle</option>
					</select><br>
					<input type="text" name="name" value="<?php echo htmlspecialchars($name);?>"><br>
					<input type="text" name="pname" value="<?php echo htmlspecialchars($pname);?>"><br><br>
					Modifier son emplacement<br>
					<input type="text" name="adresse" value="<?php echo htmlspecialchars($adresse);?>"><br>
					<input type="text" name="cadresse" value="<?php echo htmlspecialchars($cadresse);?>"><br>
					<input type="text" name="ville" value="<?php echo htmlspecialchars($ville);?>"><br>
					<input type="text" name="pays" value="<?php echo htmlspecialchars($pays);?>">
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