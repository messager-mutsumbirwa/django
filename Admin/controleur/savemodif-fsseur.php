<?php
	$name=$_POST['name'];
	$cat=$_POST['cat'];
	$ets=$_POST['ets'];
	$login=$_POST['login'];
	$siege=$_POST['siege'];
	$other=$_POST['other'];
	

	$id=$_POST['id'];
  require_once '../modele/connect_bd.php';
              //Insertion du messqge à l'aide d'une requête préparée
        $req=$bdd->prepare('UPDATE fournisseurs SET name = :name,cat = :cat,ets = :ets,login = :login,siege = :siege,other = :other WHERE idfsseur = :idfsseur') ;
  
		// Evidemment il faut mettre un WHERE .. = .. (car l'image est forcément liée à un utilisateur?)
		$req->execute(array(
			'name' => $name,
			'cat' => $cat,
			'ets' => $ets,
			'login' => $login,
			'siege' => $siege,
			'other' => $other,
			'idfsseur' => $id,
			));
		  	
				header('Location: ../vue/ajout_fsseur.php');

		        $req->closeCursor();
?>