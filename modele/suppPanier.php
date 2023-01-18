<?php
  require_once '../controleur/control.php'; 

	require_once 'connect_db.php';
	$cmd="DELETE FROM panier WHERE id_mag = :id";
	$id=$_POST['idp'];
	$result=verifsuppPanier($id,$cmd);
	header('Location:../vue/panier.php');
?>