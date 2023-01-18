<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-witdh, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="vue/style.css">
	<link rel="icon" type="image/png" href="django_fav.png" />
	<title>Django</title>
</head>
<body>
	<header class="topbar">
		<span class="menu"><img src="img/menu.png" class="menu_img">
			<div class="sidebar">
				<a href="vue/contacts.php" class="active" class="icon-home">Nos contacts</a>
				<a href="vue/identificationpanier.php" class="sidebar-message">Votre panier</a>
				<a href="vue/listemagsins.php">Nos services</a>
				<a href="vue/identification_moncompte.php">Votre compte</a>
				<a href="vue/identification.php">Se Connecter</a>
			</div>
		</span>
		<span href="#" class="topbar-logo">
			
		</span>

		<nav class="topbar-nav">
			<form action="vue/searchindex.php<?php echo $_SERVER['PHP_SELF'];?>" METHOD="POST">
      			<input type="search" name="ask" class="searchbar">
				<input type="submit" class="searchclic" value=" ">
			</form>
		</nav>
		<nav class="navigation">
			<a href="vue/offre.php">Offres</a>
			<a href="vue/occasion.php">Occasions</a>
			<a href="vue/vetement.php">Vêtements</a>
			<a href="vue/alimentation.php">Alimentation</a>
			<a href="vue/technologie.php">Technologie</a>
			<a href="vue/identification_Fsseur.php">Compte vendeur</a>
			<a href="vue/about.php">A propos</a>
		</nav>
		<div class="panier-topbar">
			<a href="vue/identification_panier.php">
				0<br>
				<img src="img/panier.png">
			</a>
		</div>
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
				<!-- <div class="sidebar2">
					<a href="#" class="active" class="icon-home"> Fil d'actualites</a>
					<a href="#" class="sidebar-message">Messages</a>
					<a href="#">Evenement</a>
					<a href="#">Groupes</a>
					<a href="#">Groupes</a>
					<a href="#">Groupes</a>	
				</div> -->
				<div class="card-ident">
					Identifiez pour profiter de tous nos services disponibles<br>
					<a href="vue/identification.php"><div class="btIdentif">Identifiez-vous</div></a><br>
					<a href="vue/comptecreation.php">Créer un compte</a>
				</div>
			</div>
		</div>

	<div class="body">
		<div class="container site">
			<?php
				require_once 'modele/connect_db.php';
				require_once 'modele/index.php';
				require_once 'controleur/index.php';
				while ($donnees = $reponse->fetch())
					{
						
				echo'<div class="container-item">
						<form action="vue/produit.php" method="POST">
							<input type="hidden" name="id" value="'.$donnees['id'].'">
							<div class="item-title">'.$donnees['nameitem'].'</div>  
							<div class="item-img">
								<input type="image" src="img/'.htmlspecialchars($donnees['image']).'">
							</div>
						</form>
						<form action="vue/'.htmlspecialchars($donnees['catitem']).'.php" method="POST">
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
				<h2>Avantage d'un compte Storeshop</h2>
				<ul>
					<li>Ce n'est que moyennant un compte que vous pourrais facilement et en tous temps et lieu passer vos commandes</li><br>
					<li>Avec un compte, vous aurez accès à toutes les informations du site, tant gratuite que payante</li><br>
					<li>Vous beneicierai de la livraison gratuite sur tout le site</li><br>
					<li>Vous beneficierai également des différentes reduction des produits</li>
					<br>
				</ul>
		
	</div>

	<footer class="foot">
		<div class="bthaut">
			<a href="#">
				<img src="img/arrowhaut.png"><br>
				HAUT DE LA PAGE
			</a>
		</div>
		<div class="footer">
			<div class="footer-gauche">
				<p><a href="vue/useconditions.php">Conditions d'utilisation du site</a></p>
				<p>Langue : Français</p>
				<p><a href="index.php">Page d'accueil django.com</p></a></p>
				<p><a href="vue/aide.php">Aides</a></p>
				<p><a href="vue/comptecreation.php">Devener un client de django</a></p>
				<p><a href="vue/identification_moncompte.php">Mon compte</a></p>
				<p><a href="vue/identification_panier.php">Panier</a></p>
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
</html>
