<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-witdh, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" type="image/png" href="art.png" />
	<title>Django</title>
</head>
<body>
	<header class="topbar">
		<span class="menu"><img src="../img/menu.png" class="menu_img">
			<div class="sidebar">
				<a href="contacts2.php" class="active" class="icon-home">Nos contacts</a>
				<a href="panier.php" class="sidebar-message">Votre panier</a>
				<a href="factures.php" class="sidebar-message">Vos factures</a>
				<a href="listemagsins2.php">Nos services</a>
				<a href="moncompte.php">Mon compte</a>
			</div>
		</span>
		<span href="#" class="topbar-logo">
			
		</span>

		<nav class="topbar-nav">
			<form action="search2.php<?php echo $_SERVER['PHP_SELF'];?>" METHOD="POST">
      			<input type="search" name="ask" class="searchbar">
				<input type="submit" class="searchclic" value=" ">
			</form>
		</nav>
		<div class="panier-topbar">
			<a href="panier.php">
				<?php
					$id=$_SESSION['id'];	
					require_once '../modele/connect_db.php';
					require_once '../controleur/countpanier.php';
					while ($donnees = $requete->fetch())
					{
						echo $donnees['panier'];
					}
				?>
				<br>
				<img src="../img/panier.png">
			</a>
		</div>
		<nav class="navigation">
			<a href="offre2.php">Offres</a>
			<a href="occasion2.php">Occasions</a>
			<a href="liste2.php">Liste</a>
			<a href="location2.php">Location</a>
			<a href="vetement2.php">Vêtements</a>
			<a href="alimentation2.php">Alimentation</a>
			<a href="technologie2.php">Technologie</a>
			<a href="divers2.php">Divers</a>
			<a href="identification_fsseur2.php">Compte vendeur</a>
			<a href="about2.php">A propos</a>
		</nav>
	</header>
		<div class="adresse">
			<div class="main-adresse">
				Livraison : Av du lac N°33
			</div>
		</div>
		<div class="main">
			<div class="spacebody"></div>
			<div class="card-body">
				<div class="card-bodytopbar"></div>
				<div class="card-ident">
					Bienvenue à vous <strong><?php echo $_SESSION['nom']." ".$_SESSION['pnom']; ?></strong><br>Nous nous assurons de votre satisfaction.<br>Nous nous assurons de la livraison de façon prioritaire.
				</div>
			</div>
		</div>

	<div class="body">
		<div class="container site">
			<?php
				require_once '../modele/connect_db.php';
				require_once '../modele/index.php';
				require_once '../controleur/index2.php';
				while ($donnees = $reponse->fetch())
					{
						
				echo'<div class="container-item">
						<form action="produit2.php" method="POST">
							<input type="hidden" name="id" value="'.$donnees['id'].'">
							<div class="item-title">'.$donnees['nameitem'].'</div>  
							<div class="item-img">
								<input type="image" src="../img/'.htmlspecialchars($donnees['image']).'">
							</div>
						</form>
						<form action="'.htmlspecialchars($donnees['catitem']).'2.php" method="POST">
							<div class="seemore">
								<input type="submit" name="catitem" value="Voir plus" >
							</div>
						</form>
						
					</div>
					';

				} 
			?>
		</div>

		<div class="container-magexpl">
			<div class="magexpl-title">Explorer notre magasin</div>  
			<a href="alimentation2.php">
				<div class="container-magexpl1">
					<img src="../img/aliment_icon.jpg" class="magexpl-img">
					<div class="magexpl-name">Alimentation</div>
				</div>
			</a>
			<a href="technologie2.php">
				<div class="container-magexpl1">
					<img src="../img/tech_icon.jpg" class="magexpl-img">
					<div class="magexpl-name">Technologie</div>
				</div>
			</a>
			<a href="vetement2.php">
				<div class="container-magexpl1">
					<img src="../img/poulet.jpg" class="magexpl-img">
					<div class="magexpl-name">Vêtements</div>
				</div>
			</a>
			<a href="location2.php">
				<div class="container-magexpl1">
					<img src="../img/poulet.jpg" class="magexpl-img">
					<div class="magexpl-name">Location</div>
				</div>
			</a>
			<a href="listemagsins2.php"><div class="seemore">Tous les magasins</div></a>
		</div>
		
	</div>

	<footer class="foot">
			<div class="bthaut">
				<a href="#">
					<img src="../img/arrowhaut.png"><br>
					HAUT DE LA PAGE
				</a>
			</div>
		<div class="footer">
			<div class="footer-gauche">
				<p><a href="useconditions2.php">Conditions d'utilisation du site</a></p>
				<p>Langue : Français</p>
				<p><a href="../index.php">Page d'accueil django.com</p></a></p>
				<p><a href="aide2.php">Aides</a></p>
				<p><a href="moncompte.php">Mon compte</a></p>
				<p><a href="panier.php">Panier</a></p>
				<p><a href="factures.php">Vos factures</a></p>
			</div>
			<div class="footer-droite">
				<p>Suivez-nous sur:</p>
				<p><a href="#">Facebook</a></p>
				<p><a href="#">Instagram</a></p>
				<p><a href="#">Google</a></p>
				<p><a href="#">Twitter</a></p>
				<p>+243878998907 | +24398987687</p>
			</div>
		</div>
		<div class="coperate">Créer en 2020</div>
		
	</footer>
</body>
<?php ?>
</html>