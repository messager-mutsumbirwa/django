<!DOCTYPE html>
<html>
<head>
	<title>Save mofification du magasin</title>
</head>
<body>
<?php
require_once '../controleur/control.php';

$dossier= 'C:xampp/htdocs/django/img/';
$fichier= basename($_FILES['icone']['name']);
$image1= basename($_FILES['image1']['name']);
$image2= basename($_FILES['image2']['name']);
$image3= basename($_FILES['image3']['name']);
$image4= basename($_FILES['image4']['name']);

$taille_maxi = 1000000;
$taille= filesize($_FILES['icone']['tmp_name']);
$taille= filesize($_FILES['image1']['tmp_name']);
$taille= filesize($_FILES['image2']['tmp_name']);
$taille= filesize($_FILES['image3']['tmp_name']);
$taille= filesize($_FILES['image4']['tmp_name']);

$extensions = array('.png', '.gif','.jfif', 
'.jpg', '.jpeg');
$extension = strrchr($_FILES['icone']['name'], '.');
$extension = strrchr($_FILES['image1']['name'], '.');
$extension = strrchr($_FILES['image2']['name'], '.');
$extension = strrchr($_FILES['image3']['name'], '.');
$extension = strrchr($_FILES['image4']['name'], '.');

$id_fournisseur=$_POST['id_fournisseur'];
$nameitem = $_POST['nameitem'];
$catitem=$_POST['catitem'];
$prixitem=$_POST['prixitem'];
$marqueitem=$_POST['marqueitem'];
$mesureunit=$_POST['mesureunit'];
$commentaireitem=$_POST['commentaireitem'];

$taux = 2000;
$prixfranc = $prixitem * $taux;

// formatage date selon notre SGBD     
  $jour = date('d');
  $mois = date('m');
  $annee = date('Y');
  $heure = date('H');
  $minute = date('i');
  $second = date('s');
  $date=formatDate($jour,$mois,$annee,$heure,$minute,$second);

//Début des vérifications de sécurité...
if (empty($id_fournisseur) OR empty($nameitem) OR empty($catitem) OR empty($prixitem)) {
	echo "Tous les champs importamnts ne sont pas complétés";
}
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
     $erreur= 'Vous devez uploader un fichier de type png, gif, jfif, jpg, jpeg, txt ou doc...';
}
if($taille>$taille_maxi)
{
     $erreur= 'Le fichier est trop gros...';
}
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
     //On formate le nom du fichier ici...
     $fichier= strtr($fichier,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ','AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
$fichier= preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
if(move_uploaded_file($_FILES ['icone']['tmp_name'], $dossier . $fichier) AND move_uploaded_file($_FILES ['image1']['tmp_name'], $dossier . $image1) AND move_uploaded_file($_FILES ['image2']['tmp_name'], $dossier . $image2) AND move_uploaded_file($_FILES ['image3']['tmp_name'], $dossier . $image3) AND move_uploaded_file($_FILES ['image4']['tmp_name'], $dossier . $image4))  //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
{
  require_once '../modele/connect_bd.php';
              //Insertion du messqge à l'aide d'une requête préparée
          $req=$bdd->prepare('INSERT INTO mag (image,image1,image2,image3,image4,id_fournisseur,nameitem,catitem,prixitem,prixfranc,marqueitem,mesureunit,commentaireitem,accueil,offre,pjour,stockillimite,day) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)') ;
  
// Evidemment il faut mettre un WHERE .. = .. (car l'image est forcément liée à un utilisateur?)
$req->execute(array
($fichier,$image1,$image2,$image3,$image4, $id_fournisseur,$nameitem,$catitem,$prixitem,$prixfranc,$marqueitem,$mesureunit,$commentaireitem,$_POST['accueil'],$_POST['offre'],$_POST['pjour'],$_POST['stockillimite'],$date));
  
    header('Location: ../vue/gestion-mag.php');

          $req->closeCursor();
     }
     else //Sinon (la fonction renvoie FALSE).
    {
          echo 'Echec de l\'upload !';
	}
}
else
{
     echo $erreur;
}
?>

</body>
</html>