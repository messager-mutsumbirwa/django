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
	$login=$_POST['login'];
	$pwd_crypte=($_POST['pwd']);
	// reception des donnees 
	require_once '../controleur/control.php';
	
	//tester de conformite de mot de passe et login
	$result=identification($login,$pwd_crypte);
		if (FALSE!==$result) {
			$info_user=seeDataClients($result);
            $nom=$info_user['name'];
            $pnom=$info_user['pname'];  
           	$login=$info_user['login'];  
           	$pwd_crypte=$info_user['pwd'];
           	$id=$info_user['id'];
           	// Place maintenant au session
           	session_start();
			$_SESSION['id'] = $info_user['id_clients'];
			$_SESSION['nom'] = $info_user['name'];
			$_SESSION['pnom'] = $info_user['pname']; 
			$_SESSION['idp'] = $_POST['idp']; 
            header('Location:../vue/commandform.php');

          	// echo "CONNECTE: Bienvenue cher ".$nom."  ".$pnom." ".$login." ".$pwd." ".$id;
          	// echo $_SESSION['pnom'].$_SESSION['id'];
		}else{
			echo "<div class=\"topbar-saveClient\">Désolez! Vous ne pouvez pas aller plus  loin</div>";

			}
		}
?>
