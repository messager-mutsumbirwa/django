<?php
	session_start();
?>
<?php
	include('../vue/entete.php');
?>
<link rel="stylesheet" type="text/css" href="../vue/style.css">
<?php
	$name=$_POST['name'];
	$cat=$_POST['cat'];
	$ets=$_POST['ets'];
	$login=$_POST['login'];
	$siege=$_POST['siege'];
	$pwd=$_POST['pwd'];
	

	$id=$_SESSION['idfsseur'];
	if (empty($name) OR empty($siege) OR empty($ets) OR empty($cat) OR empty($pwd) OR empty($login)) {
			echo "<div class=\"topbar-saveClient\">Tous les champs importamnts ne sont pas complétés<br><br><a href=\"../vue/moncompte-fsseur.php\">Réessayer</a></div>";
		}elseif (!empty($login) AND !preg_match("#[+0-9]{3,}#", $login)) {
			echo "<div class=\"topbar-saveClient\">Numéro de téléphone invalide<br><br><a href=\"../vue/moncompte-fsseur.php\">Réessayer</a></div>";
		}else{
 		require_once '../modele/connect_db.php';
              //Insertion du messqge à l'aide d'une requête préparée
        $req=$bdd->prepare('UPDATE fournisseurs SET name = :name,cat = :cat,ets = :ets,login = :login,siege = :siege,pwd = :pwd WHERE idfsseur = :idfsseur') ;
  
		// Evidemment il faut mettre un WHERE .. = .. (car l'image est forcément liée à un utilisateur?)
		$req->execute(array(
			'name' => $name,
			'cat' => $cat,
			'ets' => $ets,
			'login' => $login,
			'siege' => $siege,
			'pwd' => $pwd,
			'idfsseur' => $id,
			));
		  	
				header('Location: ../vue/moncompte-fsseur.php');

		        $req->closeCursor();
		}
?>