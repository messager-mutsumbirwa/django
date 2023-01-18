<?php
$dossier= 'C:xampp/htdocs/django/img/';
$fichier= basename($_FILES['icone']['name']);
$taille_maxi = 1000000;
$taille= filesize($_FILES['icone']['tmp_name']);
$extensions = array('.png', '.gif','.jfif'
'.jpg', '.jpeg');
$extension = strrchr($_FILES['icone']['name'], '.');
//Début des vérifications de sécurité...
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
     $erreur= 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
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
if(move_uploaded_file($_FILES ['icone']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
{
  require_once '../modele/connect_bd.php';
              //Insertion du messqge à l'aide d'une requête préparée
          $req=$bdd->prepare('INSERT INTO prod_img (image1) VALUES(?)') ;
  
// Evidemment il faut mettre un WHERE .. = .. (car l'image est forcément liée à un utilisateur?)
$req->execute(array
($fichier));
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
// header('Location: ajout/formulaire.php');
?>
