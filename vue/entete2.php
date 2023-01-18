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
	      			<input type="search" name="ask" id="ask" class="searchbar">
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
		</header>
		<div class="main">
			<div class="main-adresse">
				Votre adresse de livraison est Av du lac N°33
			</div>
			<div class="main-return">
				<a href="accueil.php">Retour vers la page d'accueil</a> 
			</div>
		</div>       