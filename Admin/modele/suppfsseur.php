<?php
	require_once '../controleur/control.php'; 

	require_once '../modele/connect_bd.php';
	$cmd="DELETE FROM fournisseurs WHERE idfsseur = :idfsseur";
	$idfsseur=$_POST['id'];
	echo $idfsseur;
	$result=verifsuppfsseur($idfsseur,$cmd);
	echo "supprimer";
	header('Location:../vue/ajout_Fsseur.php');
?>