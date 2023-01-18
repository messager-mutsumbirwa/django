<?php
	require_once '../controleur/control.php'; 

	require_once '../modele/connect_bd.php';
	$cmd="DELETE FROM achats WHERE id_achat = :id_achat";
	$id_achat=$_POST['id_achat'];
	$result=verifsuppachat($id_achat,$cmd);
	header('location:../vue/gestion-achat.php');
?>
