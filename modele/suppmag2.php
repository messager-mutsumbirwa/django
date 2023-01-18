<?php
	require_once '../controleur/control.php'; 

	require_once 'connect_db.php';
	$cmd="DELETE FROM mag WHERE id = :id";
	$id=$_POST['id'];
	$result=verifsuppMag($id,$cmd);
	header('Location:../vue/compteVendeur2.php');
?>