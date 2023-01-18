<?php
	session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php
	$login = $_SESSION['login'];
	$pwd = $_SESSION['pwd'];
	require_once '../controleur/control.php';
	$info=seeDataClientsCreation($login,$pwd);
	$_SESSION['id']=$info['id'];
	echo $login.' '.$pwd;
	echo $_SESSION['id'].''.$info['id'];
	// header('Location:../vue/accueil.php');
?>
</body>
</html>
<?php
	session_destroy();
	$_SESSION['login'];
	$_SESSION['pwd'];
	$_SESSION['id'];
?>