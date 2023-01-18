<?php
	session_start();
?>
<?php
$id=$_SESSION['id'];	
// connexion a la BD
require_once '../controleur/control.php';
require_once 'connect_db.php';

// formatage date selon notre SGBD     
$jour = date('d');
$mois = date('m');
$annee = date('Y');
$heure = date('H');
$minute = date('i');
$second = date('s');
$date=formatDate($jour,$mois,$annee,$heure,$minute,$second);

$paiement=$_POST['paiement'];
$livraison=$_POST['livraison'];

$requete = $bdd->prepare("SELECT * FROM mag RIGHT JOIN panier p ON m.id = p.id_mag WHERE id_clients = :id_clients");
		$requete->bindValue(':id_clients', $id);
		$requete->execute();

while ($donnees = $requete->fetch())
		{
			$prixfranctot=$donnees['prix_tot']*2000;

			$id_clients=$_SESSION['id'];
			$id_mag=$donnees['id_mag'];
			$id_fsseurs=$donnees['id_fsseurs'];
			$quantite=$donnees['quantite'];
			$prix_tot=$donnees['prix_tot'];
			$prix_tot_franc=$donnees['prix_tot_franc'];

			$req=$bdd->prepare('INSERT INTO achats (id_mag,id_fsseurs,quantite,prix_tot,prix_tot_franc,paiement,livraison,id_clients,day_achat) VALUES(?,?,?,?,?,?,?,?,?)') ;
//         // $pwd_crypte=sha1($pwd);

			$req->execute([$id_mag,$id_fsseurs,$quantite,$prix_tot,$prix_tot_franc,$paiement,$livraison,$id_clients,$date]);
// 		echo "Good";

		}
	?>

<?php
  require_once '../controleur/control.php'; 

  require_once 'connect_db.php';

  $id=$_SESSION['id'];
  $req=$bdd->prepare('DELETE FROM panier WHERE id_clients = :id') ;
  
		// Evidemment il faut mettre un WHERE .. = .. (car l'image est forcément liée à un utilisateur?)
		$req->execute(array(
			'id' => $id,
			));
?>

<?php
	header('Location:../vue/achat.php')
?>











	<?php
//connexion à la bbase des données
// require_once '../controleur/control.php';

// $idProd=$_POST['idProd'];
// $idClient=$_POST['idClient'];
// $idFsseur=$_POST['idFsseur'];
// $quantite=$_POST['quantAchat'];
// $prixAchat=$_POST['prixAchat'];
// $prixfranc=$_POST['prixfranc'];
// $livraison=$_POST['livraison'];
// $paiement=$_POST['paiement'];
// $prix_tot=$prixAchat*$quantite;
// $prix_tot_franc=$prixfranc*$quantite;


// // formatage date selon notre SGBD     
// $jour = date('d');
// $mois = date('m');
// $annee = date('Y');
// $heure = date('H');
// $minute = date('i');
// $second = date('s');
// $date=formatDate($jour,$mois,$annee,$heure,$minute,$second);
// 	require_once "../modele/connect_db.php";

// 		$req=$bdd->prepare('INSERT INTO achats (id_mag,id_fsseurs,id_clients,paiement,livraison,quantite,prix_tot,prix_tot_franc,day) VALUES(?,?,?,?,?,?,?,?,?)') ;
//         // $pwd_crypte=sha1($pwd);

// 		$req->execute([$idProd,$idFsseur,$idClient,$paiement,$livraison,$quantite,$prix_tot,$prix_tot_franc,$date]);

// 		echo "Good";
       
//         header('Location:../vue/panier.php');

?>
<br/><br/><br/>
