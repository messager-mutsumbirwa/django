<?php
	include('../vue/entete.php');
?>
<link rel="stylesheet" type="text/css" href="../vue/style.css">
<?php
	if (empty($_POST['login']) AND empty($_POST['pwd'])) {
		echo "<div class=\"topbar-saveClient\">Tous les champs ne sont pas complétés<br><br><a href=\"../vue/identification.php\">Réessayer</a></div>";
	}elseif (empty($_POST['login'])) {
		echo "<div class=\"topbar-saveClient\">Entrer un Téléphone<br><br><a href=\"../vue/identification.php\">Réessayer</a></div>";
	}elseif (empty($_POST['pwd'])) {
		echo "<div class=\"topbar-saveClient\">Entrer un mot de passe<br><br><a href=\"../vue/identification.php\">Réessayer</a></div>";
	}else{
	require_once '../controleur/control.php';
	
	// reception des donnees 
	$login=$_POST['login'];
	$pwd=$_POST['pwd'];
	// $pwd_crypte=sha1($pwd);
	
	//tester de conformite de mot de passe et login
	$result=identificationVendeur($login,$pwd);
		if (FALSE!==$result) {
			$info_fsseurs=seeDataFsseurs($result);
            $idfsseur=$info_fsseurs['idfsseur'];
           	// Place maintenant au session
           	session_start();
			$_SESSION['idfsseur'] = $info_fsseurs['idfsseur'];
			echo $idfsseur;
            header('Location:../vue/compteVendeur2.php');

          	// echo "CONNECTE: Bienvenue cher ".$nom."  ".$pnom." ".$login." ".$pwd." ".$id;
          	// echo $_SESSION['pnom'].$_SESSION['id'];
		}else{
			echo "<div class=\"topbar-saveClient\">Désolez! Vous ne pouvez pas aller plus  loin</div>";

			}
		}
?>
