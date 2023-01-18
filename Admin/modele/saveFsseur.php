<!DOCTYPE html>
<html>
<head>
	<title>Django/Ajoutdefsseur</title>
</head>
<body>

	<?php
		$name = $_POST['name'];
		$siege=$_POST['siege'];
		$ets=$_POST['ets'];
		$cat=$_POST['cat'];
		$login=$_POST['login'];
		$pwd=$_POST['pwd'];
		$other=$_POST['other'];
		if (empty($name) OR empty($siege) OR empty($ets) OR empty($cat) OR empty($pwd) OR empty($login)) {
			echo "Tous les champs importamnts ne sont pas complétés";
		}elseif (!empty($login) AND !preg_match("#[+0-9]{3,}#", $login)) {
			echo "Numéro de téléphone invalide";
		}else{
			require_once '../controleur/control.php';

			$verif="SELECT idfsseur FROM fournisseurs WHERE login = :login AND pwd= :pwd AND siege= :siege";
			$result=verification($login,$pwd,$siege,$verif);
			if (FALSE!==$result) {
				echo "Ce fournisseur existe deja";
			}
			else{
				require_once '../modele/connect_bd.php';
				$ajout=$bdd->prepare('INSERT INTO fournisseurs (name,ets,siege,cat,login,pwd,other) VALUES (?,?,?,?,?,?,?)');
				$ajout->execute(array($name,$ets,$siege,$cat,$login,$pwd,$other));

				header('location:../vue/ajout_Fsseur.php');
			}
		}
	?>
	<br>

</body>
</html>