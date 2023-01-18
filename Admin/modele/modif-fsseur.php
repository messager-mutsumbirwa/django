<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../vue/style.css">
	<title></title>
</head>
<body>

<?php
  require_once '../controleur/control.php'; 

  	// reception des donnees 
	$id=$_POST['id'];
	// $pwd_crypte=sha1($pwd);
	
	//tester de conformite de mot de passe et id
	$result=($id);
	$info_user=seeDatafsseurs($result);
    $name=$info_user['name']; 
    $cat=$info_user['cat'];  
    $ets=$info_user['ets'];
    $siege=$info_user['siege'];  
    $login=$info_user['login'];  
    $other=$info_user['other'];  
    // $image=$info_user['image'];  
    // $name=$info_user['name'];  
   	// $id=$info_user['id'];  
   
  	echo "CONNECTE: Bienvenue cher ".$name;

  	echo '<div class="sidebar-gest-mag">
			<div class="titre-sidebar-gest-mag">
				Ajouter Personne
			</div>
			<form class="ajout-mag" action="../controleur/savemodif-fsseur.php" method="POST">
				Nom :<br>
				<input type="text" name="name" value="'.$name.'">
				Nom de l\'Ets :<br>
				<input type="text" name="ets" value="'.$ets.'"><br>
				Siege :<br>
				<input type="text" name="siege" valu="'.$siege.'"><br>
				Catégorie d\'Activités :<br>
				<select name="cat">
					<option>'.$cat.'</option>
					<option>Vetement</option>
					<option>Alimentation</option>
					<option>technologie</option>
					<option>Divers</option>
				</select><br>
				Téléphone
				<input type="tel" name="login" value="'.$login.'"><br>
				Autres infos :
				<input type="text" name="other" value="'.$other.'"><br>
				<input type="hidden" name="id" value="'.$id.'">
				<input type="reset" name="annuler" value="Annuler">
				<input type="submit" name="enregistrer" value="MODIFIER"><br>
			</form>
		</div>'
	?>

</body>
</html>
