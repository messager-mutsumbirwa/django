<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-witdh, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../../../style.css">
    <link rel="icon" type="image/png" href="art.png" />
    <title>Ma plateforme</title>
</head>
<body>
   <header class="topbar">
        <span class="menu"><img src="../../../../img/menu.png" class="menu_img">
            <div class="sidebar">
                <a href="#" class="active" class="icon-home">Nos contacts</a>
                <a href="#" class="sidebar-message">Votre panier</a>
                <a href="#">Nos services</a>
                <a href="../../../identification.php">Se connecter</a>
            </div>
        </span>
        <span href="#" class="topbar-logo">
        </span>

        <nav class="topbar-nav">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" METHOD="POST">
                <input type="search" name="ask" id="ask" class="searchbar">
                <input type="submit" class="searchclic" value=" ">
            </form>
        </nav>
        <!-- <nav class="navigation">
            <a href="#">Accueil</a>
            <a href="#">Offres</a>
            <a href="#">Boutiques</a>
            <a href="#">Occasions</a>
            <a href="#">A propos</a>
        </nav> -->
    </header>
    <div class="main">
        <div class="main-adresse">
            Votre adresse de Livraison est Av du lac N°33
        </div>
        <div class="main-return">
            <a href="../../../accueil.php">Retour vers la page d'accueil</a> 
        </div>
    </div> 

    <div class="search-container">

<?php
# variable du resultat initialise
$resultats="";
$nPara=2; #Parametre a rechercher
if (isset($_POST['ask'])&& !empty($_POST['ask'])) {
    # traitement de la commande
    $query=preg_replace("#[^a-zA-Z?0-9 ]#i","",$_POST['ask']); 
        # pour la mag
        $sql="SELECT * FROM mag WHERE nameitem LIKE ? OR catitem LIKE ? ";
    
    #cONNEXIONion a la BD
    include '../modele/connect_db.php';

    $req=$bdd->prepare($sql);
    if ($nPara==2) {
        # Pour deux parametre seulement
        $req->execute(array('%'.$query.'%','%'.$query.'%'));
    }else{
        $req->execute(array('%'.$query.'%','%'.$query.'%'));
    }
       
    $count=$req->rowcount();

    if (!$count>=1) {
        echo "<div class=\"topbar-search\">0 Resultat trouve pour <strong>$query</strong></div>";
        
    }else{
        echo '<div class="topbar-search">'.$count." Resultat trouve pour <strong>$query</strong></div>";
        
        while ($data=$req->fetch(PDO::FETCH_ASSOC)) {
            echo ' <div class="searchresult">
                        <form action="../../../produit2.php" method="POST">
                            <input type="hidden" name="id" value="'.htmlspecialchars($data['id']).'">    
                            <input type="image" src="../../../../img/'.$data['image'].'" class="searchresult-img">
                            <div class="searchresult-item">'.$data['nameitem'].'<br>'.$data['marqueitem'].'<br>'.$data['catitem'].'<br></div>
                        </form>
                    </div>';
        }
    }
}
?>

   
       
        
            
           
          
       
   
</div>