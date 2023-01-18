<?php
	include('../vue/entete.php');
?>
<link rel="stylesheet" type="text/css" href="../vue/style.css">
<?php
//Hachage du mot de passe
$pwd_crypte=sha1($_POST['pwd']);
require_once '../controleur/control.php';


$name=$_POST['name'];
$pname=$_POST['pname'];
$adresse=$_POST['adresse'];
$cadresse=$_POST['cadresse'];
$ville=$_POST['ville'];
$pays=$_POST['pays'];
$login=$_POST['login'];
$pwd=$_POST['pwd'];
$clog=$_POST['clog'];
$cpwd=$_POST['cpwd'];

// formatage date selon notre SGBD     
$jour = date('d');
$mois = date('m');
$annee = date('Y');
$heure = date('H');
$minute = date('i');
$second = date('s');
$date=formatDate($jour,$mois,$annee,$heure,$minute,$second);

//tester de confANDmite de mot de passe
if (!isset($_POST['sexe']) OR empty($name) OR empty($pname) OR empty($login) OR empty($pwd) OR empty($adresse) OR empty($clog) OR empty($cpwd)){
	echo "<div class=\"topbar-saveClient\">Vous n'avez pas complété tous les champs nécéssaires<br><br><a href=\"../vue/comptecreation.php\">Réessayer</a></div>";
}elseif (!empty($name) AND preg_match("#[a-z0-9](1)#", $_POST['name'])) {
	echo "<div class=\"topbar-saveClient\">ce n'est pas un nom<br><br><a href=\"../vue/comptecreation.php\">Réessayer</a></div>";
}
elseif (!empty($login) AND !preg_match("#^0+[0-9](8)|^[+243]+[0-9](9)#", $_POST['login'])) {
	echo "<div class=\"topbar-saveClient\">Veuillez entrer un téléphone valide<br><br><a href=\"../vue/comptecreation.php\">Réessayer</a></div>";
}elseif (($login!==$clog) AND  ($pwd!==$cpwd)){
	echo "<div class=\"topbar-saveClient\">Télephone et Mot de passe incorrect<br><br><a href=\"../vue/comptecreation.php\">Réessayer</a></div>";
}elseif ($login!==$clog) {
	echo "<div class=\"topbar-saveClient\">téléphone incorrect<br><br><a href=\"../vue/comptecreation.php\">Réessayer</a></div>";
}elseif ($pwd!==$cpwd) {
	echo "<div class=\"topbar-saveClient\">Mot de passe incorret<br><br><a href=\"../vue/comptecreation.php\">Réessayer</a></div>";
}else{

	require_once "../modele/connect_db.php";

	$cmd="SELECT id FROM clients WHERE login = :login AND pwd= :pwd";
	// reception des donnees 
	$login=$_POST['login'];
	$pwd=$_POST['pwd'];
	$pwd_crypte=md5($_POST['pwd']);
	
	$result=verification($login,$pwd_crypte,$cmd);
		if (FALSE!==$result) {
			$info_user=seeDataClients($result);
            header('Location:../vue/accueil.php');
            session_start();
			$_SESSION['id'] = $info_user['id'];
			$_SESSION['nom'] = $info_user['name'];
			$_SESSION['pnom'] = $info_user['pname']; 
			$_SESSION['login'] = $info_user['login']; 
			$_SESSION['pwd'] = $info_user['pwd']; 
  		}else{
		//Insertion du messqge à l'aide d'une requête préparée
		$req=$bdd->prepare('INSERT INTO clients (name,pname,sexe,adresse,cadresse,ville,pays,login,pwd,day) VALUES(?,?,?,?,?,?,?,?,?,?)');

		$req->execute([$name,$pname,$_POST['sexe'],$adresse,$cadresse,$ville,$pays,$login,$pwd_crypte,$date]);
           	// Place maintenant au session
			$info_user=seeDataClients($result);
            $nom=$info_user['name'];
            $pnom=$info_user['pname'];  
           	$login=$info_user['login']; 
           	$sexe=$info_user['sexe'];  
           	$pwd=$info_user['pwd'];
           	$id=$info_user['id_clients'];
            //header('Location:saveClient2.php');
            session_start();
			$_SESSION['login'] = md5($_POST['login']);
			$_SESSION['pwd'] = sha1($_POST['pwd']);
			$_SESSION['nom'] = $_POST['name'];
			$_SESSION['pnom'] = $_POST['pname'];
            
	}
}

?>
<br/><br/><br/>
<?php
	$login = $_POST['login'];
	$pwd = md5($_POST['pwd']);
	require_once '../controleur/control.php';
	$info=seeDataClientsCreation($login,$pwd);
	$id=$info['id_clients'];
	echo $login.' '.$pwd.'<br><br>';
	echo $id.''.$info['id'];
?>