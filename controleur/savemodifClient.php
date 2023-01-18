<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../vue/style.css">
	<meta charset="utf-8">
	<title>Django</title>
</head>
<body>
<?php
	include('../vue/entete2.php');

	$name=$_POST['name'];
	$pname=$_POST['pname'];
	$adresse=$_POST['adresse'];
	$cadresse=$_POST['cadresse'];
	$pwd=$_POST['pwd'];
	$cpwd=$_POST['cpwd'];
	$login=$_POST['login'];
	$ville=$_POST['ville'];
	$pays=$_POST['pays'];
	$sexe=$_POST['sexe'];
	

	$id=$_SESSION['id'];
	//tester de confANDmite de mot de passe
if (empty($name) OR empty($pname) OR empty($login) OR empty($pwd) OR empty($sexe) AND empty($adresse) OR empty($cpwd)){
	echo "<div class=\"topbar-saveClient\">Vous n'avez pas complété tous les champs nécéssaires<br><br><a href=\"../vue/moncompte.php\">Réessayer</a></div>";
}elseif (!empty($name) AND preg_match("#[a-z0-9](1)#", $_POST['name'])) {
	echo "<div class=\"topbar-saveClient\">ce n'est pas un nom<br><br><a href=\"../vue/moncompte.php\">Réessayer</a></div>";
}
elseif (!empty($login) AND !preg_match("#^0+[0-9](8)|^[+243]+[0-9](9)#", $_POST['login'])) {
	echo "<div class=\"topbar-saveClient\">Veuillez entrer un téléphone valide<br><br><a href=\"../vue/moncompte.php\">Réessayer</a></div>";
}elseif ($pwd!==$cpwd) {
	echo "<div class=\"topbar-saveClient\">Mot de passe incorret<br><br><a href=\"../vue/moncompte.php\">Réessayer</a></div>";
}else{
  require_once '../modele/connect_db.php';
              //Insertion du messqge à l'aide d'une requête préparée
        $req=$bdd->prepare('UPDATE clients SET name = :name,pname = :pname,login = :login,pwd = :pwd, ville= :ville,pays = :pays, adresse= :adresse,cadresse = :cadresse,sexe = :sexe WHERE id = :id') ;
  
		// Evidemment il faut mettre un WHERE .. = .. (car l'image est forcément liée à un utilisateur?)
		$req->execute(array(
			'name' => $name,
			'pname' => $pname,
			'login' => $login,
			'pwd' => $pwd,
			'ville' => $ville,
			'pays' => $pays,
			'adresse' => $adresse,
			'cadresse' => $cadresse,
			'sexe' => $sexe,
			'id' => $id,
			));
		  	
			header('Location:../vue/moncompte.php');

		        $req->closeCursor();
	}
?>
</body>
</html>