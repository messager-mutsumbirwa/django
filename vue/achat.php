<!DOCTYPE shtml>
<html>
<?php
	include('entete2.php');
?>
<div class="body-achat">
	<div class="topbar-achat">
		Felicitation, vous venez de passer une commande. La livraison vous sera faite en temps utile et bon car nous nous assurons de votre bonne et parfaite satisfaction.
		La facture ci-dessous constitue la preuve de votre achat
	</div>
	<h2>Facture Emise ce jour-ci</h2>
<?php

// $id=$_SESSION['id'];	
// connexion a la BD
// require_once '../controleur/control.php';
require_once '../modele/connect_db.php';

$id=$_SESSION['id'];

$requete = $bdd->prepare("SELECT * FROM achats a WHERE id_clients= :id ORDER BY !day_achat  LIMIT 0,1 " );
		$requete->execute(array('id' => $id, ));

while ($donnees = $requete->fetch())
		{
			echo '
	<div class="facture">
		<div class="entete-facture">
			<div class="facture-emetteur"> 
				Django.com
			</div>
			<div class="facture-date">
				'.htmlspecialchars($donnees['day_achat']).'
			</div>
			<div class="facture-num">
				Facture n°'.htmlspecialchars($donnees['id_achat']).'
			</div>
			<div class="facture-destinataire">
				<strong>'.htmlspecialchars($_SESSION['nom']).' '.htmlspecialchars($_SESSION['pnom']).'</strong> doit pour ce qui suit :
			</div>
		</div>
		<div class="facture-titre">
			<div class="quantite_facture">
				Qté
			</div>
			<div class="designation_facture">
				Désignation
			</div>
			<div class="prix_unitaire_facture">
				P.U
			</div>
			<div class="prix_total_facture">
				P.T
			</div>
		</div>';
		// 	$requete = $bdd->prepare("SELECT * FROM achats");
		// $requete->execute();
		$day_achat=$donnees['day_achat'];
		require_once '../modele/connect_db.php';
		$req = $bdd->prepare("SELECT * FROM achats a RIGHT JOIN mag m ON a.id_mag = m.id WHERE a.day_achat = :day_achat GROUP BY a.id_achat");
		// $requete->bindValue(':id_clients', $id);
		$req->execute(array(
			'day_achat' => $day_achat,
			));	
			while ($donnees = $req->fetch()){

			echo
		'<div class="facture-item">
			<div class="quantite_facture">
				'.htmlspecialchars($donnees['quantite']).'
			</div>
			<div class="designation_facture">
				'.htmlspecialchars($donnees['nameitem']).'
			</div>
			<div class="prix_unitaire_facture">
				'.ROUND(htmlspecialchars($donnees['prix_tot']/$donnees['quantite']), 2).'
			</div>
			<div class="prix_total_facture">
				'.htmlspecialchars($donnees['prix_tot']).'
			</div>
		</div>';
		}
		echo '
		<div class="total_facture">
			<div class="facture_mot_tot">
				Total
			</div>
			<div class="facture_tot">';
			
			require_once '../modele/facture_tot.php';
			while ($donnees = $req->fetch()){
				echo htmlspecialchars($donnees['somme']).' $';
			}echo'
			</div>
		</div>

	</div>';
		}
	?>
	<br><br>
	<span class="seemore">
		<a href="factures.php">Voir toutes mes factures</a>
	</span>
</div>
<?php
	include('footer2.php');
?>
</body>
</html>