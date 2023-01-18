<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../vue/style.css">
	<title>Modification des donnees du magasin</title>
</head>
<body>
<?php
  require_once '../controleur/control.php'; 

  // reception des donnees 
	$id=$_POST['id'];
	// $pwd_crypte=sha1($pwd);
	
	//tester de conformite de mot de passe et id
	$result=($id);
	$info_prod=seeData($result);
    $id_fournisseur=$info_prod['id_fournisseur']; 
    $catitem=$info_prod['catitem'];  
    $nameitem=$info_prod['nameitem'];
    $prixitem=$info_prod['prixitem'];  
    $marqueitem=$info_prod['marqueitem'];  
    $mesureunit=$info_prod['mesureunit'];  
    $commentaireitem=$info_prod['commentaireitem'];  
    $image=$info_prod['image'];  
    $accueil=$info_prod['accueil'];
    $stockillimite=$info_prod['stockillimite'];  
    $offre=$info_prod['offre'];  
    $pjour=$info_prod['pjour'];  
   	$id=$info_prod['id'];  
   
  	echo "CONNECTE: Bienvenue cher ".$id_fournisseur." ".$catitem." ".$nameitem."  ".$prixitem."".$marqueitem."".$commentaireitem." ".$id." ".$image;


	echo '<div class="sidebar-gest-mag">
			<div class="titre-sidebar-gest-mag">
				Ajouter un Produit
			</div>
			<form class="ajout-mag" action="../controleur/savemodif-mag.php" method="POST" enctype="multipart/form-data">
				Id Fournisseur
				<input type="number" name="id_fournisseur" value="'.$id_fournisseur.'"><br>
				Catégorie<br>
				<select name="catitem">
					<option>'.$catitem.'</option>
					<option>Tous nos projets</option>
					<option>Projets commercials</option>
					<option>project educationels</option>
					<option>project gouvernemental</option>
					<option>Parcel</option>
				</select><br>
				Nom :<br>
				<input type="text" name="nameitem" value="'.$nameitem.'">
				Prix :<br>
				<input type="textarea" name="prixitem" value="'.$commentaireitem.'"><br>
				Marque :<br>
				<input type="text" name="marqueitem" value="'.$marqueitem.'"><br>
				Unité de mesure :<br>
				<input type="text" name="mesureunit" value="'.$mesureunit.'"><br>
				Commentaire :<br>
				<textarea name="commentaireitem" rows="10" cols="50">'.$commentaireitem.'</textarea><br>
				Image :<br>
			    <input type="file" name="icone" id="icone" ><br />
				Autres images :<br>
				<input type="file" name="image1">
				<input type="file" name="image2"> 
				<input type="file" name="image3"> 
				<input type="file" name="image4"> 
				Accueil<br>
				<select name="accueil">
					<option>'.$accueil.'</option>
					<option>Oui</option>
					<option>Non</option>
				</select><br><br>
				Offre<br>
				<select name="offre">
					<option>'.$offre.'</option>
					<option>Oui</option>
					<option>Non</option>
				</select><br>
				Produit du jour<br>
				<select name="pjour">
					<option>'.$pjour.'</option>
					<option>Oui</option>
					<option>Non</option>
				</select><br><br>
				Stock illimité :
				<select name="stockillimite">
					<option>'.$stockillimite.'</option>
					<option>Oui</option>
					<option>Non</option>
				</select>
				Date Fin :<br>
				<input type="text" name="date-fin"><br>
				<input type="hidden" name="id" value="'.$id.'">
				<input type="reset" name="annuler" value="Annuler">
				<input type="submit" name="enregistrer" value="MODIFIER"><br>
			</form>
		</div>';
	?>


</body>
</html>

