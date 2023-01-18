<?php
//connexion à la bbase des données
require_once '../controleur/control.php';

$idProd=$_POST['idProd'];
$idClient=$_POST['idClient'];
$idFsseur=$_POST['idFsseur'];
$quantite=$_POST['quantAchat'];
$prixAchat=$_POST['prixAchat'];
$prixfranc=$_POST['prixfranc'];
$prix_tot=$prixAchat*$quantite;
$prix_tot_franc=$prixfranc*$quantite;


// formatage date selon notre SGBD     
$jour = date('d');
$mois = date('m');
$annee = date('Y');
$heure = date('H');
$minute = date('i');
$second = date('s');
$date=formatDate($jour,$mois,$annee,$heure,$minute,$second);
	require_once "../modele/connect_db.php";

		$req=$bdd->prepare('INSERT INTO panier (id_mag,id_fsseurs,id_clients,quantite,prix_tot,prix_tot_franc,day) VALUES(?,?,?,?,?,?,?)') ;
        // $pwd_crypte=sha1($pwd);

		$req->execute([$idProd,$idFsseur,$idClient,$quantite,$prix_tot,$prix_tot_franc,$date]);

		echo "Good";
        header('Location:../vue/panier.php');

?>
<br/><br/><br/>
