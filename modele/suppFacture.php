<?php
	session_start();
?>
<?php
  require_once '../controleur/control.php'; 

	require_once 'connect_db.php';
	$cmd="DELETE FROM achats WHERE id_clients = :id AND day_achat = :day_achat";
	$id=$_SESSION['id'];
	$day_achat=$_POST['day_achat'];
	$result=verifsuppFacture($id,$day_achat,$cmd);
	header('Location:../vue/factures.php');
	echo "Good";

	echo $day_achat;
?>